<?php

namespace App\Manager;

use App\Entity\User;
use App\Manager\Contract\UserManager as UserManagerContract;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserManager implements UserManagerContract
{
    /**
     * Find All Users
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return User::all();
    }

    /**
     * Get User model by ID
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id)
    {
        return User::find($id);
    }

    /**
     * Find Users that has is_active flag true
     *
     * @return Collection
     */
    public function findActive(): Collection
    {
        return User::whereIsActive(true)->get();
    }

    /**
     * Create or Update User
     *
     * @param SaveUserRequest $request
     * @return User
     */
    public function saveUser(Request $request): User
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'is_active',
        ]);
        /*
        $data = [
            'first_name' => $request->getFirstName(),
            'last_name' => $request->getLastName(),
            'is_active' => $request->getIsActive(),
        ];*/

        if ($request->getUser()->id) {
            $request->getUser()->update($data);

            return $request->getUser();
        }

        return $request->getUser()->create($data);
    }

    /**
     * Delete User By ID
     *
     * @param int $userId
     * @return void
     */
    public function deleteUser(int $userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
        }
    }
}