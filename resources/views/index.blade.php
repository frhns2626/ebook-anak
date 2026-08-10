<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>🎓 Belajar Yuk! - Ebook Anak TK</title>
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
        body {
            font-family: 'Nunito', sans-serif;
        }

        @keyframes twinkle {
            0%,
            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }

            50% {
                opacity: 0.7;
                transform: scale(0.9) rotate(180deg);
            }
        }

        @keyframes float-cloud {
            0%,
            100% {
                transform: translateX(0) translateY(0);
            }

            50% {
                transform: translateX(25px) translateY(-5px);
            }
        }

        @keyframes float-gentle {
            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }

        @keyframes float-side {
            0%,
            100% {
                transform: translateX(0) translateY(0);
            }

            50% {
                transform: translateX(15px) translateY(-10px);
            }
        }

        @keyframes bounce-subtle {
            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-10px) scale(1.02);
            }
        }

        .animate-twinkle {
            animation: twinkle 3s ease-in-out infinite;
        }

        .animate-float-cloud {
            animation: float-cloud 8s ease-in-out infinite;
        }

        .animate-float-gentle {
            animation: float-gentle 4s ease-in-out infinite;
        }

        .animate-float-side {
            animation: float-side 6s ease-in-out infinite;
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="relative min-h-screen overflow-x-hidden bg-gradient-to-b from-yellow-50 via-emerald-50 to-green-50">
    {{-- Background overlay --}}
    <div
        class="pointer-events-none fixed inset-0 z-0"
        style="
            background:
                radial-gradient(ellipse at 20% 20%, rgba(255, 248, 225, 0.8) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 80%, rgba(200, 245, 219, 0.6) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
        "
    ></div>
    {{-- Floating stars --}}
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 5%; left: 3%">
        <svg width="60" height="60" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24" />
        </svg>
    </div>
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 8%; right: 5%; animation-delay: 0.5s">
        <svg width="50" height="50" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#F472B6" />
        </svg>
    </div>
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 25%; left: 2%; animation-delay: 1s">
        <svg width="40" height="40" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#A78BFA" />
        </svg>
    </div>
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 30%; right: 3%; animation-delay: 1.5s">
        <svg width="52" height="52" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#34D399" />
        </svg>
    </div>
    {{-- Floating clouds --}}
    <div class="animate-float-cloud pointer-events-none fixed z-10 hidden md:block" style="top: 6%; left: 8%">
        <svg width="120" height="70" viewBox="0 0 120 70" fill="none">
            <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.9" />
            <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.95" />
            <ellipse cx="95" cy="45" rx="25" ry="18" fill="white" fill-opacity="0.9" />
        </svg>
    </div>
    <div
        class="animate-float-cloud pointer-events-none fixed z-10 hidden md:block"
        style="top: 12%; right: 12%; animation-delay: 2s"
    >
        <svg width="100" height="60" viewBox="0 0 120 70" fill="none">
            <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.85" />
            <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.9" />
            <ellipse cx="95" cy="45" rx="25" ry="18" fill="white" fill-opacity="0.85" />
        </svg>
    </div>
    {{-- Floating animals --}}
    <div
        class="animate-float-gentle pointer-events-none fixed z-10 hidden text-[3.5rem] md:block"
        style="bottom: 18%; left: 3%; animation-duration: 5s"
    >
        🐰
    </div>
    <div class="animate-float-gentle pointer-events-none fixed z-10 text-[3.5rem]" style="bottom: 22%; right: 4%">
        🦊
    </div>
    <div
        class="animate-float-gentle pointer-events-none fixed z-10 hidden text-[3.5rem] md:block"
        style="top: 20%; left: 5%"
    >
        🐻
    </div>
    <div class="animate-float-gentle pointer-events-none fixed z-10 text-[3.5rem]" style="top: 22%; right: 6%">🐱</div>
    {{-- Butterflies --}}
    <div
        class="animate-float-side pointer-events-none fixed z-10 hidden text-[3rem] md:block"
        style="top: 35%; left: 4%; animation-delay: 3s"
    >
        🦋
    </div>
    <div
        class="animate-float-side pointer-events-none fixed z-10 hidden text-[3rem] md:block"
        style="top: 40%; right: 5%"
    >
        🦋
    </div>
    {{-- Decorative flowers --}}
    <div class="pointer-events-none fixed z-10 hidden text-[2.5rem] md:block" style="bottom: 15%; left: 4%">🌸</div>
    <div class="pointer-events-none fixed z-10 text-[2.5rem]" style="bottom: 20%; right: 5%">🌺</div>
    {{-- Main content --}}
    <main class="relative z-20 mx-auto max-w-4xl px-8 py-10">
        {{-- Header --}}
        {{-- Kembali Button --}}
        <a
            href="{{ route('home') }}"
            class="fixed top-8 left-4 z-30 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-500 transition-all hover:bg-red-200"
        >← Kembali</a>
        <header class="animate-bounce-subtle mb-12 text-center">
            <h1 class="mb-4 bg-gradient-to-r from-violet-600 via-indigo-500 to-blue-500 bg-clip-text text-[3rem] leading-tight font-black text-transparent drop-shadow-lg md:text-[3.5rem]">
                🎓 Belajar Yuk!
            </h1>
            <p class="text-[1.2rem] font-bold text-gray-600 md:text-[1.4rem]">
                📖 Belajar Huruf dan Kosakata yang Menyenangkan! 🎉
            </p>
        </header>
        {{-- Module Cards Grid --}}
        <section class="mb-12 grid grid-cols-1 gap-6 md:grid-cols-3">
            @php
                $modules = [
                    [
                        'title' => 'Cover',
                        'subtitle' => 'cover',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'pertama.cover',
                    ],
                    [
                        'title' => 'Kata Pengantar',
                        'subtitle' => 'kata pengantar',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'pertama.kata-pengantar',
                    ],
                    [
                        'title' => 'Petujuk Penggunaan',
                        'subtitle' => 'Petujuk Penggunaan',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'pertama.petujuk-penggunaan',
                    ],

                    [
                        'title' => 'ABC',
                        'subtitle' => 'ABC',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'belajar.abc',
                    ],

                    [
                        'title' => 'Temukan Suku Kata',
                        'subtitle' => 'Temukan Suku Kata',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'belajar.temukan-suku-kata',
                    ],
                    [
                        'title' => 'belajar AIUEO',
                        'subtitle' => 'belajar AIUEO',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'belajar.aiueo',
                    ],
                    [
                        'title' => 'Ayo Coba Baca',
                        'subtitle' => 'Ayo Coba Baca',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'belajar.ayo-coba-baca',
                    ],
                    [
                        'title' => 'Penutupan',
                        'subtitle' => 'Penutupan',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'belajar.penutupan',
                    ],
    [
                        'title' => 'Huruf Objek',
                        'subtitle' => 'Huruf Objek',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'belajar.huruf-objek',
                    ],

                    [
                        'title' => 'Halaman 1',
                        'subtitle' => 'Belajar membaca abjad A sampai Z!',
                        'emoji' => '🔤',
                        'top_color' => '#FF6B6B',
                        'bottom_color' => '#FF8E8E',
                        'accent' => 'red',
                        'route' => 'belajar.halaman-1',
                    ],
                    [
                        'title' => 'Halaman 2',
                        'subtitle' => '-',
                        'emoji' => '🦁',
                        'top_color' => '#FF9F43',
                        'bottom_color' => '#FFB347',
                        'accent' => 'orange',
                        'route' => 'belajar.halaman-2',
                    ],
                    [
                        'title' => 'Halaman 3',
                        'subtitle' => '-',
                        'emoji' => '🥕',
                        'top_color' => '#10B981',
                        'bottom_color' => '#34D399',
                        'accent' => 'green',
                        'route' => 'belajar.halaman-3',
                    ],
                    [
                        'title' => 'Halaman 4',
                        'subtitle' => '-',
                        'emoji' => '🏠',
                        'top_color' => '#FBBF24',
                        'bottom_color' => '#F59E0B',
                        'accent' => 'yellow',
                        'route' => 'belajar.halaman-4',
                    ],
                    [
                        'title' => 'Halaman 5',
                        'subtitle' => '-',
                        'emoji' => '🍰',
                        'top_color' => '#EC4899',
                        'bottom_color' => '#F472B6',
                        'accent' => 'pink',
                        'route' => 'belajar.halaman-5',
                    ],
                    [
                        'title' => 'Halaman 6',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#3B82F6',
                        'bottom_color' => '#60A5FA',
                        'accent' => 'blue',
                        'route' => 'belajar.halaman-6',
                    ],
                    [
                        'title' => 'Halaman 7',
                        'subtitle' => '-',
                        'emoji' => '🎵',
                        'top_color' => '#8B5CF6',
                        'bottom_color' => '#A78BFA',
                        'accent' => 'purple',
                        'route' => 'belajar.halaman-7',
                    ],
                    [
                        'title' => 'Halaman 8',
                        'subtitle' => '-',
                        'emoji' => '🚀',
                        'top_color' => '#3B82F6',
                        'bottom_color' => '#60A5FA',
                        'accent' => 'blue',
                        'route' => 'belajar.halaman-8',
                    ],
                    [
                        'title' => 'Halaman 9',
                        'subtitle' => '-',
                        'emoji' => '🔢',
                        'top_color' => '#06B6D4',
                        'bottom_color' => '#22D3EE',
                        'accent' => 'cyan',
                        'route' => 'belajar.halaman-9',
                    ],
                    [
                        'title' => 'Halaman 10',
                        'subtitle' => '-',
                        'emoji' => '🎨',
                        'top_color' => '#F59E0B',
                        'bottom_color' => '#FBBF24',
                        'accent' => 'amber',
                        'route' => 'belajar.halaman-10',
                    ],
                    [
                        'title' => 'Halaman 11',
                        'subtitle' => '-',
                        'emoji' => '✍️',
                        'top_color' => '#EF4444',
                        'bottom_color' => '#F87171',
                        'accent' => 'red',
                        'route' => 'belajar.halaman-11',
                    ],
                    [
                        'title' => 'Halaman 12',
                        'subtitle' => '-',
                        'emoji' => '🏠',
                        'top_color' => '#8B5CF6',
                        'bottom_color' => '#A78BFA',
                        'accent' => 'violet',
                        'route' => 'belajar.halaman-12',
                    ],
                    [
                        'title' => 'Halaman 13',
                        'subtitle' => '-',
                        'emoji' => '🐠',
                        'top_color' => '#0EA5E9',
                        'bottom_color' => '#38BDF8',
                        'accent' => 'sky',
                        'route' => 'belajar.halaman-13',
                    ],
                    [
                        'title' => 'Halaman 14',
                        'subtitle' => '-',
                        'emoji' => '🐔',
                        'top_color' => '#84CC16',
                        'bottom_color' => '#A3E635',
                        'accent' => 'lime',
                        'route' => 'belajar.halaman-14',
                    ],
                    [
                        'title' => 'Halaman 15',
                        'subtitle' => '-',
                        'emoji' => '🥕',
                        'top_color' => '#F97316',
                        'bottom_color' => '#FB923C',
                        'accent' => 'orange',
                        'route' => 'belajar.halaman-15',
                    ],
                    [
                        'title' => 'Halaman 16',
                        'subtitle' => '-',
                        'emoji' => '🪙',
                        'top_color' => '#EAB308',
                        'bottom_color' => '#FACC15',
                        'accent' => 'yellow',
                        'route' => 'belajar.halaman-16',
                    ],
                    [
                        'title' => 'Halaman 17',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#EC4899',
                        'bottom_color' => '#F472B6',
                        'accent' => 'pink',
                        'route' => 'belajar.halaman-17',
                    ],
                    [
                        'title' => 'Halaman 18',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#8B5CF6',
                        'bottom_color' => '#A78BFA',
                        'accent' => 'purple',
                        'route' => 'belajar.halaman-18',
                    ],
                    [
                        'title' => 'Halaman 19',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#06B6D4',
                        'bottom_color' => '#22D3EE',
                        'accent' => 'cyan',
                        'route' => 'belajar.halaman-19',
                    ],
                    [
                        'title' => 'Halaman 20',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#10B981',
                        'bottom_color' => '#34D399',
                        'accent' => 'emerald',
                        'route' => 'belajar.halaman-20',
                    ],
                    [
                        'title' => 'Halaman 21',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#3B82F6',
                        'bottom_color' => '#60A5FA',
                        'accent' => 'blue',
                        'route' => 'belajar.halaman-21',
                    ],
                    [
                        'title' => 'Halaman 22',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#EF4444',
                        'bottom_color' => '#F87171',
                        'accent' => 'red',
                        'route' => 'belajar.halaman-22',
                    ],
                    [
                        'title' => 'Halaman 23',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#F59E0B',
                        'bottom_color' => '#FBBF24',
                        'accent' => 'amber',
                        'route' => 'belajar.halaman-23',
                    ],
                    [
                        'title' => 'Halaman 24',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#8B5CF6',
                        'bottom_color' => '#A78BFA',
                        'accent' => 'violet',
                        'route' => 'belajar.halaman-24',
                    ],
                    [
                        'title' => 'Halaman 25',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#EC4899',
                        'bottom_color' => '#F472B6',
                        'accent' => 'pink',
                        'route' => 'belajar.halaman-25',
                    ],
                    [
                        'title' => 'Halaman 26',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#06B6D4',
                        'bottom_color' => '#22D3EE',
                        'accent' => 'cyan',
                        'route' => 'belajar.halaman-26',
                    ],
                    [
                        'title' => 'Halaman 27',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#10B981',
                        'bottom_color' => '#34D399',
                        'accent' => 'emerald',
                        'route' => 'belajar.halaman-27',
                    ],
                    [
                        'title' => 'Halaman 28',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#3B82F6',
                        'bottom_color' => '#60A5FA',
                        'accent' => 'blue',
                        'route' => 'belajar.halaman-28',
                    ],
                    [
                        'title' => 'Halaman 29',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#EF4444',
                        'bottom_color' => '#F87171',
                        'accent' => 'red',
                        'route' => 'belajar.halaman-29',
                    ],
                    [
                        'title' => 'Halaman 30',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#F59E0B',
                        'bottom_color' => '#FBBF24',
                        'accent' => 'amber',
                        'route' => 'belajar.halaman-30',
                    ],
                    [
                        'title' => 'Halaman 31',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#8B5CF6',
                        'bottom_color' => '#A78BFA',
                        'accent' => 'violet',
                        'route' => 'belajar.halaman-31',
                    ],
                    [
                        'title' => 'Halaman 32',
                        'subtitle' => '-',
                        'emoji' => '🌟',
                        'top_color' => '#EC4899',
                        'bottom_color' => '#F472B6',
                        'accent' => 'pink',
                        'route' => 'belajar.halaman-32',
                    ],
                    [
                        'title' => 'Halaman 33',
                        'subtitle' => '-',
                        'emoji' => '🏆',
                        'top_color' => '#FFD700',
                        'bottom_color' => '#FFA500',
                        'accent' => 'yellow',
                        'route' => 'belajar.halaman-33',
                    ],
                ];
            @endphp

            @foreach ($modules as $module)
                <article class="bg-white rounded-3xl p-6 shadow-2xl border-4 border-white relative overflow-hidden transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl hover:border-{{ $module['accent'] }}-100 group">
                    <!-- Top Gradient -->
                    <div
                        class="absolute top-0 right-0 left-0 h-2 rounded-t-3xl"
                        style="background: linear-gradient(90deg, {{ $module['top_color'] }}, {{ $module['bottom_color'] }});"
                    ></div>
                    <!-- Icon -->
                    <div class="w-full h-28 rounded-xl flex items-center justify-center mb-4 bg-gradient-to-br from-{{ $module['accent'] }}-100 to-{{ $module['accent'] }}-200">
                        <span
                            class="relative z-10 text-[4rem] transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3"
                            style="filter: drop-shadow(0 8px 20px rgba(0, 0, 0, 0.2))"
                        >
                            {{ $module['emoji'] }}
                        </span>
                    </div>
                    <div class="text-center">
                        <h2 class="mb-2 text-[1.3rem] font-black text-gray-800">{{ $module['title'] }}</h2>
                        <p class="mb-5 text-[0.9rem] leading-relaxed font-semibold text-gray-500">
                            {{ $module['subtitle'] }}
                        </p>
                        <a
                            href="{{ route($module['route']) }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-orange-500 via-orange-400 to-amber-400 px-4 py-3 text-[1.1rem] font-extrabold text-white shadow-lg transition-all hover:-translate-y-1 hover:scale-105"
                            style="box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4)"
                        >
                            <span class="text-[1.2rem]">📚</span>
                            Buka
                        </a>
                    </div>
                </article>
            @endforeach
        </section>
        {{-- Progress Section --}}
        <section class="rounded-3xl border-4 border-white bg-white p-8 text-center shadow-xl">
            <p class="mb-4 text-[1.2rem] font-extrabold text-gray-700">
                <span class="text-[1.3rem]">🌟</span>
                Ayo mulai belajar! Pilih modul di atas untuk memulai!
            </p>
            <a
                href="{{ route('belajar.halaman-1') }}"
                class="inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-violet-500 via-purple-400 to-fuchsia-400 px-10 py-5 text-[1.25rem] font-extrabold text-white shadow-xl transition-all hover:-translate-y-1 hover:scale-102"
                style="box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4)"
            >
                <span class="text-[1.3rem]">🚀</span>
                Mulai Belajar Sekarang!
            </a>
        </section>
    </main>
    {{-- Bottom wave decoration --}}
    <svg class="pointer-events-none fixed bottom-0 left-0 z-0 h-30 w-full" viewBox="0 0 1440 120" fill="none" preserveAspectRatio="none">
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
