<?php

/**
 * Created by IntelliJ IDEA.
 * User: jeffr
 * Date: 21-11-2017
 * Time: 08:59
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;


class User extends Model
{
    protected $table = 'users';
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}