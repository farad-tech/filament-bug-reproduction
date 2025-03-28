<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Follow;
use App\Models\Admin;

class FollowPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Follow');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Follow $follow): bool
    {
        return $user->checkPermissionTo('view Follow');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Follow');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Follow $follow): bool
    {
        return $user->checkPermissionTo('update Follow');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Follow $follow): bool
    {
        return $user->checkPermissionTo('delete Follow');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Follow');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Follow $follow): bool
    {
        return $user->checkPermissionTo('restore Follow');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Follow');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Follow $follow): bool
    {
        return $user->checkPermissionTo('replicate Follow');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Follow');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Follow $follow): bool
    {
        return $user->checkPermissionTo('force-delete Follow');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Follow');
    }
}
