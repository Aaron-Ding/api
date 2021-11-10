<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';

    public function guestInfo()
    {
        return $this->hasOne(GuestInfo::class, 'guest_id');
    }

    public function guestPoint()
    {
        return $this->hasOne(GuestPoint::class, 'guest_id');
    }
}
