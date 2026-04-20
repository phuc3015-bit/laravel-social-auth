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
        Schema::table('users', function (Blueprint $table) {
            $table->string('student_id')->nullable(); // Yêu cầu cá nhân hóa
            $table->string('avatar')->nullable();
            $table->string('provider_name')->nullable(); // 'google' hoặc 'facebook'
            $table->string('provider_id')->nullable();
            $table->string('password')->nullable()->change(); // Cho phép password null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
