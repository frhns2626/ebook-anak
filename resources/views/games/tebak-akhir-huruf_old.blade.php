<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
>
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
            <span class="animate-bounce-subtle mb-2 block text-[3rem]">🏠</span>
            <h1 class="mb-1 text-[1.8rem] font-black text-gray-800 md:text-[2.2rem]">{{ $judul }}</h1>
            <p class="text-[1rem] text-gray-500">{{ $deskripsi }}</p>
        </div>
        <div class="mb-6 flex snap-x snap-mandatory gap-4 overflow-x-auto pb-2 md:gap-6">
            @foreach ($items as $index => $item)
                <div
                    id="card-{{ $item['id'] }}"
                    class="item-card shrink-0 w-40 md:w-48 snap-start bg-white rounded-3xl p-6 shadow-xl text-center cursor-pointer hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border-4 border-transparent {{ $item['color'] }}"
                    data-index="{{ $index }}"
                    onclick="selectItem('{{ $item['id'] }}')"
                >
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 rounded-2xl {{ $item['bg'] }} flex items-center justify-center mx-auto mb-3 animate-float-up"
                        style="animation-delay: {{ ($index % 5) * 0.3 }}s"
                    >
                        @if (! empty($item['emoji']))
                            <span class="text-[2.5rem] md:text-[3rem]"> {{ $item['emoji'] }} </span>
                        @elseif (! empty($item['icon']))
                            <img
                                src="{{ $item['icon'] }}"
                                alt="{{ $item['name'] }}"
                                class="h-12 w-12 object-contain md:h-14 md:w-14"
                            />
                        @endif
                    </div>
                    <h3 class="mb-1 text-[1.2rem] font-black text-gray-800 md:text-[1.4rem]">{{ $item['name'] }}</h3>
                    <p class="text-xs text-gray-500">{{ $item['name'] }}</p>
                </div>
            @endforeach
        </div>
        <div id="itemDisplay" class="mb-6 hidden rounded-3xl bg-white p-8 text-center shadow-2xl">
            <div class="animate-pop mb-4 text-[8rem] md:text-[10rem]" id="itemEmoji">🪑</div>
            <h2 class="mb-2 text-[2.5rem] font-black tracking-widest text-gray-800 md:text-[3rem]" id="itemName">
                Meja
            </h2>
            <div id="syllableOptions" class="mb-4 flex flex-wrap justify-center gap-3"></div>
            <p id="checkFeedback" class="mb-2 h-6 text-sm font-bold"></p>
            <p class="mb-6 text-[1.2rem] text-gray-500" id="itemHint">Meja adalah furniture untuk meletakkan barang!</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button
                    onclick="playAudio()"
                    class="rounded-full bg-gradient-to-r from-blue-400 to-blue-500 px-6 py-3 font-bold text-white shadow-lg transition-all hover:scale-105"
                >
                    🔊 Dengarkan
                </button>
                <button
                    onclick="checkAnswer()"
                    id="checkBtn"
                    class="rounded-full bg-gradient-to-r from-purple-400 to-purple-500 px-6 py-3 font-bold text-white shadow-lg transition-all hover:scale-105"
                >
                    ✅ Cek
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
        let blankIndex = 0;
        let solved = false;
        let selectedChoice = null;
        let selectedBtn = null;
        let cachedVoices = [];

        function loadVoices() {
            cachedVoices = speechSynthesis.getVoices();
        }

        loadVoices();
        speechSynthesis.onvoiceschanged = loadVoices;

        function updateLocks() {
            items.forEach((item, i) => {
                const card = document.getElementById('card-' + item.id);
                const unlocked = i === 0 || viewed.has(items[i - 1].id);
                if (unlocked) {
                    card.classList.remove('opacity-40', 'grayscale', 'pointer-events-none');
                } else {
                    card.classList.add('opacity-40', 'grayscale', 'pointer-events-none');
                }
            });
        }

        function selectItem(id) {
            currentIndex = items.findIndex((item) => item.id === id);
            showItem();
            document.getElementById('itemDisplay').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        function showItem() {
            const item = items[currentIndex];
            solved = false;
            selectedChoice = null;
            selectedBtn = null;
            blankIndex = item.syllables.length - 1;

            document.getElementById('itemDisplay').classList.remove('hidden');
            document.getElementById('itemEmoji').textContent = item.emoji;
            document.getElementById('itemHint').textContent = item.hint;
            document.getElementById('checkFeedback').textContent = '';
            document.getElementById('checkBtn').disabled = false;
            renderSyllablePuzzle(item);
        }

        function renderSyllablePuzzle(item) {
            const display = item.syllables.map((s, i) => (i === blankIndex ? '...' : s)).join(' – ');
            document.getElementById('itemName').textContent = display;

            const distractorPool = items
                .flatMap((i) => i.syllables)
                .filter((s) => s.toLowerCase() !== item.syllables[blankIndex].toLowerCase());
            const distractors = [...new Set(distractorPool)].sort(() => Math.random() - 0.5).slice(0, 2);

            const options = [item.syllables[blankIndex], ...distractors];

            const container = document.getElementById('syllableOptions');
            container.innerHTML = '';
            options.forEach((opt) => {
                const btn = document.createElement('button');
                btn.textContent = opt;
                btn.className =
                    'bg-gradient-to-r from-purple-400 to-purple-500 text-white px-5 py-2 rounded-full font-bold shadow-lg hover:scale-105 transition-all';
                btn.onclick = () => selectChoice(opt, btn);
                container.appendChild(btn);
            });
        }

        function selectChoice(opt, btn) {
            if (solved) return;
            if (selectedBtn) selectedBtn.classList.remove('ring-4', 'ring-blue-300');
            selectedChoice = opt;
            selectedBtn = btn;
            btn.classList.add('ring-4', 'ring-blue-300');
        }

        function checkAnswer() {
            if (solved || !selectedChoice) return;
            const item = items[currentIndex];
            const feedback = document.getElementById('checkFeedback');

            if (selectedChoice.toLowerCase() === item.syllables[blankIndex].toLowerCase()) {
                solved = true;
                document.getElementById('itemName').textContent = item.name;
                document.getElementById('checkBtn').disabled = true;
                feedback.textContent = '🎉 Benar sekali!';
                feedback.className = 'h-6 mb-2 font-bold text-sm text-green-500';
                selectedBtn.classList.add('ring-4', 'ring-green-400');
                viewed.add(item.id);
                updateProgress();
                updateLocks();
                playAudio();
                setTimeout(nextItem, 2000);
            } else {
                feedback.textContent = 'Coba lagi ya!';
                feedback.className = 'h-6 mb-2 font-bold text-sm text-red-400';
                selectedBtn.classList.add('animate-shake');
                document.getElementById('checkBtn').disabled = true;
                setTimeout(() => showItem(), 2000);
            }
        }

        function updateProgress() {
            const count = viewed.size;
            document.getElementById('progressText').textContent = count + ' / ' + items.length;
            document.getElementById('progressBar').style.width = (count / items.length) * 100 + '%';
        }

        function playAudio() {
            const item = items[currentIndex];
            new Audio(item.audio).play();
        }

        function nextItem() {
            currentIndex = (currentIndex + 1) % items.length;
            showItem();
        }

        updateLocks();
        selectItem(items[0].id);
    </script>
</x-layout-game>
