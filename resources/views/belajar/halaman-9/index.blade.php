<x-layout-game title="🔤 Menghubungkan Suku Kata - Ebook Anak TK">
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🔤</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">{{ $judul }}</h1>
            <p class="text-gray-500 text-[1.1rem]">{{ $deskripsi }}</p>
        </div>
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-2xl p-4 mb-6 text-center font-medium">
            🎯 <strong>Tap gambarnya, lalu tap suku kata yang cocok untuk melengkapi "ba"!</strong>
        </div>
        <div id="board" class="relative bg-white rounded-3xl p-6 shadow-xl">
            <svg id="lines-layer" class="absolute inset-0 w-full h-full pointer-events-none" style="z-index:1"></svg>
            <div class="grid grid-cols-2 gap-16 md:gap-28 relative" style="z-index:2">
                <div>
                    <h3 class="text-center text-xl font-bold text-gray-700 mb-4">Gambar</h3>
                    <div id="pictures" class="space-y-4"></div>
                </div>
                <div>
                    <h3 class="text-center text-xl font-bold text-gray-700 mb-4">"ba" + ?</h3>
                    <div id="suffixes" class="space-y-4"></div>
                </div>
            </div>
        </div>
        <p id="status" class="text-center font-bold text-lg mt-6"></p>
        <div class="flex justify-center gap-4 mt-8">
            <button id="resetBtn" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-4 rounded-full font-bold transition-all">
                🔄 Ulangi
            </button>
        </div>
        <div id="successModal" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-50">
            <div class="bg-white rounded-3xl p-10 text-center max-w-md mx-4">
                <div class="text-8xl mb-4 animate-bounce">🎉</div>
                <h2 class="text-4xl font-black text-emerald-600 mb-2">Hebat Sekali!</h2>
                <p class="text-xl text-gray-600 mb-6">Semua kata sudah tersambung dengan benar!</p>
                <button onclick="document.getElementById('successModal').classList.add('hidden'); resetGame();"
                        class="bg-emerald-500 text-white px-8 py-3 rounded-full font-bold text-lg hover:bg-emerald-600 transition-all">
                    Main Lagi →
                </button>
            </div>
        </div>
    </main>
    <script>
        const items = @json($items);
        const board = document.getElementById('board');
        const linesLayer = document.getElementById('lines-layer');
        const statusEl = document.getElementById('status');

        let selectedLeft = null;
        let previewLine = null;

        function shuffle(arr) {
            return [...arr].sort(() => Math.random() - 0.5);
        }

        function renderBoard() {
            const picturesEl = document.getElementById('pictures');
            const suffixesEl = document.getElementById('suffixes');
            picturesEl.innerHTML = '';
            suffixesEl.innerHTML = '';

            shuffle(items).forEach(item => {
                const div = document.createElement('div');
                div.dataset.side = 'left';
                div.dataset.suffix = item.suffix;
                div.dataset.id = item.id;
                div.dataset.name = item.name;
                div.dataset.audio = item.audio;
                div.className = 'item-box border-4 border-blue-200 rounded-2xl p-4 text-center cursor-pointer transition-all shadow-md flex items-center justify-center gap-3 h-24 select-none';
                div.innerHTML = `<span class="text-5xl">${item.emoji}</span>`;
                picturesEl.appendChild(div);
            });

            shuffle(items).forEach(item => {
                const div = document.createElement('div');
                div.dataset.side = 'right';
                div.dataset.suffix = item.suffix;
                div.className = 'item-box border-4 border-purple-200 rounded-2xl p-5 text-center cursor-pointer transition-all shadow-md flex items-center justify-center h-24 text-2xl font-black select-none';
                div.textContent = item.suffix;
                suffixesEl.appendChild(div);
            });

            bindItems();
        }

        function getPoint(evt) {
            const rect = board.getBoundingClientRect();
            const clientX = evt.touches ? evt.touches[0].clientX : evt.clientX;
            const clientY = evt.touches ? evt.touches[0].clientY : evt.clientY;
            return {x: clientX - rect.left, y: clientY - rect.top};
        }

        function getCenter(el) {
            const r = el.getBoundingClientRect();
            const b = board.getBoundingClientRect();
            const side = el.dataset.side;
            return {
                x: side === 'left' ? (r.right - b.left) : (r.left - b.left),
                y: (r.top - b.top) + r.height / 2
            };
        }

        function startPreview(leftEl) {
            const p1 = getCenter(leftEl);
            previewLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            previewLine.setAttribute('x1', p1.x);
            previewLine.setAttribute('y1', p1.y);
            previewLine.setAttribute('x2', p1.x);
            previewLine.setAttribute('y2', p1.y);
            previewLine.setAttribute('stroke', '#888780');
            previewLine.setAttribute('stroke-width', '2.5');
            previewLine.setAttribute('stroke-dasharray', '5,4');
            linesLayer.appendChild(previewLine);
        }

        function updatePreview(evt) {
            if (!previewLine) return;
            const p = getPoint(evt);
            previewLine.setAttribute('x2', p.x);
            previewLine.setAttribute('y2', p.y);
        }

        function removePreview() {
            if (previewLine) {
                previewLine.remove();
                previewLine = null;
            }
        }

        board.addEventListener('mousemove', updatePreview);
        board.addEventListener('touchmove', updatePreview);

        function drawLine(leftEl, rightEl, isCorrect) {
            const p1 = getCenter(leftEl), p2 = getCenter(rightEl);
            const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            line.setAttribute('x1', p1.x);
            line.setAttribute('y1', p1.y);
            line.setAttribute('x2', p2.x);
            line.setAttribute('y2', p2.y);
            line.setAttribute('stroke', isCorrect ? '#639922' : '#e24b4a');
            line.setAttribute('stroke-width', '3');
            linesLayer.appendChild(line);
        }

        function checkWin() {
            const leftItems = document.querySelectorAll('[data-side="left"]');
            const allCorrect = Array.from(leftItems).every(el => el.classList.contains('correct'));
            if (allCorrect) {
                statusEl.textContent = '🎉 Bagus! Semua kata sudah tersambung dengan benar.';
                setTimeout(() => document.getElementById('successModal').classList.remove('hidden'), 400);
            }
        }

        function bindItems() {
            document.querySelectorAll('.item-box').forEach(el => {
                el.onclick = () => {
                    const side = el.dataset.side;
                    const suffix = el.dataset.suffix;

                    if (side === 'left') {
                        if (el.classList.contains('correct')) return;
                        document.querySelectorAll('.item-box').forEach(i => i.classList.remove('selected'));
                        removePreview();
                        selectedLeft = el;
                        el.classList.add('selected');
                        startPreview(el);
                    } else {
                        if (!selectedLeft) return;
                        const isCorrect = selectedLeft.dataset.suffix === suffix;

                        removePreview();
                        drawLine(selectedLeft, el, isCorrect);

                        selectedLeft.classList.remove('selected');
                        selectedLeft.classList.add(isCorrect ? 'correct' : 'wrong');
                        el.classList.add(isCorrect ? 'correct' : 'wrong');

                        if (isCorrect) {
                            selectedLeft.innerHTML = `<span class="text-5xl">${selectedLeft.querySelector('span').textContent}</span>
                                <span class="font-black text-lg text-emerald-600">ba${selectedLeft.dataset.suffix}</span>`;
                            const audioSrc = selectedLeft.dataset.audio;
                            if (audioSrc) new Audio(audioSrc).play();
                        }

                        if (!isCorrect) {
                            const badLeft = selectedLeft, badRight = el;
                            setTimeout(() => {
                                badLeft.classList.remove('wrong');
                                badRight.classList.remove('wrong');
                                linesLayer.querySelectorAll('line').forEach(l => {
                                    if (l.getAttribute('stroke') === '#e24b4a') l.remove();
                                });
                            }, 700);
                        }

                        selectedLeft = null;
                        checkWin();
                    }
                };
            });
        }

        function resetGame() {
            document.querySelectorAll('.item-box').forEach(i => i.classList.remove('selected', 'correct', 'wrong'));
            linesLayer.innerHTML = '';
            statusEl.textContent = '';
            selectedLeft = null;
            previewLine = null;
            renderBoard();
        }

        document.getElementById('resetBtn').addEventListener('click', resetGame);

        document.addEventListener('DOMContentLoaded', () => {
            renderBoard();
        });
    </script>
    <style>
        .item-box.selected {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .item-box.correct {
            border-color: #639922;
            background: #f0fdf4;
            cursor: default;
        }

        .item-box.wrong {
            border-color: #e24b4a;
            background: #fef2f2;
        }
    </style>
</x-layout-game>
