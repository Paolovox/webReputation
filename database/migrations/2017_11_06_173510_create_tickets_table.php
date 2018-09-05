<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('oggetto');
            $table->longText('messaggio');
            $table->enum('status', ['open', 'closed']);
            $table->unsignedInteger('dossier_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dossier_id')->references('id')->on('dossiers');
            $table->foreign('parent_id')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
