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
        Schema::table('student_enrol_classes', function (Blueprint $table) {
            //


            $table->integer('semester_type')->comment('1=khazani 0=bahari');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_enrol_classes', function (Blueprint $table) {
            //
        });
    }
};
