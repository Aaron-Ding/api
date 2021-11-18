<?php

namespace Tests\Traits;

use App\Models\Guest;
use App\Models\GuestInfo;

trait WithFakeGuest
{
    protected $guests;

    public function fakeGuest()
    {
         return Guest::factory(1)->create();
    }
}
