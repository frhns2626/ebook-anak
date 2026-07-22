<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔢 Belajar Angka - Games Anak TK</title>
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
            background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%);
            min-height: 100vh;
        }

        @keyframes pop {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-10px);
            }
            75% {
                transform: translateX(10px);
            }
        }

        @keyframes popIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
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

        @keyframes floatCloud {
            0%, 100% {
                transform: translateX(0) translateY(0);
            }
            50% {
                transform: translateX(25px) translateY(-5px);
            }
        }

        .animate-pop {
            animation: pop 0.5s ease;
        }

        .animate-shake {
            animation: shake 0.5s ease;
        }

        .animate-popIn {
            animation: popIn 0.5s ease;
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
{{-- Floating clouds --}}
<div class="fixed z-10 pointer-events-none animate-float-cloud hidden md:block" style="top:15%;left:10%">
    <svg width="100" height="60" viewBox="0 0 120 70" fill="none">
        <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.8"/>
        <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.85"/>
    </svg>
</div>
{{-- Main content --}}
<main class="relative z-10 p-6 min-h-screen flex flex-col items-center justify-center">
    {{-- Header --}}
    <div class="bg-white rounded-3xl p-6 md:p-8 text-center shadow-xl max-w-md w-full mb-6 relative">
        <a href="{{ route('home') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">← Kembali</a>
        <h1 class="text-blue-700 text-[2rem] md:text-[2.5rem] font-bold mb-3" style="font-family: 'Fredoka One', cursive;">🔢 Belajar Angka 🧮</h1>
        <p class="text-gray-500 text-[1rem] md:text-[1.1rem]">Hitung benda ini dan klik angka yang benar!</p>
    </div>
    <div class="bg-white rounded-3xl p-8 md:p-10 text-center shadow-2xl max-w-lg w-full">
        <p class="text-blue-700 text-[1.2rem] md:text-[1.4rem] font-bold mb-5" style="font-family: 'Fredoka One', cursive;">Hitung benda ini! 🧮</p>
        <div class="bg-sky-100 p-6 md:p-8 rounded-3xl inline-block mb-6 shadow-lg text-[2.5rem] md:text-[3rem]" id="emoji-display">🍎🍎🍎</div>
        <p class="text-gray-600 text-[1.1rem] md:text-[1.3rem] mb-6">Berapa jumlahnya? 🤔</p>
        <div class="flex justify-center gap-3 md:gap-4 flex-wrap" id="options"></div>
        <div class="mt-6 text-[1.5rem] md:text-[1.8rem] font-bold min-h-[50px]" style="font-family: 'Fredoka One', cursive;" id="result"></div>
        <button onclick="nextQuestion()"
                class="mt-5 bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 md:px-8 py-3 md:py-4 text-[1rem] md:text-[1.2rem] rounded-full font-bold shadow-lg hover:scale-105 hover:shadow-xl transition-all"
                style="font-family: 'Fredoka One', cursive;">➡️ Soal Lain
        </button>
    </div>
</main>
{{-- Bottom wave --}}
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
<script>
    const numberData = [
        {count: 1, emoji: '🍎'},
        {count: 2, emoji: '🍌🍌'},
        {count: 3, emoji: '🍊🍊🍊'},
        {count: 4, emoji: '🍇🍇🍇🍇'},
        {count: 5, emoji: '🍓🍓🍓🍓🍓'},
        {count: 6, emoji: '🥝🥝🥝🥝🥝🥝'},
        {count: 7, emoji: '🍒🍒🍒🍒🍒🍒🍒'},
        {count: 8, emoji: '🍑🍑🍑🍑🍑🍑🍑🍑'}
    ];

    let currentQuestion = null;

    function initGame() {
        currentQuestion = numberData[Math.floor(Math.random() * numberData.length)];

        document.getElementById('emoji-display').textContent = currentQuestion.emoji;
        document.getElementById('result').textContent = '';
        document.getElementById('result').className = 'mt-6 text-[1.5rem] md:text-[1.8rem] font-bold min-h-[50px]';

        const wrongAnswers = numberData
            .filter(n => n.count !== currentQuestion.count)
            .sort(() => Math.random() - 0.5)
            .slice(0, 3);

        const options = [currentQuestion, ...wrongAnswers].sort(() => Math.random() - 0.5);

        document.getElementById('options').innerHTML = options.map(opt => `
                <button class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-pink-400 to-pink-500 text-white border-none rounded-2xl text-[2rem] md:text-[2.5rem] font-bold shadow-xl hover:scale-110 hover:rotate-3 hover:shadow-2xl transition-all cursor-pointer" style="font-family: 'Fredoka One', cursive;"
                        onclick="checkAnswer(${opt.count}, this)">
                    ${opt.count}
                </button>
            `).join('');
    }

    function checkAnswer(count, btn) {
        const result = document.getElementById('result');

        if (count === currentQuestion.count) {
            result.textContent = '🎉🎉 BENAR! KAMU HEBAT! ⭐🎉🎉';
            result.className = 'mt-6 text-[1.5rem] md:text-[1.8rem] font-bold min-h-[50px] text-green-500 animate-popIn';
            btn.className = 'w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-green-500 to-green-600 text-white border-none rounded-2xl text-[2rem] md:text-[2.5rem] font-bold shadow-xl animate-pop cursor-pointer';
            document.querySelectorAll('#options button').forEach(b => b.disabled = true);
            btn.disabled = false;
        } else {
            result.textContent = `❌ Belum tepat... Jawabannya adalah ${currentQuestion.count}! 💪`;
            result.className = 'mt-6 text-[1.5rem] md:text-[1.8rem] font-bold min-h-[50px] text-red-500 animate-popIn';
            btn.className = 'w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-red-500 to-red-600 text-white border-none rounded-2xl text-[2rem] md:text-[2.5rem] font-bold shadow-xl animate-shake cursor-pointer';
            document.querySelectorAll('#options button').forEach(b => {
                if (parseInt(b.textContent) === currentQuestion.count) {
                    b.className = 'w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-green-500 to-green-600 text-white border-none rounded-2xl text-[2rem] md:text-[2.5rem] font-bold shadow-xl animate-pop cursor-pointer';
                }
                b.disabled = true;
            });
        }
    }

    function nextQuestion() {
        initGame();
    }

    initGame();
</script>
</body>
</html>
