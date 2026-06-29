<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->boolean('reset_requested')->default(false);
            $table->timestamp('reset_requested_at')->nullable();
            $table->string('temporary_password')->nullable();
            $table->boolean('force_password_change')->default(false);

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'reset_requested',
                'reset_requested_at',
                'temporary_password',
                'force_password_change',
            ]);

        });
    }
};