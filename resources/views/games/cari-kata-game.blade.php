<x-layout-game>
    <main class="relative z-10 p-6 max-w-3xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🔍</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">{{ $judul }}</h1>
            <p class="text-gray-500 text-[1rem]">{{ $deskripsi }}</p>
        </div>
        <div class="bg-white rounded-3xl p-4 md:p-6 shadow-xl mb-6">
            <div id="grid" class="grid mx-auto select-none" style="grid-template-columns: repeat({{ $size }}, minmax(0, 1fr)); max-width: {{ $size * 48 }}px; gap: 4px;">
                @foreach($grid as $r => $row)
                    @foreach($row as $c => $letter)
                        <div
                            id="cell-{{ $r }}-{{ $c }}"
                            data-letter="{{ $letter }}"
                            onclick="handleCellClick({{ $r }}, {{ $c }})"
                            class="wordcell aspect-square flex items-center justify-center rounded-lg bg-gray-100 text-gray-700 font-black text-sm md:text-lg cursor-pointer hover:bg-blue-100 transition-colors"
                        >{{ $letter }}</div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-lg mb-6">
            <span class="text-gray-600 font-bold text-sm block mb-3">Cari Kata:</span>
            <div class="flex flex-wrap gap-2 justify-around">
                @foreach($items as $item)
                    <span id="word-{{ strtoupper($item['name']) }}" class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 font-bold text-sm transition-all">{{ strtoupper($item['name']) }}</span>
                @endforeach
            </div>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-lg mb-6">
            <span class="text-gray-600 font-bold text-sm block mb-3">Ditemukan:</span>
            <div id="foundIcons" class="flex flex-wrap gap-3 min-h-[3rem] justify-around ">
                @foreach($items as $item)
                    <span id="icon-{{ strtoupper($item['name']) }}" class="text-[2.5rem] opacity-20 grayscale transition-all duration-300">{{ $item['emoji'] }}</span>
                @endforeach
            </div>
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
        console.log('%c[WordSearch] script dimuat', 'color: #10B981; font-weight: bold;');

        const items = @json($items);
        const words = items.map(item => item.name.toUpperCase());
        const audioMap = Object.fromEntries(items.map(item => [item.name.toUpperCase(), item.audio]));
        const foundWords = new Set();
        let startCell = null;

        function cellEl(r, c) {
            return document.getElementById(`cell-${r}-${c}`);
        }

        function handleCellClick(r, c) {
            console.log(`[WordSearch] cell diklik: (${r}, ${c})`);

            try {
                // Klik cell yang sama dengan startCell → batalkan (toggle nonaktif)
                if (startCell && startCell.r === r && startCell.c === c) {
                    cellEl(r, c).classList.remove('bg-yellow-300');
                    console.log('[WordSearch] startCell dibatalkan (klik ulang)');
                    startCell = null;
                    return;
                }

                if (!startCell) {
                    startCell = {r, c};
                    const el = cellEl(r, c);
                    if (!el) {
                        console.error(`[WordSearch] ERROR: elemen cell-${r}-${c} tidak ditemukan`);
                        startCell = null;
                        return;
                    }
                    el.classList.add('bg-yellow-300');
                    console.log('[WordSearch] startCell diset:', startCell);
                    return;
                }

                const endCell = {r, c};
                const path = getPath(startCell, endCell);
                console.log('[WordSearch] path:', path);

                const startEl = cellEl(startCell.r, startCell.c);
                if (startEl) startEl.classList.remove('bg-yellow-300');

                if (path) {
                    checkWord(path);
                } else {
                    // Bukan garis lurus (horizontal/vertikal/diagonal) → dianggap salah
                    console.warn('[WordSearch] path null — bukan garis lurus, dianggap SALAH');
                    flashWrong([startCell, endCell]);
                }

                startCell = null;
            } catch (err) {
                console.error('[WordSearch] ERROR di handleCellClick:', err);
            }
        }

        function getPath(start, end) {
            const isStraight = (end.r === start.r) || (end.c === start.c) ||
                (Math.abs(end.r - start.r) === Math.abs(end.c - start.c));
            if (!isStraight) return null;

            const dr = Math.sign(end.r - start.r);
            const dc = Math.sign(end.c - start.c);
            const len = Math.max(Math.abs(end.r - start.r), Math.abs(end.c - start.c)) + 1;

            const cells = [];
            for (let i = 0; i < len; i++) {
                cells.push({r: start.r + dr * i, c: start.c + dc * i});
            }
            return cells;
        }

        function flashWrong(path) {
            console.log('%c[WordSearch] SALAH — flash merah', 'color: #EF4444; font-weight: bold;');
            showFlashMessage('error', 'salah', 2); // ← tambahkan ini

            path.forEach(({r, c}) => {
                cellEl(r, c).classList.add('bg-red-400', 'text-white');
            });

            setTimeout(() => {
                path.forEach(({r, c}) => {
                    cellEl(r, c).classList.remove('bg-red-400', 'text-white');
                });
                console.log('[WordSearch] kotak kembali normal');
            }, 800);
        }

        function checkWord(path) {
            try {
                const letters = path.map(({r, c}) => {
                    const el = cellEl(r, c);
                    if (!el) {
                        console.error(`[WordSearch] ERROR: cell-${r}-${c} tidak ada saat checkWord`);
                        return '';
                    }
                    return el.dataset.letter;
                }).join('');

                const reversed = letters.split('').reverse().join('');
                console.log(`[WordSearch] huruf terbentuk: "${letters}" (reversed: "${reversed}")`);

                const match = words.find(w => (w === letters || w === reversed) && !foundWords.has(w));

                if (!match) {
                    console.log('[WordSearch] tidak cocok — trigger flash merah');
                    flashWrong(path);
                    return;
                }

                console.log(`%c[WordSearch] SUKSES! Kata ditemukan: ${match}`, 'color: #10B981; font-weight: bold;');
                showFlashMessage('success', 'Cerdas', 2); // ← tambahkan ini

                foundWords.add(match);
                path.forEach(({r, c}) => {
                    cellEl(r, c).classList.add('bg-green-300', 'text-white');
                });

                const wordEl = document.getElementById(`word-${match}`);
                if (wordEl) {
                    wordEl.classList.remove('bg-gray-100', 'text-gray-700');
                    wordEl.classList.add('bg-green-400', 'text-white', 'line-through');
                }

                const iconEl = document.getElementById(`icon-${match}`);
                if (iconEl) {
                    iconEl.classList.remove('opacity-20', 'grayscale');
                    iconEl.classList.add('animate-pop');
                }

                const audioSrc = audioMap[match];
                if (audioSrc) {
                    console.log(`[WordSearch] memutar audio: ${audioSrc}`);
                    new Audio(audioSrc).play()
                        .then(() => console.log('[WordSearch] audio SUKSES diputar'))
                        .catch(err => console.error('[WordSearch] audio ERROR:', err));
                }

                document.getElementById('progressText').textContent = foundWords.size + ' / ' + words.length;
                document.getElementById('progressBar').style.width = (foundWords.size / words.length) * 100 + '%';

                if (foundWords.size === words.length) {
                    console.log('%c[WordSearch] SEMUA KATA DITEMUKAN 🎉', 'color: #8B5CF6; font-weight: bold;');
                    setTimeout(() => alert('🎉 Selamat! Kamu menemukan semua kata!'), 200);
                }
            } catch (err) {
                console.error('[WordSearch] ERROR di checkWord:', err);
            }
        }
    </script>
</x-layout-game>
