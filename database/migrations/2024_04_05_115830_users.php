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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->boolean('is_admin')->default(0);
            $table->string('reset_password_token')->nullable()->unique();
            // $table->unsignedBigInteger('hosting_id')->nullable();
            // $table->foreign('hosting_id')->references('ID')->on('hosting');
            // $table->unsignedBigInteger('vps_id')->nullable();
            // $table->foreign('vps_id')->references('ID')->on('vps');
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
