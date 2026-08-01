<x-layout-game title="{{ $judul }}">
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
            <span class="animate-bounce-subtle mb-2 block text-[3rem]">🐰</span>
            <h1 class="mb-1 text-[1.8rem] font-black text-gray-800 md:text-[2.2rem]">Tebak Huruf Depan 🔤</h1>
            <p class="text-[1rem] text-gray-500">Lihat gambarnya, tebak huruf depannya!</p>
        </div>
        {{-- GAME CARD --}}
        <div class="mb-6 rounded-3xl bg-white p-8 text-center shadow-2xl">
            <div class="animate-pop mb-2 text-[8rem] md:text-[10rem]" id="gameEmoji">🐰</div>
            <div class="mb-6 text-[2.2rem] font-black tracking-widest text-gray-400" id="gameBlank">_ _ _ _ _ _</div>
            <div id="letterOptions" class="flex flex-wrap justify-center gap-3"></div>
        </div>
        {{-- RESULTS TABLE --}}
        <div class="mb-6 rounded-2xl bg-white p-4 shadow-lg">
            <h2 class="mb-3 font-black text-gray-700">Hasil Pencarian Huruf Depan</h2>
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b text-gray-500">
                        <th class="py-2">Nama Objek</th>
                        <th class="py-2">Huruf Depan</th>
                        <th class="py-2">Status</th>
                    </tr>
                </thead>
                <tbody id="resultsBody"></tbody>
            </table>
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
        const allFirstLetters = [...new Set(items.map((i) => i.name.charAt(0).toUpperCase()))];
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
            if (!options.includes(correctLetter)) {
                options.push(correctLetter);
            }
            options = shuffle(options);

            const wrap = document.getElementById('letterOptions');
            wrap.innerHTML = '';
            options.forEach((letter) => {
                const btn = document.createElement('button');
                btn.textContent = letter;
                btn.className =
                    'letter-btn bg-blue-50 text-blue-600 border-2 border-blue-200 w-16 h-16 rounded-2xl text-2xl font-black shadow hover:scale-105 transition-all';
                btn.onclick = () => checkAnswer(letter, correctLetter, item, btn);
                wrap.appendChild(btn);
            });
        }

        function checkAnswer(letter, correctLetter, item, btn) {
            const isCorrect = letter === correctLetter;
            btn.classList.add(isCorrect ? 'correct' : 'wrong');
            if (!isCorrect) {
                btn.classList.add('animate-shake');
            }

            document.querySelectorAll('#letterOptions button').forEach((b) => (b.disabled = true));

            results[item.id] = { name: item.name, letter: correctLetter, correct: isCorrect };
            renderResultsTable();
            updateProgress();

            setTimeout(
                () => {
                    currentIndex++;
                    if (currentIndex < gameOrder.length) {
                        renderItem();
                    } else {
                        document.getElementById('letterOptions').innerHTML =
                            '<p class="text-green-500 font-black text-lg">🎉 Selesai! Semua tertebak.</p>';
                    }
                },
                isCorrect ? 700 : 1000,
            );
        }

        function renderResultsTable() {
            const body = document.getElementById('resultsBody');
            body.innerHTML = '';
            gameOrder.forEach((item) => {
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
