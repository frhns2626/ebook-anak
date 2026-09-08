<x-layout-game title="{{ $judul }}" halaman="{{ $halaman }}">
    <main class="relative z-10 mx-auto max-w-4xl p-6">
        <div
            class="relative mb-6 overflow-hidden rounded-3xl bg-white p-6 text-center shadow-xl"
        >
            <div
                class="absolute top-0 right-0 left-0 h-2"
                style="
                    background: linear-gradient(
                        90deg,
                        #ff6b6b,
                        #ff9f43,
                        #ffe66d,
                        #4ecdc4,
                        #6c5ce7,
                        #ff6b6b
                    );
                    background-size: 200% 100%;
                    animation: rainbow 3s linear infinite;
                "
            ></div>
            <a
                href="{{ route('belajar.index') }}"
                class="absolute top-1/2 left-4 -translate-y-1/2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-500 transition-all hover:bg-red-200"
                >← Kembali</a
            >
            <span class="animate-bounce-subtle mb-2 block text-[3rem]">🔤</span>
            <h1
                class="mb-1 text-[1.8rem] font-black text-gray-800 md:text-[2.2rem]"
            >
                {{ $judul }}
            </h1>
            <p class="text-[1rem] text-gray-500">{{ $deskripsi }}</p>
        </div>
        <div class="mb-6 space-y-4">
            @foreach ($items as $rowIndex => $item)
                <div class="rounded-3xl bg-white p-4 shadow-xl md:p-6">
                    <div class="w-full">
                        <div
                            class="mb-3 flex w-full items-center justify-between"
                        >
                            <span class="text-lg font-black text-gray-800">
                                Pola Vokal {{ $item['vokal'] }}
                            </span>

                            <button
                                type="button"
                                onclick="playRowAudio('{{ $item['audio'] }}')"
                                class="shrink-0 rounded-full bg-gradient-to-r from-blue-400 to-blue-500 px-4 py-2 text-sm font-bold text-white shadow-md transition-all hover:scale-105"
                            >
                                🔊 Dengarkan
                            </button>
                        </div>

                        <div
                            class="flex w-full items-center gap-3 overflow-x-auto pb-1 md:gap-4"
                        >
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-purple-400 to-purple-500 text-2xl font-black text-white shadow-md md:h-16 md:w-16"
                            >
                                {{ $item['vokal'] }}
                            </div>

                            @foreach ($item['suku_kata'] as $sukuIndex => $suku)
                                @if ($sukuIndex > 0)
                                    <button
                                        type="button"
                                        class="suku-chip shrink-0 rounded-2xl bg-gray-100 px-4 py-3 text-lg font-black text-gray-800 transition-all hover:bg-orange-100 md:text-xl"
                                        data-row="{{ $rowIndex }}"
                                        data-suku="{{ $sukuIndex }}"
                                        onclick="speakSuku(this, '{{ $suku }}')"
                                    >
                                        {{ $suku }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="rounded-2xl bg-white p-4 shadow-lg">
            <div class="mb-2 flex items-center justify-between">
                <span class="text-sm font-bold text-gray-600">Progress</span>
                <span id="progressText" class="text-sm font-bold text-green-500"
                    >0 / {{ collect($items)->sum(fn($i) => count($i['suku_kata']) - 1) }}</span
                >
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
        let clicked = new Set()
        const totalSuku = {{ collect($items)->sum(fn($i) => count($i['suku_kata']) - 1) }}

        function playRowAudio(src) {
            new Audio(src).play()
        }

        let cachedVoices = []

        function loadVoices() {
            cachedVoices = speechSynthesis.getVoices()
        }

        loadVoices()
        speechSynthesis.onvoiceschanged = loadVoices

        function speakSuku(btn, text) {
            const utterance = new SpeechSynthesisUtterance(text)
            utterance.lang = "id-ID"
            utterance.rate = 0.7

            const voice = cachedVoices.find((v) => v.name === "Google Bahasa Indonesia")
            if (voice) {
                utterance.voice = voice
            } else {
                console.log(
                    'Voice "Google Bahasa Indonesia" not found, falling back to default id-ID voice',
                )
            }

            speechSynthesis.speak(utterance)

            const key = btn.dataset.row + "-" + btn.dataset.suku
            if (!clicked.has(key)) {
                clicked.add(key)
                btn.classList.remove("bg-gray-100", "hover:bg-orange-100")
                btn.classList.add(
                    "bg-gradient-to-r",
                    "from-orange-400",
                    "to-orange-500",
                    "text-white",
                )
                updateProgress()
            }
        }

        function updateProgress() {
            document.getElementById("progressText").textContent =
                clicked.size + " / " + totalSuku
            document.getElementById("progressBar").style.width =
                (clicked.size / totalSuku) * 100 + "%"
        }
    </script>
</x-layout-game>
