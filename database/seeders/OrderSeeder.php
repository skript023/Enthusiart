<?php

namespace Database\Seeders;

use App\Models\order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 7,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 8,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 9,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 10,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 11,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 12,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 13,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
            [
                'id' => 14,
                'user_id' => 1,
                'art_id' => 4,
                'price' => 549000,
                'quantity' => 1,
                'status' => 'completed',
                'address' => 'Jl. Merdeka'
            ],
        ];

        foreach ($users as $user)
        {
            order::create($user);
        }
    }
}
