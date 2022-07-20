<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('index3');
})->middleware(['auth'])->name('dashboard');

// Route::get('/document', function () {
//     return view('index_document');
// })->middleware(['auth'])->name('document');

// Route::group(['middleware' => 'auth'], function()
// {
    Route::get('/document', 'Controller@indexDocument')->middleware(['auth'])->name('document');
    Route::get('/create-document', 'Controller@createDocument')->middleware(['auth'])->name('create-document');
    Route::post('/save-document', 'Controller@saveDocument')->middleware(['auth'])->name('save-document');
    Route::get('/view-document', 'Controller@viewDocument')->middleware(['auth'])->name('view-document');
    Route::post('/save-detail-document', 'Controller@saveDetailDocument')->middleware(['auth'])->name('save-detail-document');

    Route::get('/lokasi', 'Controller@indexLokasi')->middleware(['auth'])->name('lokasi');

    Route::get('/department', 'Controller@indexDepartment')->middleware(['auth'])->name('department');
// });

require __DIR__.'/auth.php';
