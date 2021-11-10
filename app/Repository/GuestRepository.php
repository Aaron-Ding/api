<?php
namespace App\Repository;

use App\Models\Guest;
use Illuminate\Support\Collection;

class GuestRepository implements GuestRepositoryInterface
{
    public function getAllUsers() :Collection
    {
        return Guest::all();
    }
}
