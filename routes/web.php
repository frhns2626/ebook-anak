<?php

use App\Http\Controllers\Halaman1;
use App\Http\Controllers\Halaman10;
use App\Http\Controllers\Halaman11;
use App\Http\Controllers\Halaman12;
use App\Http\Controllers\Halaman13;
use App\Http\Controllers\Halaman14;
use App\Http\Controllers\Halaman15;
use App\Http\Controllers\Halaman16;
use App\Http\Controllers\Halaman17;
use App\Http\Controllers\Halaman18;
use App\Http\Controllers\Halaman19;
use App\Http\Controllers\Halaman2;
use App\Http\Controllers\Halaman20;
use App\Http\Controllers\Halaman21;
use App\Http\Controllers\Halaman22;
use App\Http\Controllers\Halaman23;
use App\Http\Controllers\Halaman24;
use App\Http\Controllers\Halaman25;
use App\Http\Controllers\Halaman26;
use App\Http\Controllers\Halaman27;
use App\Http\Controllers\Halaman28;
use App\Http\Controllers\Halaman29;
use App\Http\Controllers\Halaman3;
use App\Http\Controllers\Halaman30;
use App\Http\Controllers\Halaman31;
use App\Http\Controllers\Halaman32;
use App\Http\Controllers\Halaman33;
use App\Http\Controllers\Halaman4;
use App\Http\Controllers\Halaman5;
use App\Http\Controllers\Halaman6;
use App\Http\Controllers\Halaman7;
use App\Http\Controllers\Halaman8;
use App\Http\Controllers\Halaman9;
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
    return view('index');
})->name('belajar.index');

Route::get('/book', function () {
    return view('book');
})->name('test.index');

// Belajar module
Route::get('/belajar/cover', fn () => view('pertama.cover'))->name('pertama.cover');
Route::get('/belajar/kata-pengantar', fn () => view('pertama.kata-pengantar'))->name('pertama.kata-pengantar');
Route::get('/belajar/petujuk-penggunaan', fn () => view('pertama.petunjuk-penggunaan'))->name('pertama.petujuk-penggunaan');
Route::get('/belajar/penutupan', fn () => view('pertama.penutupan'))->name('belajar.penutupan');

Route::get('/belajar/abc', fn () => view('abc'))->name('belajar.abc');
Route::get('/belajar/temukan-suku-kata', fn () => view('temukan-suku-kata'))->name('belajar.temukan-suku-kata');
Route::get('/belajar/aiueo', fn () => view('aiueo'))->name('belajar.aiueo');
Route::get('/belajar/ayo-coba-baca', fn () => view('ayo-coba-baca'))->name('belajar.ayo-coba-baca');
Route::get('/belajar/huruf-objek', fn () => view('pertama.huruf-objek'))->name('belajar.huruf-objek');

Route::get('/belajar/halaman-1', [Halaman1::class, 'index'])->name('belajar.halaman-1');
Route::get('/belajar/halaman-2', [Halaman2::class, 'index'])->name('belajar.halaman-2'); // sudah
Route::get('/belajar/halaman-3', [Halaman3::class, 'index'])->name('belajar.halaman-3'); // sudah
Route::get('/belajar/halaman-4', [Halaman4::class, 'index'])->name('belajar.halaman-4'); // sudah
Route::get('/belajar/halaman-5', [Halaman5::class, 'index'])->name('belajar.halaman-5'); // sudah
Route::get('/belajar/halaman-6', [Halaman6::class, 'index'])->name('belajar.halaman-6'); // sudah
// Route::get('/belajar/halaman-7', [SusunHurufController::class, 'index'])->name('belajar.halaman-7');
Route::get('/belajar/halaman-7', [Halaman7::class, 'index'])->name('belajar.halaman-7'); // sudah
Route::get('/belajar/halaman-8', [Halaman8::class, 'index'])->name('belajar.halaman-8'); // sudah
Route::get('/belajar/halaman-9', [Halaman9::class, 'index'])->name('belajar.halaman-9'); // sudah
Route::get('/belajar/halaman-10', [Halaman10::class, 'index'])->name('belajar.halaman-10'); // sudah
Route::get('/belajar/halaman-11', [Halaman11::class, 'index'])->name('belajar.halaman-11'); // sudah
Route::get('/belajar/halaman-12', [Halaman12::class, 'index'])->name('belajar.halaman-12'); // sudah
Route::get('/belajar/halaman-13', [Halaman13::class, 'index'])->name('belajar.halaman-13'); // sudah
Route::get('/belajar/halaman-14', [Halaman14::class, 'index'])->name('belajar.halaman-14'); // ----------- eng sudah
Route::get('/belajar/halaman-15', [Halaman15::class, 'index'])->name('belajar.halaman-15'); // sudah
Route::get('/belajar/halaman-16', [Halaman16::class, 'index'])->name('belajar.halaman-16'); // sudah
Route::get('/belajar/halaman-17', [Halaman17::class, 'index'])->name('belajar.halaman-17'); // sudah
Route::get('/belajar/halaman-18', [Halaman18::class, 'index'])->name('belajar.halaman-18'); // sudah
Route::get('/belajar/halaman-19', [Halaman19::class, 'index'])->name('belajar.halaman-19'); // sudah
Route::get('/belajar/halaman-20', [Halaman20::class, 'index'])->name('belajar.halaman-20'); // sudah
Route::get('/belajar/halaman-21', [Halaman21::class, 'index'])->name('belajar.halaman-21'); // -----------  eng sudah
Route::get('/belajar/halaman-22', [Halaman22::class, 'index'])->name('belajar.halaman-22'); // sudah
Route::get('/belajar/halaman-23', [Halaman23::class, 'index'])->name('belajar.halaman-23'); // sudah
Route::get('/belajar/halaman-24', [Halaman24::class, 'index'])->name('belajar.halaman-24'); // -----------  eng belum
Route::get('/belajar/halaman-25', [Halaman25::class, 'index'])->name('belajar.halaman-25'); // sudah
Route::get('/belajar/halaman-26', [Halaman26::class, 'index'])->name('belajar.halaman-26'); // sudah
Route::get('/belajar/halaman-27', [Halaman27::class, 'index'])->name('belajar.halaman-27'); // sudah
Route::get('/belajar/halaman-28', [Halaman28::class, 'index'])->name('belajar.halaman-28'); // sudah
Route::get('/belajar/halaman-29', [Halaman29::class, 'index'])->name('belajar.halaman-29'); // sudah
Route::get('/belajar/halaman-30', [Halaman30::class, 'index'])->name('belajar.halaman-30'); // sudah
Route::get('/belajar/halaman-31', [Halaman31::class, 'index'])->name('belajar.halaman-31'); // sudah
Route::get('/belajar/halaman-32', [Halaman32::class, 'index'])->name('belajar.halaman-32'); // -----------  eng belum
Route::get('/belajar/halaman-33', [Halaman33::class, 'index'])->name('belajar.halaman-33'); // sudah
