<?php

use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Games list page
Route::get('/games', function () {
    return view('games.index');
})->name('games.index');

// Game pages (still accessible)
Route::get('/games/abjad', function () {
    return view('games.abjad');
})->name('games.abjad');

Route::get('/games/angka', function () {
    return view('games.angka');
})->name('games.angka');

Route::get('/games/susun-huruf', function () {
    return view('games.susun-huruf');
})->name('games.susun-huruf');

Route::get('/games/warna', function () {
    return view('games.warna');
})->name('games.warna');

// Belajar Yuk! - Main learning page
Route::get('/belajar', function () {
    return view('belajar.index');
})->name('belajar.index');

// Belajar module
Route::get('/belajar/halaman-1', function () {
    return view('belajar.halaman-1.index');
})->name('belajar.halaman-1');

Route::get('/belajar/halaman-2', function () {
    return view('belajar.halaman-2.index');
})->name('belajar.halaman-2');

Route::get('/belajar/halaman-3', function () {
    return view('belajar.halaman-3.index');
})->name('belajar.halaman-3');

Route::get('/belajar/halaman-4', function () {
    return view('belajar.halaman-4.index');
})->name('belajar.halaman-4');

Route::get('/belajar/halaman-5', function () {
    return view('belajar.halaman-5.index');
})->name('belajar.halaman-5');

Route::get('/belajar/halaman-6', function () {
    return view('belajar.halaman-6.index');
})->name('belajar.halaman-6');

Route::get('/belajar/halaman-7', function () {
    return view('belajar.halaman-7.index');
})->name('belajar.halaman-7');

Route::get('/belajar/halaman-8', function () {
    return view('belajar.halaman-8.index');
})->name('belajar.halaman-8');

Route::get('/belajar/halaman-9', function () {
    return view('belajar.halaman-9.index');
})->name('belajar.halaman-9');

Route::get('/belajar/halaman-10', function () {
    return view('belajar.halaman-10.index');
})->name('belajar.halaman-10');

Route::get('/belajar/halaman-11', function () {
    return view('belajar.halaman-11.index');
})->name('belajar.halaman-11');

Route::get('/belajar/halaman-12', function () {
    return view('belajar.halaman-12.index');
})->name('belajar.halaman-12');

Route::get('/belajar/halaman-13', function () {
    return view('belajar.halaman-13.index');
})->name('belajar.halaman-13');

Route::get('/belajar/halaman-14', function () {
    return view('belajar.halaman-14.index');
})->name('belajar.halaman-14');

Route::get('/belajar/halaman-15', function () {
    return view('belajar.halaman-15.index');
})->name('belajar.halaman-15');

Route::get('/belajar/halaman-16', function () {
    return view('belajar.halaman-16.index');
})->name('belajar.halaman-16');

Route::get('/belajar/halaman-17', function () {
    return view('belajar.halaman-17.index');
})->name('belajar.halaman-17');

Route::get('/belajar/halaman-18', function () {
    return view('belajar.halaman-18.index');
})->name('belajar.halaman-18');

Route::get('/belajar/halaman-19', function () {
    return view('belajar.halaman-19.index');
})->name('belajar.halaman-19');

Route::get('/belajar/halaman-20', function () {
    return view('belajar.halaman-20.index');
})->name('belajar.halaman-20');

Route::get('/belajar/halaman-21', function () {
    return view('belajar.halaman-21.index');
})->name('belajar.halaman-21');

Route::get('/belajar/halaman-22', function () {
    return view('belajar.halaman-22.index');
})->name('belajar.halaman-22');

Route::get('/belajar/halaman-23', function () {
    return view('belajar.halaman-23.index');
})->name('belajar.halaman-23');

Route::get('/belajar/halaman-24', function () {
    return view('belajar.halaman-24.index');
})->name('belajar.halaman-24');

Route::get('/belajar/halaman-25', function () {
    return view('belajar.halaman-25.index');
})->name('belajar.halaman-25');

Route::get('/belajar/halaman-26', function () {
    return view('belajar.halaman-26.index');
})->name('belajar.halaman-26');

Route::get('/belajar/halaman-27', function () {
    return view('belajar.halaman-27.index');
})->name('belajar.halaman-27');

Route::get('/belajar/halaman-28', function () {
    return view('belajar.halaman-28.index');
})->name('belajar.halaman-28');

Route::get('/belajar/halaman-29', function () {
    return view('belajar.halaman-29.index');
})->name('belajar.halaman-29');

Route::get('/belajar/halaman-30', function () {
    return view('belajar.halaman-30.index');
})->name('belajar.halaman-30');

Route::get('/belajar/halaman-31', function () {
    return view('belajar.halaman-31.index');
})->name('belajar.halaman-31');

Route::get('/belajar/halaman-32', function () {
    return view('belajar.halaman-32.index');
})->name('belajar.halaman-32');

Route::get('/belajar/halaman-33', function () {
    return view('belajar.halaman-33.index');
})->name('belajar.halaman-33');
