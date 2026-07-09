<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
