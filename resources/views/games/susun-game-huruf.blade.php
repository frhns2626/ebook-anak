<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>🔤 {{ $judul }} - Games Anak TK</title>
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

        @keyframes shake {
            0%,
            100% {
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

        .animate-bounce {
            animation: bounce 2s ease-in-out infinite;
        }

        .animate-shake {
            animation: shake 0.5s ease;
        }

        .animate-popIn {
            animation: popIn 0.5s ease;
        }

        .animate-twinkle {
            animation: twinkle 3s ease-in-out infinite;
        }

        .animate-float-cloud {
            animation: floatCloud 8s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100">
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
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 8%; right: 5%">
        <svg width="28" height="28" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#A78BFA" />
        </svg>
    </div>
    {{-- Floating clouds --}}
    <div class="animate-float-cloud pointer-events-none fixed z-10 hidden md:block" style="top: 15%; left: 10%">
        <svg width="100" height="60" viewBox="0 0 120 70" fill="none">
            <ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.8" />
            <ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.85" />
        </svg>
    </div>
    {{-- Main content --}}
    <main class="relative z-10 flex min-h-screen flex-col items-center justify-center p-6">
        {{-- Header --}}
        <div class="relative mb-6 w-full max-w-md rounded-3xl bg-white p-6 text-center shadow-xl md:p-8">
            <a
                href="{{ route('home') }}"
                class="absolute top-1/2 left-4 -translate-y-1/2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-500 transition-all hover:bg-red-200"
            >← Kembali</a>
            <h1
                class="mb-3 text-[2rem] font-bold text-violet-600 md:text-[2.5rem]"
                style="font-family: 'Fredoka One', cursive"
            >
                🔤 {{ $judul }}
            </h1>
            <p class="text-[1rem] text-gray-500 md:text-[1.1rem]">{{ $deskripsi }}</p>
        </div>
        <div class="w-full max-w-lg rounded-3xl bg-white p-8 text-center shadow-2xl md:p-10">
            <div class="mb-3 animate-bounce text-[5rem] md:text-[6rem]" id="emoji-display">
                {{ $items[0]['emoji'] }}
            </div>
            <p class="mb-6 text-[1.2rem] text-gray-600 md:text-[1.4rem]">Apa nama ini? 🤔</p>
            <div
                class="mb-6 flex min-h-[70px] items-center justify-center rounded-2xl border-4 border-dashed border-violet-500 bg-violet-50 text-[2rem] font-bold text-violet-600 md:text-[2.5rem]"
                id="answer-box"
                style="font-family: 'Fredoka One', cursive"
            ></div>
            <div class="mb-6 flex flex-wrap justify-center gap-2 md:gap-3" id="letters-container"></div>
            <div class="flex flex-wrap justify-center gap-3 md:gap-4">
                <button
                    onclick="checkAnswer()"
                    class="rounded-full bg-gradient-to-r from-green-500 to-green-600 px-5 py-3 text-[1rem] font-bold text-white shadow-lg transition-all hover:scale-105 hover:shadow-xl md:px-8 md:py-4 md:text-[1.2rem]"
                    style="font-family: 'Fredoka One', cursive"
                >
                    ✅ Cek Jawaban
                </button>
                <button
                    onclick="resetLetters()"
                    class="rounded-full bg-gradient-to-r from-amber-500 to-amber-600 px-5 py-3 text-[1rem] font-bold text-white shadow-lg transition-all hover:scale-105 hover:shadow-xl md:px-8 md:py-4 md:text-[1.2rem]"
                    style="font-family: 'Fredoka One', cursive"
                >
                    🔄 Ulangi
                </button>
                <button
                    onclick="nextWord()"
                    class="rounded-full bg-gradient-to-r from-violet-500 to-purple-500 px-5 py-3 text-[1rem] font-bold text-white shadow-lg transition-all hover:scale-105 hover:shadow-xl md:px-8 md:py-4 md:text-[1.2rem]"
                    style="font-family: 'Fredoka One', cursive"
                >
                    ➡️ Kata Lain
                </button>
            </div>
            <div
                class="mt-5 text-[1.3rem] font-bold md:text-[1.5rem]"
                style="font-family: 'Fredoka One', cursive"
                id="result"
            ></div>
        </div>
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
    <script>
        const words = @json($items);

        let currentWord = null;
        let userAnswer = [];
        let selectedButtons = [];

        function initGame() {
            currentWord = words[Math.floor(Math.random() * words.length)];
            userAnswer = [];
            selectedButtons = [];

            document.getElementById('emoji-display').textContent = currentWord.emoji;
            document.getElementById('answer-box').textContent = '';
            document.getElementById('answer-box').className =
                'min-h-[70px] border-4 border-dashed border-violet-500 rounded-2xl mb-6 flex items-center justify-center text-[2rem] md:text-[2.5rem] font-bold text-violet-600 bg-violet-50';
            document.getElementById('result').textContent = '';
            document.getElementById('result').className = 'mt-5 text-[1.3rem] md:text-[1.5rem] font-bold';

            const letters = currentWord.word.split('').sort(() => Math.random() - 0.5);

            document.getElementById('letters-container').innerHTML = letters
                .map(
                    (letter, i) => `
                    <button class="w-12 h-12 md:w-14 md:h-14 bg-white border-4 border-violet-500 rounded-xl text-[1.5rem] md:text-[1.8rem] font-bold cursor-pointer text-violet-600 transition-all hover:bg-violet-500 hover:text-white hover:scale-110"
                            data-letter="${letter}" data-index="${i}" onclick="selectLetter('${letter}', this)" style="font-family: 'Fredoka One', cursive;">
                        ${letter}
                    </button>
                `,
                )
                .join('');
        }

        function selectLetter(letter, btn) {
            if (btn.disabled) return;

            userAnswer.push(letter);
            selectedButtons.push(btn);
            btn.disabled = true;
            btn.className =
                'w-12 h-12 md:w-14 md:h-14 bg-violet-400 border-4 border-violet-400 rounded-xl text-[1.5rem] md:text-[1.8rem] font-bold cursor-pointer text-white opacity-50';

            document.getElementById('answer-box').textContent = userAnswer.join(' ');
        }

        function checkAnswer() {
            const answer = userAnswer.join('');
            const result = document.getElementById('result');
            const answerBox = document.getElementById('answer-box');

            if (answer === currentWord.word) {
                result.textContent = '🎉🎉 BENAR! KAMU HEBAT! ⭐🎉🎉';
                result.className = 'mt-5 text-[1.3rem] md:text-[1.5rem] font-bold text-green-500 animate-popIn';
                answerBox.className =
                    'min-h-[70px] border-4 border-green-500 rounded-2xl mb-6 flex items-center justify-center text-[2rem] md:text-[2.5rem] font-bold text-green-700 bg-green-100';
            } else {
                result.textContent = '❌ Belum tepat... Coba lagi ya! 💪';
                result.className = 'mt-5 text-[1.3rem] md:text-[1.5rem] font-bold text-red-500 animate-popIn';
                answerBox.className =
                    'min-h-[70px] border-4 border-red-500 rounded-2xl mb-6 flex items-center justify-center text-[2rem] md:text-[2.5rem] font-bold text-red-700 bg-red-100 animate-shake';
            }
        }

        function resetLetters() {
            userAnswer = [];
            selectedButtons = [];
            document.getElementById('answer-box').textContent = '';
            document.getElementById('answer-box').className =
                'min-h-[70px] border-4 border-dashed border-violet-500 rounded-2xl mb-6 flex items-center justify-center text-[2rem] md:text-[2.5rem] font-bold text-violet-600 bg-violet-50';
            document.getElementById('result').textContent = '';
            document.querySelectorAll('#letters-container button').forEach((btn) => {
                btn.disabled = false;
                btn.className =
                    'w-12 h-12 md:w-14 md:h-14 bg-white border-4 border-violet-500 rounded-xl text-[1.5rem] md:text-[1.8rem] font-bold cursor-pointer text-violet-600 transition-all hover:bg-violet-500 hover:text-white hover:scale-110';
            });
        }

        function nextWord() {
            initGame();
        }

        initGame();
    </script>
</body>
</html>
