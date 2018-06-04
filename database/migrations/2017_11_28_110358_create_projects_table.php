<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->longText('Description')->nullable();
            $table->integer('Company_ID')->nullable()->unsigned();
            $table->integer('User_ID')->unsigned();
            $table->integer('Days')->nullable()->unsigned();

            $table->foreign('User_ID')->references('id')->on( 'users');
            $table->foreign('Company_ID')->references('id')->on( 'companies');
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
        Schema::dropIfExists('Projects');
    }
}
