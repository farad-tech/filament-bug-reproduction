<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Story;
use App\Models\Admin;

class StoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Story');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Story $story): bool
    {
        return $user->checkPermissionTo('view Story');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Story');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Story $story): bool
    {
        return $user->checkPermissionTo('update Story');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Story $story): bool
    {
        return $user->checkPermissionTo('delete Story');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Story');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Story $story): bool
    {
        return $user->checkPermissionTo('restore Story');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Story');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Story $story): bool
    {
        return $user->checkPermissionTo('replicate Story');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Story');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Story $story): bool
    {
        return $user->checkPermissionTo('force-delete Story');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Story');
    }
}
