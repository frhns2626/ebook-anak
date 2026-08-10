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
            <span class="animate-bounce-subtle mb-2 block text-[3rem]">🥮</span>
            <h1 class="mb-1 text-[1.8rem] font-black text-gray-800 md:text-[2.2rem]">Tebak Bunyi Vokal Rangkap</h1>
            <p class="text-[1rem] text-gray-500" id="modeLabel">Mode: Dengar Bunyi → Pilih Kata</p>
        </div>
        <div class="mb-6 rounded-2xl border border-yellow-300 bg-yellow-100 p-4 text-center font-medium text-yellow-800">
            🎯 Dengarkan bunyinya, lalu tap kata yang cocok!
        </div>
        <div class="mb-6 rounded-3xl bg-white p-8 text-center shadow-2xl" id="promptWrap"></div>
        <div id="choicesWrap" class="mb-6 grid grid-cols-2 gap-4 md:grid-cols-3 md:gap-6"></div>
        <div class="mb-6 flex justify-center gap-4">
            <button
                onclick="toggleMode()"
                class="rounded-full bg-purple-100 px-6 py-3 font-bold text-purple-700 transition-all hover:bg-purple-200"
            >
                🔄 Ganti Mode
            </button>
            <button
                onclick="resetGame()"
                class="rounded-full bg-gray-200 px-6 py-3 font-bold text-gray-700 transition-all hover:bg-gray-300"
            >
                🔁 Ulangi
            </button>
        </div>
        <div class="rounded-2xl bg-white p-4 shadow-lg">
            <div class="mb-2 flex items-center justify-between">
                <span class="text-sm font-bold text-gray-600">Progress</span>
                <span id="progressText" class="text-sm font-bold text-green-500">0 / 0</span>
            </div>
            <div class="h-4 overflow-hidden rounded-full bg-gray-200">
                <div
                    id="progressBar"
                    class="h-full rounded-full bg-gradient-to-r from-green-400 to-emerald-500 transition-all duration-500"
                    style="width: 0%"
                ></div>
            </div>
        </div>
        <div id="successModal" class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/70">
            <div class="mx-4 max-w-md rounded-3xl bg-white p-10 text-center">
                <div class="mb-4 animate-bounce text-8xl">🎉</div>
                <h2 class="mb-2 text-4xl font-black text-emerald-600">Hebat Sekali!</h2>
                <p class="mb-6 text-xl text-gray-600">Semua bunyi vokal rangkap sudah ditebak!</p>
                <button
                    onclick="resetGame()"
                    class="rounded-full bg-emerald-500 px-8 py-3 text-lg font-bold text-white transition-all hover:bg-emerald-600"
                >
                    Main Lagi →
                </button>
            </div>
        </div>
    </main>
    <script>
        const groups = @json($items);
        let pairs = [];
        groups.forEach((g) => {
            const diphthongs = g.master.split(' ');
            g.items.forEach((item, i) => {
                pairs.push({
                    diphthong: diphthongs[i] ?? '',
                    item,
                    groupItems: g.items,
                    groupDiphthongs: diphthongs,
                });
            });
        });

        let mode = 'wordFromSound'; // or 'soundFromWord'
        let roundOrder = shuffle(pairs);
        let currentRound = 0;

        function shuffle(arr) {
            return [...arr].sort(() => Math.random() - 0.5);
        }

        function playAudio(src) {
            if (src) new Audio(src).play();
        }

        function renderRound() {
            const round = roundOrder[currentRound];
            const promptWrap = document.getElementById('promptWrap');
            const choicesWrap = document.getElementById('choicesWrap');
            choicesWrap.innerHTML = '';

            if (mode === 'wordFromSound') {
                promptWrap.innerHTML = `
                    <div class="text-[3.5rem] md:text-[4.5rem] font-black text-purple-600 tracking-widest mb-3">${round.diphthong}</div>
                    <p class="text-gray-400 text-sm">Cari kata yang mengandung bunyi ini</p>
                `;

                shuffle(round.groupItems).forEach((item) => {
                    const div = document.createElement('div');
                    div.className =
                        'word-card bg-white rounded-3xl p-6 shadow-xl text-center cursor-pointer transition-all duration-300 border-4 border-transparent';
                    div.innerHTML = `<div class="text-[3.5rem] mb-2">${item.emoji}</div><div class="font-black text-lg text-gray-800">${item.name}</div>`;
                    div.onclick = () => checkAnswer(item.id === round.item.id, div, () => playAudio(item.audio));
                    choicesWrap.appendChild(div);
                });
            } else {
                promptWrap.innerHTML = `
                    <div class="text-[5rem] mb-2">${round.item.emoji}</div>
                    <div class="font-black text-3xl text-gray-800 mb-3">${round.item.name}</div>
                    <button onclick="playAudio('${round.item.audio}')" class="bg-gradient-to-r from-blue-400 to-blue-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:scale-105 transition-all">🔊 Dengarkan Kata</button>
                `;
                shuffle(round.groupDiphthongs).forEach((d) => {
                    const div = document.createElement('div');
                    div.className =
                        'word-card bg-white rounded-3xl p-6 shadow-xl text-center cursor-pointer transition-all duration-300 border-4 border-transparent text-4xl font-black text-purple-600';
                    div.textContent = d;
                    div.onclick = () => checkAnswer(d === round.diphthong, div, () => playAudio(round.item.audio));
                    choicesWrap.appendChild(div);
                });
            }
        }

        function checkAnswer(isCorrect, el, onCorrectPlay) {
            document.querySelectorAll('.word-card').forEach((c) => (c.style.pointerEvents = 'none'));
            if (isCorrect) {
                el.classList.add('correct');
                onCorrectPlay();
                setTimeout(nextRound, 900);
            } else {
                el.classList.add('wrong');
                setTimeout(() => {
                    el.classList.remove('wrong');
                    document.querySelectorAll('.word-card').forEach((c) => (c.style.pointerEvents = 'auto'));
                }, 500);
            }
        }

        function nextRound() {
            currentRound++;
            updateProgress();
            if (currentRound >= roundOrder.length) {
                document.getElementById('successModal').classList.remove('hidden');
            } else {
                renderRound();
            }
        }

        function toggleMode() {
            mode = mode === 'wordFromSound' ? 'soundFromWord' : 'wordFromSound';
            document.getElementById('modeLabel').textContent =
                mode === 'wordFromSound' ? 'Mode: Dengar Bunyi → Pilih Kata' : 'Mode: Lihat Kata → Pilih Bunyi';
            renderRound();
        }

        function updateProgress() {
            document.getElementById('progressText').textContent = currentRound + ' / ' + roundOrder.length;
            document.getElementById('progressBar').style.width = (currentRound / roundOrder.length) * 100 + '%';
        }

        function resetGame() {
            currentRound = 0;
            roundOrder = shuffle(pairs);
            document.getElementById('successModal').classList.add('hidden');
            updateProgress();
            renderRound();
        }

        updateProgress();
        renderRound();
    </script>
    <style>
        @keyframes shake {
            0%,
            100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-8px);
            }
            75% {
                transform: translateX(8px);
            }
        }

        .word-card.correct {
            border-color: #639922;
            background: #f0fdf4;
        }

        .word-card.wrong {
            border-color: #e24b4a;
            background: #fef2f2;
            animation: shake 0.4s ease;
        }
    </style>
</x-layout-game>
