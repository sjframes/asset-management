<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationSession extends Model
{
    protected $fillable = [

        'verification_no',
        'verification_name',
        'verification_date',
        'verified_by',
        'status',
        'total_scanned',
        'remarks'
    ];
}