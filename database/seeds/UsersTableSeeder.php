<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'username' => 'admin',
                'email'    => 'admin@mail.com',
                'role' => 'admin',
                'password' => Hash::make('adminroot'),
                'gender' => 'male',
                'birthday' => '09-05-1997',
                'suscribed' => true
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
