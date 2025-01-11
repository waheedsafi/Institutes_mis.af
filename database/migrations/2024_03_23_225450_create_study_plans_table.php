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
        Schema::create('study_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('sub_in_dep')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('institute_id');
            $table->foreign('institute_id')->references('Inid')->on('institutes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('pdfurl');
            $table->unique(['subject_id','institute_id']);
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
        Schema::dropIfExists('study_plans');
    }
};
