<?php

namespace App\Http\Services;

use App\Http\Repository\ClientRepositoryInterface;
use App\User;
use App\Role;
use App\UserRole;
use Illuminate\Database\Eloquent\Collection;

class ClientService implements ClientServiceInterface
{

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param int $id
     *
     * @return User
     * @throws \Exception
     */
    public function getInfoById(int $id): User
    {
        $infoAboutUser = $this->clientRepository->findById($id);
        if (!$infoAboutUser) {
            throw new \Exception('User not found');
        }
        return $infoAboutUser;
    }

    /**
     * @param int $id
     * @param array $infoData
     * @return int
     * @throws \Exception
     */
    public function updateInfo(int $id, array $infoData): int
    {
        $moreinfo = $this->clientRepository->findById($id);
        $this->clientRepository->save($moreinfo, $infoData);

        return $moreinfo->id;
    }
    
}