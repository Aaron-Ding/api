<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestInfo extends Model
{
    protected $table = 'guest_info';

    protected $fillable = ['guest_id'];
    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id');
    }
}
