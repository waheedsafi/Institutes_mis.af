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
        Schema::create('sub_in_dep', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Did');
            $table->unsignedBigInteger('Sid');
            $table->foreign('Did')->references('Did')->on('departments')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('Sid')->references('Sid')->on('subjects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('semester_no');
            $table->integer('credit');
            $table->unique(['Did','Sid',"semester_no"]);

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
        Schema::dropIfExists('sub_in_dep');
    }
};
