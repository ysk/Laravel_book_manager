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
        Schema::create('userprofs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('address',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('github_url',255)->nullable();

    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userprofs');
    }
};
