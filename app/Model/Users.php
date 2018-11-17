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

    public function getAllDelegates(){

        $users = DB::table('users')
            ->join('profiles', function ($join)  use ( &$id ) {

                $join->on('profiles.user_id', '=', 'users.uid')
                    ->where('role','delegate');
            })
            ->get();

        return $users;
    }

    //
    public function getUserById($id){

        $user;

        $profiles = DB::table('profiles')->where('user_id', '=', $id)->count();

        if ($profiles > 0) {

            $user =  DB::table('users')
                ->join('profiles', function ($join)  use ( &$id ) {

                    $join->on('profiles.user_id', '=', 'users.uid')
                        ->where('users.uid', '=', $id);
                })
                ->get();

        } else {

            $user =  DB::table('users')->where('uid', $id)->get();

        }

        return $user;
    }
}
