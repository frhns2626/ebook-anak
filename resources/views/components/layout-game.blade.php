@props([
    'title' => 'Default Title',
    'halaman' => 0,
])
{{-- resources/views/components/layout-game.blade.php --}}
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title ?? 'Ebook Anak TK' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet"/>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    @endif
    <style>
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
                transform: translateY(-10px) scale(1.05);
            }
        }

        @keyframes pop {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes wiggle {
            0%,
            100% {
                transform: rotate(-5deg);
            }
            50% {
                transform: rotate(5deg);
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes rainbow {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 200% 50%;
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

        .animate-pop {
            animation: pop 0.5s ease;
        }

        .animate-wiggle {
            animation: wiggle 3s ease-in-out infinite;
        }

        body {
            font-family: 'Fredoka', cursive, sans-serif;
        }

        /* Pattern background grid biru */
        .bg-grid-pattern {
            background-color: #f4f8ff;
            background-image: linear-gradient(to right, #b8ccf3 1px, transparent 1px),
            linear-gradient(to bottom, #b8ccf3 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Kartu putih bergelombang / rounded */
        .card-box {
            background-color: #ffffff;
            border-radius: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
{{-- md:p-8--}}
<body class="bg-grid-pattern flex min-h-screen    justify-center items-start p-4">
{{--border-8  rounded-xl shadow-2xl p-6 aspect-[1/1.41] sm:p-8 --}}
<div class="relative   w-full max-w-xl  overflow-auto flex flex-col justify-between gap-10  ">
    {{ $slot }}
    @if($halaman==='0')
    @else
        <div class="relative z-20 mx-auto mt-4 mb-1 ">
            <div class="bg-[#facc15] border-2 border-black rounded-xl px-5 py-0.5 shadow-[2px_2px_0px_rgba(0,0,0,1)]">
                <span class="font-extrabold text-xs sm:text-sm text-black tracking-wide">
                    Halaman {{$halaman}}
                </span>
            </div>
        </div>
    @endif
    {{-- Flash Message Overlay --}}
    <div
        id="flashOverlay"
        class="pointer-events-none fixed top-4 left-1/2 z-50 -translate-x-1/2 -translate-y-4 opacity-0 transition-all duration-300"
    >
        <div id="flashBox" class="flex items-center gap-2 rounded-2xl px-6 py-3 shadow-xl">
            <span id="flashIcon" class="text-[1.8rem]">✅</span>
            <span id="flashText" class="text-[1.1rem] font-black text-white">Benar!</span>
        </div>
    </div>
</div>
<script>
    let flashTimeout = null;

    function showFlashMessage(type, message, detik = 2) {
        const overlay = document.getElementById('flashOverlay');
        const box = document.getElementById('flashBox');
        const icon = document.getElementById('flashIcon');
        const text = document.getElementById('flashText');

        if (!overlay || !box || !icon || !text) {
            console.error('[FlashMessage] ERROR: elemen flash overlay tidak ditemukan');
            return;
        }

        clearTimeout(flashTimeout);

        box.classList.remove('bg-green-400', 'bg-red-400');

        if (type === 'success') {
            box.classList.add('bg-green-400');
            icon.textContent = '✅';
            text.textContent = 'Benar!';
        } else {
            box.classList.add('bg-red-400');
            icon.textContent = '❌';
            text.textContent = 'Salah!';
        }

        overlay.classList.remove('opacity-0', '-translate-y-4');
        overlay.classList.add('opacity-100', 'translate-y-0');

        flashTimeout = setTimeout(() => {
            overlay.classList.remove('opacity-100', 'translate-y-0');
            overlay.classList.add('opacity-0', '-translate-y-4');
        }, detik * 1000);
    }
</script>
@stack('scripts')
</body>
</html>
