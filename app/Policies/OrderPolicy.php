<?php

namespace App\Policies;

use App\Models\Oder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->HasPermissions('Oder_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, $post)
    {
        return $user->HasPermissions('Oder_viewAny');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->HasPermissions('Oder_create');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, $post)
    {
        return $user->HasPermissions('Oder_update');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, $post)
    {
        return $user->HasPermissions('Oder_viewAny');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user,  $post)
    {
        return $user->HasPermissions('Oder_viewAny');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, $post)
    {
        return $user->HasPermissions('Oder_viewAny');

    }

    public function viewtrash(User $user)
    {
        return $user->hasPermission('Customer_viewtrash');

    }
}
