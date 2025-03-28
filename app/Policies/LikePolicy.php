<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Like;
use App\Models\Admin;

class LikePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Like');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Like $like): bool
    {
        return $user->checkPermissionTo('view Like');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Like');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Like $like): bool
    {
        return $user->checkPermissionTo('update Like');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Like $like): bool
    {
        return $user->checkPermissionTo('delete Like');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Like');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Like $like): bool
    {
        return $user->checkPermissionTo('restore Like');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Like');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Like $like): bool
    {
        return $user->checkPermissionTo('replicate Like');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Like');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Like $like): bool
    {
        return $user->checkPermissionTo('force-delete Like');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Like');
    }
}
