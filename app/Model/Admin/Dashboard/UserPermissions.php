<?php

namespace Afraa\Model\Admin\Dashboard;

use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    
    /**
     * The attributes that are mass assignable.
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    protected $fillable = ['machine_name'];

    /**
     * The database collection used by the model.
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $table = "user_permissions";

}
