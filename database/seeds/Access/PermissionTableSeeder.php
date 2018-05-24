<?php

use Carbon\Carbon;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class PermissionTableSeeder.
 */
class PermissionTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncateMultiple([config('access.permissions_table'), config('access.permission_role_table')]);

        /**
         * Don't need to assign any permissions to administrator because the all flag is set to true
         * in RoleTableSeeder.php.
         */

        /**
         * Misc Access Permissions.
         */
        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'view-backend';
        $viewBackend->display_name = 'View Backend';
        $viewBackend->system       = true;
        $viewBackend->sort         = 1;
        $viewBackend->created_by   = 1;
        $viewBackend->updated_by   = 1;
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $permission_model                   = config('access.permission');
        $viewAccessManagement               = new $permission_model;
        $viewAccessManagement->name         = 'view-access-management';
        $viewAccessManagement->display_name = 'View Access Management';
        $viewAccessManagement->system       = true;
        $viewAccessManagement->sort         = 2;
        $viewAccessManagement->created_by   = 1;
        $viewAccessManagement->updated_by   = 1;
        $viewAccessManagement->created_at   = Carbon::now();
        $viewAccessManagement->updated_at   = Carbon::now();
        $viewAccessManagement->save();

        /**
         * Access Permissions
         */

        /**
         * User
         */
        $permission_model          = config('access.permission');
        $createUsers               = new $permission_model;
        $createUsers->name         = 'manage-users';
        $createUsers->display_name = 'Manage Users';
        $createUsers->system       = true;
        $createUsers->sort         = 5;
        $createUsers->description  = '';
        $createUsers->created_by  = 1;
        $createUsers->updated_by  = 1;
        $createUsers->created_at   = Carbon::now();
        $createUsers->updated_at   = Carbon::now();
        $createUsers->save();

        $permission_model          = config('access.permission');
        $deleteUsers               = new $permission_model;
        $deleteUsers->name         = 'delete-users';
        $deleteUsers->display_name = 'Delete Users';
        $deleteUsers->system       = true;
        $deleteUsers->sort         = 7;
        $deleteUsers->description  = '';
        $deleteUsers->created_by   = 1;
        $deleteUsers->updated_by   = 1;
        $deleteUsers->created_at   = Carbon::now();
        $deleteUsers->updated_at   = Carbon::now();
        $deleteUsers->save();

        $permission_model                 = config('access.permission');
        $changeUserPassword               = new $permission_model;
        $changeUserPassword->name         = 'change-user-password';
        $changeUserPassword->display_name = 'Change User Password';
        $changeUserPassword->system       = true;
        $changeUserPassword->sort         = 8;
        $changeUserPassword->description  = '';
        $changeUserPassword->created_by   = 1;
        $changeUserPassword->updated_by   = 1;
        $changeUserPassword->created_at   = Carbon::now();
        $changeUserPassword->updated_at   = Carbon::now();
        $changeUserPassword->save();

        $permission_model             = config('access.permission');
        $deactivateUser               = new $permission_model;
        $deactivateUser->name         = 'deactivate-users';
        $deactivateUser->display_name = 'Deactivate Users';
        $deactivateUser->system       = true;
        $deactivateUser->sort         = 9;
        $deactivateUser->description  = '';
        $deactivateUser->created_by   = 1;
        $deactivateUser->updated_by   = 1;
        $deactivateUser->created_at   = Carbon::now();
        $deactivateUser->updated_at   = Carbon::now();
        $deactivateUser->save();

        $permission_model             = config('access.permission');
        $reactivateUser               = new $permission_model;
        $reactivateUser->name         = 'reactivate-users';
        $reactivateUser->display_name = 'Re-Activate Users';
        $reactivateUser->system       = true;
        $reactivateUser->sort         = 11;
        $reactivateUser->description  = '';
        $reactivateUser->created_by   = 1;
        $reactivateUser->updated_by   = 1;
        $reactivateUser->created_at   = Carbon::now();
        $reactivateUser->updated_at   = Carbon::now();
        $reactivateUser->save();

        $permission_model           = config('access.permission');
        $undeleteUser               = new $permission_model;
        $undeleteUser->name         = 'undelete-users';
        $undeleteUser->display_name = 'Restore Users';
        $undeleteUser->system       = true;
        $undeleteUser->sort         = 13;
        $undeleteUser->description  = '';
        $undeleteUser->created_by   = 1;
        $undeleteUser->updated_by   = 1;
        $undeleteUser->created_at   = Carbon::now();
        $undeleteUser->updated_at   = Carbon::now();
        $undeleteUser->save();

        $permission_model                    = config('access.permission');
        $permanentlyDeleteUser               = new $permission_model;
        $permanentlyDeleteUser->name         = 'permanently-delete-users';
        $permanentlyDeleteUser->display_name = 'Permanently Delete Users';
        $permanentlyDeleteUser->system       = true;
        $permanentlyDeleteUser->sort         = 14;
        $permanentlyDeleteUser->description  = '';
        $permanentlyDeleteUser->created_by   = 1;
        $permanentlyDeleteUser->updated_by   = 1;
        $permanentlyDeleteUser->created_at   = Carbon::now();
        $permanentlyDeleteUser->updated_at   = Carbon::now();
        $permanentlyDeleteUser->save();

        $permission_model                      = config('access.permission');
        $resendConfirmationEmail               = new $permission_model;
        $resendConfirmationEmail->name         = 'resend-user-confirmation-email';
        $resendConfirmationEmail->display_name = 'Resend Confirmation E-mail';
        $resendConfirmationEmail->system       = true;
        $resendConfirmationEmail->sort         = 15;
        $resendConfirmationEmail->description  = '';
        $resendConfirmationEmail->created_by   = 1;
        $resendConfirmationEmail->updated_by   = 1;
        $resendConfirmationEmail->created_at   = Carbon::now();
        $resendConfirmationEmail->updated_at   = Carbon::now();
        $resendConfirmationEmail->save();

        /**
         * Role
         */
        $permission_model          = config('access.permission');
        $createRoles               = new $permission_model;
        $createRoles->name         = 'manage-roles';
        $createRoles->display_name = 'Manage Roles';
        $createRoles->system       = true;
        $createRoles->sort         = 2;
        $createRoles->description  = '';
        $createRoles->created_by   = 1;
        $createRoles->updated_by   = 1;
        $createRoles->created_at   = Carbon::now();
        $createRoles->updated_at   = Carbon::now();
        $createRoles->save();

        $permission_model          = config('access.permission');
        $deleteRoles               = new $permission_model;
        $deleteRoles->name         = 'delete-roles';
        $deleteRoles->display_name = 'Delete Roles';
        $deleteRoles->system       = true;
        $deleteRoles->sort         = 4;
        $deleteRoles->description  = '';
        $deleteRoles->created_by   = 1;
        $deleteRoles->updated_by   = 1;
        $deleteRoles->created_at   = Carbon::now();
        $deleteRoles->updated_at   = Carbon::now();
        $deleteRoles->save();

        /**
         * Permission
         */
        $permission_model                = config('access.permission');
        $createPermissions               = new $permission_model;
        $createPermissions->name         = 'create-permissions';
        $createPermissions->display_name = 'Create Permissions';
        $createPermissions->system       = true;
        $createPermissions->sort         = 5;
        $createPermissions->description  = '';
        $createPermissions->created_by  = 1;
        $createPermissions->updated_by  = 1;
        $createPermissions->created_at   = Carbon::now();
        $createPermissions->updated_at   = Carbon::now();
        $createPermissions->save();

        $permission_model              = config('access.permission');
        $editPermissions               = new $permission_model;
        $editPermissions->name         = 'edit-permissions';
        $editPermissions->display_name = 'Edit Permissions';
        $editPermissions->system       = true;
        $editPermissions->sort         = 6;
        $editPermissions->description  = '';
        $editPermissions->created_by   = 1;
        $editPermissions->updated_by   = 1;
        $editPermissions->created_at   = Carbon::now();
        $editPermissions->updated_at   = Carbon::now();
        $editPermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-permissions';
        $deletePermissions->display_name = 'Delete Permissions';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 7;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();


        /**
         * Start Civil Servant Permission
         */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-civil-servant';
        $deletePermissions->display_name = 'Manage Civil Servant';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'permanently-delete-civil-servant';
        $deletePermissions->display_name = 'Permanently Delete Civil Servant';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'undelete-civil-servant';
        $deletePermissions->display_name = 'Restore Civil Servant';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'change-member-password';
        $deletePermissions->display_name = 'Change Password Civil Servant';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'reactivate-civil-servant';
        $deletePermissions->display_name = 'Reactivate Civil Servant';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'deactivate-civil-servant';
        $deletePermissions->display_name = 'Deactivate Civil Servant';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-civil-servant';
        $deletePermissions->display_name = 'Delete Civil Servant';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();


        /**
         * Start Meter Owner Permission
         */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-meter-owner';
        $deletePermissions->display_name = 'Manage Meter Owner';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'permanently-delete-meter-owner';
        $deletePermissions->display_name = 'Permanently Delete Meter Owner';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'undelete-meter-owner';
        $deletePermissions->display_name = 'Restore Meter Owner';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'change-meter-password';
        $deletePermissions->display_name = 'Change Password Meter Owner';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'reactivate-meter-owner';
        $deletePermissions->display_name = 'Reactivate Meter Owner';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'deactivate-meter-owner';
        $deletePermissions->display_name = 'Deactivate Meter Owner';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-meter-owner';
        $deletePermissions->display_name = 'Delete Meter Owner';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 5;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();


         /**
         * Start Nric Code Permission
         */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-nric-code';
        $deletePermissions->display_name = 'Manage Nric Code';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 6;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-nric-code';
        $deletePermissions->display_name = 'Update Nric Code';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 6;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-nric-code';
        $deletePermissions->display_name = 'store Nric Code';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 6;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-nric-code';
        $deletePermissions->display_name = 'Delete Nric Code';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 6;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Nric Township Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-nric-township';
        $deletePermissions->display_name = 'Manage Nric Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 7;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-nric-township';
        $deletePermissions->display_name = 'Update Nric Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 7;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-nric-township';
        $deletePermissions->display_name = 'Store Nric Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 7;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-nric-township';
        $deletePermissions->display_name = 'Delete Nric Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 7;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Region Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-region';
        $deletePermissions->display_name = 'Manage Region';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 8;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

         $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-region';
        $deletePermissions->display_name = 'Store Region';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 8;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-region';
        $deletePermissions->display_name = 'Update Region';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 8;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-region';
        $deletePermissions->display_name = 'Delete Region';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 8;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start District Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-district';
        $deletePermissions->display_name = 'Manage District';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 9;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-district';
        $deletePermissions->display_name = 'Store District';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 9;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-district';
        $deletePermissions->display_name = 'Update District';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 9;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-district';
        $deletePermissions->display_name = 'Delete District';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 9;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Township Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-township';
        $deletePermissions->display_name = 'Manage Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 10;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-township';
        $deletePermissions->display_name = 'Store Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 10;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-township';
        $deletePermissions->display_name = 'Update Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 10;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-township';
        $deletePermissions->display_name = 'Delete Township';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 10;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Village Tract Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-village-tract';
        $deletePermissions->display_name = 'Manage Village Tract';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 11;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-village-tract';
        $deletePermissions->display_name = 'Store Village Tract';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 11;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-village-tract';
        $deletePermissions->display_name = 'Update Village Tract';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 11;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-village-tract';
        $deletePermissions->display_name = 'Delete Village Tract';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 11;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Community Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-community';
        $deletePermissions->display_name = 'Manage Community';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 12;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-community';
        $deletePermissions->display_name = 'Store Community';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 12;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-community';
        $deletePermissions->display_name = 'Update Community';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 12;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-community';
        $deletePermissions->display_name = 'Delete Community';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 12;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Street Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-street';
        $deletePermissions->display_name = 'Manage Street';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 13;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-street';
        $deletePermissions->display_name = 'Store Street';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 13;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-street';
        $deletePermissions->display_name = 'Update Street';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 13;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-street';
        $deletePermissions->display_name = 'Delete Street';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 13;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Department Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-department';
        $deletePermissions->display_name = 'Manage Department';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 14;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-department';
        $deletePermissions->display_name = 'Store Department';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 14;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-department';
        $deletePermissions->display_name = 'Update Department';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 14;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-department';
        $deletePermissions->display_name = 'Delete Department';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 14;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Meter Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-meter';
        $deletePermissions->display_name = 'Manage Meter';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-meter';
        $deletePermissions->display_name = 'Store Meter';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-meter';
        $deletePermissions->display_name = 'Update Meter';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-meter';
        $deletePermissions->display_name = 'Delete Meter';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Monthly Meter Unit Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-monthly-meter-unit';
        $deletePermissions->display_name = 'Manage Monthly Meter Unit';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-monthly-meter-unit';
        $deletePermissions->display_name = 'Store Monthly Meter Unit';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-monthly-meter-unit';
        $deletePermissions->display_name = 'Update Monthly Meter Unit';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-monthly-meter-unit';
        $deletePermissions->display_name = 'Delete Monthly Meter Unit';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 15;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();


        /**
         * Start Lamp Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-lamp';
        $deletePermissions->display_name = 'Manage Lamp';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 16;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-lamp';
        $deletePermissions->display_name = 'Store Lamp';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 16;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-lamp';
        $deletePermissions->display_name = 'Update Lamp';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 16;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-lamp';
        $deletePermissions->display_name = 'Delete Lamp';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 16;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Report Type Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-report-type';
        $deletePermissions->display_name = 'Manage Report Type';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 17;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-report-type';
        $deletePermissions->display_name = 'Store Report Type';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 17;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-report-type';
        $deletePermissions->display_name = 'Update Report Type';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 17;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-report-type';
        $deletePermissions->display_name = 'Delete Report Type';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 17;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Report Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-report';
        $deletePermissions->display_name = 'Manage Report';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 18;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-report';
        $deletePermissions->display_name = 'Store Report';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 18;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-report';
        $deletePermissions->display_name = 'Update Report';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 18;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-report';
        $deletePermissions->display_name = 'Delete Report';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 18;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        /**
         * Start Transformer Permission
        */        
        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'manage-transformer';
        $deletePermissions->display_name = 'Manage Transformer';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 19;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'store-transformer';
        $deletePermissions->display_name = 'Store Transformer';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 19;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'update-transformer';
        $deletePermissions->display_name = 'Update Transformer';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 19;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $permission_model                = config('access.permission');
        $deletePermissions               = new $permission_model;
        $deletePermissions->name         = 'delete-transformer';
        $deletePermissions->display_name = 'Delete Transformer';
        $deletePermissions->system       = true;
        $deletePermissions->sort         = 19;
        $deletePermissions->description  = '';
        $deletePermissions->created_by   = 1;
        $deletePermissions->updated_by   = 1;
        $deletePermissions->created_at   = Carbon::now();
        $deletePermissions->updated_at   = Carbon::now();
        $deletePermissions->save();

        $this->enableForeignKeys();
    }
}
