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
                'lastname'     => 'Alpha',
                'username' => 'admin_01',
                'email'    => 'admin@mail.com',
                'role' => 'admin',
                'ip_address' => '192.168.1.1',
                'password' => bcrypt('adminroot'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
