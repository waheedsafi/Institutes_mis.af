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
        Schema::create('finance', function (Blueprint $table) {
            $table->unsignedBigInteger('Inid')->primary();
            $table->boolean('status')->comment('yes=1 no=0 ');
            $table->string('scan',128);
            $table->string('start_date',64);
            $table->string('end_date',64);
            $table->foreign('Inid')->references('Inid')->on('institutes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('finance');
    }
};
