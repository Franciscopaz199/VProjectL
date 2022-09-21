<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->text('enunciado');
            $table->boolean('estado');
            $table->string('url');
            $table->string('lenguaje');
            $table->string('tipo');
            $table->unsignedBigInteger('autor');
            $table->foreign('autor')->references('id')->on('users');
            $table->integer('usos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
};
