<?php

namespace Afraa;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    //use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Register our primary key here,
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    protected $primaryKey = 'uid';

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
    //public function can($permission){} 
    public function ability($roles, $permissions, $options){}
    public function attachRole($role){}

    /**
     * Register one-to-one relationship between User and VerifyUser Model
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    public function verifyUser()
    {
        return $this->hasOne('Afraa\Model\Admin\Users\VerifyUser');
    }
    
}
