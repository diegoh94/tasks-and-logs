<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description');
            $table->date('deadline');

            $table->integer('user_created_id')->unsigned();
            $table->foreign('user_created_id')->references('id')->on('users');

            $table->integer('user_assigning_id')->unsigned();
            $table->foreign('user_assigning_id')->references('id')->on('users');

            $table->softDeletes(); // deleted_at
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
        Schema::dropIfExists('tasks');
    }
}
