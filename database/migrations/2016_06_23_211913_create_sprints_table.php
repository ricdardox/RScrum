<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatesprintsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sprints', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamp('startdate');
            $table->timestamp('enddate');
            $table->timestamp('dateplanning');
            $table->text('resumeplanning');
            $table->timestamp('datereview');
            $table->text('resumereview');
            $table->timestamp('dateretrospective');
            $table->text('resumeretrospective');
            $table->integer('project_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('project_id')
                    ->references('id')->on('projects')
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
        Schema::drop('sprints');
    }

}
