<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('assets', function ($table) {

        $table->string('device_name')->nullable();
        $table->string('serial_no')->nullable();
        $table->string('device_id')->nullable();

    });
}

public function down()
{
    Schema::table('assets', function ($table) {

        $table->dropColumn([
            'device_name',
            'serial_no',
            'device_id'
        ]);

    });
}

    /**
     * Reverse the migrations.
     */
    
};
