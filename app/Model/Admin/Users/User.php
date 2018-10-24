<?php

namespace Afraa\Model\Admin\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * Lets use Soft Delete since we do not want to delete records permanently
     * The attributes that should be mutated to dates.
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    protected $dates = ['deleted_at'];

    //only allow the following items to be mass-assigned to our model
    protected $fillable = array('uid');

    /**
     * The database table used by the model.
     * 
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $table = "users";

}
