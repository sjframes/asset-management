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
    Schema::create('verification_sessions', function (Blueprint $table) {
        $table->id();

        $table->string('verification_no');
        $table->string('verification_name');

        $table->date('verification_date');

        $table->string('verified_by');

        $table->integer('total_scanned')->default(0);

        $table->text('remarks')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_sessions');
    }
};
