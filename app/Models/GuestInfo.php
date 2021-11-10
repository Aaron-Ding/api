<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestInfo extends Model
{
    protected $table = 'guest_info';

    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }
}
