<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>🎮 Games Edukasi Anak TK</title>
    @fonts
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
    @endif
    <style>
        body {
            font-family: 'Comic Neue', cursive;
            background: linear-gradient(180deg, #fff9e6 0%, #e8f5e9 50%, #f0fff4 100%);
            min-height: 100vh;
        }

        @keyframes bgMove {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        @keyframes floatEmoji {
            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }

        @keyframes wiggle {
            0%,
            100% {
                transform: rotate(-10deg);
            }
            50% {
                transform: rotate(10deg);
            }
        }

        @keyframes bounce {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes twinkle {
            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.7;
                transform: scale(0.9);
            }
        }

        @keyframes floatCloud {
            0%,
            100% {
                transform: translateX(0) translateY(0);
            }
            50% {
                transform: translateX(25px) translateY(-5px);
            }
        }

        .bg-animated {
            background: linear-gradient(135deg, #a8e6cf 0%, #d0f0c0 50%, #ffeaa7 100%);
            background-size: 200% 200%;
            animation: bgMove 25s infinite alternate;
        }

        .float-emoji {
            position: fixed;
            font-size: 2.5em;
            opacity: 0.2;
            z-index: 0;
            pointer-events: none;
            animation: floatEmoji 8s ease-in-out infinite;
        }

        .header-rainbow {
            background: linear-gradient(90deg, #ff6b6b, #ffd93d, #a8e6cf, #6c5ce7, #ff6b6b);
            background-size: 200% 100%;
            animation: rainbow 3s linear infinite;
        }

        @keyframes rainbow {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 200% 50%;
            }
        }

        .animate-wiggle {
            animation: wiggle 3s ease-in-out infinite;
        }

        .animate-bounce {
            animation: bounce 2s ease-in-out infinite;
        }

        .animate-twinkle {
            animation: twinkle 3s ease-in-out infinite;
        }

        .animate-float-cloud {
            animation: floatCloud 8s ease-in-out infinite;
        }
    </style>
</head>
<body>
    {{-- Background decorations --}}
    <div
        class="pointer-events-none fixed inset-0 z-0 overflow-hidden"
        style="background: linear-gradient(180deg, #fff9e6 0%, #e8f5e9 50%, #f0fff4 100%)"
    ></div>
    {{-- Floating stars --}}
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 5%; left: 3%">
        <svg width="35" height="35" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24" />
        </svg>
    </div>
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 8%; right: 5%; animation-delay: 0.5s">
        <svg width="28" height="28" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#F472B6" />
        </svg>
    </div>
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 25%; left: 2%; animation-delay: 1s">
        <svg width="25" height="25" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#A78BFA" />
        </svg>
    </div>
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 30%; right: 3%; animation-delay: 1.5s">
        <svg width="32" height="32" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#34D399" />
        </svg>
    </div>
    {{-- Floating clouds --}}
    <div class="animate-float-cloud pointer-events-none fixed z-10 hidden md:block" style="top: 6%; left: 8%">
        <svg width="100" height="60" viewBox="0 0 120 70" fill="none">
            <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.8" />
            <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.85" />
            <ellipse cx="95" cy="45" rx="25" ry="18" fill="white" fill-opacity="0.8" />
        </svg>
    </div>
    <div
        class="animate-float-cloud pointer-events-none fixed z-10 hidden md:block"
        style="top: 12%; right: 12%; animation-delay: 2s"
    >
        <svg width="80" height="50" viewBox="0 0 120 70" fill="none">
            <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.75" />
            <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.8" />
            <ellipse cx="95" cy="45" rx="25" ry="18" fill="white" fill-opacity="0.75" />
        </svg>
    </div>
    {{-- Floating animals --}}
    <div
        class="pointer-events-none fixed z-10 hidden md:block"
        style="bottom: 18%; left: 3%; animation: bounce 4s ease-in-out infinite"
    >
        🐰
    </div>
    <div
        class="pointer-events-none fixed z-10"
        style="bottom: 22%; right: 4%; animation: bounce 4s ease-in-out infinite 1s"
    >
        🦊
    </div>
    <div
        class="pointer-events-none fixed z-10 hidden md:block"
        style="top: 20%; left: 5%; animation: bounce 4s ease-in-out infinite 0.5s"
    >
        🐻
    </div>
    <div
        class="pointer-events-none fixed z-10"
        style="top: 22%; right: 6%; animation: bounce 4s ease-in-out infinite 1.5s"
    >
        🐱
    </div>
    {{-- Butterflies --}}
    <div
        class="pointer-events-none fixed z-10 hidden md:block"
        style="top: 35%; left: 4%; animation: wiggle 6s ease-in-out infinite 3s"
    >
        🦋
    </div>
    <div
        class="pointer-events-none fixed z-10 hidden md:block"
        style="top: 40%; right: 5%; animation: wiggle 6s ease-in-out infinite 2s"
    >
        🦋
    </div>
    {{-- Kembali Button --}}
    <a
        href="{{ route('home') }}"
        class="fixed top-8 left-4 z-30 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-500 transition-all hover:bg-red-200"
    >← Kembali</a>
    {{-- Main content --}}
    <main class="relative z-10 mx-auto max-w-6xl p-8">
        {{-- Header --}}
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-white p-8 text-center shadow-xl">
            <div class="header-rainbow absolute top-0 right-0 left-0 h-1.5"></div>
            <span class="mb-3 block animate-bounce text-[3.5rem]">🎮🎮🎮</span>
            <h1 class="mb-2 text-[2.2rem] font-bold text-gray-800" style="font-family: 'Fredoka One', cursive">
                GAMES EDUKASI 🎉
            </h1>
            <p class="text-[1.1rem] text-gray-500">Belajar Sambil Bermain dan Bersenang-senang! ✨🧠</p>
        </div>
        {{-- Games Grid --}}
        <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            {{-- Game 1: Susun Huruf --}}
            <div
                class="group cursor-pointer rounded-3xl border-4 border-transparent bg-white p-8 text-center shadow-xl transition-all duration-300 hover:-translate-y-4 hover:scale-105 hover:rotate-2 hover:border-yellow-400 hover:shadow-2xl"
                onclick="window.location.href='{{ route('games.susun-huruf') }}'"
            >
                <span class="animate-wiggle mb-4 block text-[5rem]" style="color: #f472b6">🔤</span>
                <span class="mb-3 inline-block rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 px-4 py-1.5 text-[0.85rem] font-bold text-white">🔥 SEDANG</span>
                <h3 class="mb-3 text-[1.4rem] font-bold text-gray-800" style="font-family: 'Fredoka One', cursive">
                    Susun Huruf ABC 📝
                </h3>
                <p class="mb-5 text-[1rem] leading-relaxed text-gray-500">
                    Klik huruf untuk menyusun kata yang benar! A-P-E-L = ...? 🤔💡
                </p>
                <button
                    class="inline-flex cursor-pointer items-center gap-2 rounded-full border-none bg-gradient-to-r from-red-400 to-orange-400 px-8 py-4 text-[1.1rem] font-bold text-white shadow-lg transition-transform hover:scale-110"
                    style="font-family: 'Fredoka One', cursive"
                >
                    🎮 BUKA HALAMAN!
                </button>
            </div>
            {{-- Game 2: Angka --}}
            <div
                class="group cursor-pointer rounded-3xl border-4 border-transparent bg-white p-8 text-center shadow-xl transition-all duration-300 hover:-translate-y-4 hover:scale-105 hover:rotate-2 hover:border-yellow-400 hover:shadow-2xl"
                onclick="window.location.href='{{ route('games.angka') }}'"
            >
                <span class="animate-wiggle mb-4 block text-[5rem]" style="animation-delay: 0.3s; color: #fbbf24"
                    >🔢</span>
                <span class="mb-3 inline-block rounded-full bg-gradient-to-r from-red-400 to-red-600 px-4 py-1.5 text-[0.85rem] font-bold text-white">💪 AGAK SULIT</span>
                <h3 class="mb-3 text-[1.4rem] font-bold text-gray-800" style="font-family: 'Fredoka One', cursive">
                    Belajar Angka 🔢
                </h3>
                <p class="mb-5 text-[1rem] leading-relaxed text-gray-500">
                    Klik angka sesuai jumlah benda! Berapa🍌🍌🍌? Hitung yuk! 🧮
                </p>
                <button
                    class="inline-flex cursor-pointer items-center gap-2 rounded-full border-none bg-gradient-to-r from-red-400 to-orange-400 px-8 py-4 text-[1.1rem] font-bold text-white shadow-lg transition-transform hover:scale-110"
                    style="font-family: 'Fredoka One', cursive"
                >
                    🎮 BUKA HALAMAN!
                </button>
            </div>
            {{-- Game 3: Huruf Abjad --}}
            <div
                class="group cursor-pointer rounded-3xl border-4 border-transparent bg-white p-8 text-center shadow-xl transition-all duration-300 hover:-translate-y-4 hover:scale-105 hover:rotate-2 hover:border-yellow-400 hover:shadow-2xl"
                onclick="window.location.href='{{ route('games.abjad') }}'"
            >
                <span class="animate-wiggle mb-4 block text-[5rem]" style="animation-delay: 0.6s; color: #a78bfa"
                    >🔤</span>
                <span class="mb-3 inline-block rounded-full bg-gradient-to-r from-green-400 to-emerald-500 px-4 py-1.5 text-[0.85rem] font-bold text-white">✨ MUDAH</span>
                <h3 class="mb-3 text-[1.4rem] font-bold text-gray-800" style="font-family: 'Fredoka One', cursive">
                    Huruf A-Z 🌟
                </h3>
                <p class="mb-5 text-[1rem] leading-relaxed text-gray-500">
                    Klik huruf yang benar! A-B-C... Yuk belajar abjad! 📖
                </p>
                <button
                    class="inline-flex cursor-pointer items-center gap-2 rounded-full border-none bg-gradient-to-r from-red-400 to-orange-400 px-8 py-4 text-[1.1rem] font-bold text-white shadow-lg transition-transform hover:scale-110"
                    style="font-family: 'Fredoka One', cursive"
                >
                    🎮 BUKA HALAMAN!
                </button>
            </div>
            {{-- Game 4: Belajar Warna --}}
            <div
                class="group cursor-pointer rounded-3xl border-4 border-transparent bg-white p-8 text-center shadow-xl transition-all duration-300 hover:-translate-y-4 hover:scale-105 hover:rotate-2 hover:border-yellow-400 hover:shadow-2xl"
                onclick="window.location.href='{{ route('games.warna') }}'"
            >
                <span class="animate-wiggle mb-4 block text-[5rem]" style="animation-delay: 0.9s; color: #6ee7b7"
                    >🎨</span>
                <span class="mb-3 inline-block rounded-full bg-gradient-to-r from-green-400 to-emerald-500 px-4 py-1.5 text-[0.85rem] font-bold text-white">✨ MUDAH</span>
                <h3 class="mb-3 text-[1.4rem] font-bold text-gray-800" style="font-family: 'Fredoka One', cursive">
                    Belajar Warna 🌈
                </h3>
                <p class="mb-5 text-[1rem] leading-relaxed text-gray-500">
                    Klik warna yang benar! Merah, kuning, hijau... 🏳️🌈
                </p>
                <button
                    class="inline-flex cursor-pointer items-center gap-2 rounded-full border-none bg-gradient-to-r from-red-400 to-orange-400 px-8 py-4 text-[1.1rem] font-bold text-white shadow-lg transition-transform hover:scale-110"
                    style="font-family: 'Fredoka One', cursive"
                >
                    🎮 BUKA HALAMAN!
                </button>
            </div>
        </div>
        <footer class="py-8 text-center text-gray-500">
            <p>Dibuat dengan ❤️ untuk anak-anak Indonesia 🇮🇩</p>
            <p class="mt-2 text-[0.9rem]">© 2026 Games Edukasi Anak TK 🎮✨</p>
        </footer>
    </main>
    {{-- Bottom wave --}}
    <svg class="pointer-events-none fixed bottom-0 left-0 z-0 h-24 w-full" viewBox="0 0 1440 120" fill="none" preserveAspectRatio="none">
        <path
            d="M0 120L48 110C96 100 192 80 288 70C384 60 480 60 576 65C672 70 768 80 864 85C960 90 1056 90 1152 82.5C1248 75 1344 60 1392 52.5L1440 45V120H1392C1344 120 1248 120 1152 120C1056 120 960 120 864 120C768 120 672 120 576 120C480 120 384 120 288 120C192 120 96 120 48 120H0Z"
            fill="url(#wave-gradient)"
            fill-opacity="0.15"
        />
        <defs>
            <linearGradient id="wave-gradient" x1="0" y1="0" x2="1440" y2="0" gradientUnits="userSpaceOnUse">
                <stop stop-color="#10B981" />
                <stop offset="0.5" stop-color="#8B5CF6" />
                <stop offset="1" stop-color="#F97316" />
            </linearGradient>
        </defs>
    </svg>
</body>
</html>
