<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface GuestRepositoryInterface
{
    public function getAllUsers(): Collection;

}
