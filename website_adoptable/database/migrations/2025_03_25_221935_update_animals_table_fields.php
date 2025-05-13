<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('animals', function (Illuminate\Database\Schema\Blueprint $table) {
            //$table->string('tipo')->nullable()->after('nome');
            // $table->string('raca')->nullable()->after('tipo');
            // $table->string('sexo')->nullable()->after('raca');
            // $table->string('idade')->nullable()->after('sexo');
            //$table->string('localizacao')->nullable()->after('idade');
            // $table->string('imagem')->nullable()->after('localizacao');
            // $table->text('descricao')->nullable()->after('imagem');

            // Remove campos antigos se necessário
            //$table->dropColumn(['especie']); // só se tiveres mesmo a certeza
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            //
        });
    }
};
