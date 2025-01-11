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
        Schema::create('student_enrol_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('Sid')->on('students')
                ->onUpdate('cascade')
                ->onDelete('no action');

                $table->unsignedBigInteger('class_id');
                $table->foreign('class_id')->references('id')->on('classes')
                    ->onUpdate('cascade')
                    ->onDelete('no action');
                    $table->unsignedBigInteger('shift_id');
                    $table->foreign('shift_id')->references('id')->on('shifts')
                        ->onUpdate('cascade')
                        ->onDelete('no action');

                    $table->unique(['student_id','class_id','shift_id']);
       
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
        Schema::dropIfExists('student_enrol_classes');
    }
};
