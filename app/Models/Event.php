<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ride;

class Event extends Model
{
    protected $table = 'events';
    public function rides()
    {
        return $this->hasMany(Ride::class);
    }
}
