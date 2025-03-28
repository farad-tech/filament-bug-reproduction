<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Chat;
use App\Models\Admin;

class ChatPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Chat');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Chat $chat): bool
    {
        return $user->checkPermissionTo('view Chat');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Chat');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Chat $chat): bool
    {
        return $user->checkPermissionTo('update Chat');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Chat $chat): bool
    {
        return $user->checkPermissionTo('delete Chat');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Chat');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Chat $chat): bool
    {
        return $user->checkPermissionTo('restore Chat');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Chat');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Chat $chat): bool
    {
        return $user->checkPermissionTo('replicate Chat');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Chat');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Chat $chat): bool
    {
        return $user->checkPermissionTo('force-delete Chat');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Chat');
    }
}
