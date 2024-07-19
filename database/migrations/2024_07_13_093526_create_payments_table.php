<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->string('transaction_id')->unique();
            $table->string('merchant_id');
            $table->bigInteger('gross_amount');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('currency');
            $table->string('payment_type');
            $table->string('transaction_status');
            $table->string('transaction_time');
            $table->string('fraud_status');
            $table->timestamp('expiry_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
