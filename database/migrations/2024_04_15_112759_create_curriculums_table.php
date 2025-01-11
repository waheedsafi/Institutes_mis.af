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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->unsignedBigInteger('Did');
            $table->foreign('Did')->references('Did')->on('departments')
            ->onUpdate('cascade')
            ->onDelete('cascade');
          
            $table->string('name',64);
            $table->string('pdfurl',128);
            $table->primary(['Did']);

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
        Schema::dropIfExists('curriculums');
    }
};
