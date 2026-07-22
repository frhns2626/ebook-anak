<x-layout-game title="🥮 Tebak Bunyi Vokal Rangkap - Ebook Anak TK">
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🥮</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">Tebak Bunyi Vokal Rangkap</h1>
            <p class="text-gray-500 text-[1rem]" id="modeLabel">Mode: Dengar Bunyi → Pilih Kata</p>
        </div>
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-2xl p-4 mb-6 text-center font-medium">
            🎯 Dengarkan bunyinya, lalu tap kata yang cocok!
        </div>
        <div class="bg-white rounded-3xl p-8 shadow-2xl text-center mb-6" id="promptWrap"></div>
        <div id="choicesWrap" class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-6"></div>
        <div class="flex justify-center gap-4 mb-6">
            <button onclick="toggleMode()" class="bg-purple-100 hover:bg-purple-200 text-purple-700 px-6 py-3 rounded-full font-bold transition-all">
                🔄 Ganti Mode
            </button>
            <button onclick="resetGame()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold transition-all">
                🔁 Ulangi
            </button>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-lg">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-bold text-sm">Progress</span>
                <span id="progressText" class="text-green-500 font-bold text-sm">0 / 0</span>
            </div>
            <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                <div id="progressBar" class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>
        <div id="successModal" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-50">
            <div class="bg-white rounded-3xl p-10 text-center max-w-md mx-4">
                <div class="text-8xl mb-4 animate-bounce">🎉</div>
                <h2 class="text-4xl font-black text-emerald-600 mb-2">Hebat Sekali!</h2>
                <p class="text-xl text-gray-600 mb-6">Semua bunyi vokal rangkap sudah ditebak!</p>
                <button onclick="resetGame()"
                        class="bg-emerald-500 text-white px-8 py-3 rounded-full font-bold text-lg hover:bg-emerald-600 transition-all">
                    Main Lagi →
                </button>
            </div>
        </div>
    </main>
    <script>
        const groups = @json($items);
        let pairs = [];
        groups.forEach(g => {
            const diphthongs = g.master.split(' ');
            g.items.forEach((item, i) => {
                pairs.push({
                    diphthong: diphthongs[i] ?? '',
                    item,
                    groupItems: g.items,
                    groupDiphthongs: diphthongs
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

                shuffle(round.groupItems).forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'word-card bg-white rounded-3xl p-6 shadow-xl text-center cursor-pointer transition-all duration-300 border-4 border-transparent';
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
                shuffle(round.groupDiphthongs).forEach(d => {
                    const div = document.createElement('div');
                    div.className = 'word-card bg-white rounded-3xl p-6 shadow-xl text-center cursor-pointer transition-all duration-300 border-4 border-transparent text-4xl font-black text-purple-600';
                    div.textContent = d;
                    div.onclick = () => checkAnswer(d === round.diphthong, div, () => playAudio(round.item.audio));
                    choicesWrap.appendChild(div);
                });
            }
        }

        function checkAnswer(isCorrect, el, onCorrectPlay) {
            document.querySelectorAll('.word-card').forEach(c => c.style.pointerEvents = 'none');
            if (isCorrect) {
                el.classList.add('correct');
                onCorrectPlay();
                setTimeout(nextRound, 900);
            } else {
                el.classList.add('wrong');
                setTimeout(() => {
                    el.classList.remove('wrong');
                    document.querySelectorAll('.word-card').forEach(c => c.style.pointerEvents = 'auto');
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
            document.getElementById('modeLabel').textContent = mode === 'wordFromSound'
                ? 'Mode: Dengar Bunyi → Pilih Kata'
                : 'Mode: Lihat Kata → Pilih Bunyi';
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
            0%, 100% {
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
