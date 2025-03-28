<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\SMS;
use App\Models\Admin;

class SMSPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any SMS');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, SMS $sms): bool
    {
        return $user->checkPermissionTo('view SMS');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create SMS');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, SMS $sms): bool
    {
        return $user->checkPermissionTo('update SMS');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, SMS $sms): bool
    {
        return $user->checkPermissionTo('delete SMS');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any SMS');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, SMS $sms): bool
    {
        return $user->checkPermissionTo('restore SMS');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any SMS');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, SMS $sms): bool
    {
        return $user->checkPermissionTo('replicate SMS');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder SMS');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, SMS $sms): bool
    {
        return $user->checkPermissionTo('force-delete SMS');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any SMS');
    }
}
