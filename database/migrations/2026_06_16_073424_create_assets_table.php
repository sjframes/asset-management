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
    Schema::create('assets', function (Blueprint $table) {
        $table->id();

        $table->string('asset_code')->unique();
        $table->text('qr_value')->nullable();

        $table->string('asset_name');
        $table->string('category')->nullable();

        $table->string('brand')->nullable();
        $table->string('model')->nullable();
        $table->string('serial_number')->nullable();

        $table->date('purchase_date')->nullable();
        $table->decimal('purchase_cost', 12, 2)->nullable();

        $table->string('supplier')->nullable();

        $table->string('assigned_to')->nullable();

        $table->string('status')->default('Available');

        $table->text('remarks')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
