<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contestant_robot_id');
            $table->integer('opponent_robot_id');
            $table->float('contestant_robot_score', 8, 2);
            $table->float('opponent_robot_score', 8, 2);
            $table->integer('winner_robot_id');
            $table->date('date');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('fights');
    }
}
