<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Group;
use App\Models\Admin;

class GroupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Group');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Group $group): bool
    {
        return $user->checkPermissionTo('view Group');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Group');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Group $group): bool
    {
        return $user->checkPermissionTo('update Group');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Group $group): bool
    {
        return $user->checkPermissionTo('delete Group');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Group');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Group $group): bool
    {
        return $user->checkPermissionTo('restore Group');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Group');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Group $group): bool
    {
        return $user->checkPermissionTo('replicate Group');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Group');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Group $group): bool
    {
        return $user->checkPermissionTo('force-delete Group');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Group');
    }
}
