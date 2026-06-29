<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetIssueController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ForgotPasswordController;



Route::get('/activity-logs', [ActivityLogController::class, 'index'])
    ->name('activity-logs.index');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/search', [SearchController::class, 'index'])
    ->name('search');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AssetController::class, 'dashboard']);
Route::resource('assets', AssetController::class);

Route::get('/assets/import', function () {
    return view('assets.import');
});

Route::post('/assets/import', [AssetController::class, 'import']);
Route::get('/assets/{asset}/edit',
    [AssetController::class, 'edit'])
    ->name('assets.edit');
Route::get('/issues/create', [AssetIssueController::class, 'create']);
Route::post('/issues/store', [AssetIssueController::class, 'store']);
Route::get('/issues', [AssetIssueController::class, 'index']);
Route::post('/issues/{issue}/return', [AssetIssueController::class, 'returnAsset']);
Route::get('/history', [AssetIssueController::class, 'history']);
Route::get('/assets/{id}/history',
    [AssetIssueController::class, 'assetHistory'])
    ->name('assets.history');

Route::get('/issues/{id}/return', [AssetIssueController::class, 'returnForm']);
Route::post('/issues/{id}/return', [AssetIssueController::class, 'returnAsset']);
Route::get('/issues/{id}/transfer', [AssetIssueController::class, 'transferForm']);
Route::post('/issues/{id}/transfer', [AssetIssueController::class, 'transfer']);
Route::get('/qr/{asset_code}', [AssetController::class, 'qrLookup']);
Route::get('/scanner', [AssetController::class, 'scanner']);
Route::get('/scan', [AssetController::class, 'scanPage']);
Route::get('/scan-lookup/{code}', [AssetController::class, 'scanLookup']);

use App\Http\Controllers\VerificationController;

Route::get('/verification', [VerificationController::class, 'index']);

Route::get('/verification/create', [VerificationController::class, 'create']);

Route::post('/verification/start', [VerificationController::class, 'start']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])
    ->name('users.destroy');

Route::post('/users/{id}/reset-password',
    [UserController::class, 'resetPassword'])
    ->name('users.reset-password');
        

Route::get(
    '/verification/scan/{id}',
    [VerificationController::class, 'scan']
);

Route::post(
    '/verification/scan-asset/{id}',
    [VerificationController::class, 'scanAsset']
);

Route::get(
'/verification/item/{id}/edit',
[VerificationController::class,'editItem']
);

Route::post(
'/verification/item/{id}/update',
[VerificationController::class,'updateItem']
);

Route::get(
'/verification/{id}/save',
[VerificationController::class,'saveVerification']
);

Route::get(
'/verification/{id}/pdf',
[VerificationController::class,'exportPdf']
);

Route::get(
'/verification/{id}/excel',
[VerificationController::class,'exportExcel']
);

Route::get(
'/verification/{id}/finish',
[VerificationController::class,'finishVerification']
);


Route::post(
    '/verification/{id}/finalize',
    [VerificationController::class, 'finalize']
);

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])
    ->name('search');


    Route::get('/assets/{id}/details', [AssetController::class, 'details'])
    ->name('assets.details');


Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])
    ->name('forgot.password');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->name('forgot.password.store');