<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@yopmail.com',
                'role' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@yopmail.com',
                'role' => '2',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Player',
                'email' => 'player@yopmail.com',
                'role' => '3',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Team',
                'email' => 'team@yopmail.com',
                'role' => '4',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Academy',
                'email' => 'academy@yopmail.com',
                'role' => '5',
                'password' => bcrypt('123456'),
            ],
			[
                'name' => 'Scout',
                'email' => 'scout@yopmail.com',
                'role' => '6',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
