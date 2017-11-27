<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Event;

class Ride extends Model
{
    protected $table = "rides";

    public function event() {
        return $this->belongsTo(Event::class);
    }
    public function driver() {
        return $this->belongsTo(User::class);
    }
    public function riders()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('location')
            ->withTimestamps();
    }
}
