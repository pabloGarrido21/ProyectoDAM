<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //

        Schema::dropIfExists('contrato');

        Schema::create('contrato', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesional')->
            references('id')->on('profesional')->onDelete('cascade');
            $table->foreignId('id_socio')->
            references('id')->on('socio')->onDelete('cascade');
            $table->foreignId('id_oferta')->
            references('id')->on('oferta')->onDelete('cascade');
            $table->text('comentario');
            $table->double('precio');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->default('2020-01-02');
            $table->string('estado')->default('pendiente');

        });


        DB::table("ciudad")->insert([
            'nombre' => "prueba",
            'codigo_postal' => 000001
        ]);


        DB::table("sector")->insert([
            'nombre' => "prueba"
        ]);


        DB::table("profesional")->insert([
            'email' => "usuario@usuario.com",
            'password' => "usuario",
            'nombre' => "usuario",
            'apellido' => "usuario",
            'telefono' => 123456789,
            'direccion' => "usuario",
            'ciudad' => 1,
            'profesion' =>1
        ]);

        DB::table("socio")->insert([
            'email' => "usuario@usuario.com",
            'password' => "usuario",
            'nombre' => "usuario",
            'apellido' => "usuario",
            'telefono' => 123456789,
            'direccion' => "usuario",
            'ciudad' => 1
        ]);


        DB::table("oferta")->insert([
            'titulo' => 'Oferta 1',
            'profesion' => 1,
            'id_profesional' => 1,
            'ciudad' => 1,
            'precio' => 1000,
            'duracion' => 1
        ]);


        DB::table("contrato")->insert([
            'id_profesional' => 1,
            'id_socio' => 1,
            'id_oferta' => 1,
            'comentario' => 'comentario',
            'precio' => 1000,
            'fecha_inicio' => '2019-01-01',
            'estado' => 'pendiente'

        ]);


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
