<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\GroupLinkHash;
use App\Models\Admin;

class GroupLinkHashPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any GroupLinkHash');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, GroupLinkHash $grouplinkhash): bool
    {
        return $user->checkPermissionTo('view GroupLinkHash');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create GroupLinkHash');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, GroupLinkHash $grouplinkhash): bool
    {
        return $user->checkPermissionTo('update GroupLinkHash');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, GroupLinkHash $grouplinkhash): bool
    {
        return $user->checkPermissionTo('delete GroupLinkHash');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any GroupLinkHash');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, GroupLinkHash $grouplinkhash): bool
    {
        return $user->checkPermissionTo('restore GroupLinkHash');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any GroupLinkHash');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, GroupLinkHash $grouplinkhash): bool
    {
        return $user->checkPermissionTo('replicate GroupLinkHash');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder GroupLinkHash');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, GroupLinkHash $grouplinkhash): bool
    {
        return $user->checkPermissionTo('force-delete GroupLinkHash');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any GroupLinkHash');
    }
}
