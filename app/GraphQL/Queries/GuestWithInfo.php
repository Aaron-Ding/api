<?php

namespace App\GraphQL\Queries;

use App\Models\Guest;

class GuestWithInfo
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
      return Guest::select('guest.name', 'guest.point', 'guest_info.guest_id', 'guest_info.address', 'guest_info.age')
        ->leftJoin('guest_info', 'guest.id', '=', 'guest_info.guest_id')
        ->get();
    }
}
