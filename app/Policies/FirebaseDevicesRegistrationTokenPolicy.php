<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\FirebaseDevicesRegistrationToken;
use App\Models\Admin;

class FirebaseDevicesRegistrationTokenPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, FirebaseDevicesRegistrationToken $firebasedevicesregistrationtoken): bool
    {
        return $user->checkPermissionTo('view FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, FirebaseDevicesRegistrationToken $firebasedevicesregistrationtoken): bool
    {
        return $user->checkPermissionTo('update FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, FirebaseDevicesRegistrationToken $firebasedevicesregistrationtoken): bool
    {
        return $user->checkPermissionTo('delete FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, FirebaseDevicesRegistrationToken $firebasedevicesregistrationtoken): bool
    {
        return $user->checkPermissionTo('restore FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, FirebaseDevicesRegistrationToken $firebasedevicesregistrationtoken): bool
    {
        return $user->checkPermissionTo('replicate FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, FirebaseDevicesRegistrationToken $firebasedevicesregistrationtoken): bool
    {
        return $user->checkPermissionTo('force-delete FirebaseDevicesRegistrationToken');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any FirebaseDevicesRegistrationToken');
    }
}
