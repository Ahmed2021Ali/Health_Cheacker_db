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
        Schema::create('panels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('url', 500)->nullable()->default('0');
            $table->string('server', 500)->nullable();
            $table->string('port', 255)->nullable();
            $table->string('username', 500)->nullable();
            $table->string('password', 500)->nullable();
            $table->string('db_name', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panels');
    }
};
