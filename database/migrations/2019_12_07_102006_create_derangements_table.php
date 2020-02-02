<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDerangementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('derangements', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->timestamps();
            $table->string('libelle');
            $table->string('listeInstallations');
            $table->string('listeResiliations');
            $table->string('listeInstances');
            $table->string('listeEtudes');
            $table->string('type');
            $table->date('periode');

             $table->bigInteger('equipe_id')->unsigned();

            $table->foreign('equipe_id')->references('id')
                                        ->on('equipes')
                                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('derangements');
    }
}
