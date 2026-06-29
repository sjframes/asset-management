<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
    'asset_code',
    'qr_value',
    'asset_name',
    'category',
    'brand',
    'model',
    'device_name',
    'serial_no',
    'device_id',
    'quantity',
    'location',
    'remarks',
    'floor_no',
    'department',
    'status',
    'purchase_date',
    'purchase_cost',
    'supplier',
    'invoice_no'
];


}
