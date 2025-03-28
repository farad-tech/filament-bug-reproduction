<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PostThumbnail;
use App\Models\Admin;

class PostThumbnailPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any PostThumbnail');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, PostThumbnail $postthumbnail): bool
    {
        return $user->checkPermissionTo('view PostThumbnail');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create PostThumbnail');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, PostThumbnail $postthumbnail): bool
    {
        return $user->checkPermissionTo('update PostThumbnail');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, PostThumbnail $postthumbnail): bool
    {
        return $user->checkPermissionTo('delete PostThumbnail');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any PostThumbnail');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, PostThumbnail $postthumbnail): bool
    {
        return $user->checkPermissionTo('restore PostThumbnail');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any PostThumbnail');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, PostThumbnail $postthumbnail): bool
    {
        return $user->checkPermissionTo('replicate PostThumbnail');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder PostThumbnail');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, PostThumbnail $postthumbnail): bool
    {
        return $user->checkPermissionTo('force-delete PostThumbnail');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PostThumbnail');
    }
}
