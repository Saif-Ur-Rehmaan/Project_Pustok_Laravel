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
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('order_Code');
            $table->unsignedBigInteger('payment_method_id'); // Payment method (e.g., Credit Card, PayPal, COD)
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('currency', 3)->default('USD'); // Currency code (e.g., USD, EUR)
            $table->string('payment_status')->default('pending'); // Payment status (e.g., pending, completed, failed)
            $table->string('transaction_id')->nullable(); // Transaction ID for online payments
            $table->json('payment_details')->nullable(); // Store additional payment details (e.g., response from payment gateway)
            $table->timestamp('paid_at')->nullable(); // Timestamp when payment was completed
            $table->timestamps(); // Created at and updated at timestamps

         
            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade'); // Delete payments if the related order is deleted
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payments');
    }
};
