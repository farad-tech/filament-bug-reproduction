<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\WalletFlow;
use App\Models\Admin;

class WalletFlowPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any WalletFlow');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, WalletFlow $walletflow): bool
    {
        return $user->checkPermissionTo('view WalletFlow');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create WalletFlow');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, WalletFlow $walletflow): bool
    {
        return $user->checkPermissionTo('update WalletFlow');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, WalletFlow $walletflow): bool
    {
        return $user->checkPermissionTo('delete WalletFlow');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any WalletFlow');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, WalletFlow $walletflow): bool
    {
        return $user->checkPermissionTo('restore WalletFlow');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any WalletFlow');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, WalletFlow $walletflow): bool
    {
        return $user->checkPermissionTo('replicate WalletFlow');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder WalletFlow');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, WalletFlow $walletflow): bool
    {
        return $user->checkPermissionTo('force-delete WalletFlow');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any WalletFlow');
    }
}
