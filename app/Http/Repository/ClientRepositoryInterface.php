<?php

namespace App\Http\Repository;

use App\User;
use App\Role;
use App\UserRole;

interface ClientRepositoryInterface
{
    public function findById(int $id): ?User;
    public function save(User $moreinfo, array $data);
}