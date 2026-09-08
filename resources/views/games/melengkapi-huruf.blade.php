<x-layout-game title="{{ $judul }}" halaman="{{ $halaman }}">
    <style>
        /* Typography Judul Pop-out */
        .title-text {
            font-family: "Fredoka", cursive, sans-serif;
            color: #fbbf24;
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        .letter-card.selected {
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.06),
                0 0 0 4px #60a5fa;
            transform: scale(1.05);
        }

        .letter-card {
            background-color: #ffffff;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #1a100c;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
            user-select: none;
        }

        .drop-target {
            background-color: #ffffff;
            border: 2px dashed #93c5fd;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }

        .drop-target.drag-over {
            background-color: #dbeafe;
            border-color: #3b82f6;
            transform: scale(1.05);
        }

        .draggable-item {
            cursor: grab;
            transition: transform 0.15s ease;
            touch-action: manipulation;
        }

        .draggable-item:active {
            cursor: grabbing;
            transform: scale(1.1);
        }
    </style>
    @php
        $alphabet = range('a', 'z');
        $blankCount = 8; // jumlah huruf yang dikosongkan
        $willEmpety = collect($alphabet)->random($blankCount)->values()->all();
        $bank = collect($willEmpety)->shuffle()->values(); // Collection, for ->chunk()
    @endphp
    <div
        class="my-auto flex h-full w-full flex-col items-center justify-between"
    >
        <div class="mt-1 mb-3 text-center">
            <h1
                class="title-text mb-2 text-2xl font-extrabold tracking-wide sm:text-4xl"
            >
                Lengkapi huruf yang hilang !
            </h1>
        </div>
        <!-- Grid Utama Alfabet (A-Z dengan Slot Kosong, acak) -->
        <div class="grid w-full max-w-md grid-cols-5 gap-2 px-2 sm:gap-2.5">
            @php
                $alphabet = range('a', 'z');
                $blankCount = 8;
                $willEmpety = collect($alphabet)->random($blankCount)->values()->all();
                $bank = collect($willEmpety)->shuffle()->values();

                // map lowercase letter -> audio url from controller data
                $audioMap = collect($hurufs['items'] ?? [])->mapWithKeys(function ($item) {
                    $key = strtolower($item['huruf'] ?? $item['id'] ?? '');
                    return [$key => $item['audio']];
                });
            @endphp
            @foreach ($alphabet as $letter)
                @if (in_array($letter, $willEmpety))
                    <div
                        class="drop-target flex h-10 items-center justify-center text-2xl font-bold sm:h-12 sm:text-4xl"
                        data-answer="{{ $letter }}"
                        data-audio="{{ $audioMap[$letter] ?? '' }}"
                    ></div>
                @else
                    <div class="letter-card h-10 text-xl sm:h-12 sm:text-2xl">
                        {{ $letter }}
                    </div>
                @endif
            @endforeach
            @for ($i = 0; $i < (5 - (count($alphabet) % 5)) % 5; $i++)
                <div></div>
            @endfor
        </div>
        <div class="my-10"></div>
        <!-- Bank Pilihan Huruf (sama persis dengan $willEmpety, cuma diacak urutannya) -->
        <div class="flex w-full max-w-md flex-col items-center gap-2 px-2">
            @foreach ($bank->chunk(6) as $row)
                <div class="grid w-full grid-cols-6 gap-2">
                    @foreach ($row as $letter)
                        <div
                            class="letter-card draggable-item h-10 text-2xl sm:h-12 sm:text-4xl"
                            draggable="true"
                            data-letter="{{ $letter }}"
                        >
                            {{ $letter }}
                        </div>
                    @endforeach
                    @for ($i = 0; $i < 6 - $row->count(); $i++)
                        <div></div>
                    @endfor
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const draggables = document.querySelectorAll(".draggable-item")
                const dropTargets = document.querySelectorAll(".drop-target")
                let selectedLetterNode = null
                let floatingClone = null
                let activeItem = null
                {{--                const audioBenar = new Audio("{{ asset('audio/master/benar.mp3') }}");--}}
                const audioSalah = new Audio("{{ asset('audio/master/coba-lagi.mp3') }}")

                function clearSelection() {
                    draggables.forEach((d) => d.classList.remove("selected"))
                    selectedLetterNode = null
                }

                function createFloatingClone(item, x, y) {
                    floatingClone = item.cloneNode(true)
                    floatingClone.style.position = "fixed"
                    floatingClone.style.width = item.offsetWidth + "px"
                    floatingClone.style.height = item.offsetHeight + "px"
                    floatingClone.style.pointerEvents = "none"
                    floatingClone.style.zIndex = "9999"
                    floatingClone.style.opacity = "0.85"
                    moveFloatingClone(x, y)
                    document.body.appendChild(floatingClone)
                }

                function moveFloatingClone(x, y) {
                    if (!floatingClone) return
                    floatingClone.style.left = x - floatingClone.offsetWidth / 2 + "px"
                    floatingClone.style.top = y - floatingClone.offsetHeight / 2 + "px"
                }

                function removeFloatingClone() {
                    if (floatingClone) {
                        floatingClone.remove()
                        floatingClone = null
                    }
                }

                function findDropTargetAt(x, y) {
                    floatingClone.style.display = "none"
                    const el = document.elementFromPoint(x, y)
                    floatingClone.style.display = ""
                    if (!el) return null
                    return el.closest(".drop-target")
                }

                draggables.forEach((item) => {
                    // Tap-to-select fallback (still works if someone just taps)
                    item.addEventListener("click", () => {
                        if (item.style.visibility === "hidden") return
                        clearSelection()
                        selectedLetterNode = item
                        item.classList.add("selected")
                    })

                    // Touch drag
                    item.addEventListener(
                        "touchstart",
                        (e) => {
                            if (item.style.visibility === "hidden") return
                            activeItem = item
                            const touch = e.touches[0]
                            createFloatingClone(item, touch.clientX, touch.clientY)
                            item.style.opacity = "0.3"
                        },
                        { passive: true },
                    )

                    item.addEventListener(
                        "touchmove",
                        (e) => {
                            if (!floatingClone) return
                            const touch = e.touches[0]
                            moveFloatingClone(touch.clientX, touch.clientY)
                        },
                        { passive: true },
                    )

                    item.addEventListener("touchend", (e) => {
                        if (!floatingClone || !activeItem) return
                        const touch = e.changedTouches[0]
                        const target = findDropTargetAt(touch.clientX, touch.clientY)
                        removeFloatingClone()
                        activeItem.style.opacity = "1"

                        if (target) {
                            checkAnswer(target, activeItem.dataset.letter, activeItem)
                        }
                        activeItem = null
                    })

                    // Desktop native drag (unchanged)
                    item.addEventListener("dragstart", (e) => {
                        selectedLetterNode = item
                        e.dataTransfer.setData("text/plain", item.dataset.letter)
                    })
                })

                dropTargets.forEach((target) => {
                    target.addEventListener("dragover", (e) => {
                        e.preventDefault()
                        target.classList.add("drag-over")
                    })

                    target.addEventListener("dragleave", () => {
                        target.classList.remove("drag-over")
                    })

                    target.addEventListener("drop", (e) => {
                        e.preventDefault()
                        target.classList.remove("drag-over")
                        const letter = e.dataTransfer.getData("text/plain")
                        checkAnswer(target, letter, selectedLetterNode)
                    })

                    // Tap-to-place fallback
                    target.addEventListener("click", () => {
                        if (selectedLetterNode) {
                            checkAnswer(
                                target,
                                selectedLetterNode.dataset.letter,
                                selectedLetterNode,
                            )
                        }
                    })
                })

                function checkAnswer(target, letter, sourceNode) {
                    const correctAnswer = target.dataset.answer

                    if (letter === correctAnswer) {
                        target.textContent = letter
                        target.classList.remove("drop-target", "border-dashed")
                        target.classList.add("letter-card", "text-green-600", "animate-pop")

                        if (sourceNode) {
                            sourceNode.style.visibility = "hidden"
                            sourceNode.classList.remove("selected")
                        }
                        selectedLetterNode = null

                        const letterAudioUrl = target.dataset.audio
                        if (letterAudioUrl) {
                            new Audio(letterAudioUrl).play()
                        }

                        showFlashMessage("success", "Benar!")
                    } else {
                        audioSalah.currentTime = 0
                        audioSalah.play()
                        showFlashMessage("error", "Salah!")
                    }
                }
            })
        </script>
    @endpush
</x-layout-game>
