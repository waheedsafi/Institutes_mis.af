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
        Schema::create('license_i_s_a', function (Blueprint $table) {
            $table->unsignedBigInteger('Inid')->primary();
            $table->string('owner_name',64);
            $table->string('l_name',64)->nullable();
            $table->string('license_no',128)->unique();;
            $table->string('grade',64);
            $table->string('issue_date',64);
            $table->string('expire_date',64);
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
        Schema::dropIfExists('license__i_s_a');
    }
};
