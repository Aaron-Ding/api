<?php

namespace App\Http\Controllers;

use App\Http\Request\GuestCreateRequest;
use App\Http\Request\GuestPointUpdateRequest;
use App\Http\Resources\GuestResource;
use App\Repository\GuestRepositoryInterface;
use App\Service\LeaderBoardService;

class LeaderBoardController extends Controller
{
    protected $guestRepository;
    protected $leaderBoardService;
    public function __construct(GuestRepositoryInterface $guestRepository, LeaderBoardService $leaderBoardService)
    {
        $this->guestRepository = $guestRepository;
        $this->leaderBoardService = $leaderBoardService;
    }

    public function index()
    {
        return GuestResource::collection($this->guestRepository->getAllUsers());
    }

    public function update($id, GuestPointUpdateRequest $request)
    {
        try {
            $this->leaderBoardService->updateGuestPoint($id, $request->input('point'));

            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function create(GuestCreateRequest $request)
    {
        try {
            $this->leaderBoardService->createNewGuest($request->all());
            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $this->leaderBoardService->deleteGuest($id);
            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
