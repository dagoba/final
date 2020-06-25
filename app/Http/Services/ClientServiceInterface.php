<?php

namespace App\Http\Services;

use App\User;
use App\Role;
use App\UserRole;
use Illuminate\Database\Eloquent\Collection;

interface ClientServiceInterface
{
    /**
     * @param int $id
     *
     * @throws \Exception
     * @return User
     */
    public function getInfoById(int $id): User;

    /**
     * @throws \Exception
     * @param int $id
     * @param array $infoData
     * @return int
     */
    public function updateInfo(int $id, array $infoData): int;
}