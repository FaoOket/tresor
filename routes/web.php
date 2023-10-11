<?php
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', [Index::class,'afficher'] )->name('index');
Route::get('/create', [Index::class,'create'] )->name('create');
Route::post('/create', [Index::class, 'store'])->name('enregistrer');
Route::delete('/supprimer/{id}', [Index::class, 'supprimer'])->name('supprimer');

Route::put('/mettreAJour/{id}', [Index::class, 'mettreAJour'])->name('mettreAJour');
Route::get('/modifier/edit/{id}', [Index::class, 'edit'])->name('edit');
Route::get('/get-oeuvre/{id}', [Index::class, 'getOeuvre'])->name('get-oeuvre');

