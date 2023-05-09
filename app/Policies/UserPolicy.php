<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->HasPermissions('User_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user,  $post)
    {
        return $user->HasPermissions('User_viewAny');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->HasPermissions('User_create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user,$post)
    {
        return $user->HasPermissions('User_update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, $post)
    {
        return $user->HasPermissions('User_delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, $post)
    {
        return $user->HasPermissions('User_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, $post)
    {
        return $user->HasPermissions('User_forceDelete');
    }
    public function viewtrash(User $user)
    {
        return $user->hasPermission('User_viewtrash');

    }
}
