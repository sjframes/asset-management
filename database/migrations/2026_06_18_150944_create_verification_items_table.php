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
    Schema::create('verification_items', function (Blueprint $table) {

        $table->id();

        $table->foreignId('session_id');

        $table->foreignId('asset_id');

        $table->string('asset_code');

        $table->string('asset_name');

        $table->string('employee_name')->nullable();

        $table->string('employee_id')->nullable();

        $table->string('department')->nullable();

        $table->string('location')->nullable();

        $table->string('status')->default('Verified');

        $table->text('remarks')->nullable();

        $table->timestamp('scan_time');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_items');
    }
};
