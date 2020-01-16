<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsModelsTable extends Migration
{

    public function up()
    {
        Schema::create('comments_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("blogs_id", 320);
            $table->string("user_id", 320);
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
        Schema::dropIfExists('comments_models');
    }
}
