<?php

namespace App\Policies;

use App\User;
use App\Advertisement;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the advertisement.
     *
     * @param  \App\User  $user
     * @param  \App\Advertisement  $advertisement
     * @return mixed
     */
    public function view(User $user, Advertisement $advertisement)
    {
        return true;
    }

    /**
     * Determine whether the user can create advertisements.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the advertisement.
     *
     * @param  \App\User  $user
     * @param  \App\Advertisement  $advertisement
     * @return bool
     */
    public function update(User $user, Advertisement $advertisement)
    {
        return $user->id === $advertisement->user->id;
    }

    /**
     * Determine whether the user can delete the advertisement.
     *
     * @param  \App\User  $user
     * @param  \App\Advertisement  $advertisement
     * @return bool
     */
    public function delete(User $user, Advertisement $advertisement)
    {
        return $user->id === $advertisement->user->id;
    }
}
