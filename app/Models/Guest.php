<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guest';

    protected $fillable = ['name', 'point'];

    public function guestInfo()
    {
        return $this->hasOne(GuestInfo::class, 'guest_id');
    }
}
