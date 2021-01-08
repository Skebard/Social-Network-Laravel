<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('content');
            $table->smallInteger('status');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('likes'); //total number of likes
            $table->unsignedBigInteger('comments'); //total number of comments
            //both likes anc comments could be calculated but adding this fields in this table reduces work from the database
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
