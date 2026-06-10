<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginControllers;
use App\Http\Controllers\KreditControllers;
use App\Http\Controllers\AbsensiControllers;
use App\Http\Controllers\DebitControllers;
use App\Http\Controllers\CashFlowControllers;
use App\Http\Controllers\GajiControllers;   
use App\Http\Controllers\TransaksiControllers;

Route::get('/', function () {
    return view('welcome');
});

// 1. Route untuk MENAMPILKAN halaman login
Route::get('/login', function () {
    return view('login'); 
})->name('login');
Route::post('/login', [LoginControllers::class, 'loginWeb'])->name('login.post');

Route::get('/dashboard', [CashFlowControllers::class, 'indexDashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/logout', [LoginControllers::class, 'logout'])->name('logout');

// ==================== ROUTE CASHFLOW ====================
Route::get('/cashflow/page', [CashFlowControllers::class, 'indexCashflow'])->name('admin.cashflow');
Route::get('/cashflow/pdf', [CashFlowControllers::class, 'downloadPDF'])->name('cashflow.pdf');

// ==================== ROUTE KREDIT ====================
Route::get('/cashflow/kredit', [KreditControllers::class, 'indexWeb'])->name('admin.kredit');
Route::get('/kredit/create', [KreditControllers::class, 'create'])->name('kredit.create');
Route::post('/kredit/store', [KreditControllers::class, 'store'])->name('kredit.store');
Route::get('/cashflow/kredit/{id}/edit', [KreditControllers::class, 'edit'])->name('admin.kredit.edit');
Route::put('/cashflow/kredit/{id}', [KreditControllers::class, 'updateWeb'])->name('admin.kredit.update'); // Tetap gunakan ini
Route::delete('/admin/kredit/{id}', [KreditControllers::class, 'destroy'])->name('admin.kredit.destroy');
// Baris duplikat admin.kredit.update yang memicu eror sudah dihapus dari sini

// ==================== ROUTE DEBIT ====================
Route::get('/cashflow/debit', [DebitControllers::class, 'indexWeb'])->name('admin.debit');
Route::get('/debit/create', [DebitControllers::class, 'create'])->name('debit.create');
Route::post('/debit/store', [DebitControllers::class, 'store'])->name('debit.store');
Route::delete('/admin/debit/{id}', [DebitControllers::class, 'destroy'])->name('admin.debit.destroy');
Route::put('/admin/debit/update/{id}', [DebitControllers::class, 'updateWeb'])->name('admin.debit.update');

// ==================== ROUTE ABSENSI WEB ====================
Route::get('/absensi/page', [AbsensiControllers::class, 'indexWeb'])->name('absensi.page');
Route::get('/absensi/{id}/edit', [AbsensiControllers::class, 'edit'])->name('absensi.edit');
Route::put('/absensi/{id}', [AbsensiControllers::class, 'update'])->name('absensi.update');

// ==================== ROUTE GAJI ====================
Route::get('/gaji/page', [GajiControllers::class, 'indexWeb'])->name('gaji.page');
Route::post('/gaji/generate', [GajiControllers::class, 'generateGaji'])->name('gaji.generate');
Route::put('/gaji/konfirmasi/{id}', [GajiControllers::class, 'konfirmasiAdmin'])->name('gaji.konfirmasi');

// ==================== ROUTE TRANSAKSI ====================
Route::get('transaksi/page', [TransaksiControllers::class, 'index'])->name('transaksi.page');
Route::post('transaksi/page', [TransaksiControllers::class, 'store'])->name('transaksi.store');
