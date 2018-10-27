<?php 

namespace Afraa\Legibra\ReusableCodes;

use Afraa\Model\Admin\Dashboard\UserPermissions;

{

    /**
     * This trait handles all types funtions for permissions you wanna use.
     * Add your own funtion type here.
     *
     * @author Jackson A. Chegenye
     * @return permissions
     */
    trait PermissionsTrait
    {

        /**
         * Retrieve all available permissions from UserPermissions DB
         *
         * @author Jackson A. Chegenye
         * @return array
         */
        protected static function getAllPermissions(){

            $permissions = UserPermissions::all('machine_name')->pluck('machine_name');

            // $permissions = array(
            //     'member_role',
            //     'access_to_members_list',
            //     'access_to_member_profile',
            //     'access_to_admin_routes',
            //     'access_to_workbench',
            //     'can_give_permissions',
            //     'can_approve_a_member',
            //     'can_lock_user',
            //     'can_delete_an_account'
            // );

            return $permissions;

        }

    }
}