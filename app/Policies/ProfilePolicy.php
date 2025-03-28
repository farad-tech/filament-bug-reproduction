<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Profile;
use App\Models\Admin;

class ProfilePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Profile');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Profile $profile): bool
    {
        return $user->checkPermissionTo('view Profile');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Profile');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Profile $profile): bool
    {
        return $user->checkPermissionTo('update Profile');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Profile $profile): bool
    {
        return $user->checkPermissionTo('delete Profile');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Profile');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Profile $profile): bool
    {
        return $user->checkPermissionTo('restore Profile');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Profile');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Profile $profile): bool
    {
        return $user->checkPermissionTo('replicate Profile');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Profile');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Profile $profile): bool
    {
        return $user->checkPermissionTo('force-delete Profile');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Profile');
    }
}
