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
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->unsignedBigInteger("book_id")->nullable()->comment("every order must be completed before deleting thats why this column is restricts the deleting action of book");
            $table->foreign("book_id")
            ->references('id')
            ->on('books')
            ->onDelete('restrict');
            
            $table->string("Code");
        
            $table->enum("orderStatus",['Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled'])->default("Pending");
            $table->integer("quantity");
            $table->decimal("pricePerProduct",8,2,true);
            $table->decimal("shippingFee",8,2,true)->nullable();
            $table->string("firstName");
            $table->string("lastName");
            $table->string("address");
            $table->string("countryName");
            $table->string("cityName");
            $table->string("stateName");
            $table->string("zipCode");
            $table->string("contactNumber");
            $table->string("orderNote");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_orders');
    }
};
