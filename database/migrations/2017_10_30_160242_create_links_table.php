<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('title');
            $table->enum('status', ['removed', 'online']);
            $table->unsignedSmallInteger('google_position')->nullable();
            $table->unsignedSmallInteger('google_page')->nullable();
            $table->unsignedInteger('dossier_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dossier_id')->references('id')->on('dossiers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
