<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_case', function (Blueprint $table) {
            $table->id('case_id');
            $table->integer('complaint_id')->nullable();
            $table->string('complaint_desc')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('complaint_comment')->nullable();
            $table->string('complaint_remark')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('student_case');
    }
}
