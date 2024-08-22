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
        // $users = [
        //     [
        //         'id' => 1,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716001'
        //     ],
        //     [
        //         'id' => 2,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716002'
        //     ],
        //     [
        //         'id' => 3,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716003'
        //     ],
        //     [
        //         'id' => 4,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716004'
        //     ],
        //     [
        //         'id' => 5,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716005'
        //     ],
        //     [
        //         'id' => 6,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716006'
        //     ],
        //     [
        //         'id' => 7,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716007'
        //     ],
        //     [
        //         'id' => 8,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716008'
        //     ],
        //     [
        //         'id' => 9,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716009'
        //     ],
        //     [
        //         'id' => 10,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716010'
        //     ],
        //     [
        //         'id' => 11,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716011'
        //     ],
        //     [
        //         'id' => 12,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716012'
        //     ],
        //     [
        //         'id' => 13,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716013'
        //     ],
        //     [
        //         'id' => 14,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716014'
        //     ],
        //     [
        //         'id' => 15,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716015'
        //     ],
        //     [
        //         'id' => 16,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716016'
        //     ],
        //     [
        //         'id' => 17,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716017'
        //     ],
        //     [
        //         'id' => 18,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716018'
        //     ],
        //     [
        //         'id' => 19,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716019'
        //     ],
        //     [
        //         'id' => 20,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716020'
        //     ],
        //     [
        //         'id' => 21,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716021'
        //     ],
        //     [
        //         'id' => 22,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716022'
        //     ],
        //     [
        //         'id' => 23,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716023'
        //     ],
        //     [
        //         'id' => 24,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716024'
        //     ],
        //     [
        //         'id' => 25,
        //         'user_id' => 3,
        //         'art_id' => 4,
        //         'price' => 549000,
        //         'quantity' => 1,
        //         'status' => 'Success',
        //         'address' => 'Jl. Alabasta',
        //         'total_price' => 549000,
        //         'invoice_number' => 'INV-20240716025'
        //     ],
        // ];

        // foreach ($users as $user)
        // {
        //     order::create($user);
        // }
    }
}
