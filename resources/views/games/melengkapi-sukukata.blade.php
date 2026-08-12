<x-layout-game
    title="{{ $judul }}"
    halaman="{{ $halaman }}"
    :lang_on="true"
    lang="{{ $lang }}"
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

        .item-card {
            background-color: #ffffff;
            border-radius: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /*padding: 0.5rem;*/
            /*width: 7rem;*/
        }

        .word-box {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 10px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-family: 'Fredoka', cursive, sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #1a100c;
        }

        .drop-target {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.5rem;
            background-color: #f8fafc;
            border: 2px dashed #94a3b8;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 0.15rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .drop-target.drag-over {
            background-color: #dbeafe;
            border-color: #3b82f6;
            transform: scale(1.08);
        }

        .drop-target.correct {
            background-color: #22c55e !important;
            border: 2px solid #16a34a !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
            transform: scale(1.05);
        }

        .drop-target.wrong {
            background-color: #fef2f2 !important;
            border: 2px solid #ef4444 !important;
            color: #ef4444 !important;
            animation: shake 0.3s ease-in-out;
        }

        .letter-tile {
            width: 3.25rem;
            height: 3.5rem;
            background-color: #ffffff;
            border-radius: 0.75rem;
            border: 2px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Fredoka', cursive, sans-serif;
            font-size: 1.85rem;
            font-weight: 800;
            color: #1a100c;
            cursor: grab;
            transition: all 0.2s ease;
            user-select: none;
            touch-action: none;
        }

        .letter-tile:active {
            cursor: grabbing;
        }

        .letter-tile.dragging {
            opacity: 0.4;
            transform: scale(0.95);
        }

        .letter-tile.selected {
            background-color: #3b82f6;
            color: #ffffff;
            border-color: #2563eb;
            transform: scale(1.1);
        }

        .letter-tile.used {
            opacity: 0.2;
            pointer-events: none;
            background-color: #cbd5e1;
            border-color: #94a3b8;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            20%, 60% {
                transform: translateX(-4px);
            }
            40%, 80% {
                transform: translateX(4px);
            }
        }
    </style>
    @php $byWord = collect($items)->keyBy(fn ($i) => strtolower($i['id'])); @endphp
    <div class="flex flex-col items-center justify-between h-full w-full my-auto select-none px-2">
        <div class="text-center mt-1 mb-2">
            <h1 class="title-text text-lg sm:text-xl md:text-2xl font-extrabold tracking-wide leading-tight">
                Lengkapi nama objek berikut dengan suku kata yang tepat !
            </h1>
        </div>
        <div class="flex flex-col space-y-4 w-full max-w-lg my-auto">
            <!-- 1. Tomat -->
            <div class="flex items-center justify-between px-4">
                <div class="item-card">
                    <img src="{{ $byWord['tomat']['emoji'] }}" alt="tomat" class="size-28 object-contain pointer-events-none"/>
                </div>
                <div class="word-box" data-audio="{{ $byWord['tomat']['audio'] }}">
                    <span>to</span>
                    <div class="drop-target" data-word="tomat" data-correct="m"></div>
                    <span>at</span>
                </div>
            </div>
            <!-- 2. Payung -->
            <div class="flex items-center justify-between px-4">
                <div class="item-card">
                    <img src="{{ $byWord['payung']['emoji'] }}" alt="payung" class="size-28 object-contain pointer-events-none"/>
                </div>
                <div class="word-box" data-audio="{{ $byWord['payung']['audio'] }}">
                    <span>pay</span>
                    <div class="drop-target" data-word="payung" data-correct="u"></div>
                    <div class="drop-target" data-word="payung" data-correct="n"></div>
                    <div class="drop-target" data-word="payung" data-correct="g"></div>
                </div>
            </div>
            <!-- 3. Kelinci -->
            <div class="flex items-center justify-between px-4">
                <div class="item-card">
                    <img src="{{ $byWord['kelinci']['emoji'] }}" alt="kelinci" class="size-28  object-contain pointer-events-none"/>
                </div>
                <div class="word-box" data-audio="{{ $byWord['kelinci']['audio'] }}">
                    <span>k</span>
                    <div class="drop-target" data-word="kelinci" data-correct="e"></div>
                    <div class="drop-target" data-word="kelinci" data-correct="l"></div>
                    <span>inci</span>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center gap-2 sm:gap-3 w-full max-w-lg my-3">
            <div class="letter-tile" draggable="true" data-letter="l">l</div>
            <div class="letter-tile" draggable="true" data-letter="m">m</div>
            <div class="letter-tile" draggable="true" data-letter="g">g</div>
            <div class="letter-tile" draggable="true" data-letter="u">u</div>
            <div class="letter-tile" draggable="true" data-letter="e">e</div>
            <div class="letter-tile" draggable="true" data-letter="n">n</div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tiles = document.querySelectorAll('.letter-tile');
                const dropTargets = document.querySelectorAll('.drop-target');

                let floatingClone = null;
                let touchActiveTile = null;
                let activeTile = null;
                let rafPending = false;
                let lastTouch = {x: 0, y: 0};

                function createFloatingClone(tile, x, y) {
                    floatingClone = tile.cloneNode(true);
                    floatingClone.style.position = 'fixed';
                    floatingClone.style.width = tile.offsetWidth + 'px';
                    floatingClone.style.height = tile.offsetHeight + 'px';
                    floatingClone.style.pointerEvents = 'none';
                    floatingClone.style.zIndex = '9999';
                    floatingClone.style.opacity = '0.85';
                    floatingClone.style.transition = 'none';
                    moveFloatingClone(x, y);
                    document.body.appendChild(floatingClone);
                }

                function moveFloatingClone(x, y) {
                    if (!floatingClone) return;
                    floatingClone.style.left = (x - floatingClone.offsetWidth / 2) + 'px';
                    floatingClone.style.top = (y - floatingClone.offsetHeight / 2) + 'px';
                }

                function removeFloatingClone() {
                    if (floatingClone) {
                        floatingClone.remove();
                        floatingClone = null;
                    }
                }

                function findDropTargetAt(x, y) {
                    floatingClone.style.display = 'none';
                    const el = document.elementFromPoint(x, y);
                    floatingClone.style.display = '';
                    if (!el) return null;
                    return el.closest('.drop-target');
                }

                tiles.forEach(tile => {
                    tile.addEventListener('dragstart', (e) => {
                        if (tile.classList.contains('used')) return;
                        activeTile = tile;
                        tile.classList.add('dragging');
                        e.dataTransfer.setData('text/plain', tile.dataset.letter);
                    });

                    tile.addEventListener('dragend', () => {
                        tile.classList.remove('dragging');
                    });

                    tile.addEventListener('click', () => {
                        if (tile.classList.contains('used')) return;

                        if (activeTile === tile) {
                            tile.classList.remove('selected');
                            activeTile = null;
                        } else {
                            tiles.forEach(t => t.classList.remove('selected'));
                            tile.classList.add('selected');
                            activeTile = tile;
                        }
                    });

                    tile.addEventListener('touchstart', (e) => {
                        if (tile.classList.contains('used')) return;
                        touchActiveTile = tile;
                        const touch = e.touches[0];
                        createFloatingClone(tile, touch.clientX, touch.clientY);
                        tile.style.opacity = '0.3';
                    }, {passive: true});

                    tile.addEventListener('touchmove', (e) => {
                        if (!floatingClone) return;
                        const touch = e.touches[0];
                        lastTouch = {x: touch.clientX, y: touch.clientY};

                        if (!rafPending) {
                            rafPending = true;
                            requestAnimationFrame(() => {
                                moveFloatingClone(lastTouch.x, lastTouch.y);
                                rafPending = false;
                            });
                        }
                    }, {passive: true});

                    tile.addEventListener('touchend', (e) => {
                        if (!floatingClone || !touchActiveTile) return;
                        const touch = e.changedTouches[0];
                        const target = findDropTargetAt(touch.clientX, touch.clientY);
                        removeFloatingClone();
                        touchActiveTile.style.opacity = '1';

                        if (target && !target.classList.contains('correct')) {
                            processAnswer(target, touchActiveTile, touchActiveTile.dataset.letter);
                        }
                        touchActiveTile = null;
                    });
                });

                dropTargets.forEach(target => {
                    target.addEventListener('dragover', (e) => {
                        e.preventDefault();
                        if (!target.classList.contains('correct')) {
                            target.classList.add('drag-over');
                        }
                    });

                    target.addEventListener('dragleave', () => {
                        target.classList.remove('drag-over');
                    });

                    target.addEventListener('drop', (e) => {
                        e.preventDefault();
                        target.classList.remove('drag-over');

                        if (target.classList.contains('correct')) return;

                        const droppedLetter = e.dataTransfer.getData('text/plain') || (activeTile ? activeTile.dataset.letter : null);

                        if (droppedLetter && activeTile) {
                            processAnswer(target, activeTile, droppedLetter);
                        }
                    });

                    target.addEventListener('click', () => {
                        if (target.classList.contains('correct')) return;

                        if (!activeTile) {
                            if (typeof showFlashMessage === 'function') {
                                showFlashMessage('error', 'Tarik atau pilih huruf di bawah terlebih dahulu!');
                            }
                            return;
                        }

                        processAnswer(target, activeTile, activeTile.dataset.letter);
                    });
                });
            });

            function processAnswer(target, tileElement, selectedLetter) {
                const correctLetter = target.dataset.correct;

                if (selectedLetter === correctLetter) {
                    target.classList.remove('wrong');
                    target.classList.add('correct');
                    target.innerText = selectedLetter;

                    tileElement.classList.remove('selected', 'dragging');
                    tileElement.classList.add('used');
                    tileElement.setAttribute('draggable', 'false');
                    activeTile = null;

                    if (typeof showFlashMessage === 'function') {
                        showFlashMessage('success', 'Hebat! Suku kata tepat!');
                    }

                    const wordBox = target.closest('.word-box');
                    const allTargets = wordBox?.querySelectorAll('.drop-target');
                    const allCorrect = allTargets && Array.from(allTargets).every(t => t.classList.contains('correct'));

                    if (allCorrect) {
                        const src = wordBox.dataset.audio;
                        if (src) {
                            const wordAudio = new Audio(src);
                            wordAudio.play().catch(() => {
                            });
                        }
                    }
                } else {
                    target.classList.add('wrong');
                    target.innerText = selectedLetter;

                    if (typeof showFlashMessage === 'function') {
                        showFlashMessage('error', 'Coba lagi, pilih/tarik huruf yang sesuai!');
                    }

                    setTimeout(() => {
                        target.classList.remove('wrong');
                        target.innerText = '';
                    }, 500);
                }
            }
        </script>
    @endpush
</x-layout-game>
