<?php

namespace Afraa\Model\Admin\Users;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
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
    
    protected $primaryKey = 'user_uid';
    
    /**
     * The database table used by the model for (password_resets)
     * 
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $table = "password_resets";
    


}
