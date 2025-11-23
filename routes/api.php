<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\AlatController;
use App\Http\Controllers\Api\AlatRusakController;
use App\Http\Controllers\Api\BahanController;
use App\Http\Controllers\Api\DataLaporan;
use App\Http\Controllers\Api\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ===== Auth ====== //
Route::post('/register', [AdminAuthController::class, 'register']);
Route::post('/login', [AdminAuthController::class, 'login']);

// ===== Form ====== //
Route::get('/form', [FormController::class, 'getForm']);
Route::post('/form', [FormController::class, 'submitForm']);
Route::get('/alat-form', [FormController::class, 'getAlat']);
Route::get('/bahan-form', [FormController::class, 'getBahan']);
Route::post('/data-laporan-terkirim', [FormController::class, 'submitDataLaporan']);

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // ===== Alat ====== //
    Route::get('/alat', [AlatController::class, 'getAlat']);
    Route::post('/alat', [AlatController::class, 'createAlat']);
    Route::put('/alat/{id}', [AlatController::class, 'updateAlat']);
    Route::delete('/alat/{id}', [AlatController::class, 'deleteAlat']);

    // ===== Bahan ====== //
    Route::get('/bahan', [BahanController::class, 'getBahan']);
    Route::post('/bahan', [BahanController::class, 'createBahan']);
    Route::put('/bahan/{id}', [BahanController::class, 'updateBahan']);
    Route::delete('/bahan/{id}', [BahanController::class, 'deleteBahan']);

    // ===== Alat Rusak ====== //
    Route::get('/alat-rusak', [AlatRusakController::class, 'getAlatRusak']);
    Route::post('/alat-rusak', [AlatRusakController::class, 'createAlatRusak']);
    Route::put('/alat-rusak/{id}', [AlatRusakController::class, 'updateAlatRusak']);
    Route::delete('/alat-rusak/{id}', [AlatRusakController::class, 'deleteAlatRusak']);
    Route::get('/alat-rusak/export-pdf', [AlatRusakController::class, 'exportPdf']);


    // ===== Alat Rusak ====== //
    Route::get('/data-laporan', [DataLaporan::class, 'getDataLaporan']);
    Route::get('/atur-peminjaman', [DataLaporan::class, 'getAturPeminjaman']);
    Route::post('/data-laporan', [DataLaporan::class, 'submitDataLaporan']);
    Route::put('/data-laporan/{id}', [DataLaporan::class, 'updateDataLaporan']);
    Route::delete('/data-laporan/{id}', [DataLaporan::class, 'deleteDataLaporan']);
    Route::get('/data-laporan/export-pdf', [DataLaporan::class, 'exportPdf']);
    Route::get('/data-laporan/export-excel', [DataLaporan::class, 'exportExcel']);

    // ===== Logout ====== //
    Route::post('/logout', [AdminAuthController::class, 'logout']);
});
