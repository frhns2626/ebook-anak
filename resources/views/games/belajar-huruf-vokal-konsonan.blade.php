<x-layout-game>
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🔤</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">{{ $judul }}</h1>
            <p class="text-gray-500 text-[1rem]">{{ $deskripsi }}</p>
        </div>
        <div class="space-y-4 mb-6">
            @foreach($items as $rowIndex => $item)
                <div class="bg-white rounded-3xl p-4 md:p-6 shadow-xl">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-black text-gray-800 text-lg">Pola Vokal {{ $item['vokal'] }}</span>
                        <button type="button" onclick="playRowAudio('{{ $item['audio'] }}')"
                                class="bg-gradient-to-r from-blue-400 to-blue-500 text-white px-4 py-2 rounded-full font-bold text-sm shadow-md hover:scale-105 transition-all">
                            🔊 Dengarkan
                        </button>
                    </div>
                    <div class="flex items-center gap-3 md:gap-4 overflow-x-auto pb-1">
                        <div
                            class="shrink-0 w-14 h-14 md:w-16 md:h-16 rounded-full bg-gradient-to-br from-purple-400 to-purple-500 text-white flex items-center justify-center font-black text-2xl shadow-md">
                            {{ $item['vokal'] }}
                        </div>
                        @foreach($item['suku_kata'] as $sukuIndex => $suku)
                            @if($sukuIndex > 0)
                                <button type="button"
                                        class="suku-chip shrink-0 bg-gray-100 hover:bg-orange-100 text-gray-800 px-4 py-3 rounded-2xl font-black text-lg md:text-xl transition-all"
                                        data-row="{{ $rowIndex }}" data-suku="{{ $sukuIndex }}"
                                        onclick="speakSuku(this, '{{ $suku }}')">
                                    {{ $suku }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-lg">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-bold text-sm">Progress</span>
                <span id="progressText" class="text-green-500 font-bold text-sm">0 / {{ collect($items)->sum(fn($i) => count($i['suku_kata']) - 1) }}</span>
            </div>
            <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                <div id="progressBar" class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>
    </main>
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
        let clicked = new Set();
        const totalSuku = {{ collect($items)->sum(fn($i) => count($i['suku_kata']) - 1) }};

        function playRowAudio(src) {
            new Audio(src).play();
        }

        let cachedVoices = [];

        function loadVoices() {
            cachedVoices = speechSynthesis.getVoices();
        }

        loadVoices();
        speechSynthesis.onvoiceschanged = loadVoices;

        function speakSuku(btn, text) {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'id-ID';
            utterance.rate = 0.7;

            const voice = cachedVoices.find(v => v.name === 'Google Bahasa Indonesia');
            if (voice) {
                utterance.voice = voice;
            } else {
                console.log('Voice "Google Bahasa Indonesia" not found, falling back to default id-ID voice');
            }

            speechSynthesis.speak(utterance);

            const key = btn.dataset.row + '-' + btn.dataset.suku;
            if (!clicked.has(key)) {
                clicked.add(key);
                btn.classList.remove('bg-gray-100', 'hover:bg-orange-100');
                btn.classList.add('bg-gradient-to-r', 'from-orange-400', 'to-orange-500', 'text-white');
                updateProgress();
            }
        }

        function updateProgress() {
            document.getElementById('progressText').textContent = clicked.size + ' / ' + totalSuku;
            document.getElementById('progressBar').style.width = (clicked.size / totalSuku) * 100 + '%';
        }
    </script>
</x-layout-game>
