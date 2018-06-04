<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Project_User', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Project_ID')->unsigned();
            $table->integer('User_ID')->unsigned();

            $table->Foreign('User_ID')->references('id')->on('users');
            $table->Foreign('Project_ID')->references('id')->on('projects');
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
        Schema::dropIfExists('Project_User');
    }
}
