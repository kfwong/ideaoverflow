<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->username= 'admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('4dmin@ideaoverflow');
        $admin->remember_token = str_random(10);
        $admin->description = 'admin';
        $admin->role = 'admin';
		$admin->gender = 'male';
        $admin->save();

        $member = new User();
        $member->name = 'member';
        $member->username= 'member';
        $member->email = 'member@example.com';
        $member->password = bcrypt('m3mber@ideaoverflow');
        $member->remember_token = str_random(10);
        $member->description = 'member';
        $member->role = 'member';
		$member->gender = 'female';
        $member->save();

        factory(App\User::class, 6)
            ->create();
    }
}
