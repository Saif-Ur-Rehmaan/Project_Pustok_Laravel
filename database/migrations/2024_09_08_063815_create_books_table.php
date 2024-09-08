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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")
            ->references("id")
            ->on("book_categories")
            ->onDelete("cascade");
            
            $table->string("title");
            $table->string("brand")->nullable();
            $table->text("image")->nullable();
            $table->json("tags")->nullable();
            $table->decimal('extax',8,2,true)->nullable();
            $table->decimal('priceInUSD',8,2,true)->nullable();
            $table->tinyInteger('discountPercent')->default(0);
            $table->text("productDescription")->nullable();
            $table->string("manufacturer")->nullable();
            $table->string("color")->nullable();
            $table->string("productCode")->nullable();
            $table->string("availablity")->default("Available");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
