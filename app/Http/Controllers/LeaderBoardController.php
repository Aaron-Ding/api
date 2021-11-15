<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestResource;
use App\Models\Guest;
use App\Repository\GuestRepositoryInterface;
use App\Service\LeaderBoardService;
use Illuminate\Http\Request;

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

    public function update(Request $request)
    {
        try {
            $this->leaderBoardService->updateGuestPoint($request->input('guestId'), $request->input('point'));

            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $this->leaderBoardService->createNewGuest($request->input('guestId'), $request->input('info'));

            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->leaderBoardService->deleteGuest($request->input('guestId'));
            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
