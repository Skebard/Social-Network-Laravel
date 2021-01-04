<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->unsignedBigInteger('user_one_id');
            $table->foreign('user_one_id')->references('id')->on('users');
            $table->unsignedBigInteger('user_two_id');
            $table->foreign('user_two_id')->references('id')->on('users');
            $table->unique('user_one_id','user_two_id');
            $table->smallInteger('status');
            //status values:
            //0 Pending
            //1 Accepted
            //2 Declined
            //3 Blocked
            $table->smallInteger('action_user_id'); //user who made the last action
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
        Schema::dropIfExists('relationships');
    }
}
