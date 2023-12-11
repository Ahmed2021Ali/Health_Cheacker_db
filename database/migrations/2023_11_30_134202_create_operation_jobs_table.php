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
        Schema::create('operation_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('job_id')->nullable();
            $table->string('failed_job_id')->nullable();
            $table->string('queue')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operation_jobs');
    }
};
