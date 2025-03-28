<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;

use App\Models\Admin;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Admin $admin): bool
    {
        return $user->checkPermissionTo('view Admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Admin $admin): bool
    {
        return $user->checkPermissionTo('update Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Admin $admin): bool
    {
        return $user->checkPermissionTo('delete Admin');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Admin $admin): bool
    {
        return $user->checkPermissionTo('restore Admin');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Admin');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Admin $admin): bool
    {
        return $user->checkPermissionTo('replicate Admin');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Admin $admin): bool
    {
        return $user->checkPermissionTo('force-delete Admin');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Admin');
    }
}
