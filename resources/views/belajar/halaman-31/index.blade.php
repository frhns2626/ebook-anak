<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 31 - Ebook Anak TK</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @endif
    <style>
        body {
            font-family: 'Comic Neue', cursive;
            background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
<div class="bg-white rounded-3xl p-8 shadow-2xl text-center">
    <h1 class="text-2xl font-black text-gray-800 mb-4">Halaman 31</h1>
    <p class="text-gray-500">Segera hadir! 🚀</p>
    <a href="{{ route('belajar.index') }}" class="inline-block mt-6 bg-gradient-to-r from-blue-400 to-blue-500 text-white px-6 py-3 rounded-full font-bold hover:scale-105 transition-all">← Kembali</a>
</div>
</body>
</html>
