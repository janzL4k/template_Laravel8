<?php
namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Buku_PinjamanController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Dashboard.dashboard', [
        "title"=> "Dashboard"
    ]);
});




// route buku
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/buku', [BukuController::class, 'store'])->name('buku.buku.store');
// Route::get('/buku/edit', [BukuController::class, 'edit'])->name('buku.edit');
// Route::put('/buku/{id}', [BukuController::class, 'buku.update']);

// Route::post('/buku/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/buku/update', [BukuController::class,'update'])->name('buku.buku.update');

Route::delete('/buku/{id}', [KategoriController::class, 'delete'])->name('buku.buku.delete');


// -bukupinjaman
Route::get('/buku-pinjam',[Buku_PinjamanController::class, 'index']);
// Route::get('/post/create','PostController@create');
// Route::post('/post','PostController@store');
// Route::get('/post/{id}','PostController@show');
// Route::get('/post/{id}/edit','PostController@edit');
// Route::put('/post/{id}','PostController@update');
// Route::delete('/post/{id}','PostController@destroy');


//kateogri
Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
Route::post('/post', [KategoriController::class, 'store'])->name('kategori.kategori.store');
Route::post('/kategori/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.kategori.edit');
Route::put('/kategori/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.kategori.update');
Route::delete('/kategori/kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.kategori.delete');
