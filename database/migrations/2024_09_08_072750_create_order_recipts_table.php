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
        Schema::create('order_recipts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('order_Code');
            $table->string('FilePath');
         


            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 

        Schema::dropIfExists('order_recipts');
    }
};
