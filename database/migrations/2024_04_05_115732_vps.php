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
        Schema::create('vps', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->binary('img');
            $table->string('name');
            $table->string('mo_ta', 1000);
            $table->unsignedBigInteger('GiaTien');
            $table->unsignedBigInteger('Storage');
            $table->unsignedBigInteger('bandwidth');
            $table->string('slug');
            $table->string('type_product')->default('vps');
            $table->timestamps();
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
