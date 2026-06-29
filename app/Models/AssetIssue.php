<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetIssue extends Model
{
    protected $fillable = [
        'asset_id',
        'employee_name',
        'employee_id',
        'department',
        'issue_date',
        'expected_return',
        'return_date',
        'remarks',
        'status'
    ];

    public function asset()
{
    return $this->belongsTo(Asset::class);
}
}