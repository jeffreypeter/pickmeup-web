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
use Illuminate\Support\Facades\Log;
//use Illuminate\Foundation\Auth\User as Auths;
//use  Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class User extends Model implements Authenticatable
{
	use AuthenticableTrait;
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','updated_at','created_at','address','phone','active','organization','profile_pic',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /*public function authorizeRoles($roles) {
        if(is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }*/

    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }

    public function hasRole($name) {
        $role = $this->roles()->where('name',$name)->first();
//        Log::info();
        if(!empty($role)) {
            return true;
        }
        return false;
    }

}