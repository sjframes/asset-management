<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationItem extends Model
{
    protected $fillable = [

        'session_id',
        'asset_id',

        'asset_code',
        'asset_name',

        'employee_name',
        'employee_id',

        'department',
        'location',

        'status',
        'remarks',

        'scan_time'
    ];
}