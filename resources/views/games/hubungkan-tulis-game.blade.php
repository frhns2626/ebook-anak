<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
    :lang_on="true"
    lang="{{$lang}}"
>
    <style>
        /* Typography Judul Pop-out */
        .title-text {
            font-family: 'Fredoka', cursive, sans-serif;
            color: #fbbf24;
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        /* Card Gambar Putih */
        .item-card {
            background-color: #ffffff;
            border-radius: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            width: 100%;
            cursor: pointer;
        }

        /* Titik Hubung Interaktif */
        .connect-dot {
            width: 22px;
            height: 22px;
            background-color: #1a100c;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease;
            z-index: 30;
            touch-action: none;
        }

        .connect-dot:hover, .connect-dot.active {
            transform: scale(1.35);
            background-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.3);
        }

        /* Styling Input Karakter Tulis Ulang */
        .char-input {
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 0.375rem;
            border: 2px solid #cbd5e1;
            background-color: #ffffff;
            font-family: 'Fredoka', cursive, sans-serif;
            font-size: 1rem;
            font-weight: 700;
            text-align: center;
            outline: none;
            transition: all 0.2s ease;
        }
        .char-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
        }

        .char-input.correct {
            border-color: #22c55e !important;
            background-color: #f0fdf4 !important;
            color: #166534 !important;
            box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.3);
        }

        .char-input.wrong {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
            color: #991b1b !important;
            animation: shake 0.3s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-4px); }
            40%, 80% { transform: translateX(4px); }
        }
        .char-input:disabled {
            background-color: #f1f5f9 !important;
            border-color: #e2e8f0 !important;
            cursor: not-allowed;
            opacity: 0.6;
        }

    </style>

    @php
        $topItems = collect($items)->shuffle()->values();
        $bottomItems = collect($items)->shuffle()->values();
    @endphp

    <div id="gameContainer" class="relative flex flex-col items-center justify-between h-full w-full my-auto select-none px-2">
        <!-- Canvas Transparan untuk Garis Penghubung -->
        <canvas id="lineCanvas" class="absolute inset-0 w-full h-full pointer-events-none z-20"></canvas>

        <!-- Judul Atas -->
        <div class="text-center mt-1 mb-2 z-10">
            <h1 class="title-text text-lg sm:text-xl md:text-2xl font-extrabold tracking-wide px-2 leading-tight">
                hubungkan gambar dengan kata kemudian tulis ulang !
            </h1>
        </div>

        <!-- Baris Atas: Objek Gambar + Nama + Titik Hubung -->
        <div class="grid grid-cols-3 gap-3 sm:gap-6 w-full max-w-xl z-10 my-auto ">
            @foreach ($topItems as $item)
                @php $word = strtolower($item['id']); @endphp
                <div class="flex flex-col items-center space-y-2">
                    <div class="item-card" data-audio="{{ $item['audio'] }}">
                        <img src="{{ $item['emoji'] }}" alt="{{ $word }}" class="h-16 sm:h-20 object-contain pointer-events-none" />
                        <span class="text-xl sm:text-2xl font-black text-black mt-1">{{ $word }}</span>
                    </div>
                    <div class="connect-dot" data-type="top" data-id="{{ $word }}" data-match="{{ $word }}"></div>
                </div>
            @endforeach
        </div>

        <!-- Space Tengah -->
        <div class="flex-1 min-h-[100px] w-full"></div>

        <!-- Baris Bawah: Titik Hubung + Kata Tujuan + Kotak Tulis Ulang -->
        <div class="grid grid-cols-3 gap-2 sm:gap-4 w-full max-w-xl z-10 mb-2">
            @foreach ($bottomItems as $item)
                @php $word = strtolower($item['id']); @endphp
                <div class="flex flex-col items-center space-y-2">
                    <div class="connect-dot" data-type="bottom" data-id="{{ $word }}"></div>
                    <span class="text-xl font-black text-black tracking-widest">{{ implode(' ', str_split($word)) }}</span>
                    <div class="flex space-x-1" data-word="{{ $word }}" data-audio="{{ $item['audio'] }}">
                        @foreach (str_split($word) as $char)
                            <input type="text" maxlength="1" data-char="{{ $char }}" class="char-input" disabled />
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const container = document.getElementById('gameContainer');
                const canvas = document.getElementById('lineCanvas');
                const ctx = canvas.getContext('2d');
                const dots = document.querySelectorAll('.connect-dot');

                let selectedDot = null;
                let currentMousePos = { x: 0, y: 0 };
                let connections = [];

                let wordAudioPlayer = new Audio();
                let isWordAudioPlaying = false;

                document.querySelectorAll('.item-card').forEach(card => {
                    card.addEventListener('click', () => {
                        if (isWordAudioPlaying) return;

                        const src = card.dataset.audio;
                        if (!src) return;

                        isWordAudioPlaying = true;

                        wordAudioPlayer.pause();
                        wordAudioPlayer.removeAttribute('src');
                        wordAudioPlayer.load();

                        wordAudioPlayer = new Audio(src);
                        wordAudioPlayer.addEventListener('ended', () => { isWordAudioPlaying = false; });
                        wordAudioPlayer.addEventListener('error', () => { isWordAudioPlaying = false; });
                        wordAudioPlayer.play().catch(() => { isWordAudioPlaying = false; });

                        card.classList.add('drop-shadow-[0_0_10px_rgba(74,222,128,0.9)]');
                    });
                });

                function resizeCanvas() {
                    const rect = container.getBoundingClientRect();
                    canvas.width = rect.width;
                    canvas.height = rect.height;
                    drawLines();
                }

                window.addEventListener('resize', resizeCanvas);
                setTimeout(resizeCanvas, 100);

                function getDotCenter(dot) {
                    const parentRect = container.getBoundingClientRect();
                    const dotRect = dot.getBoundingClientRect();
                    return {
                        x: dotRect.left + dotRect.width / 2 - parentRect.left,
                        y: dotRect.top + dotRect.height / 2 - parentRect.top
                    };
                }

                function updateMousePos(e) {
                    const parentRect = container.getBoundingClientRect();
                    const touch = e.touches ? e.touches[0] : (e.changedTouches ? e.changedTouches[0] : e);

                    if (touch) {
                        currentMousePos = {
                            x: touch.clientX - parentRect.left,
                            y: touch.clientY - parentRect.top
                        };
                    }

                    if (selectedDot) {
                        drawLines();
                    }
                }

                window.addEventListener('mousemove', updateMousePos);
                window.addEventListener('touchmove', (e) => {
                    if (selectedDot) e.preventDefault();
                    updateMousePos(e);
                }, { passive: false });

                function drawLines() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    connections.forEach(conn => {
                        const start = getDotCenter(conn.from);
                        const end = getDotCenter(conn.to);

                        ctx.beginPath();
                        ctx.moveTo(start.x, start.y);
                        ctx.lineTo(end.x, end.y);
                        ctx.strokeStyle = '#22c55e';
                        ctx.lineWidth = 5;
                        ctx.lineCap = 'round';
                        ctx.stroke();
                    });

                    if (selectedDot) {
                        const start = getDotCenter(selectedDot);

                        ctx.beginPath();
                        ctx.moveTo(start.x, start.y);
                        ctx.lineTo(currentMousePos.x, currentMousePos.y);
                        ctx.strokeStyle = '#2563eb';
                        ctx.lineWidth = 4;
                        ctx.lineCap = 'round';
                        ctx.setLineDash([8, 6]);
                        ctx.stroke();
                        ctx.setLineDash([]);
                    }
                }

                function evaluateConnection(startDot, endDot) {
                    startDot.classList.remove('active');
                    selectedDot = null;

                    if (!endDot || startDot === endDot || startDot.dataset.type === endDot.dataset.type) {
                        drawLines();
                        return;
                    }

                    if (connections.some(c => c.from === endDot || c.to === endDot)) {
                        drawLines();
                        return;
                    }

                    const topDot = startDot.dataset.type === 'top' ? startDot : endDot;
                    const bottomDot = startDot.dataset.type === 'bottom' ? startDot : endDot;

                    if (topDot.dataset.match === bottomDot.dataset.id) {
                        connections.push({ from: topDot, to: bottomDot });
                        drawLines();

                        if (typeof showFlashMessage === 'function') {
                            showFlashMessage('success', 'Hebat! Garis terhubung dengan benar!');
                        }

                        const group = document.querySelector(`[data-word="${bottomDot.dataset.id}"]`);
                        if (group) {
                            const inputs = group.querySelectorAll('.char-input');
                            inputs.forEach(i => i.disabled = false);
                            inputs[0]?.focus();
                        }
                    } else {
                        drawLines();

                        if (typeof showFlashMessage === 'function') {
                            showFlashMessage('error', 'Salah, coba hubungkan ke kata yang cocok!');
                        }
                    }
                }

                function startDrag(e) {
                    e.preventDefault();
                    const dot = e.currentTarget;

                    if (connections.some(c => c.from === dot || c.to === dot)) return;

                    selectedDot = dot;
                    selectedDot.classList.add('active');
                    updateMousePos(e);
                    drawLines();
                }

                function endDrag(e) {
                    if (!selectedDot) return;

                    const clientX = e.changedTouches ? e.changedTouches[0].clientX : e.clientX;
                    const clientY = e.changedTouches ? e.changedTouches[0].clientY : e.clientY;

                    const targetElement = document.elementFromPoint(clientX, clientY);
                    const targetDot = targetElement ? targetElement.closest('.connect-dot') : null;

                    evaluateConnection(selectedDot, targetDot);
                }

                dots.forEach(dot => {
                    dot.addEventListener('mousedown', startDrag);
                    dot.addEventListener('touchstart', startDrag, { passive: false });
                });

                window.addEventListener('mouseup', endDrag);
                window.addEventListener('touchend', endDrag);

                const charInputs = document.querySelectorAll('.char-input');

                charInputs.forEach((input) => {
                    input.addEventListener('input', (e) => {
                        const val = e.target.value.toLowerCase().trim();
                        const targetChar = input.dataset.char.toLowerCase();

                        input.classList.remove('correct', 'wrong');

                        if (val === '') return;

                        if (val === targetChar) {
                            input.classList.add('correct');

                            const nextInput = input.nextElementSibling;
                            if (nextInput && nextInput.classList.contains('char-input')) {
                                nextInput.focus();
                            }

                            const group = input.closest('[data-word]');
                            const allInputs = group.querySelectorAll('.char-input');
                            const allCorrect = Array.from(allInputs).every(i => i.classList.contains('correct'));

                            if (allCorrect) {
                                const wordAudioSrc = group.dataset.audio;
                                if (wordAudioSrc) {
                                    const wordDoneAudio = new Audio(wordAudioSrc);
                                    wordDoneAudio.play().catch(() => {});
                                }
                                if (typeof showFlashMessage === 'function') {
                                    showFlashMessage('success', 'Kata lengkap!');
                                }
                            }

                        } else {
                            input.classList.add('wrong');

                            setTimeout(() => {
                                input.classList.remove('wrong');
                                input.value = '';
                            }, 400);
                        }
                    });

                    input.addEventListener('keydown', (e) => {
                        if (e.key === 'Backspace' && input.value === '') {
                            const prevInput = input.previousElementSibling;
                            if (prevInput && prevInput.classList.contains('char-input')) {
                                prevInput.focus();
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
</x-layout-game>
