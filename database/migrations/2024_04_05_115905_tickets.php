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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_User');
            $table->foreign('id_User')->references('id')->on('users')->onDelete('cascade');
            $table->integer('phone_number');
            $table->string('title');
            $table->string('mo_ta');
            $table->enum('status', ['Chưa Hỗ Trợ', 'Đã Hỗ Trợ'])->default('Chưa Hỗ Trợ');
            $table->timestamp('date_create');
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
