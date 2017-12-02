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

        // 1
        $adminUser = new User();
        $adminUser->name ='Jeffrey';
        $adminUser->email = 'jeffravi@iu.edu';
        $adminUser->phone = '8122728408';
        $adminUser->password=bcrypt('testing');
        $adminUser->organization='BISM';
        $adminUser->address='home';
        $adminUser->active=true;
        $adminUser->save();
        $adminUser->roles()->attach($adminRole);
        // 2
        $user = new User();
        $user->name ='Dwayne';
        $user->email = 'wayne@iu.edu';
        $user->phone = '7122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();
        // 3
        $user = new User();
        $user->name ='Ramya';
        $user->email = 'ramya@iu.edu';
        $user->phone = '6122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();
        // 4
        $user = new User();
        $user->name ='elan';
        $user->email = 'elan@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();
    }
}
