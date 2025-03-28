<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Agent;
use App\Models\Admin;

class AgentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Agent');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Agent $agent): bool
    {
        return $user->checkPermissionTo('view Agent');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Agent');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Agent $agent): bool
    {
        return $user->checkPermissionTo('update Agent');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Agent $agent): bool
    {
        return $user->checkPermissionTo('delete Agent');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Agent');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Agent $agent): bool
    {
        return $user->checkPermissionTo('restore Agent');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Agent');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Agent $agent): bool
    {
        return $user->checkPermissionTo('replicate Agent');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Agent');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Agent $agent): bool
    {
        return $user->checkPermissionTo('force-delete Agent');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Agent');
    }
}
