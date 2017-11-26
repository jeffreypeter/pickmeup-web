<?php

/**
 * Created by IntelliJ IDEA.
 * User: jeffr
 * Date: 21-11-2017
 * Time: 08:59
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Role;


class User extends Model
{
    protected $table = 'users';
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles) {
        if(is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }

    public function hasRole($role) {
        return null !== $this->roles()->where('name',$role)->first();
    }

}