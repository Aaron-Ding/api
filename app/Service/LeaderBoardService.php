<?php

namespace App\Service;

use App\Models\GuestInfo;
use App\Repository\GuestRepositoryInterface;

class LeaderBoardService
{
    /**
     * @var GuestRepositoryInterface
     */
    protected $guestRepository;

    public function __construct(GuestRepositoryInterface $guestRepository)
    {
        $this->guestRepository = $guestRepository;
    }

    public function updateGuestPoint($guestId, int $point)
    {
        $guest = $this->guestRepository->mustFindById($guestId);
        if ($guest->point + $point < 0 ) {
            $point = 0;
        } else {
            $point += $guest->point;
        }
        return $this->guestRepository->update($guestId, ['point' => $point]);
    }

    public function createNewGuest(array $attribute)
    {
        $guest = $this->guestRepository->create(['name' => $attribute['name']]);
        unset($attribute['name']);
        $this->guestRepository->createRelationTable($guest->id, $attribute);
        return $guest;
    }

    public function deleteGuest(int $guestId)
    {
        $guest = $this->guestRepository->mustFindById($guestId);
        $guestInfo = $guest->guestInfo->delete();
        $guest->delete();
        return true;
    }
}
