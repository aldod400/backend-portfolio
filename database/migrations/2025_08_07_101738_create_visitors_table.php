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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->string('page_visited');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('referer')->nullable();
            $table->timestamps();

            $table->index(['ip_address', 'created_at']);
            $table->index('created_at');
            $table->index('page_visited');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
