<?php

namespace Afraa\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Afraa\Legibra\Model\Admin\Dashboard\UserPermission;
use Afraa\Legibra\Model\Users\User;
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
    public function handle()
    {

        //Execute console command process
        $this->info('Initialization in progress ...');

        //Locate YML file
        $file = app_path().'/.initialize.yml';

        //Check file existance. 
        if ( ! file_exists($file))
        {
            $this->error('The file initialize.yml does not exist!');

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

                //Check if Root user already exists
                $query = User::where('email','=','dd@legibra.com')->first();

                //Also fetch the permissions
                $permissions = $this->getAllPermissions();

                //Lets Get the DATES class we had set
                $date = new DateFormats();
                $DateType1 = $date->date();

                //Append generated code for registration verification
                $new_code = new VerificationCodeGenerator();
                $code = $new_code->generateRegistrationVerifyCode($code);

                //Only create a root user non existing.
                if (empty($query)) {

                    $this->info('Root user does not exist. We are creating one ...');

                        $user = new User;

                            $user->name = $root_name;
                            $user->uid = $root_uid;
                            $user->username = $root_username;
                            $user->email = $root_email;
                            $user->password = Hash::make($root_password);

                            $user->role = [
                                'member_role',
                                'access_to_members_list',
                                'access_to_member_profile',
                                'access_to_admin_routes',
                                'access_to_workbench',
                                'can_give_permissions',
                                'can_approve_a_member',
                                'can_lock_user',
                                'can_delete_an_account'
                            ];
                            $user->user_status = 'member';
                            $user->signed_date = $DateType1['DateType1'];
                            $user->verification_token = $code;
                            $user->confirmation_code = '1';

                        $user->save();

                    $this->info('Root created ' . $name);

                }else{

                    $this->info('Root user exists. We are updating permissions ...');

                    $user = User::where('email','=','chegenyejackson@gmail.com')
                        ->first();
                    $user->uid = $root_uid;
                    $user->role = [
                        'member_role',
                        'access_to_members_list',
                        'access_to_member_profile',
                        'access_to_admin_routes',
                        'access_to_workbench',
                        'can_give_permissions',
                        'can_approve_a_member',
                        'can_lock_user',
                        'can_delete_an_account'
                    ];
                    $user->user_status = 'member';
                    $user->save();

                }
            }

        }

    }

    /**
     * Collect all admin/superadmin/root/ permissions.
     *
     * @author Jackson A. Chegenye
     * @return mixed
     */
    public function getAllPermissions(){



    }
}
