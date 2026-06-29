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
        Schema::create('asset_issues', function (Blueprint $table) {
    $table->id();

    $table->foreignId('asset_id');

    $table->string('employee_name');
    $table->string('employee_id')->nullable();

    $table->string('department')->nullable();

    $table->date('issue_date');

    $table->date('expected_return')->nullable();

    $table->date('return_date')->nullable();

    $table->text('remarks')->nullable();

    $table->string('status')->default('Active');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_issues');
    }
};
