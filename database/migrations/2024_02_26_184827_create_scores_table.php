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
        Schema::create('scores', function (Blueprint $table) {
       
                $table->unsignedBigInteger('Sid');
                $table->unsignedBigInteger('Stuid');
           
                $table->Integer('semester');
                $table->primary(['Sid','Stuid','semester']);
                $table->double('test');
                $table->double('final');
                $table->foreign('Sid')->references('Sid')->on('subjects')
                ->onUpdate('cascade')
                ->onDelete('no action');
                $table->foreign('Stuid')->references('Sid')->on('students')
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
        Schema::dropIfExists('scores');
    }
};
