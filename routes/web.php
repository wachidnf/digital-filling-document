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

Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', function () {
    // return view('index3');
    return redirect("document");
})->middleware(['auth'])->name('dashboard');

// Route::get('/document', function () {
//     return view('index_document');
// })->middleware(['auth'])->name('document');

// Route::group(['middleware' => 'auth'], function()
// {
    Route::get('/document', 'Controller@indexDocument')->middleware(['auth'])->name('document');
    Route::get('/create-document', 'Controller@createDocument')->middleware(['auth'])->name('create-document');
    Route::get('/edit-document', 'Controller@editDocument')->middleware(['auth'])->name('edit-document');
    Route::post('/save-document', 'Controller@saveDocument')->middleware(['auth'])->name('save-document');
    Route::post('/update-document', 'Controller@updateDocument')->middleware(['auth'])->name('update-document');
    Route::get('/view-document', 'Controller@viewDocument')->middleware(['auth'])->name('view-document');
    Route::get('/delete-document', 'Controller@deleteDocument')->middleware(['auth'])->name('delete-document');
    Route::post('/save-detail-document', 'Controller@saveDetailDocument')->middleware(['auth'])->name('save-detail-document');

    Route::get('/lokasi', 'Controller@indexLokasi')->middleware(['auth'])->name('lokasi');
    Route::post('/save-lokasi', 'Controller@saveLokasi')->middleware(['auth'])->name('save-lokasi');
    Route::get('/delete-lokasi', 'Controller@deleteLokasi')->middleware(['auth'])->name('delete-lokasi');
    Route::post('/list-lokasi', 'Controller@listLokasi')->middleware(['auth'])->name('list-lokasi');
    Route::post('/update-lokasi', 'Controller@updateLokasi')->middleware(['auth'])->name('update-lokasi');
    Route::get('/edit-lokasi', 'Controller@editLokasi')->middleware(['auth'])->name('edit-lokasi');

    Route::get('/department', 'Controller@indexDepartment')->middleware(['auth'])->name('department');
    Route::post('/save-department', 'Controller@saveDepartment')->middleware(['auth'])->name('save-department');
    Route::get('/delete-department', 'Controller@deleteDepartment')->middleware(['auth'])->name('delete-department');
    Route::post('/list-department', 'Controller@listDepartment')->middleware(['auth'])->name('list-department');
    Route::post('/update-department', 'Controller@updateDepartment')->middleware(['auth'])->name('update-department');

    Route::get('/view-document-direct', 'Controller@viewDocument')->name('view-document');
// });

require __DIR__.'/auth.php';
