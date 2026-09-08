<x-layout-game
    title="{{ $judul }}"
    halaman="{{ $halaman }}"
    lang="{{ $lang }}"
    :lang_on="true"
>
    <style>
        /* Typography Judul Pop-out */
        .title-text {
            font-family: "Fredoka", cursive, sans-serif;
            color: #fbbf24;
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        .puzzle-card {
            display: flex;
            justify-content: center;
        }

        .grid-board {
            display: grid;
            grid-template-columns: repeat(8, minmax(0, 1fr));
            gap: 2px;
            background-color: #000000;
            border: 3px solid #000000;
            border-radius: 0.25rem;
            overflow: hidden;
        }

        .grid-cell {
            background-color: #ffffff;
            aspect-ratio: 1 / 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Fredoka", cursive, sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a100c;
            cursor: pointer;
            user-select: none;
            transition: all 0.15s ease;
        }

        .grid-cell.selecting {
            background-color: #93c5fd !important;
            color: #1e3a8a;
        }

        .grid-cell.correct {
            background-color: #22c55e !important;
            color: #ffffff !important;
        }

        .target-card {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .target-card.found {
            background-color: #f0fdf4;
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
            padding-top: 10px;
        }

        .target-card.found::after {
            content: "✔";
            position: absolute;
            background-color: #22c55e;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            font-weight: 900;
        }
    </style>

    @php $byWord = collect($items)->keyBy(fn ($i) => strtolower($i['id'])); @endphp

    <div
        class="z-10 my-auto flex h-full w-full flex-col items-center justify-between px-2 select-none"
    >
        <div class="mt-1 mb-2 text-center">
            <h1
                class="title-text px-2 text-xl leading-tight font-extrabold tracking-wide sm:text-2xl md:text-3xl"
            >
                Puzzle mencari kata
            </h1>
        </div>

        <div class="puzzle-card my-auto w-full max-w-lg">
            <div id="gridBoard" class="grid-board">
                @php
                    $grid = [
                        ['m', 'e', 'j', 'a', 'k', 'o', 'e', 'd'], // row 0: meja (0,0 -> 0,3)
                        ['q', 'd', 'b', 'k', 'u', 'e', 'p', 'a'], // row 1: kue  (1,3 -> 1,5)
                        ['r', 'b', 'u', 'k', 'u', 't', 'l', 'h'], // row 2: buku (2,1 -> 2,4)
                        ['u', 'd', 'a', 'n', 'g', 'k', 'l', 'c'], // row 3: udang(3,0 -> 3,4)
                        ['y', 'f', 'j', 'h', 's', 'a', 'p', 'i'], // row 4: sapi (4,4 -> 4,7)
                    ];
                @endphp

                @foreach ($grid as $r => $row)
                    @foreach ($row as $c => $char)
                        <div
                            class="grid-cell"
                            data-row="{{ $r }}"
                            data-col="{{ $c }}"
                            data-char="{{ $char }}"
                        >
                            {{ $char }}
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <div class="mt-3 mb-1 w-full max-w-lg space-y-2">
            <div class="grid grid-cols-3 gap-2 sm:gap-4">
                <!-- Meja -->
                <div
                    class="target-card"
                    data-word="meja"
                    data-audio="{{ $byWord['meja']['audio'] }}"
                >
                    <img
                        src="{{ $byWord['meja']['emoji'] }}"
                        alt="meja"
                        class="pointer-events-none size-28 object-contain"
                    />
                </div>
                <!-- Kue -->
                <div
                    class="target-card"
                    data-word="kue"
                    data-audio="{{ $byWord['kue']['audio'] }}"
                >
                    <img
                        src="{{ $byWord['kue']['emoji'] }}"
                        alt="kue"
                        class="pointer-events-none size-28 object-contain"
                    />
                </div>
                <!-- Buku -->
                <div
                    class="target-card"
                    data-word="buku"
                    data-audio="{{ $byWord['buku']['audio'] }}"
                >
                    <img
                        src="{{ $byWord['buku']['emoji'] }}"
                        alt="buku"
                        class="pointer-events-none size-28 object-contain"
                    />
                </div>
            </div>

            <div class="mx-auto grid max-w-xs grid-cols-2 gap-2 sm:gap-4">
                <!-- Udang -->
                <div
                    class="target-card"
                    data-word="udang"
                    data-audio="{{ $byWord['udang']['audio'] }}"
                >
                    <img
                        src="{{ $byWord['udang']['emoji'] }}"
                        alt="udang"
                        class="pointer-events-none size-28 object-contain"
                    />
                </div>
                <!-- Sapi -->
                <div
                    class="target-card"
                    data-word="sapi"
                    data-audio="{{ $byWord['sapi']['audio'] }}"
                >
                    <img
                        src="{{ $byWord['sapi']['emoji'] }}"
                        alt="sapi"
                        class="pointer-events-none size-28 object-contain"
                    />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const cells = document.querySelectorAll(".grid-cell")

                const targetWords = {
                    meja: [
                        [0, 0],
                        [0, 1],
                        [0, 2],
                        [0, 3],
                    ],
                    kue: [
                        [1, 3],
                        [1, 4],
                        [1, 5],
                    ],
                    buku: [
                        [2, 1],
                        [2, 2],
                        [2, 3],
                        [2, 4],
                    ],
                    udang: [
                        [3, 0],
                        [3, 1],
                        [3, 2],
                        [3, 3],
                        [3, 4],
                    ],
                    sapi: [
                        [4, 4],
                        [4, 5],
                        [4, 6],
                        [4, 7],
                    ],
                }

                let isSelecting = false
                let selectedCells = []
                let foundWords = []

                {{--                const wrongAudio = new Audio('{{ asset("audio/wrong.mp3") }}'); --}}

                function getCell(r, c) {
                    return document.querySelector(
                        `.grid-cell[data-row="${r}"][data-col="${c}"]`,
                    )
                }

                function startSelection(cell) {
                    isSelecting = true
                    selectedCells = [cell]
                    cell.classList.add("selecting")
                }

                function extendSelection(cell) {
                    if (!isSelecting || selectedCells.includes(cell)) return

                    const firstCell = selectedCells[0]
                    const r1 = parseInt(firstCell.dataset.row)
                    const r2 = parseInt(cell.dataset.row)

                    if (r1 === r2) {
                        selectedCells.push(cell)
                        cell.classList.add("selecting")
                    }
                }

                function endSelection() {
                    if (!isSelecting) return
                    isSelecting = false

                    const selectedWord = selectedCells.map((c) => c.dataset.char).join("")
                    let matchedWordKey = null

                    for (const [word, coords] of Object.entries(targetWords)) {
                        if (foundWords.includes(word)) continue

                        const isMatch =
                            coords.length === selectedCells.length &&
                            coords.every(([r, c]) => {
                                return selectedCells.some(
                                    (sc) =>
                                        parseInt(sc.dataset.row) === r &&
                                        parseInt(sc.dataset.col) === c,
                                )
                            })

                        if (isMatch) {
                            matchedWordKey = word
                            break
                        }
                    }

                    if (matchedWordKey) {
                        foundWords.push(matchedWordKey)

                        selectedCells.forEach((c) => {
                            c.classList.remove("selecting")
                            c.classList.add("correct")
                        })

                        const card = document.querySelector(
                            `.target-card[data-word="${matchedWordKey}"]`,
                        )
                        if (card) {
                            card.classList.add("found")

                            const src = card.dataset.audio
                            if (src) {
                                const wordAudio = new Audio(src)
                                wordAudio.play().catch(() => {})
                            }
                        }

                        if (typeof showFlashMessage === "function") {
                            showFlashMessage(
                                "success",
                                `Hebat! Kamu menemukan kata '${matchedWordKey}'!`,
                            )
                        }
                    } else {
                        selectedCells.forEach((c) => c.classList.remove("selecting"))
                        if (selectedCells.length > 1) {
                            if (typeof showFlashMessage === "function") {
                                showFlashMessage(
                                    "error",
                                    "Ups! Kata yang kamu pilih belum tepat. Coba lagi!",
                                )
                            }
                        }
                    }

                    selectedCells = []
                }

                cells.forEach((cell) => {
                    cell.addEventListener("mousedown", () => startSelection(cell))
                    cell.addEventListener("mouseenter", () => extendSelection(cell))

                    cell.addEventListener("touchstart", (e) => {
                        e.preventDefault()
                        startSelection(cell)
                    })
                })

                document.addEventListener("mouseup", endSelection)

                document.addEventListener(
                    "touchmove",
                    (e) => {
                        if (!isSelecting) return
                        const touch = e.touches[0]
                        const targetEl = document.elementFromPoint(
                            touch.clientX,
                            touch.clientY,
                        )
                        if (targetEl && targetEl.classList.contains("grid-cell")) {
                            extendSelection(targetEl)
                        }
                    },
                    {
                        passive: false,
                    },
                )

                document.addEventListener("touchend", endSelection)
            })
        </script>
    @endpush
</x-layout-game>
