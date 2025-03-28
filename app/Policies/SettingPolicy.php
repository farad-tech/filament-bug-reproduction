<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Setting;
use App\Models\Admin;

class SettingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Setting');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Setting $setting): bool
    {
        return $user->checkPermissionTo('view Setting');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Setting');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Setting $setting): bool
    {
        return $user->checkPermissionTo('update Setting');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Setting $setting): bool
    {
        return $user->checkPermissionTo('delete Setting');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Setting');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Setting $setting): bool
    {
        return $user->checkPermissionTo('restore Setting');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Setting');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Setting $setting): bool
    {
        return $user->checkPermissionTo('replicate Setting');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Setting');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Setting $setting): bool
    {
        return $user->checkPermissionTo('force-delete Setting');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Setting');
    }
}
