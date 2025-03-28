<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PostComment;
use App\Models\Admin;

class PostCommentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any PostComment');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, PostComment $postcomment): bool
    {
        return $user->checkPermissionTo('view PostComment');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create PostComment');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, PostComment $postcomment): bool
    {
        return $user->checkPermissionTo('update PostComment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, PostComment $postcomment): bool
    {
        return $user->checkPermissionTo('delete PostComment');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any PostComment');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, PostComment $postcomment): bool
    {
        return $user->checkPermissionTo('restore PostComment');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any PostComment');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, PostComment $postcomment): bool
    {
        return $user->checkPermissionTo('replicate PostComment');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder PostComment');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, PostComment $postcomment): bool
    {
        return $user->checkPermissionTo('force-delete PostComment');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PostComment');
    }
}
