<x-layout-game>
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🐰</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">Tebak Huruf Depan 🔤</h1>
            <p class="text-gray-500 text-[1rem]">Lihat gambarnya, tebak huruf depannya!</p>
        </div>
        {{-- GAME CARD --}}
        <div class="bg-white rounded-3xl p-8 shadow-2xl text-center mb-6">
            <div class="text-[8rem] md:text-[10rem] mb-2 animate-pop" id="gameEmoji">🐰</div>
            <div class="text-[2.2rem] font-black text-gray-400 tracking-widest mb-6" id="gameBlank">_ _ _ _ _ _</div>
            <div id="letterOptions" class="flex justify-center gap-3 flex-wrap"></div>
        </div>
        {{-- RESULTS TABLE --}}
        <div class="bg-white rounded-2xl p-4 shadow-lg mb-6">
            <h2 class="font-black text-gray-700 mb-3">Hasil Pencarian Huruf Depan</h2>
            <table class="w-full text-left text-sm">
                <thead>
                <tr class="text-gray-500 border-b">
                    <th class="py-2">Nama Objek</th>
                    <th class="py-2">Huruf Depan</th>
                    <th class="py-2">Status</th>
                </tr>
                </thead>
                <tbody id="resultsBody"></tbody>
            </table>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-lg">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-bold text-sm">Progress</span>
                <span id="progressText" class="text-green-500 font-bold text-sm">0 / {{ count($items) }}</span>
            </div>
            <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                <div id="progressBar" class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>
    </main>
    <script>
        const items = @json($items);

        function shuffle(arr) {
            const a = [...arr];
            for (let i = a.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [a[i], a[j]] = [a[j], a[i]];
            }
            return a;
        }

        const gameOrder = shuffle(items);
        const allFirstLetters = [...new Set(items.map(i => i.name.charAt(0).toUpperCase()))];
        let currentIndex = 0;
        const results = {}; // id -> { name, letter, correct }

        function renderItem() {
            const item = gameOrder[currentIndex];
            document.getElementById('gameEmoji').textContent = item.emoji;
            document.getElementById('gameBlank').textContent = '_' + item.name.slice(1);
            renderOptions(item);
        }

        function renderOptions(item) {
            const correctLetter = item.name.charAt(0).toUpperCase();
            let options = shuffle(allFirstLetters);
            if (!options.includes(correctLetter)) options.push(correctLetter);
            options = shuffle(options);

            const wrap = document.getElementById('letterOptions');
            wrap.innerHTML = '';
            options.forEach(letter => {
                const btn = document.createElement('button');
                btn.textContent = letter;
                btn.className = 'letter-btn bg-blue-50 text-blue-600 border-2 border-blue-200 w-16 h-16 rounded-2xl text-2xl font-black shadow hover:scale-105 transition-all';
                btn.onclick = () => checkAnswer(letter, correctLetter, item, btn);
                wrap.appendChild(btn);
            });
        }

        function checkAnswer(letter, correctLetter, item, btn) {
            const isCorrect = letter === correctLetter;
            btn.classList.add(isCorrect ? 'correct' : 'wrong');
            if (!isCorrect) btn.classList.add('animate-shake');

            document.querySelectorAll('#letterOptions button').forEach(b => b.disabled = true);

            results[item.id] = {name: item.name, letter: correctLetter, correct: isCorrect};
            renderResultsTable();
            updateProgress();

            setTimeout(() => {
                currentIndex++;
                if (currentIndex < gameOrder.length) {
                    renderItem();
                } else {
                    document.getElementById('letterOptions').innerHTML =
                        '<p class="text-green-500 font-black text-lg">🎉 Selesai! Semua tertebak.</p>';
                }
            }, isCorrect ? 700 : 1000);
        }

        function renderResultsTable() {
            const body = document.getElementById('resultsBody');
            body.innerHTML = '';
            gameOrder.forEach(item => {
                const r = results[item.id];
                const tr = document.createElement('tr');
                tr.className = 'border-b last:border-0 result-row' + (r?.correct ? ' correct' : '');
                tr.innerHTML = `
                    <td class="py-2">${item.name}</td>
                    <td class="py-2 font-bold">${r ? r.letter : '-'}</td>
                    <td class="py-2">${r ? (r.correct ? '✓' : '✗') : '-'}</td>
                `;
                body.appendChild(tr);
            });
        }

        function updateProgress() {
            const count = Object.keys(results).length;
            document.getElementById('progressText').textContent = count + ' / ' + items.length;
            document.getElementById('progressBar').style.width = (count / items.length) * 100 + '%';
        }

        renderResultsTable();
        renderItem();
    </script>
</x-layout-game>
