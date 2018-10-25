<?php

namespace Afraa\Model\Admin\Users;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{

    /**
     * Register our primary key here,
     * 
     * @author Jackson A. Chegenye
     * @var array
     */
    //protected $primaryKey = 'vid';
    protected $primaryKey = 'uid';
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('Afraa\User', 'user_uid');
    }

}
