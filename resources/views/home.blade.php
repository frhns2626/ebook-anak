<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>📚 Ebook Anak TK - Belajar & Bermain!</title>
    @fonts
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            @layer properties {
                /* Tailwind v4 inline */
            }
        </style>
    @endif
    <style>
        @keyframes float {
            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        @keyframes float-side {
            0%,
            100% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(20px);
            }
        }

        @keyframes bounce {
            0%,
            100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-15px) scale(1.05);
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

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slideUp {
            animation: slideUp 1s ease forwards;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-side {
            animation: float-side 5s ease-in-out infinite;
        }

        .animate-bounce {
            animation: bounce 2s ease-in-out infinite;
        }

        .animate-wiggle {
            animation: wiggle 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden bg-gradient-to-b from-yellow-200 via-emerald-200 to-lime-200 font-['Nunito',sans-serif]">
    {{-- Floating decorations --}}
    <div class="animate-float fixed top-[15%] left-[10%] z-10 text-[3rem]">⭐</div>
    <div class="animate-float fixed top-[20%] right-[15%] z-10 text-[3rem]" style="animation-delay: 0.5s">✨</div>
    <div class="animate-float fixed bottom-[25%] left-[8%] z-10 text-[3rem]" style="animation-delay: 1s">🌟</div>
    <div class="animate-float fixed right-[10%] bottom-[20%] z-10 text-[3rem]" style="animation-delay: 0.3s">💫</div>
    <div class="animate-float-slow fixed top-[35%] left-[5%] z-10 text-[3rem]" style="animation-delay: 1.5s">🎈</div>
    <div class="animate-float fixed top-[40%] right-[8%] z-10 text-[3rem]" style="animation-delay: 2s">🎀</div>
    {{-- Background decorations --}}
    <div
        class="fixed z-0 h-[400px] w-[400px] rounded-full opacity-30"
        style="
            background: radial-gradient(circle, #ff6b6b, transparent);
            top: -100px;
            left: -150px;
            animation: float 8s ease-in-out infinite;
        "
    ></div>
    <div
        class="fixed z-0 h-[300px] w-[300px] rounded-full opacity-30"
        style="
            background: radial-gradient(circle, #a78bfa, transparent);
            top: 50%;
            right: -100px;
            animation: float 10s ease-in-out infinite reverse;
        "
    ></div>
    <div
        class="fixed z-0 h-[250px] w-[250px] rounded-full opacity-30"
        style="
            background: radial-gradient(circle, #fbbf24, transparent);
            bottom: 10%;
            left: 10%;
            animation: float 7s ease-in-out infinite;
        "
    ></div>
    {{-- Characters --}}
    <div class="animate-wiggle fixed bottom-[15%] left-[5%] z-10 text-[4rem]">🐰</div>
    <div class="animate-wiggle fixed right-[8%] bottom-[20%] z-10 text-[4rem]" style="animation-delay: 0.5s">🦊</div>
    <div class="fixed top-[25%] left-[8%] z-10 animate-bounce text-[4rem]">🐱</div>
    <div class="fixed top-[30%] right-[10%] z-10 animate-bounce text-[4rem]" style="animation-delay: 1s">🐻</div>
    {{-- Hero Section --}}
    <section class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden p-20">
        <div class="animate-slideUp relative z-10 max-w-2xl text-center">
            <h1 class="mb-4 text-[3.5rem] leading-tight font-black text-gray-800">
                Selamat Datang di
                <span class="block text-violet-600">🎓 Belajar Yuk! 🎉</span>
            </h1>
            <p class="mb-8 text-[1.5rem] font-semibold text-gray-600">
                ✨ Belajar Huruf, Angka & Bermain dengan Cerita Seru! ✨
            </p>
            {{-- 3D Open Book --}}
            <div
                class="relative z-10 mx-auto mb-12 flex h-[380px] w-full max-w-[550px] items-center justify-center"
                style="perspective: 2000px"
            >
                {{-- Book Wrapper --}}
                <div
                    class="animate-float relative flex h-full w-full"
                    style="transform: rotateX(15deg) rotateY(-6deg) rotateZ(-1deg); transform-style: preserve-3d"
                >
                    {{-- LEFT HALF OF THE BOOK --}}
                    <div
                        class="absolute top-0 left-0 h-full w-1/2"
                        style="transform-origin: right center; transform: rotateY(14deg); transform-style: preserve-3d"
                    >
                        {{-- Left Cover --}}
                        <div
                            class="absolute inset-0 rounded-l-2xl border-y-[3px] border-l-[6px] border-violet-800 bg-gradient-to-l from-violet-700 to-purple-600"
                            style="box-shadow: -15px 20px 35px rgba(0, 0, 0, 0.35)"
                        >
                            {{-- Cardboard thickness effect --}}
                            <div class="absolute top-0 right-0 bottom-0 w-[4px] bg-violet-900 opacity-50"></div>
                        </div>
                        {{-- Left Pages Stack (3D paper sheets effect) --}}
                        <div
                            class="absolute top-[10px] right-[4px] bottom-[10px] left-[15px] rounded-l-lg border-r-2 border-stone-200 bg-amber-50 shadow-sm"
                            style="transform: translateZ(4px)"
                        >
                            {{-- Paper stack bottom edge --}}
                            <div class="absolute right-0 bottom-[-4px] left-0 h-[4px] rounded-bl-sm border-b border-l border-stone-400 bg-stone-300"></div>
                            {{-- Paper stack left edge --}}
                            <div class="absolute top-0 bottom-0 left-[-4px] w-[4px] rounded-l-sm border-y border-l border-stone-300 bg-stone-200"></div>
                        </div>
                        <div
                            class="absolute top-[8px] right-[6px] bottom-[8px] left-[13px] rounded-l-lg border-r-2 border-stone-300 bg-amber-100 shadow-sm"
                            style="transform: translateZ(8px)"
                        ></div>
                        {{-- Left Top Page --}}
                        <div
                            class="absolute top-[6px] right-[8px] bottom-[6px] left-[10px] flex flex-col justify-between rounded-l-md bg-gradient-to-r from-stone-50 to-white p-6 shadow-[inset_-10px_0_15px_rgba(0,0,0,0.05)] select-none"
                            style="transform: translateZ(12px)"
                        >
                            {{-- Cute notebook style line --}}
                            <div class="absolute top-0 bottom-0 left-4 w-[2px] bg-red-200 opacity-40"></div>
                            {{-- Content --}}
                            <div class="relative z-10 flex h-full flex-col items-center justify-between pt-2 text-center">
                                <div class="mb-1 rounded-full bg-amber-100 px-3 py-1 text-xs font-bold tracking-wider text-amber-800 uppercase">
                                    📖 Mari Belajar
                                </div>
                                <div class="flex flex-grow flex-col items-center justify-center">
                                    {{-- Fun letters and numbers graphics --}}
                                    <div class="mb-2 flex items-center justify-center gap-3">
                                        <span
                                            class="animate-wiggle text-[2.8rem] font-black text-rose-500 drop-shadow-md"
                                            style="animation-duration: 2.5s"
                                        >A</span>
                                        <span
                                            class="animate-bounce text-[2.2rem] font-black text-amber-500 drop-shadow-md"
                                            style="animation-delay: 0.2s"
                                        >b</span>
                                        <span
                                            class="animate-wiggle text-[2.5rem] font-black text-emerald-500 drop-shadow-md"
                                            style="animation-delay: 0.4s; animation-duration: 3.5s"
                                        >C</span>
                                    </div>
                                    <div class="flex items-center justify-center gap-2">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 text-[1.8rem] font-extrabold text-blue-500 shadow-sm">1</span>
                                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-violet-50 text-[1.8rem] font-extrabold text-violet-500 shadow-sm">2</span>
                                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-orange-50 text-[1.8rem] font-extrabold text-orange-500 shadow-sm">3</span>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <p class="text-sm leading-tight font-extrabold text-stone-700 md:text-base">
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
                    <div
                        class="absolute top-0 right-0 h-full w-1/2"
                        style="transform-origin: left center; transform: rotateY(-14deg); transform-style: preserve-3d"
                    >
                        {{-- Right Cover --}}
                        <div
                            class="absolute inset-0 rounded-r-2xl border-y-[3px] border-r-[6px] border-violet-800 bg-gradient-to-r from-violet-700 to-purple-600"
                            style="box-shadow: 15px 20px 35px rgba(0, 0, 0, 0.35)"
                        >
                            {{-- Cardboard thickness effect --}}
                            <div class="absolute top-0 bottom-0 left-0 w-[4px] bg-violet-900 opacity-50"></div>
                        </div>
                        {{-- Right Pages Stack (3D paper sheets effect) --}}
                        <div
                            class="absolute top-[10px] right-[15px] bottom-[10px] left-[4px] rounded-r-lg border-l-2 border-stone-200 bg-amber-50 shadow-sm"
                            style="transform: translateZ(4px)"
                        >
                            {{-- Paper stack bottom edge --}}
                            <div class="absolute right-0 bottom-[-4px] left-0 h-[4px] rounded-br-sm border-r border-b border-stone-400 bg-stone-300"></div>
                            {{-- Paper stack right edge --}}
                            <div class="absolute top-0 right-[-4px] bottom-0 w-[4px] rounded-r-sm border-y border-r border-stone-300 bg-stone-200"></div>
                        </div>
                        <div
                            class="absolute top-[8px] right-[13px] bottom-[8px] left-[6px] rounded-r-lg border-l-2 border-stone-300 bg-amber-100 shadow-sm"
                            style="transform: translateZ(8px)"
                        ></div>
                        {{-- Right Top Page --}}
                        <div
                            class="absolute top-[6px] right-[10px] bottom-[6px] left-[8px] flex flex-col justify-between rounded-r-md bg-gradient-to-l from-stone-50 to-white p-6 shadow-[inset_10px_0_15px_rgba(0,0,0,0.05)] select-none"
                            style="transform: translateZ(12px)"
                        >
                            {{-- Content --}}
                            <div class="relative z-10 flex h-full flex-col items-center justify-between pt-2 text-center">
                                <div class="mb-1 rounded-full bg-violet-100 px-3 py-1 text-xs font-bold tracking-wider text-violet-800 uppercase">
                                    🎮 Ayo Main
                                </div>
                                <div class="flex flex-grow flex-col items-center justify-center py-2">
                                    <h3 class="mb-1 animate-pulse text-lg font-black text-violet-600 md:text-xl">
                                        Game Abjad & Warna!
                                    </h3>
                                    <p class="px-2 text-xs leading-relaxed font-semibold text-stone-600 md:text-sm">
                                        Asah otak dengan tebak huruf, susun kata, dan tebak warna balon yang seru!
                                    </p>
                                </div>
                                <div class="w-full">
                                    <div class="mb-1 flex animate-bounce items-center justify-center gap-1 text-sm font-extrabold text-violet-500">
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
                    <div
                        class="pointer-events-none absolute top-[6px] bottom-[6px] left-1/2 z-30 -ml-[10px] w-[20px] rounded-sm opacity-70"
                        style="
                            background: linear-gradient(
                                90deg,
                                rgba(0, 0, 0, 0.15) 0%,
                                rgba(0, 0, 0, 0.5) 50%,
                                rgba(0, 0, 0, 0.15) 100%
                            );
                            transform: translateZ(13px);
                        "
                    ></div>
                </div>
            </div>
            {{-- CTA Buttons --}}
            <div class="flex flex-wrap justify-center gap-5">
                <a
                    href="{{ route('belajar.index') }}"
                    class="inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-red-400 to-orange-400 px-10 py-5 text-[1.2rem] font-extrabold text-white no-underline shadow-xl transition-all hover:-translate-y-1 hover:scale-105"
                    style="box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3)"
                >
                    🎓 Mulai Belajar
                </a>
                <a
                    href="{{ route('games.index') }}"
                    class="inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-violet-500 to-purple-400 px-10 py-5 text-[1.2rem] font-extrabold text-white no-underline shadow-xl transition-all hover:-translate-y-1 hover:scale-105"
                    style="box-shadow: 0 10px 30px rgba(108, 92, 231, 0.3)"
                >
                    🎮 Main Games
                </a>
            </div>
        </div>
    </section>
    {{-- Featured Section --}}
    <section class="bg-white px-5 py-20">
        <h2 class="mb-10 text-center text-[2.5rem] font-black text-gray-800">🎯 Apa yang Kamu Dapatkan? 🎯</h2>
        <div class="mx-auto grid max-w-5xl grid-cols-1 gap-8 md:grid-cols-3">
            <div class="rounded-3xl border-4 border-white bg-gradient-to-br from-gray-50 to-white p-8 text-center shadow-xl transition-all hover:-translate-y-2 hover:border-violet-300">
                <div class="mb-4 text-[4rem]">🔤</div>
                <h3 class="mb-3 text-[1.3rem] font-extrabold text-gray-800">Huruf A-Z</h3>
                <p class="text-gray-500">Belajar huruf besar dan kecil dengan gambar hewan yang lucu!</p>
            </div>
            <div class="rounded-3xl border-4 border-white bg-gradient-to-br from-gray-50 to-white p-8 text-center shadow-xl transition-all hover:-translate-y-2 hover:border-violet-300">
                <div class="mb-4 text-[4rem]">🎮</div>
                <h3 class="mb-3 text-[1.3rem] font-extrabold text-gray-800">Games Edukasi</h3>
                <p class="text-gray-500">Belajar huruf, angka, dan banyak lagi dengan bermain!</p>
            </div>
            <div class="rounded-3xl border-4 border-white bg-gradient-to-br from-gray-50 to-white p-8 text-center shadow-xl transition-all hover:-translate-y-2 hover:border-violet-300">
                <div class="mb-4 text-[4rem]">🎨</div>
                <h3 class="mb-3 text-[1.3rem] font-extrabold text-gray-800">Warna & Bentuk</h3>
                <p class="text-gray-500">Kenali berbagai warna dan bentuk dasar yang seru!</p>
            </div>
        </div>
    </section>
    {{-- Stats Section --}}
    <section class="bg-gradient-to-r from-violet-500 to-purple-400 px-5 py-16 text-center">
        <div class="mx-auto flex max-w-3xl flex-wrap justify-center gap-12">
            <div class="text-white">
                <span class="block text-[3rem] font-black">🎓</span>
                <span class="text-[1.1rem] opacity-90">5 Modul Belajar</span>
            </div>
            <div class="text-white">
                <span class="block text-[3rem] font-black">🎮</span>
                <span class="text-[1.1rem] opacity-90">6 Games Seru</span>
            </div>
            <div class="text-white">
                <span class="block text-[3rem] font-black">👶</span>
                <span class="text-[1.1rem] opacity-90">Buat Anak TK</span>
            </div>
        </div>
    </section>
    {{-- Footer --}}
    <footer class="bg-stone-800 px-5 py-8 text-center text-gray-400">
        <p>
            Dibuat dengan
            <span class="text-red-400">❤️</span>
            untuk anak-anak Indonesia 🇮🇩
        </p>
        <p class="mt-3 text-[0.9rem]">© 2026 Ebook Anak TK</p>
    </footer>
</body>
</html>
