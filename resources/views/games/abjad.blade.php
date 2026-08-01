<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>🔤 Belajar Huruf Abjad A-Z - Ebook Anak TK</title>
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
            background: linear-gradient(180deg, #87ceeb 0%, #98fb98 30%, #ffe4b5 60%, #ffa07a 100%);
            min-height: 100vh;
        }

        @keyframes float1 {
            0%,
            100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            25% {
                transform: translateY(-30px) translateX(10px) rotate(5deg);
            }
            50% {
                transform: translateY(-10px) translateX(-10px) rotate(-3deg);
            }
            75% {
                transform: translateY(-40px) translateX(5px) rotate(3deg);
            }
        }

        @keyframes float2 {
            0%,
            100% {
                transform: translateY(0) translateX(0) rotate(0deg) scale(1);
            }
            33% {
                transform: translateY(-25px) translateX(-15px) rotate(-5deg) scale(1.1);
            }
            66% {
                transform: translateY(-35px) translateX(10px) rotate(5deg) scale(0.95);
            }
        }

        @keyframes float3 {
            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }

        @keyframes cloudFloat {
            0%,
            100% {
                transform: translateX(0) translateY(0);
            }
            50% {
                transform: translateX(20px) translateY(-10px);
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

        .animate-float1 {
            animation: float1 8s ease-in-out infinite;
        }

        .animate-float2 {
            animation: float2 10s ease-in-out infinite 1s;
        }

        .animate-float3 {
            animation: float3 7s ease-in-out infinite 0.5s;
        }

        .animate-cloudFloat {
            animation: cloudFloat 12s ease-in-out infinite;
        }

        .animate-bounce {
            animation: bounce 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">
    {{-- Floating animals background --}}
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
        <span class="animate-float1 absolute text-[4rem] opacity-25 blur-[1px]" style="top: 5%; left: 2%">🐱</span>
        <span class="animate-float2 absolute text-[3rem] opacity-25 blur-[1px]" style="top: 8%; right: 3%">🐶</span>
        <span class="animate-float3 absolute text-[4rem] opacity-25 blur-[1px]" style="top: 20%; left: 8%">🐰</span>
        <span
            class="animate-float1 absolute text-[4rem] opacity-25 blur-[1px]"
            style="top: 25%; right: 10%; animation-delay: 2s"
        >🦊</span>
        <span class="animate-float2 absolute text-[3.5rem] opacity-25 blur-[1px]" style="bottom: 30%; left: 5%"
            >🐻</span>
        <span class="animate-float3 absolute text-[4rem] opacity-25 blur-[1px]" style="bottom: 25%; right: 8%">🦁</span>
        <span
            class="animate-float1 absolute text-[3rem] opacity-25 blur-[1px]"
            style="bottom: 15%; left: 10%; animation-delay: 1s"
        >🐸</span>
        <span
            class="animate-float2 absolute text-[4rem] opacity-25 blur-[1px]"
            style="bottom: 10%; right: 3%; animation-delay: 1.5s"
        >🐷</span>
        {{-- Clouds --}}
        <div
            class="animate-cloudFloat absolute rounded-full bg-white/40 blur-[2px]"
            style="top: 15%; left: 20%; width: 150px; height: 60px; animation-delay: 0s"
        ></div>
        <div
            class="animate-cloudFloat absolute rounded-full bg-white/40 blur-[2px]"
            style="top: 35%; right: 15%; width: 120px; height: 50px; animation-delay: 2s"
        ></div>
        <div
            class="animate-cloudFloat absolute rounded-full bg-white/40 blur-[2px]"
            style="bottom: 35%; left: 30%; width: 100px; height: 40px; animation-delay: 1s"
        ></div>
    </div>
    {{-- Sun rays --}}
    <div class="pointer-events-none fixed -top-[50px] -right-[50px] z-0 h-[200px] w-[200px] rounded-full bg-gradient-to-b from-yellow-400 to-transparent opacity-30"></div>
    {{-- Grass at bottom --}}
    <div class="pointer-events-none fixed bottom-0 left-0 z-0 h-20 w-full bg-gradient-to-t from-green-400/30 to-transparent"></div>
    {{-- Main content --}}
    <main class="relative z-10 p-6">
        {{-- Header --}}
        <div class="relative z-20 mx-auto mb-6 max-w-4xl rounded-2xl bg-gradient-to-r from-red-400 to-orange-400 p-5 text-center shadow-lg">
            <a
                href="{{ route('home') }}"
                class="absolute top-1/2 left-5 -translate-y-1/2 rounded-full bg-white/20 px-5 py-2.5 text-sm font-bold text-white no-underline transition-all hover:bg-white/30"
            >← Kembali</a>
            <h1
                class="mb-1 text-[2rem] font-bold text-white drop-shadow-lg md:text-[2.5rem]"
                style="font-family: 'Fredoka One', cursive"
            >
                🔤 Belajar Huruf A-Z 🌟
            </h1>
            <p class="text-[1rem] text-white/90 md:text-[1.2rem]">Klik huruf untuk mendengar bunyinya! 📚✨</p>
        </div>
        <div class="mx-auto max-w-4xl">
            {{-- Progress Section --}}
            <div class="mb-6 rounded-3xl bg-white p-6 text-center shadow-xl">
                <div class="mb-3 h-5 overflow-hidden rounded-2xl bg-gray-200">
                    <div
                        id="progressFill"
                        class="h-full rounded-2xl bg-gradient-to-r from-violet-500 to-purple-400 transition-all duration-300"
                        style="width: 0%"
                    ></div>
                </div>
                <p
                    id="progressText"
                    class="text-[1.2rem] font-bold text-violet-600"
                    style="font-family: 'Fredoka One', cursive"
                >
                    🎯 Mulai dari huruf A!
                </p>
            </div>
            {{-- Main Display --}}
            <div class="mb-6 rounded-3xl bg-white p-8 text-center shadow-xl md:p-10">
                <div
                    class="mb-4 animate-bounce bg-gradient-to-b from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-[6rem] leading-none font-bold text-transparent drop-shadow-lg md:text-[10rem]"
                    id="bigLetter"
                >
                    A
                </div>
                <p class="mb-4 text-[1.1rem] text-gray-600 md:text-[1.3rem]" id="letterDescription">
                    Huruf A seperti... Apel 🍎
                </p>
                {{-- Controls --}}
                <div class="my-6 flex flex-wrap justify-center gap-4">
                    <button
                        id="btnListen"
                        onclick="playAudio()"
                        class="rounded-full bg-gradient-to-r from-teal-400 to-teal-600 px-6 py-3 text-[1rem] font-bold text-white shadow-lg transition-all hover:-translate-y-1 hover:shadow-xl md:px-8 md:py-4 md:text-[1.3rem]"
                        style="font-family: 'Fredoka One', cursive; display: inline-flex; align-items: center; gap: 8px"
                    >
                        🔊 Dengarkan
                    </button>
                    <button
                        id="btnSpeak"
                        onclick="startListening()"
                        class="rounded-full bg-gradient-to-r from-orange-400 to-amber-500 px-6 py-3 text-[1rem] font-bold text-white shadow-lg transition-all hover:-translate-y-1 hover:shadow-xl md:px-8 md:py-4 md:text-[1.3rem]"
                        style="font-family: 'Fredoka One', cursive; display: inline-flex; align-items: center; gap: 8px"
                    >
                        🎤 Ucapkan
                    </button>
                </div>
                {{-- Feedback --}}
                <div
                    id="feedback"
                    class="mx-auto my-5 hidden max-w-md rounded-2xl p-5 text-[1.3rem] font-bold md:text-[1.6rem]"
                ></div>
            </div>
            {{-- Letter Grid --}}
            <div class="mb-6 rounded-3xl bg-white p-6 shadow-xl">
                <h3 class="mb-4 text-center text-[1.1rem] font-bold text-gray-700 md:text-[1.3rem]">📝 Pilih Huruf:</h3>
                <div id="letterGrid" class="grid grid-cols-6 justify-center gap-2 md:grid-cols-9 md:gap-3"></div>
            </div>
            {{-- Score Section --}}
            <div class="rounded-3xl bg-gradient-to-r from-yellow-200 to-amber-200 p-6 text-center shadow-xl">
                <h3
                    class="mb-4 text-[1.1rem] font-bold text-amber-800 md:text-[1.3rem]"
                    style="font-family: 'Fredoka One', cursive"
                >
                    🏆 Skor Kamu
                </h3>
                <div class="flex justify-center gap-8">
                    <div class="text-center">
                        <div
                            class="text-[2rem] font-bold text-green-600 md:text-[3rem]"
                            style="font-family: 'Fredoka One', cursive"
                            id="correctCount"
                        >
                            0
                        </div>
                        <div class="text-sm text-amber-800 md:text-base">✅ Benar</div>
                    </div>
                    <div class="text-center">
                        <div
                            class="text-[2rem] font-bold text-red-500 md:text-[3rem]"
                            style="font-family: 'Fredoka One', cursive"
                            id="wrongCount"
                        >
                            0
                        </div>
                        <div class="text-sm text-amber-800 md:text-base">❌ Salah</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
        const letterData = {
            A: { word: 'Apel 🍎', color: 'from-red-400 to-orange-400' },
            B: { word: 'Bebek 🦆', color: 'from-blue-400 to-cyan-400' },
            C: { word: 'Cumi-cumi 🦑', color: 'from-purple-400 to-pink-400' },
            D: { word: 'Domba 🐑', color: 'from-gray-300 to-gray-400' },
            E: { word: 'Elang 🦅', color: 'from-amber-400 to-yellow-400' },
            F: { word: 'Facestar 🐘', color: 'from-gray-500 to-gray-600' },
            G: { word: 'Gajah 🐘', color: 'from-gray-600 to-gray-700' },
            H: { word: 'Harimau 🐯', color: 'from-orange-400 to-amber-400' },
            I: { word: 'Ikan 🐟', color: 'from-blue-300 to-cyan-300' },
            J: { word: 'Jerapah 🦒', color: 'from-yellow-300 to-orange-300' },
            K: { word: 'Koala 🐨', color: 'from-gray-400 to-gray-500' },
            L: { word: 'Leopard 🐆', color: 'from-yellow-500 to-amber-500' },
            M: { word: 'Monyet 🐵', color: 'from-amber-600 to-brown-500' },
            N: { word: 'Naga 🐉', color: 'from-green-500 to-emerald-500' },
            O: { word: 'Owl 🦉', color: 'from-amber-700 to-brown-600' },
            P: { word: 'Panda 🐼', color: 'from-white to-gray-200' },
            Q: { word: 'Quail 🐦', color: 'from-green-400 to-teal-400' },
            R: { word: 'Rubah 🦊', color: 'from-orange-500 to-red-500' },
            S: { word: 'Singa 🦁', color: 'from-amber-500 to-orange-500' },
            T: { word: 'Tupai 🐿️', color: 'from-amber-600 to-yellow-600' },
            U: { word: 'Unta 🐪', color: 'from-amber-700 to-stone-600' },
            V: { word: 'Vet 🐌', color: 'from-green-600 to-emerald-600' },
            W: { word: 'Walrus 🦭', color: 'from-gray-400 to-slate-500' },
            X: { word: 'Xenopus 🐸', color: 'from-green-500 to-lime-500' },
            Y: { word: 'Yak 🦬', color: 'from-amber-700 to-stone-700' },
            Z: { word: 'Zebra 🦓', color: 'from-white to-gray-300' },
        };

        let currentLetter = 'A';
        let correctCount = 0;
        let wrongCount = 0;
        let recognition = null;

        function initLetterGrid() {
            const grid = document.getElementById('letterGrid');
            alphabet.forEach((letter) => {
                const btn = document.createElement('button');
                btn.className = `w-10 h-10 md:w-12 md:h-12 rounded-full bg-gradient-to-br ${letterData[letter].color} text-white font-bold text-base md:text-lg shadow-lg hover:scale-110 hover:shadow-xl transition-all cursor-pointer border-4 border-white/50`;
                btn.textContent = letter;
                btn.onclick = () => selectLetter(letter);
                grid.appendChild(btn);
            });
        }

        function selectLetter(letter) {
            currentLetter = letter;
            document.getElementById('bigLetter').textContent = letter;
            document.getElementById('letterDescription').textContent =
                `Huruf ${letter} seperti... ${letterData[letter].word}`;

            document.querySelectorAll('#letterGrid button').forEach((btn) => {
                btn.classList.toggle('ring-4', btn.textContent === letter);
                btn.classList.toggle('ring-yellow-400', btn.textContent === letter);
                btn.classList.toggle('scale-125', btn.textContent === letter);
            });

            document.getElementById('progressText').textContent = `🎯 Huruf ${letter} dari 26`;
            document.getElementById('progressFill').style.width = `${((alphabet.indexOf(letter) + 1) / 26) * 100}%`;
        }

        function playAudio() {
            const utterance = new SpeechSynthesisUtterance(currentLetter);
            utterance.lang = 'id-ID';
            utterance.rate = 0.8;
            speechSynthesis.speak(utterance);
        }

        function startListening() {
            if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
                alert('Maaf, browser kamu tidak mendukung fitur ini! 😢');
                return;
            }

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            recognition = new SpeechRecognition();
            recognition.lang = 'id-ID';
            recognition.start();

            const btnSpeak = document.getElementById('btnSpeak');
            btnSpeak.classList.add('animate-pulse');
            btnSpeak.textContent = '🎤 Mendengarkan...';

            recognition.onresult = (event) => {
                const result = event.results[0][0].transcript.toUpperCase().trim();
                checkAnswer(result);
            };

            recognition.onend = () => {
                btnSpeak.classList.remove('animate-pulse');
                btnSpeak.innerHTML = '🎤 Ucapkan';
            };
        }

        function checkAnswer(spoken) {
            const feedback = document.getElementById('feedback');
            feedback.classList.remove('hidden');
            feedback.classList.remove('bg-green-200', 'text-green-800', 'bg-red-200', 'text-red-800');
            feedback.style.animation = 'slideUp 0.3s ease';

            if (spoken === currentLetter) {
                correctCount++;
                document.getElementById('correctCount').textContent = correctCount;
                feedback.classList.add('bg-green-200', 'text-green-800');
                feedback.textContent = '🎉 Sangat bagus! Kamu mengucapkan huruf ' + currentLetter + ' dengan benar!';
            } else {
                wrongCount++;
                document.getElementById('wrongCount').textContent = wrongCount;
                feedback.classList.add('bg-red-200', 'text-red-800');
                feedback.textContent =
                    '🤔 Hmm... coba lagi! Kamu mengucapkan "' +
                    spoken +
                    '", tapi yang benar adalah "' +
                    currentLetter +
                    '"';
            }
        }

        initLetterGrid();
        selectLetter('A');
    </script>
</body>
</html>
