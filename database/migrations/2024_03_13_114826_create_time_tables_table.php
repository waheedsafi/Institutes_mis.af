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
        Schema::create('time_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('sub_in_dep')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')->references('id')->on('week_days')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('time_tables');
    }
};
