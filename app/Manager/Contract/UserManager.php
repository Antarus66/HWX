<?php

namespace App\Manager\Contract;

use App\Entity\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface UserManager
{
    /**
     * Find All Users
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * Get User model by ID
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id);

    /**
     * Find Users that has is_active flag true
     *
     * @return Collection
     */
    public function findActive(): Collection;

    /**
     * Create or Update User
     *
     * @param SaveUserRequest $request
     * @return User
     */
    public function saveUser(Request $request): User;

    /**
     * Delete User By ID
     *
     * @param int $userId
     * @return void
     */
    public function deleteUser(int $userId);
}