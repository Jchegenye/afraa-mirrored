<?php

namespace Afraa\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Afraa\Model\Admin\Users\User;
use Afraa\Model\Admin\Dashboard\UserPermission;
use Afraa\Legibra\ReusableCodes\DateFormats;
use Afraa\Legibra\ReusableCodes\VerificationCodeGenerator;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\Request;

class InitilizeApp extends Command
{
    /**
     * The name and signature of the console command.
     * 
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $signature = 'afraa:initialize';

    /**
     * The console command description.
     *
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $description = 'This command will initialize Afraa app with super admin etc.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @author Jackson A. Chegenye
     * @return mixed
     */
    public function handle(Request $code)
    {

        //Execute console command process
        $this->info('Initialization in progress ...');

        //Locate YML file
        $file = app_path().'/.initializeApp.yml';

        //Check file existance. 
        if ( ! file_exists($file))
        {
            $this->error('The file /.initializeApp.yml does not exist!');

        }else{

            //Load the YAML file and parse it.
            $array = Yaml::parse(file_get_contents($file));


            foreach ($array as $key => $value) {
                $name = $key;

                //Lets loop through the value array to get the other details.
                $root_name = $value['name'];
                $root_uid = $value['uid'];
                $root_username = $value['username'];
                $root_email = $value['email'];
                $root_password = $value['password'];
                $root_role = $value['role'];

                //Check if Root user already exists
                $query = User::where('uid','=', 'Afraa_1')->first();

                //Also fetch the permissions
                $permissions = $this->getAllPermissions();
                $jsonPermissions = json_encode($permissions);

                //Append generated code for registration verification
                $new_code = new VerificationCodeGenerator();
                $code = $new_code->generateRegistrationVerifyCode($code);

                //Only create a root user non existing.
                if (empty($query)) {

                    $this->info('Root user does not exist. We are creating one ...');

                        $user = new User;

                            $user->name = $root_name;
                            $user->uid = env('APP_NAME', 'Afraa'). "_" . $root_uid;
                            $user->username = $root_username;
                            $user->email = $root_email;
                            $user->password = Hash::make($root_password);
                            $user->role = $root_role;
                            $user->permission = $jsonPermissions;
                            $user->verification_token = $code;
                            $user->confirmation_code = '1';

                        $user->save();

                    $this->info('Root created ' . $name);

                }else{

                    $this->info('Root user exists. We are updating permissions ...');

                    $user = User::where('uid','=', 'Afraa_1')
                        ->first();
                        $user->role = $root_role;
                        $user->verification_token = $code;
                        $user->permission = $jsonPermissions;
                    $user->save();

                }
            }

        }

    }

    /**
     * Collect all available role's permissions i.e. Deligates, Admin, Manager etc.
     *
     * @author Jackson A. Chegenye
     * @return array
     */
    public static function getAllPermissions(){

        $permissions = array(
            'member_role',
            'access_to_members_list',
            'access_to_member_profile',
            'access_to_admin_routes',
            'access_to_workbench',
            'can_give_permissions',
            'can_approve_a_member',
            'can_lock_user',
            'can_delete_an_account'
        );

        return $permissions;

    }
}
