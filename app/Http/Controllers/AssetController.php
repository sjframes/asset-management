<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetIssue;
use App\Imports\AssetsImport;
use Maatwebsite\Excel\Facades\Excel;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $query = Asset::query();

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where('asset_code', 'like', "%{$search}%")
              ->orWhere('brand', 'like', "%{$search}%")
              ->orWhere('model', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%")
              ->orWhere('department', 'like', "%{$search}%");
    }

    $assets = $query->latest()->get();

    return view('assets.index', compact('assets'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('assets.create');
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    \App\Models\Asset::create([
        'asset_code' => $request->asset_code,
    'qr_value' => $request->qr_value,
    'asset_name' => $request->asset_name,
    'category' => $request->category,
    'brand' => $request->brand,
    'model' => $request->model,
    'device_name' => $request->device_name,
    'serial_no' => $request->serial_no,
    'device_id' => $request->device_id,

    'quantity' => $request->quantity,
    'location' => $request->location,
    'remarks' => $request->remarks,
    'floor_no' => $request->floor_no,
    'department' => $request->department,
    'status' => $request->status,
    'purchase_date' => $request->purchase_date,
    'purchase_cost' => $request->purchase_cost,
    'supplier'      => $request->supplier,
    'invoice_no'    => $request->invoice_no,
    ]);

    return redirect('/assets')
    ->with('success', 'Asset added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(
        new AssetsImport,
        $request->file('file')
    );

    return redirect('/assets')
        ->with('success', 'Assets Imported Successfully');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $asset = Asset::findOrFail($id);

    $categories = [
        'Desktop',
        'Laptop',
        'Printer',
        'Scanner',
        'Mobile',
        'Network Device',
        'Furniture',
        'Other'
    ];

    $departments = [
        'MD OFFICE',
        'ACCOUNTS',
        'HR',
        'SALES',
        'MARKETING',
        'PURCHASE',
        'WAREHOUSE',
        'OPERATIONS',
        'IT'
    ];

    return view('assets.edit', compact(
        'asset',
        'categories',
        'departments'
    ));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
{
    $asset->update([
        'asset_code' => $request->asset_code,
        'qr_value' => $request->qr_value,
        'asset_name' => $request->asset_name,
        'category' => $request->category,
        'brand' => $request->brand,
        'model' => $request->model,
        'device_name' => $request->device_name,
        'serial_no' => $request->serial_no,
        'device_id' => $request->device_id,
        'location' => $request->location,
        'quantity' => $request->quantity,
        'department' => $request->department,
        'floor_no' => $request->floor_no,
        'status' => $request->status,
        'purchase_date' => $request->purchase_date,
        'purchase_cost' => $request->purchase_cost,
        'supplier'      => $request->supplier,
        'invoice_no'    => $request->invoice_no,
    ]);

    return redirect('/assets')
    ->with('success', 'Asset updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
{
    $asset->delete();

    return redirect('/assets')
        ->with('success', 'Asset deleted successfully');
}
public function dashboard()
{
    $totalAssets = Asset::count();

    $totalAssetValue = Asset::sum('purchase_cost');

    $availableAssets = Asset::where('status', 'Available')->count();

    $issuedAssets = Asset::where('status', 'Issued')->count();

    $repairAssets = Asset::where('status', 'Under Repair')->count();

    $returnedAssets = AssetIssue::where('status', 'Returned')->count();

    $transferredAssets = AssetIssue::where('status', 'Transferred')->count();


    $damagedAssets = Asset::where('status', 'Damaged')->count();

    $disposedAssets = Asset::where('status', 'Disposed')->count();

    $recentActivities = AssetIssue::latest()
                    ->take(10)
                    ->get();

    $departmentSummary =
Asset::selectRaw('department, count(*) as total')
    ->groupBy('department')
    ->get(); 
    
    $categorySummary =
Asset::selectRaw('category, count(*) as total')
    ->groupBy('category')
    ->get();

    return view('assets.dashboard', compact(
        'totalAssets',
        'totalAssetValue',
        'availableAssets',
        'issuedAssets',
        'repairAssets',
        'returnedAssets',
        'transferredAssets',
        'damagedAssets',
        'disposedAssets',
        'recentActivities',
        'departmentSummary',
        'categorySummary'
    ));
}

public function qrLookup($asset_code)
{
    $asset = \App\Models\Asset::where('asset_code', $asset_code)
        ->firstOrFail();

    $currentIssue = \App\Models\AssetIssue::where('asset_id', $asset->id)
        ->where('status', 'Active')
        ->latest()
        ->first();

    return view('assets.qr-lookup', compact(
        'asset',
        'currentIssue'
    ));
}

public function scanner()
{
    return view('assets.scanner');
}

public function scanPage()
{
    return view('assets.scan');
}

public function scanLookup($code)
{
    $asset = Asset::where('asset_code', $code)->first();

    if (!$asset) {
        return redirect('/scan')
            ->with('error', 'Asset not found');
    }

    return redirect('/qr/' . $asset->asset_code);
}


public function details($id)
{
    $asset = Asset::findOrFail($id);

    return view('assets.details', compact('asset'));
}


}
