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
            
            $table->unsignedBigInteger("author_id");
            $table->foreign("author_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");

            $table->unsignedBigInteger("subcategory_id");
            $table->foreign("subcategory_id")
            ->references("id")
            ->on("book_sub_categories")
            ->onDelete("cascade");
            
            $table->string("title");
            $table->boolean("isFeatured")->default(false);
            $table->string("brand")->nullable();
            $table->text("image")->nullable();
            $table->json("tags")->nullable();
            $table->decimal('extax',8,2,true)->nullable();
            $table->decimal('priceInUSD',8,2,true)->nullable();
            $table->tinyInteger('discountPercent')->default(0)->max(100);
            $table->text("productDescription")->nullable();
            $table->text("productSummary")->nullable();
            $table->string("manufacturer")->nullable();
            $table->string("color")->nullable();
            $table->integer("RewardPoints")->default(0);
            $table->string("productCode")->nullable();
            $table->string("availability")->default("Available");

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
