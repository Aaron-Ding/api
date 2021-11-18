<?php

namespace App\Service;

use App\Models\Guest;
use App\Repository\GuestRepositoryInterface;
use Illuminate\Support\Collection;

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

    /**
     * @return null|Collection
     */
    public function getAllGuests() :?Collection
    {
        return $this->guestRepository->getAllUsers();
    }

    /**
     * @param $id
     *
     * @return Guest
     */
    public function getGuest($id) :Guest
    {
        return $this->guestRepository->mustFindById($id);
    }

    /**
     * @param     $guestId
     * @param int $point
     *
     * @return bool
     */
    public function updateGuestPoint($guestId, int $point) :bool
    {
        $guest = $this->guestRepository->mustFindById($guestId);
        if ($guest->point + $point < 0 ) {
            $point = 0;
        } else {
            $point += $guest->point;
        }
        return $this->guestRepository->update($guestId, ['point' => $point]);
    }

    /**
     * @param array $attribute
     *
     * @return mixed
     */
    public function createNewGuest(array $attribute) :Guest
    {
        $guest = $this->guestRepository->create(['name' => $attribute['name']]);
        unset($attribute['name']);
        $this->guestRepository->createRelationTable($guest->id, $attribute);
        return $guest;
    }

    /**
     * @param int $guestId
     *
     * @return bool
     */
    public function deleteGuest(int $guestId) :bool
    {
        $guest = $this->guestRepository->mustFindById($guestId);
        $guest->guestInfo->delete();
        $guest->delete();
        return true;
    }
}
