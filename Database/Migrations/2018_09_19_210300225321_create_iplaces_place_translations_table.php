<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIplacesPlaceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iplaces__place_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('metatitle')->nullable();
            $table->text('metakeywords')->nullable();
            $table->text('metadescription')->nullable();
            // Your translatable fields

            $table->integer('place_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['place_id', 'locale']);
            $table->foreign('place_id')->references('id')->on('iplaces__places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iplaces__place_translations', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
        });
        Schema::dropIfExists('iplaces__place_translations');
    }
}
