<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('father_name')->nullable();
            $table->unsignedBigInteger('serial_no')->nullable();
            $table->unsignedBigInteger('roll_no')->nullable();
            $table->string('certificate_serial')->nullable();
            $table->string('regi_no')->nullable();
            $table->string('grade')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->string('document')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('role_id')->default(3);
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->tinyInteger('status')->default(0);
            $table->string('password')->nullable();
            $table->timestamp('create_time')->useCurrent();
            $table->timestamp('update_time')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
