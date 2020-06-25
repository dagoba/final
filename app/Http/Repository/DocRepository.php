<?php

namespace App\Http\Repository;

use App\User;
use App\Role;
use App\UserRole;
use App\Doctor;

class DocRepository implements DocRepositoryInterface
{

    /** @var Doctor */
    private $model;

    public function __construct()
    {
        $this->model = app()->make(Doctor::class);
    }

    public function findById(int $id): ?Doctor
    {
        return $this->model->find($id);
    }

    public function save(Doctor $moreinfo, array $data)
    {
        $moreinfo->name = $data['name'];
        $moreinfo->surname = $data['surname'];
        $moreinfo->speciality = $data['speciality'];
        $moreinfo->workingdate = $data['workingdate'];
        $moreinfo->addinfo = $data['addinfo'];
        $moreinfo->save();
    }

}