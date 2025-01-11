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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('Tid');
            $table->unsignedBigInteger('Inid');
            $table->foreign('Inid')->references('Inid')->on('institutes')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->string('teacher_name',64);
            $table->string('last_name',64)->nullable();
            $table->string('f_name',64)->nullable();
            $table->boolean('gender');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('Did')->on('departments')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('citys')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->string('education',64)->nullable();
            $table->string('experince',128)->nullable();
            $table->string('join_date',64)->nullable();
            $table->string('contract_type',64);
            $table->string('email',64)->nullable()->unique();
            $table->string('phone',64)->nullable()->unique();
            $table->string('salary',32)->nullable();
            $table->string('photo',128)->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
