<?php

namespace App\Http\Controllers;

use App\Http\Request\GuestCreateRequest;
use App\Http\Request\GuestPointUpdateRequest;
use App\Http\Resources\GuestResource;
use App\Repository\GuestRepositoryInterface;
use App\Service\LeaderBoardService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LeaderBoardController extends Controller
{
    protected $guestRepository;
    protected $leaderBoardService;

    public function __construct(GuestRepositoryInterface $guestRepository, LeaderBoardService $leaderBoardService)
    {
        $this->guestRepository = $guestRepository;
        $this->leaderBoardService = $leaderBoardService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return GuestResource::collection($this->leaderBoardService->getAllGuests());
    }

    /**
     * @param $id
     *
     * @return GuestResource
     */
    public function get($id)
    {
        return new GuestResource($this->leaderBoardService->getGuest($id));
    }
    /**
     * @param $id
     * @param GuestPointUpdateRequest $request
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function update($id, GuestPointUpdateRequest $request)
    {
        try {
            $this->leaderBoardService->updateGuestPoint($id, $request->input('point'));

            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * @param GuestCreateRequest $request
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function create(GuestCreateRequest $request)
    {
        try {
            $this->leaderBoardService->createNewGuest($request->all());

            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * @param $id
     *
     * @return JsonResponse|AnonymousResourceCollection
     */
    public function delete($id)
    {
        try {
            $this->leaderBoardService->deleteGuest($id);

            return GuestResource::collection($this->guestRepository->getAllUsers());
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
