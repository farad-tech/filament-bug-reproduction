<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\InvitationCode;
use App\Models\Admin;

class InvitationCodePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any InvitationCode');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, InvitationCode $invitationcode): bool
    {
        return $user->checkPermissionTo('view InvitationCode');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create InvitationCode');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, InvitationCode $invitationcode): bool
    {
        return $user->checkPermissionTo('update InvitationCode');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, InvitationCode $invitationcode): bool
    {
        return $user->checkPermissionTo('delete InvitationCode');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any InvitationCode');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, InvitationCode $invitationcode): bool
    {
        return $user->checkPermissionTo('restore InvitationCode');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any InvitationCode');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, InvitationCode $invitationcode): bool
    {
        return $user->checkPermissionTo('replicate InvitationCode');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder InvitationCode');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, InvitationCode $invitationcode): bool
    {
        return $user->checkPermissionTo('force-delete InvitationCode');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any InvitationCode');
    }
}
