<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateuserStoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_stories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->text('criteriaofacceptance');
            $table->float('estimation');
            $table->integer('status');
            $table->integer('project_id')->unsigned();
            $table->integer('parentuserstory_id')->unsigned()->nullable();
            $table->integer('statususerstory_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('project_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('parentuserstory_id')
                    ->references('id')->on('user_stories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('statususerstory_id')
                    ->references('id')->on('status_userstories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('user_stories');
    }

}
