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
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('pro_pic')->nullable();
            $table->unsignedBigInteger('role_id')->default(2);
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->tinyInteger('status')->default(0);
            $table->string('password');
            $table->timestamp('create_time')->useCurrent();
            $table->timestamp('update_time')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
};
