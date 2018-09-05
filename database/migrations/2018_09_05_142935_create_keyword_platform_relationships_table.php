<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordPlatformRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_platform_relationships', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('keyword_id')->unsigned();
            $table->integer('platform_id')->unsigned();

            $table->foreign('keyword_id')->references('id')->on('keywords');
            $table->foreign('platform_id')->references('id')->on('platforms');

            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keyword_platform_relationships');
    }
}
