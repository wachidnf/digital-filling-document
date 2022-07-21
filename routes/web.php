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
    Route::get('/delete-document', 'Controller@deleteDocument')->middleware(['auth'])->name('delete-document');
    Route::post('/save-detail-document', 'Controller@saveDetailDocument')->middleware(['auth'])->name('save-detail-document');

    Route::get('/lokasi', 'Controller@indexLokasi')->middleware(['auth'])->name('lokasi');
    Route::post('/save-lokasi', 'Controller@saveLokasi')->middleware(['auth'])->name('save-lokasi');
    Route::get('/delete-lokasi', 'Controller@deleteLokasi')->middleware(['auth'])->name('delete-lokasi');

    Route::get('/department', 'Controller@indexDepartment')->middleware(['auth'])->name('department');
    Route::post('/save-department', 'Controller@saveDepartment')->middleware(['auth'])->name('save-department');
    Route::get('/delete-department', 'Controller@deleteDepartment')->middleware(['auth'])->name('delete-department');
// });

require __DIR__.'/auth.php';
