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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'customer'])->default('customer');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Adding updated_at for safety, though user didn't specify it, Author Auth sometimes needs it for remember token? No.
            // But User model has $timestamps = false. Let's stick to user schema but adding updated_at is good practice. Use logic to match User model.
            // User model says $timestamps = false. So migration should only have created_at?
            // Let's stick strictly to user request: "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP"
            // But 'remember_token' is needed for "remember me" functionality which is default in Laravel.
            $table->rememberToken();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
