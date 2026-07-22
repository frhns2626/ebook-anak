<x-layout-game title="{{ $judul }}">
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🪙</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">{{ $judul }}</h1>
            <p class="text-gray-500 text-[1.1rem]" id="groupLabel">{{ $deskripsi }}</p>
        </div>
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-2xl p-4 mb-6 text-center font-medium">
            🎯 <strong>Tap gambarnya (dengarkan bunyinya), lalu tap akhiran suku kata yang cocok!</strong>
        </div>
        <div id="board" class="relative bg-white rounded-3xl p-6 shadow-xl">
            <svg id="lines-layer" class="absolute inset-0 w-full h-full pointer-events-none" style="z-index:1"></svg>
            <div class="grid grid-cols-2 gap-16 md:gap-28 relative" style="z-index:2">
                <div>
                    <h3 class="text-center text-xl font-bold text-gray-700 mb-4">Kata</h3>
                    <div id="pictures" class="space-y-4"></div>
                </div>
                <div>
                    <h3 class="text-center text-xl font-bold text-gray-700 mb-4">Akhiran</h3>
                    <div id="endings" class="space-y-4"></div>
                </div>
            </div>
        </div>
        <p id="status" class="text-center font-bold text-lg mt-6"></p>
        <div class="flex justify-center gap-4 mt-8">
            <button id="nextGroupBtn" class="hidden bg-blue-500 hover:bg-blue-600 text-white px-6 py-4 rounded-full font-bold transition-all">
                ➡️ Kelompok Berikutnya
            </button>
            <button id="resetBtn" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-4 rounded-full font-bold transition-all">
                🔄 Ulangi
            </button>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-lg mt-6">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-bold text-sm">Kelompok</span>
                <span id="groupProgressText" class="text-blue-500 font-bold text-sm">1 / 0</span>
            </div>
            <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                <div id="groupProgressBar" class="h-full bg-gradient-to-r from-blue-400 to-blue-500 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>
        <div id="successModal" class="hidden fixed inset-0 bg-black/70 flex items-center justify-center z-50">
            <div class="bg-white rounded-3xl p-10 text-center max-w-md mx-4">
                <div class="text-8xl mb-4 animate-bounce">🎉</div>
                <h2 class="text-4xl font-black text-emerald-600 mb-2">Hebat Sekali!</h2>
                <p class="text-xl text-gray-600 mb-6">Semua kelompok akhiran sudah selesai!</p>
                <button onclick="document.getElementById('successModal').classList.add('hidden'); resetGame();"
                        class="bg-emerald-500 text-white px-8 py-3 rounded-full font-bold text-lg hover:bg-emerald-600 transition-all">
                    Main Lagi →
                </button>
            </div>
        </div>
    </main>
    <script>
        const groups = @json($items); // [{ masterPola, audio, items: [...] }, ...]
        const board = document.getElementById('board');
        const linesLayer = document.getElementById('lines-layer');
        const statusEl = document.getElementById('status');
        const groupLabelEl = document.getElementById('groupLabel');
        const nextGroupBtn = document.getElementById('nextGroupBtn');

        let currentGroupIndex = 0;
        let selectedLeft = null;
        let previewLine = null;

        function shuffle(arr) {
            return [...arr].sort(() => Math.random() - 0.5);
        }

        function currentGroup() {
            return groups[currentGroupIndex];
        }

        function renderBoard() {
            const group = currentGroup();
            const items = group.items;

            groupLabelEl.textContent = `Kelompok akhiran: ${group.masterPola}`;
            nextGroupBtn.classList.add('hidden');
            statusEl.textContent = '';

            const picturesEl = document.getElementById('pictures');
            const endingsEl = document.getElementById('endings');
            picturesEl.innerHTML = '';
            endingsEl.innerHTML = '';
            linesLayer.innerHTML = '';

            shuffle(items).forEach(item => {
                const div = document.createElement('div');
                div.dataset.side = 'left';
                div.dataset.ending = item.ending;
                div.dataset.id = item.id;
                div.dataset.audio = item.audio ?? '';
                div.className = 'item-box border-4 border-blue-200 rounded-2xl p-4 cursor-pointer transition-all shadow-md flex items-center gap-3 h-24 select-none';
                div.innerHTML = `<span class="text-5xl flex-shrink-0">${item.emoji}</span><span class="font-black text-lg text-gray-800 word-slot">${item.name}</span>`;
                picturesEl.appendChild(div);
            });

            shuffle(items).forEach(item => {
                const div = document.createElement('div');
                div.dataset.side = 'right';
                div.dataset.ending = item.ending;
                div.className = 'item-box border-4 border-purple-200 rounded-2xl p-5 text-center cursor-pointer transition-all shadow-md flex items-center justify-center h-24 text-2xl font-black select-none';
                div.textContent = '-' + item.ending;
                endingsEl.appendChild(div);
            });

            updateGroupProgress();
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

        function checkGroupDone() {
            const leftItems = document.querySelectorAll('[data-side="left"]');
            const allCorrect = Array.from(leftItems).every(el => el.classList.contains('correct'));
            if (!allCorrect) return;

            const isLastGroup = currentGroupIndex === groups.length - 1;
            if (isLastGroup) {
                statusEl.textContent = '🎉 Bagus! Semua kelompok sudah selesai.';
                setTimeout(() => document.getElementById('successModal').classList.remove('hidden'), 400);
            } else {
                statusEl.textContent = '✅ Kelompok ini selesai! Lanjut ke kelompok berikutnya.';
                nextGroupBtn.classList.remove('hidden');
            }
        }

        function bindItems() {
            document.querySelectorAll('.item-box').forEach(el => {
                el.onclick = () => {
                    const side = el.dataset.side;
                    const ending = el.dataset.ending;

                    if (side === 'left') {
                        if (el.classList.contains('correct')) return;

                        const audioSrc = el.dataset.audio;
                        if (audioSrc) new Audio(audioSrc).play();

                        document.querySelectorAll('.item-box').forEach(i => i.classList.remove('selected'));
                        removePreview();
                        selectedLeft = el;
                        el.classList.add('selected');
                        startPreview(el);
                    } else {
                        if (!selectedLeft) return;
                        const isCorrect = selectedLeft.dataset.ending === ending;

                        removePreview();
                        drawLine(selectedLeft, el, isCorrect);

                        selectedLeft.classList.remove('selected');
                        selectedLeft.classList.add(isCorrect ? 'correct' : 'wrong');
                        el.classList.add(isCorrect ? 'correct' : 'wrong');

                        if (isCorrect) {
                            const slot = selectedLeft.querySelector('.word-slot');
                            slot.classList.add('text-emerald-600');
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
                        checkGroupDone();
                    }
                };
            });
        }

        function updateGroupProgress() {
            document.getElementById('groupProgressText').textContent = (currentGroupIndex + 1) + ' / ' + groups.length;
            document.getElementById('groupProgressBar').style.width = ((currentGroupIndex + 1) / groups.length) * 100 + '%';
        }

        function nextGroup() {
            if (currentGroupIndex < groups.length - 1) {
                currentGroupIndex++;
                selectedLeft = null;
                previewLine = null;
                renderBoard();
            }
        }

        function resetGame() {
            currentGroupIndex = 0;
            selectedLeft = null;
            previewLine = null;
            document.getElementById('successModal').classList.add('hidden');
            renderBoard();
        }

        document.getElementById('nextGroupBtn').addEventListener('click', nextGroup);
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
