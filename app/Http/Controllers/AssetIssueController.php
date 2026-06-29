<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetIssue;

class AssetIssueController extends Controller
{
    public function create(Request $request)
{
    $selectedAsset = null;

    if ($request->asset_id) {
        $selectedAsset = Asset::find($request->asset_id);
    }

    $assets = Asset::where('status','Available')->get();

    return view(
        'issues.create',
        compact('assets','selectedAsset')
    );
}

    public function store(Request $request)
{
    AssetIssue::create([
        'asset_id' => $request->asset_id,
        'employee_name' => $request->employee_name,
        'employee_id' => $request->employee_id,
        'department' => $request->department,
        'issue_date' => $request->issue_date,
        'expected_return' => $request->expected_return,
        'remarks' => $request->remarks,
        'status' => 'Active'
    ]);

    $asset = Asset::find($request->asset_id);

    $asset->update([
        'status' => 'Issued'
    ]);

    return redirect('/assets')
        ->with('success', 'Asset Issued Successfully');
}

public function index()
{
    $issues = AssetIssue::where('status', 'Active')->get();

    return view('issues.index', compact('issues'));
}

public function returnAsset($id)
{
    $issue = AssetIssue::findOrFail($id);

    $issue->update([
        'status' => 'Returned',
        'return_date' => now()->toDateString()
    ]);

    Asset::where('id', $issue->asset_id)
        ->update(['status' => 'Available']);

    return redirect('/issues')
        ->with('success', 'Asset returned successfully');
}

public function history()
{
    $issues = AssetIssue::with('asset')
        ->latest()
        ->get();

    return view('issues.history', compact('issues'));
}

public function returnForm($id)
{
    $issue = AssetIssue::findOrFail($id);

    return view('issues.return', compact('issue'));
}

public function transferForm($id)
{
    $issue = AssetIssue::findOrFail($id);

    return view('issues.transfer', compact('issue'));
}

public function transfer(Request $request, $id)
{
    $issue = AssetIssue::findOrFail($id);

    // Close current assignment
    $issue->update([
        'status' => 'Transferred',
        'return_date' => now()->toDateString(),
    ]);

    // Create new assignment
    AssetIssue::create([
        'asset_id' => $issue->asset_id,
        'employee_name' => $request->employee_name,
        'employee_id' => $request->employee_id,
        'department' => $request->department,
        'issue_date' => now()->toDateString(),
        'expected_return' => $issue->expected_return,
        'remarks' => 'Transferred from '.$issue->employee_name,
        'status' => 'Active',
    ]);

    return redirect('/issues')
        ->with('success', 'Asset transferred successfully');
}

public function assetHistory($id)
{
    $issues = AssetIssue::with('asset')
        ->where('asset_id', $id)
        ->latest()
        ->get();

    $asset = Asset::findOrFail($id);

    return view('issues.asset-history', compact('asset', 'issues'));
}
}