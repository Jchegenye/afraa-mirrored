<?php

namespace Afraa\Providers;

use Afraa\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AfraaThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the afraa theme services.
     * @return void
     */
    public function boot()
    {
        $settings = Settings::where('status', (int)1)->first();
        $data = [
            'customizes' => $settings,
            //'notifications' =>  //add more collections here
        ];
        View::share($data);
    }

    /**
     * Register the afraa theme services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
