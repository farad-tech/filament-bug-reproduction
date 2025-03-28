<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Shaba_number;
use App\Models\Admin;

class Shaba_numberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Shaba_number');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Shaba_number $shaba_number): bool
    {
        return $user->checkPermissionTo('view Shaba_number');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Shaba_number');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Shaba_number $shaba_number): bool
    {
        return $user->checkPermissionTo('update Shaba_number');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Shaba_number $shaba_number): bool
    {
        return $user->checkPermissionTo('delete Shaba_number');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Shaba_number');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Shaba_number $shaba_number): bool
    {
        return $user->checkPermissionTo('restore Shaba_number');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Shaba_number');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Shaba_number $shaba_number): bool
    {
        return $user->checkPermissionTo('replicate Shaba_number');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Shaba_number');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Shaba_number $shaba_number): bool
    {
        return $user->checkPermissionTo('force-delete Shaba_number');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Shaba_number');
    }
}
