<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('articles', function (Blueprint $table) {
        $table->id();
        $table->string("title");
        $table->longText("summary");
        $table->longText("content");
        $table->integer("user_id");
        $table->string("featuredImage");
        $table->string("slug");
        $table->string("category_id");
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
        //
    }
}
