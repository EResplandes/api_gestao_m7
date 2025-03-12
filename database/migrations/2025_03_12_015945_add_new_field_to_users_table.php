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
        Schema::table('users', function (Blueprint $table) {
            $table->string('sobrenome');
            $table->bigInteger('telefone');
            $table->bigInteger('telefone_secundario');
            $table->bigInteger('celular');
            $table->boolean('is_whatsapp')->default(0);
            $table->enum('sexo', ['M', 'F']);
            $table->integer('idade');
            $table->bigInteger('cpf')->unique();
            $table->bigInteger('titulo_eleitor')->unique();
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_usuarios');
            $table->unsignedBigInteger('padrinho_id')->nullable();
            $table->foreign('padrinho_id')->references('id')->on('users');
            $table->unsignedBigInteger('status_id')->default(3);
            $table->foreign('status_id')->references('id')->on('status_usuarios');
            $table->unsignedBigInteger('gabinete_id')->nullable();
            $table->foreign('gabinete_id')->references('id')->on('gabinetes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
