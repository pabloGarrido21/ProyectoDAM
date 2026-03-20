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
        Schema::dropIfExists('contrato');
        Schema::dropIfExists('oferta');
        Schema::dropIfExists('profesional');
        Schema::dropIfExists('socio');
        Schema::dropIfExists('ciudad');
        Schema::dropIfExists('sector');



        //
        Schema::create('sector', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index()->unique();
        });

        Schema::create('ciudad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index()->unique();
            $table->integer('codigo_postal');

        });


        Schema::create('profesional', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('telefono');
            $table->string('direccion');
            $table->foreignId('ciudad')->
                references('id')->on('ciudad')->onDelete('cascade');
            $table->foreignId('profesion')->
                references('id')->on('sector')->onDelete('cascade');


        });

        Schema::create('socio', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('telefono');
            $table->string('direccion');
            $table->foreignId('ciudad')->
                references('id')->on('ciudad')->onDelete('cascade');

        });


        Schema::create('oferta', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->index();
            $table->foreignId('profesion')->
                references('id')->on('sector')->onDelete('cascade');
            $table->foreignId('id_profesional')->
                references('id')->on('profesional')->onDelete('cascade');
            $table->foreignId('ciudad')->
                references('id')->on('ciudad')->onDelete('cascade');
            $table->double('precio');

        });

        Schema::create('contrato', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesional')->
             references('id')->on('profesional')->onDelete('cascade');
            $table->foreignId('id_socio')->
                references('id')->on('socio')->onDelete('cascade');
            $table->foreignId('id_oferta')->
                references('id')->on('oferta')->onDelete('cascade');
            $table->text('comentario');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('estado')->default('pendiente');

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
