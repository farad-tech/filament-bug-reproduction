<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\Admin;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any User');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, User $model): bool
    {
        return $user->checkPermissionTo('view User');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create User');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, User $model): bool
    {
        return $user->checkPermissionTo('update User');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, User $model): bool
    {
        return $user->checkPermissionTo('delete User');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any User');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, User $model): bool
    {
        return $user->checkPermissionTo('restore User');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any User');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, User $model): bool
    {
        return $user->checkPermissionTo('replicate User');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder User');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, User $model): bool
    {
        return $user->checkPermissionTo('force-delete User');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any User');
    }
}
