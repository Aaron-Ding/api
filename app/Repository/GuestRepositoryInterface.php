<?php
namespace App\Repository;

use App\Models\Guest;
use Illuminate\Support\Collection;

interface GuestRepositoryInterface
{
    public function getAllUsers(): Collection;
    public function mustFindById($id) : Guest;
    public function update($id, array $attribute): Bool;
    public function create(array $attributes);
    public function createRelationTable(int $foreignKeyId, array $attribute);
}
