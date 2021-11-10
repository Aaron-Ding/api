<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuestResource extends JsonResource
{
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'name' => $this->name,
            'point' => $this->guestPoint->id,
            'address' => $this->guestInfo->address,
            'age' => $this->guestInfo->age,
        ];
    }
}
