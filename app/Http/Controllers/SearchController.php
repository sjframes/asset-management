<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;

        $assets = Asset::where('asset_name', 'like', "%{$query}%")
    ->orWhere('asset_code', 'like', "%{$query}%")
    ->orWhere('serial_no', 'like', "%{$query}%")
    ->orWhere('device_name', 'like', "%{$query}%")
    ->orWhere('device_id', 'like', "%{$query}%")
    ->orWhere('assigned_to', 'like', "%{$query}%")
    ->orWhere('brand', 'like', "%{$query}%")
    ->orWhere('model', 'like', "%{$query}%")
    ->orWhere('department', 'like', "%{$query}%")
    ->orWhere('location', 'like', "%{$query}%")
    ->get();

        $users = User::where('name', 'like', "%{$query}%")
            ->orWhere('employee_id', 'like', "%{$query}%")
            ->orWhere('username', 'like', "%{$query}%")
            ->get();

        return view(
            'search.index',
            compact('query', 'assets', 'users')
        );
    }
}