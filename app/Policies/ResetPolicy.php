<?php

namespace App\Policies;

use App\User;
use App\Reset;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the reset.
     *
     * @param  \App\User  $user
     * @param  \App\Reset  $reset
     * @return mixed
     */
    public function list( User $user ){
      return ( $user ) ? true : false;
    }
    
    public function view(User $user, Reset $reset)
    {
      return $user->id == $reset->counter->user_id;
    }

    /**
     * Determine whether the user can create resets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return ( $user ) ? true : false;
    }

    /**
     * Determine whether the user can update the reset.
     *
     * @param  \App\User  $user
     * @param  \App\Reset  $reset
     * @return mixed
     */
    public function update(User $user, Reset $reset)
    {
      return $user->id == $reset->counter->user_id;
    }

    /**
     * Determine whether the user can delete the reset.
     *
     * @param  \App\User  $user
     * @param  \App\Reset  $reset
     * @return mixed
     */
    public function delete(User $user, Reset $reset)
    {
      return $user->id == $reset->counter->user_id;
    }

    /**
     * Determine whether the user can restore the reset.
     *
     * @param  \App\User  $user
     * @param  \App\Reset  $reset
     * @return mixed
     */
    public function restore(User $user, Reset $reset)
    {
      return $user->id == $reset->counter->user_id;
    }

    /**
     * Determine whether the user can permanently delete the reset.
     *
     * @param  \App\User  $user
     * @param  \App\Reset  $reset
     * @return mixed
     */
    public function forceDelete(User $user, Reset $reset)
    {
      return $user->id == $reset->counter->user_id;
    }
}
