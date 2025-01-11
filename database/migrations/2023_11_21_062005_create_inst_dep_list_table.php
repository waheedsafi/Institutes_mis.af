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
        Schema::create('inst_dep_list', function (Blueprint $table) {
            $table->unsignedBigInteger('Inid');
            $table->foreign('Inid')->references('Inid')->on('institutes')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->unsignedBigInteger('Did');
            $table->foreign('Did')->references('Did')->on('departments')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->string('add_date',64);
            $table->timestamps();
            $table->primary(['Inid','Did']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inst_dep_list');
    }
};
