<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->integer('Project_ID')->unsigned();
            $table->integer('User_ID')->unsigned();
            $table->integer('Company_ID')->nullable()->unsigned();
            $table->integer('Days')->nullable()->unsigned();
            $table->integer('Hours')->nullable()->unsigned();

            $table->Foreign('User_ID')->references('id')->on('users');
            $table->Foreign('Project_ID')->references('id')->on('projects');
            $table->Foreign('Company_ID')->references('id')->on('companies');
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
        Schema::dropIfExists('Tasks');
    }
}
