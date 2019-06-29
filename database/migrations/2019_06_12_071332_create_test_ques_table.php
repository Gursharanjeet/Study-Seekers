<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestQuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_ques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('test_title');
            $table->text('ques');
            $table->string('op1');
            $table->string('op2');
            $table->string('op3');
            $table->string('op4');
            $table->string('co_op');
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
        Schema::dropIfExists('test_ques');
    }
}
