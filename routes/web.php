<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Support\Facades\Route;

// Route::get('/',                [CharacterController::class, 'index']);
Route::get('/cek-object',      [CharacterController::class, 'cekObject']);
Route::get('/mass-alignment',  [CharacterController::class, 'massAlignment']);
Route::get('/mass-alignment2', [CharacterController::class, 'massAlignment2']);
Route::get('/update',          [CharacterController::class, 'update']);
Route::get('/update-where',    [CharacterController::class, 'updateWhere']);
Route::get('/mass-update',     [CharacterController::class, 'massUpdate']);
Route::get('/destroy',         [CharacterController::class, 'destroy']);
Route::get('/mass-delete',     [CharacterController::class, 'massDelete']);
Route::get('/all',             [CharacterController::class, 'all']);
Route::get('/all-view',        [CharacterController::class, 'allView']);
Route::get('/get-where',       [CharacterController::class, 'getWhere']);
Route::get('/test-where',      [CharacterController::class, 'testWhere']);
Route::get('/first',           [CharacterController::class, 'first']);
Route::get('/find',            [CharacterController::class, 'find']);
Route::get('/latest',          [CharacterController::class, 'latest']);
Route::get('/limit',           [CharacterController::class, 'limit']);
Route::get('/skip-take',       [CharacterController::class, 'skipTake']);
Route::get('/soft-double',     [CharacterController::class, 'softDouble']);
Route::get('/with-trashed',    [CharacterController::class, 'withTrashed']);
Route::get('/restore',         [CharacterController::class, 'restore']);
Route::get('/force-delete',    [CharacterController::class, 'forceDelete']);

Route::get('/insert',    [CharacterController::class, 'insert']);
Route::get('/delete',          [CharacterController::class, 'destroy']);
Route::get('/soft-delete',          [CharacterController::class, 'softDelete']);
Route::get('/select-view',          [CharacterController::class, 'selectView']);
Route::get('/get-view',          [CharacterController::class, 'getView']);
