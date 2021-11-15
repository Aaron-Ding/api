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

    public function updateGuestPoint(int $guestId, int $point)
    {
        return $this->guestRepository->update($guestId, ['point' => $point]);
    }

    public function createNewGuest(int $guestId, array $attribute)
    {
        $guest = $this->guestRepository->create($guestId, ['name' => $attribute['name']]);
        GuestInfo::create(['guest_id' => $guest->id, 'age' => $attribute['age'], 'address' => $attribute['address']]);
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
