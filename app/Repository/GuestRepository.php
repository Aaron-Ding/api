<?php
namespace App\Repository;

use App\Models\Guest;
use App\Models\GuestInfo;
use Illuminate\Support\Collection;

class GuestRepository implements GuestRepositoryInterface
{
    public function getAllUsers() :Collection
    {
        return Guest::all()->sortByDesc('point');
    }

    public function mustFindById($id) : Guest
    {
        return Guest::findOrFail($id);
    }

    public function update($id, array $attributes): Bool
    {
        $guest = Guest::find($id);

        foreach ($attributes as $key => $value) {
            $guest->{$key} = $value;
        }

        return $guest->save();
    }

    public function create(array $attributes)
    {
        return Guest::create($attributes);
    }

    public function createRelationTable(int $foreignKeyId, array $attribute)
    {
        $data = array();
        $data['guest_id'] = $foreignKeyId;
        $data = array_merge($data, $attribute);
        GuestInfo::insert($data);
    }


}
