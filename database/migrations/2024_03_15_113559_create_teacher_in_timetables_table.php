<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_in_timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('timetable_id');
            $table->foreign('timetable_id')->references('id')->on('time_tables')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('T_id');
            $table->foreign('T_id')->references('Tid')->on('teachers')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('start_time');
            $table->string('end_time');
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
        Schema::dropIfExists('teacher_in_timetables');
    }
};
