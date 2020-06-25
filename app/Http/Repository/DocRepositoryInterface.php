<?php

namespace App\Http\Repository;

use App\User;
use App\Role;
use App\UserRole;
use App\Doctor;

interface ClientRepositoryInterface
{
    public function findById(int $id): ?User;
    public function save(User $moreinfo, array $data);
}