<?php

namespace App\Policies;

use App\Models\PerencanaanMisi;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerencanaanMisiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PerencanaanMisi $perencanaanMisi)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PerencanaanMisi $perencanaanMisi)
    {
        return $user->desa->id === $perencanaanMisi->visi->id_desa;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PerencanaanMisi $perencanaanMisi)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PerencanaanMisi $perencanaanMisi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PerencanaanMisi  $perencanaanMisi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PerencanaanMisi $perencanaanMisi)
    {
        //
    }
}
