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
     * 
     */
    
    public function up()
    {
        Schema::create('citys', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('en_name');
          
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->integer('access_level');
            $table->timestamps();
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('email')->unique();
            $table->unsignedBigInteger('role');
            $table->foreign('role')->references('id')->on('roles')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->string('password');
            $table->string('name',64);
            $table->string('f_name',64)->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('city')->nullable();
            $table->foreign('city')->references('id')->on('citys')
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('citys');
    }
};
