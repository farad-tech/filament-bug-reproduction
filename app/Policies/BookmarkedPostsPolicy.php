<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\BookmarkedPosts;
use App\Models\Admin;

class BookmarkedPostsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any BookmarkedPosts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, BookmarkedPosts $bookmarkedposts): bool
    {
        return $user->checkPermissionTo('view BookmarkedPosts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create BookmarkedPosts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, BookmarkedPosts $bookmarkedposts): bool
    {
        return $user->checkPermissionTo('update BookmarkedPosts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, BookmarkedPosts $bookmarkedposts): bool
    {
        return $user->checkPermissionTo('delete BookmarkedPosts');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any BookmarkedPosts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, BookmarkedPosts $bookmarkedposts): bool
    {
        return $user->checkPermissionTo('restore BookmarkedPosts');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any BookmarkedPosts');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, BookmarkedPosts $bookmarkedposts): bool
    {
        return $user->checkPermissionTo('replicate BookmarkedPosts');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder BookmarkedPosts');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, BookmarkedPosts $bookmarkedposts): bool
    {
        return $user->checkPermissionTo('force-delete BookmarkedPosts');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any BookmarkedPosts');
    }
}
