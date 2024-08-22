<?php

namespace Database\Seeders;

use App\Models\payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $payments = [];

        // for ($i = 1; $i < 15; $i++) {
        //     $payments[] = 
        //     [
        //         'order_id' => $i,
        //         'transaction_id' => $i,
        //         'merchant_id' => config('midtrans.merchant_id'),
        //         'gross_amount' => 549000,
        //         'currency' => 'IDR',
        //         'payment_type' => 'Bank Transfer',
        //         'transaction_status' => 'settlement',
        //         'transaction_time' => now(),
        //         'fraud_status' => 'clean',
        //         'expiry_time' => now()->addDays(7),
        //         'name' => 'Admin ',
        //         'description' => 'Payment description ' . $i,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // foreach ($payments as $user)
        // {
        //     payment::create($user);
        // }
    }
}
