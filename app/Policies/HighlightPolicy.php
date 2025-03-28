<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Highlight;
use App\Models\Admin;

class HighlightPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Highlight');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Highlight $highlight): bool
    {
        return $user->checkPermissionTo('view Highlight');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Highlight');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Highlight $highlight): bool
    {
        return $user->checkPermissionTo('update Highlight');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Highlight $highlight): bool
    {
        return $user->checkPermissionTo('delete Highlight');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Highlight');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Highlight $highlight): bool
    {
        return $user->checkPermissionTo('restore Highlight');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Highlight');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Highlight $highlight): bool
    {
        return $user->checkPermissionTo('replicate Highlight');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Highlight');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Highlight $highlight): bool
    {
        return $user->checkPermissionTo('force-delete Highlight');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Highlight');
    }
}
