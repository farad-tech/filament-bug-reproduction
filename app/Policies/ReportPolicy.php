<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Report;
use App\Models\Admin;

class ReportPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Report');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Report $report): bool
    {
        return $user->checkPermissionTo('view Report');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Report');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Report $report): bool
    {
        return $user->checkPermissionTo('update Report');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Report $report): bool
    {
        return $user->checkPermissionTo('delete Report');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Report');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Report $report): bool
    {
        return $user->checkPermissionTo('restore Report');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Report');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Report $report): bool
    {
        return $user->checkPermissionTo('replicate Report');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Report');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Report $report): bool
    {
        return $user->checkPermissionTo('force-delete Report');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Report');
    }
}
