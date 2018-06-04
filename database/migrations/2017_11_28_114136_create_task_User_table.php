<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Task_User', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('User_ID')->unsigned();
            $table->integer('Task_ID')->unsigned();

            $table->Foreign('Task_ID')->references('id')->on('tasks');
            $table->Foreign('User_ID')->references('id')->on('users');
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
        Schema::dropIfExists('Task_User');
    }
}
