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
        Schema::create('exit_exam', function (Blueprint $table) {
            $table->unsignedBigInteger('Sid');
            $table->unsignedBigInteger('Inid');
            $table->unsignedBigInteger('Did');
            $table->primary(['Sid','Inid','Did']);
            $table->string('year',32);
            $table->string('exam_date',64);
            $table->string('exam_type',64)->comment('which chance passed');
            $table->float('score',3,3);
            $table->foreign('Sid')->references('Sid')->on('students')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->foreign('Inid')->references('Inid')->on('institutes')
            ->onDelete('no action')
            ->onUpdate('cascade');
            $table->foreign('Did')->references('Did')->on('departments')
            ->onDelete('no action')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('exit_exam');
    }
};
