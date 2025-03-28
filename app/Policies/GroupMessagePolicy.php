<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\GroupMessage;
use App\Models\Admin;

class GroupMessagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any GroupMessage');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, GroupMessage $groupmessage): bool
    {
        return $user->checkPermissionTo('view GroupMessage');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create GroupMessage');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, GroupMessage $groupmessage): bool
    {
        return $user->checkPermissionTo('update GroupMessage');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, GroupMessage $groupmessage): bool
    {
        return $user->checkPermissionTo('delete GroupMessage');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any GroupMessage');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, GroupMessage $groupmessage): bool
    {
        return $user->checkPermissionTo('restore GroupMessage');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any GroupMessage');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, GroupMessage $groupmessage): bool
    {
        return $user->checkPermissionTo('replicate GroupMessage');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder GroupMessage');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, GroupMessage $groupmessage): bool
    {
        return $user->checkPermissionTo('force-delete GroupMessage');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any GroupMessage');
    }
}
