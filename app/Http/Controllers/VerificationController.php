<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerificationSession;
use App\Models\Asset;
use App\Models\VerificationItem;

class VerificationController extends Controller
{
    public function index()
    {
        $sessions = VerificationSession::latest()->get();

        return view('verification.index', compact('sessions'));
    }

    public function create()
    {
        return view('verification.create');
    }

    public function start(Request $request)
    {
        $session = VerificationSession::create([

            'verification_no' =>
                'VER' . now()->format('YmdHis'),

            'verification_name' =>
                $request->verification_name,

            'verification_date' =>
                $request->verification_date,

            'verified_by' =>
                $request->verified_by,

            'remarks' =>
                $request->remarks
        ]);

        return redirect('/verification/scan/' . $session->id);
    }

    public function scan($id)
{
    $session =
        VerificationSession::findOrFail($id);

    $items =
        VerificationItem::where(
            'session_id',
            $id
        )
        ->latest()
        ->get();

    return view(
        'verification.scan',
        compact(
            'session',
            'items'
        )
    );
}

public function scanAsset(
    Request $request,
    $id
)
{
    $qrData = trim(
        $request->qr_code
    );

    $assetCode =
        explode(' ', $qrData)[0];

    $asset =
        Asset::where(
            'asset_code',
            $assetCode
        )->first();

    if (!$asset)
    {
        return back();
    }

    VerificationItem::create([

        'session_id' => $id,

        'asset_id' =>
            $asset->id,

        'asset_code' =>
            $asset->asset_code,

        'asset_name' =>
            $asset->asset_name,

        'employee_name' =>
            $asset->employee_name,

        'employee_id' =>
            $asset->employee_id,

        'department' =>
            $asset->department,

        'location' =>
            $asset->location,

        'status' =>
            'Verified',

        'scan_time' =>
            now()

    ]);

    VerificationSession::where(
        'id',
        $id
    )->increment(
        'total_scanned'
    );

    return back();
}

public function editItem($id)
{
    $item = VerificationItem::findOrFail($id);

    return view(
        'verification.edit-item',
        compact('item')
    );
}

public function updateItem(Request $request,$id)
{
    $item = VerificationItem::findOrFail($id);

    $item->employee_name =
        $request->employee_name;

    $item->department =
        $request->department;

    $item->save();

    return redirect()->back()
            ->with('success','Updated');
}


public function finalize($id)
{
    $session = VerificationSession::findOrFail($id);

    $session->status = 'Completed';

    $session->save();

    return redirect()
        ->back()
        ->with('success', 'Verification Saved Successfully');
}


}