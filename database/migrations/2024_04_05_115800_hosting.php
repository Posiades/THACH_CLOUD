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
        Schema::create('hosting', function (Blueprint $table) {
            $table->bigIncrements('ID'); 
            $table->binary('img');
            $table->string('name');
            $table->string('type');
            $table->string('mo_ta', 1000);
            $table->unsignedBigInteger('GiaTien');
            $table->unsignedBigInteger('data_Hosting');
            $table->unsignedBigInteger('bandwidth');
            $table->string('slug');
            $table->string('type_product')->default('hosting');
            $table->timestamps();
            // Các định nghĩa cột khác
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
