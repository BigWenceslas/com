<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->timestamps();
            $table->string('libelle');
            $table->string('raison');

            $table->bigInteger('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('equipes')->onDelete('cascade');

            $table->bigInteger('derangement_id')->unsigned()->nullable();
            $table->foreign('derangement_id')->references('id')->on('derangements')->onDelete('cascade');

            $table->bigInteger('etude_id')->unsigned()->nullable();
            $table->foreign('etude_id')->references('id')->on('etudes')->onDelete('cascade');

            $table->bigInteger('resiliation_id')->unsigned()->nullable();
            $table->foreign('resiliation_id')->references('id')->on('resiliations')->onDelete('cascade');

            $table->bigInteger('installation_id')->unsigned()->nullable();
            $table->foreign('installation_id')->references('id')->on('installations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instances');
    }
}
