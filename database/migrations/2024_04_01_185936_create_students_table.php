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
            $table->string('mother_name')->nullable();
            $table->string('birth_date')->nullable();
            $table->unsignedBigInteger('serial_no')->nullable();
            $table->unsignedBigInteger('roll_no')->nullable();
            $table->unsignedBigInteger('ssc_roll_no')->nullable()->unique();
            $table->unsignedBigInteger('hsc_roll_no')->nullable();
            $table->string('ssc_year')->nullable();
            $table->string('hsc_year')->nullable();
            $table->text('ssc_from')->nullable();
            $table->text('hsc_from')->nullable();
            $table->string('certificate_serial')->nullable();
            $table->string('regi_no')->nullable();
            $table->string('ssc_regi_no')->nullable();
            $table->string('hsc_regi_no')->nullable();
            $table->string('grade')->nullable();
            $table->string('ssc_grade')->nullable();
            $table->string('hsc_grade')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->string('document')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('role_id')->default(3);
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->tinyInteger('status')->default(0);
            $table->string('verify_token')->nullable();
            $table->tinyInteger('email_verified')->default(0);
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


