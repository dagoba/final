<?php

namespace App\Http\Repository;

use App\User;
use App\Role;
use App\UserRole;

class ClientRepository implements ClientRepositoryInterface
{

    /** @var User */
    private $model;

    public function __construct()
    {
        $this->model = app()->make(User::class);
    }

    public function findById(int $id): ?User
    {
        return $this->model->find($id);
    }

    public function save(User $moreinfo, array $data)
    {
        $moreinfo->name = $data['name'];
        $moreinfo->surname = $data['surname'];
        $moreinfo->city = $data['city'];
        $moreinfo->birthdate = $data['birthdate'];
        $moreinfo->addinfo = $data['addinfo'];
        $moreinfo->save();
    }

}