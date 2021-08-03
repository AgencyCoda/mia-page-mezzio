<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiaPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mia_page', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->text('data');
            $table->string('seo_title');
            $table->text('seo_keywords');
            $table->text('seo_description');
            $table->integer('status');
            $table->integer('visibility');
            $table->dateTime('published_date');
            $table->integer('is_archive');
            $table->integer('last_updated_user');
    

            

            $table->timestamps();

            $table->integer('deleted')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mia_page');
    }
}