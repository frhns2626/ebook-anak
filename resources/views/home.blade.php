<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 Ebook Anak TK - Belajar & Bermain!</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */ @layer properties{/* Tailwind v4 inline */}</style>
    @endif

    <style>
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-20px) rotate(5deg); } }
        @keyframes float-side { 0%, 100% { transform: translateX(0); } 50% { transform: translateX(20px); } }
        @keyframes bounce { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-15px) scale(1.05); } }
        @keyframes wiggle { 0%, 100% { transform: rotate(-10deg); } 50% { transform: rotate(10deg); } }
        @keyframes slideUp { from { opacity: 0; transform: translateY(50px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slideUp { animation: slideUp 1s ease forwards; }
        .animate-float { animation: float 4s ease-in-out infinite; }
        .animate-float-slow { animation: float 6s ease-in-out infinite; }
        .animate-float-side { animation: float-side 5s ease-in-out infinite; }
        .animate-bounce { animation: bounce 2s ease-in-out infinite; }
        .animate-wiggle { animation: wiggle 3s ease-in-out infinite; }
    </style>
</head>
<body class="bg-gradient-to-b from-yellow-200 via-emerald-200 to-lime-200 min-h-screen overflow-x-hidden font-['Nunito',sans-serif]">
    {{-- Floating decorations --}}
    <div class="fixed top-[15%] left-[10%] text-[3rem] z-10 animate-float">⭐</div>
    <div class="fixed top-[20%] right-[15%] text-[3rem] z-10 animate-float" style="animation-delay:0.5s">✨</div>
    <div class="fixed bottom-[25%] left-[8%] text-[3rem] z-10 animate-float" style="animation-delay:1s">🌟</div>
    <div class="fixed bottom-[20%] right-[10%] text-[3rem] z-10 animate-float" style="animation-delay:0.3s">💫</div>
    <div class="fixed top-[35%] left-[5%] text-[3rem] z-10 animate-float-slow" style="animation-delay:1.5s">🎈</div>
    <div class="fixed top-[40%] right-[8%] text-[3rem] z-10 animate-float" style="animation-delay:2s">🎀</div>

    {{-- Background decorations --}}
    <div class="fixed w-[400px] h-[400px] rounded-full opacity-30 z-0" style="background:radial-gradient(circle, #ff6b6b, transparent);top:-100px;left:-150px;animation:float 8s ease-in-out infinite"></div>
    <div class="fixed w-[300px] h-[300px] rounded-full opacity-30 z-0" style="background:radial-gradient(circle, #a78bfa, transparent);top:50%;right:-100px;animation:float 10s ease-in-out infinite reverse"></div>
    <div class="fixed w-[250px] h-[250px] rounded-full opacity-30 z-0" style="background:radial-gradient(circle, #fbbf24, transparent);bottom:10%;left:10%;animation:float 7s ease-in-out infinite"></div>

    {{-- Characters --}}
    <div class="fixed bottom-[15%] left-[5%] text-[4rem] z-10 animate-wiggle">🐰</div>
    <div class="fixed bottom-[20%] right-[8%] text-[4rem] z-10 animate-wiggle" style="animation-delay:0.5s">🦊</div>
    <div class="fixed top-[25%] left-[8%] text-[4rem] z-10 animate-bounce">🐱</div>
    <div class="fixed top-[30%] right-[10%] text-[4rem] z-10 animate-bounce" style="animation-delay:1s">🐻</div>

    {{-- Hero Section --}}
    <section class="min-h-screen flex flex-col items-center justify-center relative p-20 overflow-hidden">
        <div class="text-center relative z-10 max-w-2xl animate-slideUp">
            <h1 class="text-[3.5rem] font-black text-gray-800 mb-4 leading-tight">
                Selamat Datang di
                <span class="block text-violet-600">🎓 Belajar Yuk! 🎉</span>
            </h1>
            <p class="text-gray-600 text-[1.5rem] mb-8 font-semibold">
                ✨ Belajar Huruf, Angka & Bermain dengan Cerita Seru! ✨
            </p>

            {{-- 3D Open Book --}}
            <div class="relative w-full max-w-[550px] h-[380px] mx-auto mb-12 z-10 flex items-center justify-center" style="perspective: 2000px">
                {{-- Book Wrapper --}}
                <div class="relative w-full h-full flex animate-float" style="transform: rotateX(15deg) rotateY(-6deg) rotateZ(-1deg); transform-style: preserve-3d;">

                    {{-- LEFT HALF OF THE BOOK --}}
                    <div class="absolute left-0 top-0 w-1/2 h-full" style="transform-origin: right center; transform: rotateY(14deg); transform-style: preserve-3d;">
                        {{-- Left Cover --}}
                        <div class="absolute inset-0 bg-gradient-to-l from-violet-700 to-purple-600 rounded-l-2xl border-l-[6px] border-y-[3px] border-violet-800" style="box-shadow: -15px 20px 35px rgba(0, 0, 0, 0.35);">
                            {{-- Cardboard thickness effect --}}
                            <div class="absolute right-0 top-0 bottom-0 w-[4px] bg-violet-900 opacity-50"></div>
                        </div>

                        {{-- Left Pages Stack (3D paper sheets effect) --}}
                        <div class="absolute right-[4px] top-[10px] bottom-[10px] left-[15px] bg-amber-50 rounded-l-lg shadow-sm border-r-2 border-stone-200" style="transform: translateZ(4px);">
                            {{-- Paper stack bottom edge --}}
                            <div class="absolute left-0 bottom-[-4px] right-0 h-[4px] bg-stone-300 rounded-bl-sm border-l border-b border-stone-400"></div>
                            {{-- Paper stack left edge --}}
                            <div class="absolute left-[-4px] top-0 bottom-0 w-[4px] bg-stone-200 rounded-l-sm border-l border-y border-stone-300"></div>
                        </div>
                        <div class="absolute right-[6px] top-[8px] bottom-[8px] left-[13px] bg-amber-100 rounded-l-lg shadow-sm border-r-2 border-stone-300" style="transform: translateZ(8px);"></div>

                        {{-- Left Top Page --}}
                        <div class="absolute right-[8px] top-[6px] bottom-[6px] left-[10px] bg-gradient-to-r from-stone-50 to-white rounded-l-md p-6 flex flex-col justify-between select-none shadow-[inset_-10px_0_15px_rgba(0,0,0,0.05)]" style="transform: translateZ(12px);">
                            {{-- Cute notebook style line --}}
                            <div class="absolute left-4 top-0 bottom-0 w-[2px] bg-red-200 opacity-40"></div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full justify-between items-center text-center pt-2">
                                <div class="bg-amber-100 px-3 py-1 rounded-full text-amber-800 text-xs font-bold tracking-wider uppercase mb-1">📖 Mari Belajar</div>

                                <div class="flex flex-col items-center justify-center flex-grow">
                                    {{-- Fun letters and numbers graphics --}}
                                    <div class="flex gap-3 justify-center items-center mb-2">
                                        <span class="text-[2.8rem] font-black text-rose-500 animate-wiggle drop-shadow-md" style="animation-duration: 2.5s">A</span>
                                        <span class="text-[2.2rem] font-black text-amber-500 animate-bounce drop-shadow-md" style="animation-delay: 0.2s">b</span>
                                        <span class="text-[2.5rem] font-black text-emerald-500 animate-wiggle drop-shadow-md" style="animation-delay: 0.4s; animation-duration: 3.5s">C</span>
                                    </div>
                                    <div class="flex gap-2 justify-center items-center">
                                        <span class="text-[1.8rem] font-extrabold text-blue-500 bg-blue-50 w-9 h-9 rounded-full flex items-center justify-center shadow-sm">1</span>
                                        <span class="text-[1.8rem] font-extrabold text-violet-500 bg-violet-50 w-9 h-9 rounded-full flex items-center justify-center shadow-sm">2</span>
                                        <span class="text-[1.8rem] font-extrabold text-orange-500 bg-orange-50 w-9 h-9 rounded-full flex items-center justify-center shadow-sm">3</span>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <p class="text-stone-700 text-sm md:text-base font-extrabold leading-tight">
                                        "Membaca, menulis, & bermain dengan seru!"
                                    </p>
                                    <div class="mt-2 flex justify-center gap-1">
                                        <span class="text-xs">🍎</span>
                                        <span class="text-xs">⭐</span>
                                        <span class="text-xs">🎈</span>
                                        <span class="text-xs">🦁</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- RIGHT HALF OF THE BOOK --}}
                    <div class="absolute right-0 top-0 w-1/2 h-full" style="transform-origin: left center; transform: rotateY(-14deg); transform-style: preserve-3d;">
                        {{-- Right Cover --}}
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-700 to-purple-600 rounded-r-2xl border-r-[6px] border-y-[3px] border-violet-800" style="box-shadow: 15px 20px 35px rgba(0, 0, 0, 0.35);">
                            {{-- Cardboard thickness effect --}}
                            <div class="absolute left-0 top-0 bottom-0 w-[4px] bg-violet-900 opacity-50"></div>
                        </div>

                        {{-- Right Pages Stack (3D paper sheets effect) --}}
                        <div class="absolute left-[4px] top-[10px] bottom-[10px] right-[15px] bg-amber-50 rounded-r-lg shadow-sm border-l-2 border-stone-200" style="transform: translateZ(4px);">
                            {{-- Paper stack bottom edge --}}
                            <div class="absolute left-0 bottom-[-4px] right-0 h-[4px] bg-stone-300 rounded-br-sm border-r border-b border-stone-400"></div>
                            {{-- Paper stack right edge --}}
                            <div class="absolute right-[-4px] top-0 bottom-0 w-[4px] bg-stone-200 rounded-r-sm border-r border-y border-stone-300"></div>
                        </div>
                        <div class="absolute left-[6px] top-[8px] bottom-[8px] right-[13px] bg-amber-100 rounded-r-lg shadow-sm border-l-2 border-stone-300" style="transform: translateZ(8px);"></div>

                        {{-- Right Top Page --}}
                        <div class="absolute left-[8px] top-[6px] bottom-[6px] right-[10px] bg-gradient-to-l from-stone-50 to-white rounded-r-md p-6 flex flex-col justify-between select-none shadow-[inset_10px_0_15px_rgba(0,0,0,0.05)]" style="transform: translateZ(12px);">
                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full justify-between items-center text-center pt-2">
                                <div class="bg-violet-100 px-3 py-1 rounded-full text-violet-800 text-xs font-bold tracking-wider uppercase mb-1">🎮 Ayo Main</div>

                                <div class="flex flex-col items-center justify-center flex-grow py-2">
                                    <h3 class="text-violet-600 text-lg md:text-xl font-black mb-1 animate-pulse">Game Abjad & Warna!</h3>
                                    <p class="text-stone-600 text-xs md:text-sm font-semibold leading-relaxed px-2">
                                        Asah otak dengan tebak huruf, susun kata, dan tebak warna balon yang seru!
                                    </p>
                                </div>

                                <div class="w-full">
                                    <div class="flex justify-center items-center gap-1 text-violet-500 font-extrabold text-sm mb-1 animate-bounce">
                                        <span>👇 Pilih menu di bawah 👇</span>
                                    </div>
                                    <div class="flex justify-center gap-1">
                                        <span class="text-xs">🎮</span>
                                        <span class="text-xs">🧩</span>
                                        <span class="text-xs">🎨</span>
                                        <span class="text-xs">🧸</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BOOK SPINE SHADOW / CENTER GUTTER --}}
                    {{-- A narrow dark strip in the exact center that creates depth --}}
                    <div class="absolute left-1/2 top-[6px] bottom-[6px] w-[20px] -ml-[10px] rounded-sm z-30 opacity-70 pointer-events-none"
                         style="background: linear-gradient(90deg, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.15) 100%); transform: translateZ(13px);">
                    </div>
                </div>
            </div>

            {{-- CTA Buttons --}}
            <div class="flex gap-5 justify-center flex-wrap">
                <a href="{{ route('belajar.index') }}" class="bg-gradient-to-r from-red-400 to-orange-400 text-white px-10 py-5 text-[1.2rem] font-extrabold rounded-full no-underline shadow-xl hover:-translate-y-1 hover:scale-105 transition-all inline-flex items-center gap-3" style="box-shadow:0 10px 30px rgba(255,107,107,0.3)">
                    🎓 Mulai Belajar
                </a>
                <a href="{{ route('games.index') }}" class="bg-gradient-to-r from-violet-500 to-purple-400 text-white px-10 py-5 text-[1.2rem] font-extrabold rounded-full no-underline shadow-xl hover:-translate-y-1 hover:scale-105 transition-all inline-flex items-center gap-3" style="box-shadow:0 10px 30px rgba(108,92,231,0.3)">
                    🎮 Main Games
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Section --}}
    <section class="py-20 px-5 bg-white">
        <h2 class="text-center text-[2.5rem] font-black text-gray-800 mb-10">🎯 Apa yang Kamu Dapatkan? 🎯</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 text-center shadow-xl border-4 border-white hover:-translate-y-2 hover:border-violet-300 transition-all">
                <div class="text-[4rem] mb-4">🔤</div>
                <h3 class="text-[1.3rem] font-extrabold text-gray-800 mb-3">Huruf A-Z</h3>
                <p class="text-gray-500">Belajar huruf besar dan kecil dengan gambar hewan yang lucu!</p>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 text-center shadow-xl border-4 border-white hover:-translate-y-2 hover:border-violet-300 transition-all">
                <div class="text-[4rem] mb-4">🎮</div>
                <h3 class="text-[1.3rem] font-extrabold text-gray-800 mb-3">Games Edukasi</h3>
                <p class="text-gray-500">Belajar huruf, angka, dan banyak lagi dengan bermain!</p>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-white rounded-3xl p-8 text-center shadow-xl border-4 border-white hover:-translate-y-2 hover:border-violet-300 transition-all">
                <div class="text-[4rem] mb-4">🎨</div>
                <h3 class="text-[1.3rem] font-extrabold text-gray-800 mb-3">Warna & Bentuk</h3>
                <p class="text-gray-500">Kenali berbagai warna dan bentuk dasar yang seru!</p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-16 px-5 bg-gradient-to-r from-violet-500 to-purple-400 text-center">
        <div class="flex justify-center gap-12 flex-wrap max-w-3xl mx-auto">
            <div class="text-white">
                <span class="text-[3rem] font-black block">🎓</span>
                <span class="text-[1.1rem] opacity-90">5 Modul Belajar</span>
            </div>
            <div class="text-white">
                <span class="text-[3rem] font-black block">🎮</span>
                <span class="text-[1.1rem] opacity-90">6 Games Seru</span>
            </div>
            <div class="text-white">
                <span class="text-[3rem] font-black block">👶</span>
                <span class="text-[1.1rem] opacity-90">Buat Anak TK</span>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-stone-800 text-gray-400 text-center py-8 px-5">
        <p>Dibuat dengan <span class="text-red-400">❤️</span> untuk anak-anak Indonesia 🇮🇩</p>
        <p class="mt-3 text-[0.9rem]">© 2026 Ebook Anak TK</p>
    </footer>
</body>
</html>
