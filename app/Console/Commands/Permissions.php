<?php

namespace Afraa\Console\Commands;

use Illuminate\Console\Command;
use Afraa\Model\Admin\Dashboard\UserPermissions;
use Afraa\Legibra\ReusableCodes\VerificationCodeGenerator;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpFoundation\Request;

class Permissions extends Command
{
    /**
     * The name and signature of the console command.
     * 
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $signature = 'afraa:permissions';

    /**
     * The console command description.
     * 
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $description = 'This command will generate Afraa user permissions.';

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

        $file = app_path().'/.permissions.yml';

        if ( ! file_exists($file))
        {
            $this->error('The file .permissions.yml does not exist');

        }else{

            $this->info('Generating permissions. Hold On...');

            //Load the YAML file and parse it.
            $array = Yaml::parse(file_get_contents($file));

            foreach ($array as $key => $value) {

                $name = $key;

                //Lets loop through the value array to get the other details.
                $pid = $value['pid'];
                $machine_name = $value['name'];
                $description = $value['description'];

                //We need to check if we already stored this permission.
                $permission = UserPermissions::where('pid','=',$pid)->first();

                //Only create a new permission if it is not existing.
                if (empty($permission)) {
                    
                    $new_permission = new UserPermissions;
                    $new_permission->name = $name;
                    $new_permission->machine_name = $machine_name;
                    $new_permission->description = $description;
                    $new_permission->save();

                    $this->info('New Permission:'.$name);

                }
                else{

                    //Lets update existing Permissions or add new one(s).
                    $updatePermissions = UserPermissions::where('pid','=',$pid)->update(
                        [   
                            'machine_name' => $machine_name,
                            'name' => $name,
                            'description' => $description
                        ]
                    );

                    $this->info('Updating Permission:'."($pid)".$name);

                }

            }
        }

    }
}
