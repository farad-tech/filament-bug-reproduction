<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Message;
use App\Models\Admin;

class MessagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any Message');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, Message $message): bool
    {
        return $user->checkPermissionTo('view Message');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create Message');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, Message $message): bool
    {
        return $user->checkPermissionTo('update Message');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, Message $message): bool
    {
        return $user->checkPermissionTo('delete Message');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any Message');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, Message $message): bool
    {
        return $user->checkPermissionTo('restore Message');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any Message');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, Message $message): bool
    {
        return $user->checkPermissionTo('replicate Message');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder Message');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, Message $message): bool
    {
        return $user->checkPermissionTo('force-delete Message');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Message');
    }
}
