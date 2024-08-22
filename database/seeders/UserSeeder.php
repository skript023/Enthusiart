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
                'email' => 'admin@gmail.com',
                'phone' => '081291437987',
                'address' => 'Jl. Merdeka',
                'password' => Hash::make('123'),
                'role' => 'admin'
            ],
            [
                'fullname' => 'Nico Robin',
                'email' => 'robin@gmail.com',
                'phone' => '081234567890',
                'address' => 'Jl. Ohara',
                'password' => Hash::make('123'),
                'image' => 'Nico Robin.jpg',
                'role' => 'artist'
            ],
            [
                'fullname' => 'Nefertari Vivi',
                'email' => 'vivi@gmail.com',
                'phone' => '081209876543',
                'address' => 'Jl. Alabasta',
                'password' => Hash::make('123'),
                'role' => 'art_enthusiast'
            ],
            [
                'fullname' => 'Karthono Yudhokusumo',
                'email' => 'kyudo@gmail.com',
                'phone' => '081234512067',
                'address' => 'Jl. Anggrek',
                'password' => Hash::make('123'),
                'role' => 'artist'
            ],
            [
                'fullname' => 'Conan',
                'email' => 'conan@gmail.com',
                'phone' => '087812394567',
                'address' => 'Jl. Beika 221B',
                'password' => Hash::make('123'),
                'role' => 'art_enthusiast'
            ],
            [
                'fullname' => 'Nami',
                'email' => 'nami@gmail.com',
                'phone' => '081345679874',
                'address' => 'Orange Town',
                'password' => Hash::make('123'),
                'role' => 'artist'
            ],
        ];

        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}
