<?php

namespace App\Imports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssetsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Asset([
            'asset_code' => $row['code'] ?? null,
            'asset_name' => $row['name'] ?? null,
            'category'   => $row['category'] ?? null,
            'quantity'   => $row['no'] ?? 1,
            'location'   => $row['location'] ?? null,
            'remarks'    => $row['remarks'] ?? null,
            'floor_no'   => $row['floor_no'] ?? null,
            'department' => $row['department'] ?? null,
        ]);
    }
}