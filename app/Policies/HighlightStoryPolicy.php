<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\HighlightStory;
use App\Models\Admin;

class HighlightStoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $user): bool
    {
        return $user->checkPermissionTo('view-any HighlightStory');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $user, HighlightStory $highlightstory): bool
    {
        return $user->checkPermissionTo('view HighlightStory');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $user): bool
    {
        return $user->checkPermissionTo('create HighlightStory');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $user, HighlightStory $highlightstory): bool
    {
        return $user->checkPermissionTo('update HighlightStory');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $user, HighlightStory $highlightstory): bool
    {
        return $user->checkPermissionTo('delete HighlightStory');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('delete-any HighlightStory');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $user, HighlightStory $highlightstory): bool
    {
        return $user->checkPermissionTo('restore HighlightStory');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(Admin $user): bool
    {
        return $user->checkPermissionTo('restore-any HighlightStory');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(Admin $user, HighlightStory $highlightstory): bool
    {
        return $user->checkPermissionTo('replicate HighlightStory');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(Admin $user): bool
    {
        return $user->checkPermissionTo('reorder HighlightStory');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $user, HighlightStory $highlightstory): bool
    {
        return $user->checkPermissionTo('force-delete HighlightStory');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(Admin $user): bool
    {
        return $user->checkPermissionTo('force-delete-any HighlightStory');
    }
}
