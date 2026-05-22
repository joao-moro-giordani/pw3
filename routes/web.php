<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return "Hello World!";
});

Route::get('/num/{n}', function($n) {
    return 'Número: ' . $n;
});

Route::get('/calc/{n1}/{n2}', function($n1, $n2) {
    return "Cálculo: " . $n1 + $n2;
});