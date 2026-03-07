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
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('demanda_p');
        Schema::dropIfExists('demanda_s');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('oferta');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('profesional');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('socio');
        Schema::dropIfExists('users');

    }
};
