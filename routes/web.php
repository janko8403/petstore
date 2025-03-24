<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

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


Route::get('/', [PetController::class, 'index']);
Route::get('/add', [PetController::class, 'add']);
Route::post('/add-pet', [PetController::class, 'addPet']);
Route::get('/edit', [PetController::class, 'editPetForm']);
Route::post('/edit', [PetController::class, 'editPet']);
Route::post('/delete', [PetController::class, 'deletePet']);