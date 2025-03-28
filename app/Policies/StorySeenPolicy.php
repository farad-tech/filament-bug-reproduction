<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\StorySeen;
use App\Models\Admin;

class StorySeenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any StorySeen');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, StorySeen $storyseen): bool
    {
        return $user->checkPermissionTo('view StorySeen');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create StorySeen');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, StorySeen $storyseen): bool
    {
        return $user->checkPermissionTo('update StorySeen');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, StorySeen $storyseen): bool
    {
        return $user->checkPermissionTo('delete StorySeen');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any StorySeen');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, StorySeen $storyseen): bool
    {
        return $user->checkPermissionTo('restore StorySeen');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any StorySeen');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, StorySeen $storyseen): bool
    {
        return $user->checkPermissionTo('replicate StorySeen');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder StorySeen');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, StorySeen $storyseen): bool
    {
        return $user->checkPermissionTo('force-delete StorySeen');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any StorySeen');
    }
}
