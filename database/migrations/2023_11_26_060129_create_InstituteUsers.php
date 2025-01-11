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
        Schema::create('InstituteUsers', function (Blueprint $table) {
            $table->unsignedBigInteger('Uid');
            $table->foreign('Uid')->references('id')->on('users')
            ->onUpdate('cascade') 
            ->onDelete('no action');
            $table->unsignedBigInteger('Inid');
            $table->foreign('Inid')->references('Inid')->on('institutes')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table -> primary(['Uid','Inid']);
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
        Schema::dropIfExists('InstituteUsers');
    }
};



