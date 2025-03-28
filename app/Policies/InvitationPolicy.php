<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Invitation;
use App\Models\Admin;

class InvitationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Invitation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Invitation $invitation): bool
    {
        return $user->checkPermissionTo('view Invitation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Invitation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Invitation $invitation): bool
    {
        return $user->checkPermissionTo('update Invitation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Invitation $invitation): bool
    {
        return $user->checkPermissionTo('delete Invitation');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Invitation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Invitation $invitation): bool
    {
        return $user->checkPermissionTo('restore Invitation');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Invitation');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Invitation $invitation): bool
    {
        return $user->checkPermissionTo('replicate Invitation');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Invitation');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Invitation $invitation): bool
    {
        return $user->checkPermissionTo('force-delete Invitation');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Invitation');
    }
}
