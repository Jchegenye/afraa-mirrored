<?php

namespace Afraa\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    //
    public function getAllUsers(){

        $users = DB::table('users')->select('uid','name', 'email', 'role')->get();

        return $users;
    }

    public function getAllUsersId(){

        $users = DB::table('users')->select('uid')->get();

        return $users;
    }

    //
    public function getUserById($id){

        $user =  DB::table('users')->where('uid', $id)->select('uid','name', 'email', 'role')->get();

        return $user;
    }
}
