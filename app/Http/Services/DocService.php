<?php

namespace App\Http\Services;

use App\Http\Repository\DocRepositoryInterface;
use App\User;
use App\Role;
use App\UserRole;
use App\Doctor;
use Illuminate\Database\Eloquent\Collection;

class DocService implements DocServiceInterface
{

    private $docRepository;

    public function __construct(DocRepositoryInterface $docRepository)
    {
        $this->docRepository = $docRepository;
    }

    /**
     * @param int $id
     * @param array $infoData
     * @return int
     * @throws \Exception
     */
    public function updateInfo(int $id, array $infoData): int
    {
        $moreinfo = $this->docRepository->findById($id);
        $this->docRepository->save($moreinfo, $infoData);

        return $moreinfo->id;
    }
    
}