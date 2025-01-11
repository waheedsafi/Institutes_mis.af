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
        Schema::create('attendance', function (Blueprint $table) {
            $table->unsignedBigInteger('Stuid');
            $table->unsignedBigInteger('Sid');
            $table->Integer('semester');
            $table->primary(['Stuid','Sid','semester']);
            $table->integer('attend_in_sem');
            $table->integer('absend_in_sem');
            $table->foreign('Stuid')->references('Sid')->on('students')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->foreign('Sid')->references('Sid')->on('subjects')
            ->onUpdate('cascade')
            ->onDelete('no action');
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
        Schema::dropIfExists('attendance');
    }
};
