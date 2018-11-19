<?php

namespace Afraa\Model\Admin\Dashboard;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{

    //use Searchable;
    
    /**
     * The attributes that are mass assignable.
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    protected $fillable = ['machine_name'];

    /**
     * Register our primary key here,
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    protected $primaryKey = 'pid';

    /**
     * The attributes that should be casted to native types.
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    protected $casts = [
        'permissions' => 'array'
    ];

    /**
     * The database collection used by the model.
     * @author Jackson A. Chegenye
     * @var string
     */
    protected $table = "user_permissions";

}
