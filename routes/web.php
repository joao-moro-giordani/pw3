<?php

use App\Http\Controllers\KeepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/keep', [KeepController::class, 'index'])->name('keep.index');

Route::get('/keep/create', [KeepController::class, 'create'])->name('keep.create');

Route::post('/keep/create', [KeepController::class, 'create']);

Route::get('/keep/edit/{nota}', [KeepController::class, 'edit'])->name('keep.edit');

Route::put('/keep/edit/{nota}', [KeepController::class, 'edit']);

Route::get('/keep/delete/{nota}', [KeepController::class, 'delete'])->name('keep.delete');

Route::delete('/keep/delete/{nota}', [KeepController::class, 'delete']);