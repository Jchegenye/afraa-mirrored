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
            ->where('users.role','delegate')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('events')
                    ->whereRaw('users.uid = events.user_id');
            })
            ->leftJoin('profiles', function ($join)  use ( &$id ) {

                $join->on('profiles.user_id', '=', 'users.uid');
            })
            ->get();

        return $users;
    }

    public function isProfileUpdated($id){

        $profiles = DB::table('profiles')->where('user_id', '=', $id)->count();

        if ($profiles > 0) {
            return true;
        }
        return false;
    }

    //
    public function getUserById($id){

        $user;

        $profiles = DB::table('profiles')->where('user_id', '=', $id)->count();

        if ($profiles > 0) {

            $user =  DB::table('users')
                ->where('users.uid', '=', $id)
                ->leftJoin('profiles', function ($join)  use ( &$id ) {

                    $join->on('profiles.user_id', '=', 'users.uid');
                })
                ->get();

        } else {

            $user =  DB::table('users')->where('uid', $id)->get();

        }

        return $user;
    }
}
