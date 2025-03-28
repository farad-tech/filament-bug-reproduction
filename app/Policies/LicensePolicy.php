<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\License;
use App\Models\Admin;

class LicensePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any License');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, License $license): bool
    {
        return $user->checkPermissionTo('view License');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create License');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, License $license): bool
    {
        return $user->checkPermissionTo('update License');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, License $license): bool
    {
        return $user->checkPermissionTo('delete License');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any License');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, License $license): bool
    {
        return $user->checkPermissionTo('restore License');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any License');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, License $license): bool
    {
        return $user->checkPermissionTo('replicate License');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder License');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, License $license): bool
    {
        return $user->checkPermissionTo('force-delete License');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any License');
    }
}
