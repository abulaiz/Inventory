<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	Role::create(['name' => 'manager']);
    	Role::create(['name' => 'admin']);
    	Role::create(['name' => 'cleaner']);

        $user = new User();
        $user->name = 'Alfian B';
        $user->email = 'user1@gmail.com';
        $user->password = bcrypt('user1');
        $user->save();
        $user->assignRole('manager');

        $user = new User();
        $user->name = 'Budi K';
        $user->email = 'user2@gmail.com';
        $user->password = bcrypt('user2');
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->name = 'Edward S';
        $user->email = 'user3@gmail.com';
        $user->password = bcrypt('user3');
        $user->save();
        $user->assignRole('cleaner');        
    }
}
