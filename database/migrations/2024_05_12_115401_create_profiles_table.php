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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id()->startingValue(10000);
            $table->longText('image_base_url')->nullable()->default(null);
            $table->longText('image')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->longText('bio')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->timestamp('birth_date')->nullable()->default(null);
            $table->timestamp('last_activity')->nullable()->default(null);
            $table->bigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
