<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Sticker;
use App\Models\Admin;

class StickerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Sticker');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Sticker $sticker): bool
    {
        return $user->checkPermissionTo('view Sticker');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Sticker');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Sticker $sticker): bool
    {
        return $user->checkPermissionTo('update Sticker');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Sticker $sticker): bool
    {
        return $user->checkPermissionTo('delete Sticker');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Sticker');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Sticker $sticker): bool
    {
        return $user->checkPermissionTo('restore Sticker');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Sticker');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Sticker $sticker): bool
    {
        return $user->checkPermissionTo('replicate Sticker');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Sticker');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Sticker $sticker): bool
    {
        return $user->checkPermissionTo('force-delete Sticker');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Sticker');
    }
}
