<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Post;
use App\Models\Admin;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Post');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Post $post): bool
    {
        return $user->checkPermissionTo('view Post');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Post');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Post $post): bool
    {
        return $user->checkPermissionTo('update Post');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Post $post): bool
    {
        return $user->checkPermissionTo('delete Post');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Post');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Post $post): bool
    {
        return $user->checkPermissionTo('restore Post');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Post');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Post $post): bool
    {
        return $user->checkPermissionTo('replicate Post');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Post');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Post $post): bool
    {
        return $user->checkPermissionTo('force-delete Post');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Post');
    }
}
