<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fullname' => 'Administrator',
                'email' => 'fatur_muhammad@bk.ru',
                'password' => Hash::make('123')
            ]
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
