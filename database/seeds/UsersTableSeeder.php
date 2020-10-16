<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'     => 'Admin',
                'email'    => 'admin@mail.com',
                'password' => bcrypt('adminroot'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
