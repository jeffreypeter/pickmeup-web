<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'Admin of an application';
        $role_admin->save();
        $role_mod = new Role();
        $role_mod->name = 'moderator';
        $role_mod->description = 'Moderator of admins';
        $role_mod->save();
    }
}
