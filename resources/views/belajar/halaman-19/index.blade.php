<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman 19 - Ebook Anak TK</title>
    @fonts
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

        @keyframes float-gentle {
            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(5deg);
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
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes floatUp {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
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

        .animate-float-gentle {
            animation: float-gentle 4s ease-in-out infinite;
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }

        .animate-pop {
            animation: pop 0.5s ease;
        }

        .animate-float-up {
            animation: floatUp 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">
    <div
        class="pointer-events-none fixed inset-0 z-0 overflow-hidden"
        style="background: linear-gradient(180deg, #fff9e6 0%, #e8f5e9 50%, #f0fff4 100%)"
    ></div>
    <div class="animate-twinkle pointer-events-none fixed z-10" style="top: 5%; left: 3%">
        <svg width="35" height="35" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24" />
        </svg>
    </div>
    <div class="animate-float-gentle pointer-events-none fixed z-10" style="bottom: 22%; right: 4%">🦎</div>
    <main class="relative z-10 mx-auto max-w-4xl p-6">
        <div class="relative mb-6 overflow-hidden rounded-3xl bg-white p-6 text-center shadow-xl">
            <div
                class="absolute top-0 right-0 left-0 h-2"
                style="
                    background: linear-gradient(90deg, #ff6b6b, #ff9f43, #ffe66d, #4ecdc4, #6c5ce7, #ff6b6b);
                    background-size: 200% 100%;
                    animation: rainbow 3s linear infinite;
                "
            ></div>
            <a
                href="{{ route('belajar.index') }}"
                class="absolute top-1/2 left-4 -translate-y-1/2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-500 transition-all hover:bg-red-200"
            >← Kembali</a>
            <span class="animate-bounce-subtle mb-2 block text-[3rem]">🦎</span>
            <h1 class="mb-1 text-[1.8rem] font-black text-gray-800 md:text-[2.2rem]">Halaman 19 - Kadal 🦎</h1>
            <p class="text-[1rem] text-gray-500">Mengenal macam-macam!</p>
        </div>
        <div class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-3 md:gap-6">
            @foreach ($items as $index => $item)
                <div
                    class="group cursor-pointer rounded-3xl border-4 border-transparent bg-white p-6 text-center shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl"
                    onclick="selectItem('{{ $item['id'] }}')"
                >
                    <div
                        class="animate-float-up mb-3 text-[4rem] md:text-[5rem]"
                        style="animation-delay: {{ ($index % 5) * 0.3 }}s"
                    >
                        {{ $item['emoji'] }}
                    </div>
                    <h3 class="mb-1 text-[1.2rem] font-black text-gray-800 md:text-[1.4rem]">{{ $item['name'] }}</h3>
                    <p class="text-xs text-gray-500">{{ $item['name'] }}</p>
                </div>
            @endforeach
        </div>
        <div id="itemDisplay" class="mb-6 hidden rounded-3xl bg-white p-8 text-center shadow-2xl">
            <div class="animate-pop mb-4 text-[8rem] md:text-[10rem]" id="itemEmoji">🦎</div>
            <h2 class="mb-2 text-[2.5rem] font-black text-gray-800 md:text-[3rem]" id="itemName">Kadal</h2>
            <p class="mb-6 text-[1.2rem] text-gray-500" id="itemHint">Kadal adalah reptil yang merayap!</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button
                    onclick="playAudio()"
                    class="rounded-full bg-gradient-to-r from-blue-400 to-blue-500 px-6 py-3 font-bold text-white shadow-lg transition-all hover:scale-105"
                >
                    🔊 Dengarkan
                </button>
                <button
                    onclick="nextItem()"
                    class="rounded-full bg-gradient-to-r from-green-400 to-green-500 px-6 py-3 font-bold text-white shadow-lg transition-all hover:scale-105"
                >
                    ➡️ Lanjut
                </button>
            </div>
        </div>
        <div class="rounded-2xl bg-white p-4 shadow-lg">
            <div class="mb-2 flex items-center justify-between">
                <span class="text-sm font-bold text-gray-600">Progress</span>
                <span id="progressText" class="text-sm font-bold text-green-500">0 / {{ count($items) }}</span>
            </div>
            <div class="h-4 overflow-hidden rounded-full bg-gray-200">
                <div
                    id="progressBar"
                    class="h-full rounded-full bg-gradient-to-r from-green-400 to-emerald-500 transition-all duration-500"
                    style="width: 0%"
                ></div>
            </div>
        </div>
    </main>
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
        const items = @json($items);
        let currentIndex = 0;
        let viewed = new Set();

        function selectItem(id) {
            currentIndex = items.findIndex((item) => item.id === id);
            showItem();
            viewed.add(id);
            updateProgress();
            document.getElementById('itemDisplay').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        function showItem() {
            const item = items[currentIndex];
            document.getElementById('itemDisplay').classList.remove('hidden');
            document.getElementById('itemEmoji').textContent = item.emoji;
            document.getElementById('itemName').textContent = item.name;
            document.getElementById('itemHint').textContent = item.hint;
        }

        function updateProgress() {
            const count = viewed.size;
            document.getElementById('progressText').textContent = count + ' / ' + items.length;
            document.getElementById('progressBar').style.width = (count / items.length) * 100 + '%';
        }

        function playAudio() {
            const item = items[currentIndex];
            const utterance = new SpeechSynthesisUtterance(item.name);
            utterance.lang = 'id-ID';
            utterance.rate = 0.8;
            speechSynthesis.speak(utterance);
        }

        function nextItem() {
            currentIndex = (currentIndex + 1) % items.length;
            showItem();
        }

        showItem();
    </script>
</body>
</html>
