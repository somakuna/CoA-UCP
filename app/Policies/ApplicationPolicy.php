<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApplicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }

        // admin overrides published status
        if ($user->hasAnyRole(['moderator', 'administrator'])) {
            return true;
        }

        // authors can view their own unpublished posts
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Application $application): bool
    {
        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }

        // admin overrides published status
        if ($user->hasAnyRole(['moderator', 'administrator'])) {
            return true;
        }

        // authors can view their own unpublished posts
        return $user->id == $application->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->applications->count() < 5
                ? Response::allow()
                : Response::deny('You already have 5 applications');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Application $application): bool
    {
        if($application->status != "Pending")
            return false;
        // admin overrides published status
        if ($user->hasAnyRole(['moderator', 'administrator'])) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Application $application): bool
    {
        // admin overrides published status
        if ($user->hasRole(['administrator'])) {
            return true;
        }
        // authors can view their own unpublished posts
        return $user->id == $application->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Application $application): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Application $application): bool
    {
        // admin overrides published status
        if ($user->hasRole(['administrator'])) {
            return true;
        }
        return false;
    }
}
