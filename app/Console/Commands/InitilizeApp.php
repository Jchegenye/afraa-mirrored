<?php

namespace Afraa\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Afraa\Model\Admin\Users\User;
use Afraa\Legibra\ReusableCodes\DateFormatsTrait;
use Afraa\Legibra\ReusableCodes\GenerateCustomVerifyTokenTrait;
use Afraa\Legibra\ReusableCodes\PermissionsTrait;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\Request;

class InitilizeApp extends Command
{

    use DateFormatsTrait;
    use GenerateCustomVerifyTokenTrait;
    use PermissionsTrait;

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
        $appName = env('APP_NAME', 'Afraa');

        //Execute console command process
        $this->info('Initialization in progress ...');

        //Locate YML file
        $file = app_path().'/.initializeApp.yml';

        //Check file existance. 
        if ( ! file_exists($file))
        {
            $this->error('The file .initializeApp.yml does not exist!');

        }else{

            //Load the YAML file and parse it.
            $array = Yaml::parse(file_get_contents($file));


            foreach ($array as $key => $value) {
                $name = $key;

                //Lets loop through the value array to get the other details.
                $root_name = $value['name'];
                $root_username = $value['username'];
                $root_email = $value['email'];
                $root_password = $value['password'];
                $root_role = $value['role'];

                //Check if Root user already exists
                $query = User::where('email','=', $root_email)->first();

                //Attach all retrieved permissions to admin role
                $jsonPermissions = $this->getAllPermissions();
                //$jsonPermissions = json_encode($permissions);

                //Append generated code for registration verification
                $code = $this->generatePermissionsCode();

                //Fetch the first USER ID
                $users_uid = User::orderBy('uid', 'DESC')->take(1)->get();

                //Only create a root user non existing.
                if (empty($query)) {

                        $user = new User;

                            if ($users_uid->isEmpty()) {
                                $user->uid=1;
                            }
                            else {
                                foreach ($users_uid as $count) {
                                    $uid = $count->uid;
                                    $user->uid = $uid+1;
                                }
                            }

                            $user->name = $root_name;
                            $user->username = $root_username;
                            $user->email = $root_email;
                            $user->password = Hash::make($root_password);
                            $user->role = $root_role;
                            $user->permission = $jsonPermissions;
                            $user->verification_token = $code;
                            $user->remember_token = $code;
                            $user->verified = '1'; //true(1) or false(0)

                        $user->save();

                    $this->info('Root Created ' . $name);

                }
                else{

                    //Lets update existing admin(s).
                    $updatePermissions = User::where('email','=',$root_email)->update(
                        [   
                            'role' => $root_role,
                            'permission' => $jsonPermissions,
                        ]
                    );

                    $this->info('Updating User:'. $name);

                }
            }

        }

    }
    
}
