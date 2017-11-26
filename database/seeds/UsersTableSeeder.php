<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'moderator')->first();
        $adminUser = new User();
        $adminUser->name ='Jeffrey';
        $adminUser->email = 'jeffravi@iu.edu';
        $adminUser->phone = '8122728408';
        $adminUser->password='testing';
        $adminUser->organization='BISM';
        $adminUser->address='home';
        $adminUser->active=true;
        $adminUser->save();
        $adminUser->roles()->attach($adminRole);


    }
}
