<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Notification;
use App\Models\Admin;

class NotificationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Notification');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Notification $notification): bool
    {
        return $user->checkPermissionTo('view Notification');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Notification');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Notification $notification): bool
    {
        return $user->checkPermissionTo('update Notification');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Notification $notification): bool
    {
        return $user->checkPermissionTo('delete Notification');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Notification');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Notification $notification): bool
    {
        return $user->checkPermissionTo('restore Notification');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Notification');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Notification $notification): bool
    {
        return $user->checkPermissionTo('replicate Notification');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Notification');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Notification $notification): bool
    {
        return $user->checkPermissionTo('force-delete Notification');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Notification');
    }
}
