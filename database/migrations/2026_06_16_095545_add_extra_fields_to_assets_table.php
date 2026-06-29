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
    Schema::table('assets', function (Blueprint $table) {

        $table->integer('quantity')->default(1)->after('model');
        $table->string('location')->nullable()->after('quantity');
        $table->string('department')->nullable()->after('location');
        $table->string('floor_no')->nullable()->after('department');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('assets', function (Blueprint $table) {

        $table->dropColumn([
            'quantity',
            'location',
            'department',
            'floor_no'
        ]);

    });
}
};
