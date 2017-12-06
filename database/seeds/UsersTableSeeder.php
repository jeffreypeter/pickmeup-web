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
        $user->email = 'dsouza@iu.edu';
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

        // 5
        $user = new User();
        $user->name ='Mercury';
        $user->email = 'mercury@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

        // 6
        $user = new User();
        $user->name ='Jason';
        $user->email = 'jason@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 5
        $user = new User();
        $user->name ='Jason';
        $user->email = 'jason@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 6
        $user = new User();
        $user->name ='Abbey';
        $user->email = 'Abbey@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 7
        $user = new User();
        $user->name ='Elye';
        $user->email = 'elye@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 8
        $user = new User();
        $user->name ='Prajna';
        $user->email = 'prajna@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 9
        $user = new User();
        $user->name ='Mercury';
        $user->email = 'mercury@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 10
        $user = new User();
        $user->name ='Vanessa';
        $user->email = 'vanessa@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 11
        $user = new User();
        $user->name ='Lynn';
        $user->email = 'lynn@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 12
        $user = new User();
        $user->name ='Clare';
        $user->email = 'clare@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 13
        $user = new User();
        $user->name ='Ife';
        $user->email = 'ife@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();

		// 14
        $user = new User();
        $user->name ='Ed';
        $user->email = 'ed@iu.edu';
        $user->phone = '1122728408';
        $user->password=bcrypt('testing');
        $user->organization='BISM';
        $user->address='home';
        $user->active=true;
        $user->save();
    }
}
