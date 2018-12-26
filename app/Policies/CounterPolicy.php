<?php

namespace App\Policies;

use App\User;
use App\Counter;
use Illuminate\Auth\Access\HandlesAuthorization;

class CounterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the counter.
     *
     * @param  \App\User  $user
     * @param  \App\Counter  $counter
     * @return mixed
     */
     
    public function list( User $user ){
      return ( $user ) ? true : false;
    }
    
    public function view(User $user, Counter $counter)
    {
      return $user->id == $counter->user->id;
    }

    /**
     * Determine whether the user can create counters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return ( $user ) ? true : false;
    }

    /**
     * Determine whether the user can update the counter.
     *
     * @param  \App\User  $user
     * @param  \App\Counter  $counter
     * @return mixed
     */
    public function update(User $user, Counter $counter)
    {
      return $user->id == $counter->user->id;
    }

    /**
     * Determine whether the user can delete the counter.
     *
     * @param  \App\User  $user
     * @param  \App\Counter  $counter
     * @return mixed
     */
    public function delete(User $user, Counter $counter)
    {
      return $user->id == $counter->user->id;
    }

    /**
     * Determine whether the user can restore the counter.
     *
     * @param  \App\User  $user
     * @param  \App\Counter  $counter
     * @return mixed
     */
    public function restore(User $user, Counter $counter)
    {
      return $user->id == $counter->user->id;
    }

    /**
     * Determine whether the user can permanently delete the counter.
     *
     * @param  \App\User  $user
     * @param  \App\Counter  $counter
     * @return mixed
     */
    public function forceDelete(User $user, Counter $counter)
    {
      return $user->id == $counter->user->id;
    }
}
