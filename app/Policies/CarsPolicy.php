<?php

namespace App\Policies;

use App\Entity\Car;
use App\Entity\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarsPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Car $car)
    {
        return $user->isAdmin();
    }
}
