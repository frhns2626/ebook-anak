{{-- resources/views/components/layout-game.blade.php --}}
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ebook Anak TK' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @endif
    <style>
        body {
            font-family: 'Fredoka', 'Comic Neue', sans-serif;
            background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%);
            min-height: 100vh;
        }

        @keyframes twinkle {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.7;
                transform: scale(0.9);
            }
        }

        @keyframes float-cloud {
            0%, 100% {
                transform: translateX(0) translateY(0);
            }
            50% {
                transform: translateX(25px) translateY(-5px);
            }
        }

        @keyframes float-gentle {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }

        @keyframes float-side {
            0%, 100% {
                transform: translateX(0) translateY(0);
            }
            50% {
                transform: translateX(15px) translateY(-10px);
            }
        }

        @keyframes bounce-subtle {
            0%, 100% {
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
            0%, 100% {
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
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">
<div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" style="background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%);"></div>
{{-- Floating stars --}}
<div class="fixed z-10 pointer-events-none animate-twinkle" style="top:5%;left:3%">
    <svg width="35" height="35" viewBox="0 0 45 45" fill="none">
        <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24"/>
    </svg>
</div>
<div class="fixed z-10 pointer-events-none animate-twinkle" style="top:8%;right:5%;animation-delay:0.5s">
    <svg width="28" height="28" viewBox="0 0 45 45" fill="none">
        <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#F472B6"/>
    </svg>
</div>
<div class="fixed z-10 pointer-events-none animate-twinkle hidden md:block" style="top:25%;left:2%;animation-delay:1s">
    <svg width="25" height="25" viewBox="0 0 45 45" fill="none">
        <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#A78BFA"/>
    </svg>
</div>
<div class="fixed z-10 pointer-events-none animate-twinkle hidden md:block" style="top:30%;right:3%;animation-delay:1.5s">
    <svg width="32" height="32" viewBox="0 0 45 45" fill="none">
        <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#34D399"/>
    </svg>
</div>
{{-- Floating clouds --}}
<div class="fixed z-10 pointer-events-none animate-float-cloud hidden md:block" style="top:6%;left:8%">
    <svg width="100" height="60" viewBox="0 0 120 70" fill="none">
        <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.8"/>
        <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.85"/>
    </svg>
</div>
<div class="fixed z-10 pointer-events-none animate-float-cloud hidden md:block" style="top:12%;right:12%;animation-delay:2s">
    <svg width="80" height="50" viewBox="0 0 120 70" fill="none">
        <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.75"/>
        <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.8"/>
    </svg>
</div>
{{-- Floating animals --}}
<div class="fixed z-10 pointer-events-none animate-float-gentle hidden md:block" style="bottom:18%;left:3%;animation-duration:5s">🐰</div>
<div class="fixed z-10 pointer-events-none animate-float-gentle" style="bottom:22%;right:4%">🦊</div>
<div class="fixed z-10 pointer-events-none animate-float-gentle hidden md:block" style="top:20%;left:5%">🐻</div>
<div class="fixed z-10 pointer-events-none animate-float-gentle" style="top:22%;right:6%">🐱</div>
{{-- Butterflies --}}
<div class="fixed z-10 pointer-events-none animate-float-side hidden md:block" style="top:35%;left:4%">🦋</div>
<div class="fixed z-10 pointer-events-none animate-float-side hidden md:block" style="top:40%;right:5%">🦋</div>
{{ $slot }}
<svg class="fixed bottom-0 left-0 w-full h-24 z-0 pointer-events-none" viewBox="0 0 1440 120" fill="none" preserveAspectRatio="none">
    <path
        d="M0 120L48 110C96 100 192 80 288 70C384 60 480 60 576 65C672 70 768 80 864 85C960 90 1056 90 1152 82.5C1248 75 1344 60 1392 52.5L1440 45V120H1392C1344 120 1248 120 1152 120C1056 120 960 120 864 120C768 120 672 120 576 120C480 120 384 120 288 120C192 120 96 120 48 120H0Z"
        fill="url(#wave-gradient)" fill-opacity="0.15"/>
    <defs>
        <linearGradient id="wave-gradient" x1="0" y1="0" x2="1440" y2="0" gradientUnits="userSpaceOnUse">
            <stop stop-color="#10B981"/>
            <stop offset="0.5" stop-color="#8B5CF6"/>
            <stop offset="1" stop-color="#F97316"/>
        </linearGradient>
    </defs>
</svg>
{{-- Flash Message Overlay --}}
<div id="flashOverlay" class="fixed top-4 left-1/2 -translate-x-1/2 z-50 pointer-events-none opacity-0 -translate-y-4 transition-all duration-300">
    <div id="flashBox" class="rounded-2xl px-6 py-3 shadow-xl flex items-center gap-2">
        <span id="flashIcon" class="text-[1.8rem]">✅</span>
        <span id="flashText" class="text-[1.1rem] font-black text-white">Benar!</span>
    </div>
</div>
@stack('scripts')
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
            console.log('%c[FlashMessage] tampil: BENAR', 'color: #10B981; font-weight: bold;');
        } else {
            box.classList.add('bg-red-400');
            icon.textContent = '❌';
            text.textContent = 'Salah!';
            console.log('%c[FlashMessage] tampil: SALAH', 'color: #EF4444; font-weight: bold;');
        }

        overlay.classList.remove('opacity-0', '-translate-y-4');
        overlay.classList.add('opacity-100', 'translate-y-0');

        flashTimeout = setTimeout(() => {
            overlay.classList.remove('opacity-100', 'translate-y-0');
            overlay.classList.add('opacity-0', '-translate-y-4');
            console.log('[FlashMessage] overlay disembunyikan');
        }, detik * 1000); // ← angka ini yang menentukan durasi (dalam milidetik)
    }
</script>
@stack('scripts')
</body>
</html>
