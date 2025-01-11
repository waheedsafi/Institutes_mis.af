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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id('Inid');
            $table->string('Institute_name',128)->unique();
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('citys');
            $table->string('location',128)->nullable();
            $table->string('CEO',64)->nullable();
            $table->boolean('status')->comment('1=active,0=deactive');
            $table->string('create_date',64)->nullable();
            $table->string('founder',64)->nullable();
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
        Schema::dropIfExists('institutes');
    }
};
