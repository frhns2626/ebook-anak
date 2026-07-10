<?php

use Illuminate\Support\Facades\Route;

// Home page with 3D book hero
Route::get('/', function () {
    $books = \App\Models\Book::with('category')->active()->get();
    return view('home', compact('books'));
})->name('home');

// Ebook catalog for kindergarten children
Route::get('/ebooks', function () {
    $books = \App\Models\Book::with('category')->active()->get();
    $categories = \App\Models\Category::all();
    return view('ebooks.index', compact('books', 'categories'));
})->name('ebooks.index');

// Ebook detail page
Route::get('/ebooks/{slug}', function ($slug) {
    $book = \App\Models\Book::with(['category', 'chapters'])->where('slug', $slug)->firstOrFail();
    return view('ebooks.show', compact('book'));
})->name('ebooks.show');

// Educational games for kindergarten children
Route::get('/games', function () {
    return view('games.index');
})->name('games.index');

// Ebook reading page with page flip
Route::get('/ebooks/{slug}/read', function ($slug) {
    $book = \App\Models\Book::with(['category', 'chapters'])->where('slug', $slug)->firstOrFail();
    return view('ebooks.read', compact('book'));
})->name('ebooks.read');

// Full page: Belajar Huruf Abjad A-Z
Route::get('/games/abjad', function () {
    return view('games.abjad');
})->name('games.abjad');

// Full page: Susun Huruf ABC
Route::get('/games/susun-huruf', function () {
    return view('games.susun-huruf');
})->name('games.susun-huruf');

// Full page: Belajar Angka
Route::get('/games/angka', function () {
    return view('games.angka');
})->name('games.angka');
