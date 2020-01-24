<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id'); /* incrementa em 1 */ /* qualquer linha adicionada aqui é uma coluna (atributo) na tabela de modelagem */
            $table->string('nome');
			$table->string('genero');
			$table->longText('sinopse');
			$table->integer('likes')->unsigned();
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
        });
		Schema::table('series', function (Blueprint $table) {
		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
