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
            $table->id()->startingValue(10000);
            $table->string('username');
            $table->string('phone_number');
            $table->string('phone_number_verify_code')->nullable()->default(null);
            $table->string('phone_number_verified_at')->nullable()->default(null);
            $table->string('email')->unique()->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->boolean('suspension')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
