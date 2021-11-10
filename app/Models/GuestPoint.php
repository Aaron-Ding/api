<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestPoint extends Model
{
    protected $table = 'guest_point';

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }
}
