<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌟 Halaman 6 - Segera Hadir - Ebook Anak TK</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @endif

    <style>
        body {
            font-family: 'Comic Neue', cursive;
            background: linear-gradient(180deg, #EFF6FF 0%, #DBEAFE 50%, #BFDBFE 100%);
            min-height: 100vh;
        }
        @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.7; transform: scale(0.9); } }
        @keyframes float-gentle { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-15px) rotate(5deg); } }
        @keyframes bounce-subtle { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-10px) scale(1.05); } }
        .animate-twinkle { animation: twinkle 3s ease-in-out infinite; }
        .animate-float-gentle { animation: float-gentle 4s ease-in-out infinite; }
        .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">
    {{-- Background decorations --}}
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" style="background: linear-gradient(180deg, #EFF6FF 0%, #DBEAFE 50%, #BFDBFE 100%);"></div>

    {{-- Floating stars --}}
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:10%;left:8%">
        <svg width="40" height="40" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24"/></svg>
    </div>
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:15%;right:10%;animation-delay:0.5s">
        <svg width="30" height="30" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#F472B6"/></svg>
    </div>
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="bottom:20%;left:12%;animation-delay:1s">
        <svg width="35" height="35" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#60A5FA"/></svg>
    </div>

    {{-- Main content --}}
    <main class="relative z-10 p-6 max-w-4xl mx-auto min-h-screen flex flex-col items-center justify-center">
        {{-- Back Button --}}
        <a href="{{ route('belajar.index') }}" class="fixed left-4 top-8 z-30 bg-blue-100 text-blue-500 px-4 py-2 rounded-full font-bold hover:bg-blue-200 transition-all text-sm">← Kembali</a>

        {{-- Placeholder Card --}}
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-2xl text-center relative overflow-hidden max-w-2xl w-full animate-bounce-subtle">
            <div class="absolute top-0 left-0 right-0 h-3" style="background: linear-gradient(90deg, #3B82F6, #60A5FA, #93C5FD, #3B82F6); background-size: 200% 100%;"></div>

            <div class="text-[6rem] md:text-[8rem] mb-6 animate-float-gentle">🚧</div>

            <h1 class="text-[2rem] md:text-[2.5rem] font-black text-gray-800 mb-4">
                Halaman 6
            </h1>
            <h2 class="text-[1.5rem] md:text-[1.8rem] font-bold text-blue-500 mb-6">
                Segera Hadir! 🌟
            </h2>
            <p class="text-gray-600 text-[1.1rem] md:text-[1.25rem] font-semibold leading-relaxed mb-8">
                Halaman ini sedang dipersiapkan dengan materi yang seru dan menarik untuk anak-anak. Tunggu ya! 🎉
            </p>

            <a href="{{ route('belajar.index') }}"
                class="inline-flex items-center justify-center gap-2 px-8 py-4 text-[1.1rem] font-extrabold text-white bg-gradient-to-r from-blue-500 via-blue-400 to-cyan-400 rounded-2xl shadow-lg hover:-translate-y-1 hover:scale-105 transition-all"
                style="box-shadow: 0 8px 25px rgba(59,130,246,0.4)">
                <span class="text-[1.3rem]">🏠</span> Kembali ke Menu Belajar
            </a>
        </div>
    </main>
</body>
</html>
