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
    //     Schema::create('student_classes', function (Blueprint $table) {
                    
    //     $table->id(); // This line is okay if you want to have an auto-incrementing primary key

    //     $table->string('name', 64);
      
    //     $table->unsignedBigInteger('Did');
    //     $table->foreign('Did')->references('Did')->on('departments')
    //         ->onUpdate('cascade')
    //         ->onDelete('no action');

    //     $table->integer('no');
    //     $table->integer('sem');

    //     // Define the composite primary key
    //     $table->unique([ 'Did', 'sem', 'no']);

    //     $table->timestamps();
      
    // });

        Schema::create('students', function (Blueprint $table) {
            $table->id('Sid');
            $table->string('student_name',64);
            $table->string('f_name',64);
            $table->string('l_name',64)->nullable();
            $table->string('g_f_name',64);
            $table->string('school_graduation',32)->nullabel()->comment('school graduation date');
            $table->string('kankur_no',64);
            $table->string('start_year',8);
            $table->unsignedBigInteger('Inid');
            $table->foreign('Inid')->references('Inid')->on('institutes')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->unsignedBigInteger('Did');
            $table->foreign('Did')->references('Did')->on('departments')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->string('status')->default('new')->comment('new,active,graduted');
            $table->boolean('gender');
            $table->string('photo',256);
            $table->float('percentage',32);
            $table->string('nid',32);
            $table->string('pdf',256)->nullable();
            $table->integer('semester');
            $table->string('DOB');
            $table->unsignedBigInteger('city');
            $table->foreign('city')->references('id')->on('citys');
            $table->string('phone')->unique()->nullable();
          
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
        Schema::dropIfExists('students');
    }
};
