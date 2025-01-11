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
        Schema::create('institute_change', function (Blueprint $table) {
            $table->unsignedBigInteger('Sid');
            $table->unsignedBigInteger('current_Inid');
            $table->unsignedBigInteger('new_Inid');
            $table->string('changing_date');
            $table->foreign('Sid')->references('Sid')->on('students')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('current_Inid')->references('Inid')->on('institutes')
            ->onUpdate('cascade')
            ->onDelete('no action');
            $table->foreign('new_Inid')->references('Inid')->on('institutes')
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
        Schema::dropIfExists('institute_change');
    }
};
