<?php

namespace Afraa;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', array('uid')
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Lets use Soft Delete since we do not want to delete records permanently
     * The attributes that should be mutated to dates.
     *
     * @author Jackson A. Chegenye
     * @var array
     */
    protected $dates = ['deleted_at'];

    //only allow the following items to be mass-assigned to our model
    //protected $fillable = array('uid');

    /**
     * Authour: Jackson A. Chegenye
     * ---
     * Register incoming middleware parameter requests for both roles & permissions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */

    public function roles(){}

    public function hasRole($name){}

    public function can($permission){} 

    public function ability($roles, $permissions, $options){}
    
    public function attachRole($role){}

}
