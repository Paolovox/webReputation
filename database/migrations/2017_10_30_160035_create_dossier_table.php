<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('number')->unique();
            $table->unsignedInteger('lawyer_id');
            $table->unsignedInteger('client_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lawyer_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosseir');
    }
}
