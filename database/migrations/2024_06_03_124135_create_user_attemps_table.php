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
        Schema::create('user_attemps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Uid');
            $table->foreign('Uid')->references('id')->on('users')
            ->onUpdate('cascade') 
            ->onDelete('no action');
            $table->integer('daily_attemp');
            $table->string('data');
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
        Schema::dropIfExists('user_attemps');
    }
};
