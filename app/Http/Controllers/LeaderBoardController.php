<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestResource;
use App\Models\Guest;
use App\Repository\GuestRepositoryInterface;

class LeaderBoardController extends Controller
{
    protected $guestRepository;

    public function __construct(GuestRepositoryInterface $guestRepository)
    {
        $this->guestRepository = $guestRepository;
    }

    public function index()
    {
        return GuestResource::collection($this->guestRepository->getAllUsers());
    }

    public function update()
    {

    }

    public function create()
    {

    }

    public function delete()
    {

    }
}
