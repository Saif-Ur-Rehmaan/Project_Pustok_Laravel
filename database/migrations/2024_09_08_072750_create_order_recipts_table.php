<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
            ->references('id')
            ->on('user_orders')
            ->onDelete('cascade');


            $table->timestamps();
        });

        // Adding the MEDIUMBLOB column using raw SQL
        DB::statement('ALTER TABLE order_receipts ADD COLUMN `File` MEDIUMBLOB');
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_receipts', function (Blueprint $table) {
            // Dropping the MEDIUMBLOB column using raw SQL
            DB::statement('ALTER TABLE order_receipts DROP COLUMN `File`');
        });

        Schema::dropIfExists('order_receipts');
    }
};
