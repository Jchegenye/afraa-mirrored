<?php

namespace Afraa\Legibra\ReusableCodes\Dashboard;

use Afraa\User;
use Afraa\Model\Admin\Dashboard\UserPermissions;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;

{

    /**
     * This trait is used to query for data in your tables,
     * as well as insert new records into the table etc.
     *
     * Add your own model retrieval here.
     *
     * @author Jackson A. Chegenye
     * @return models
     */
    trait RetrieveModels
    {

        /**
         * Retrieve all models
         *
         * @author Jackson A. Chegenye
         * @return array
         **/
        public function RetrieveUsers()
        {

            /**
             * Users Modal
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $users = User::orderBy('uid', 'DES')->paginate(4);

            $search = request()->uid; //get query id
            //$usersSearch = User::where('name','LIKE',"%{$search}%")->paginate(4); //Get search results by name
            $usersSearch = User::withTrashed()
                        ->where('name','LIKE',"%{$search}%")
                        ->orderBy('uid', 'desc')
                        ->paginate(4);
            /**
             * Permissions Modal
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $allpermissions = UserPermissions::all();

            $count = User::where('verified', 1)->count();

            /**
             * Bind all queries here
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $data = [

                'users' => $users,
                'usersSearch' => $usersSearch,
                'allpermissions' => $allpermissions,
                'counts' => $count

            ];
            return $data;

        }


        /**
         * Retrieve all models
         *
         * @author Jackson A. Chegenye
         * @return array
         **/
        public function RetrieveManagers()
        {

            /**
             * Users Modal
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $users = User::where('role','=','manager')
                ->orderBy('uid', 'DES')
                ->get();

            $search = request()->uid; //get query id
            //$usersSearch = User::where('name','LIKE',"%{$search}%")->paginate(4); //Get search results by name
            $usersSearch = User::withTrashed()
                        ->where('name','LIKE',"%{$search}%")
                        ->where('role','=','manager')
                        ->orderBy('uid', 'desc')
                        ->get();
            /**
             * Permissions Modal
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $allpermissions = UserPermissions::all();

            $count = User::where('verified', 1)->count();

            /**
             * Bind all queries here
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $data = [

                'users' => $users,
                'usersSearch' => $usersSearch,
                'allpermissions' => $allpermissions,
                'counts' => $count

            ];
            return $data;

        }


        /**
         * Retrieve all models
         *
         * @author Jackson A. Chegenye
         * @return array
         **/
        public function RetrieveDelegates()
        {

            /**
             * Users Modal
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $users = User::where('role','delegate')
                ->orderBy('uid', 'DES')
                ->get();

            $search = request()->uid; //get query id
            //$usersSearch = User::where('name','LIKE',"%{$search}%")->paginate(4); //Get search results by name
            $usersSearch = User::withTrashed()
                        ->where('name','LIKE',"%{$search}%")
                        ->where('role','=','delegate')
                        ->orderBy('uid', 'desc')
                        ->get();
            /**
             * Permissions Modal
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $allpermissions = UserPermissions::all();

            $count = User::where('verified', 1)->count();

            /**
             * Bind all queries here
             *
             * @author Jackson A. Chegenye
             * @return array
             **/
            $data = [

                'users' => $users,
                'usersSearch' => $usersSearch,
                'allpermissions' => $allpermissions,
                'counts' => $count

            ];
            return $data;

        }

    }
}
