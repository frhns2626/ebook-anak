<x-layout-game title="{{ $judul }}" halaman="{{ $halaman }}">
    <main class="relative z-10 mx-auto max-w-4xl p-6">
        <div
            class="relative mb-6 overflow-hidden rounded-3xl bg-white p-6 text-center shadow-xl"
        >
            <div
                class="absolute top-0 right-0 left-0 h-2"
                style="
                    background: linear-gradient(
                        90deg,
                        #ff6b6b,
                        #ff9f43,
                        #ffe66d,
                        #4ecdc4,
                        #6c5ce7,
                        #ff6b6b
                    );
                    background-size: 200% 100%;
                    animation: rainbow 3s linear infinite;
                "
            ></div>
            <a
                href="{{ route('belajar.index') }}"
                class="absolute top-1/2 left-4 -translate-y-1/2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-500 transition-all hover:bg-red-200"
                >← Kembali</a
            >
            <span class="animate-bounce-subtle mb-2 block text-[3rem]">🥕</span>
            <h1
                class="mb-1 text-[1.8rem] font-black text-gray-800 md:text-[2.2rem]"
            >
                {{ $judul }}
            </h1>
            <p class="text-[1.1rem] text-gray-500">{{ $deskripsi }}</p>
        </div>
        <div
            class="mb-6 rounded-2xl border border-yellow-300 bg-yellow-100 p-4 text-center font-medium text-yellow-800"
        >
            🎯
            <strong
                >Tap tombol audio, dengarkan, lalu tap gambar yang
                sesuai!</strong
            >
        </div>
        <div id="board" class="relative rounded-3xl bg-white p-6 shadow-xl">
            <svg id="lines-layer" class="pointer-events-none absolute inset-0 h-full w-full" style="z-index:1"></svg>
            <div
                class="relative grid grid-cols-2 gap-16 md:gap-28"
                style="z-index: 2"
            >
                <div>
                    <h3
                        class="mb-4 text-center text-xl font-bold text-gray-700"
                    >
                        Audio
                    </h3>
                    <div id="audios" class="space-y-4"></div>
                </div>
                <div>
                    <h3
                        class="mb-4 text-center text-xl font-bold text-gray-700"
                    >
                        Gambar
                    </h3>
                    <div id="pictures" class="space-y-4"></div>
                </div>
            </div>
        </div>
        <p id="status" class="mt-6 text-center text-lg font-bold"></p>
        <div class="mt-8 flex justify-center gap-4">
            <button
                id="resetBtn"
                class="rounded-full bg-gray-200 px-6 py-4 font-bold text-gray-700 transition-all hover:bg-gray-300"
            >
                🔄 Ulangi
            </button>
        </div>
        <div
            id="successModal"
            class="fixed inset-0 z-50 flex hidden items-center justify-center bg-black/70"
        >
            <div class="mx-4 max-w-md rounded-3xl bg-white p-10 text-center">
                <div class="mb-4 animate-bounce text-8xl">🎉</div>
                <h2 class="mb-2 text-4xl font-black text-emerald-600">
                    Hebat Sekali!
                </h2>
                <p class="mb-6 text-xl text-gray-600">Semua sudah cocok dengan benar!</p>
                <button
                    onclick="
                        document
                            .getElementById('successModal')
                            .classList.add('hidden')
                        resetGame()
                    "
                    class="rounded-full bg-emerald-500 px-8 py-3 text-lg font-bold text-white transition-all hover:bg-emerald-600"
                >
                    Main Lagi →
                </button>
            </div>
        </div>
    </main>
    <script>
        const items = @json($items)
        const board = document.getElementById("board")
        const linesLayer = document.getElementById("lines-layer")
        const statusEl = document.getElementById("status")

        let selectedLeft = null
        let previewLine = null

        function shuffle(arr) {
            return [...arr].sort(() => Math.random() - 0.5)
        }

        function renderBoard() {
            const audiosEl = document.getElementById("audios")
            const picturesEl = document.getElementById("pictures")
            audiosEl.innerHTML = ""
            picturesEl.innerHTML = ""

            shuffle(items).forEach((item, index) => {
                const div = document.createElement("div")
                div.dataset.side = "left"
                div.dataset.id = item.id
                div.dataset.audio = item.audio
                div.className =
                    "item-box border-4 border-blue-200 rounded-2xl p-4 cursor-pointer transition-all shadow-md flex items-center gap-3 h-24 select-none"
                div.innerHTML = `
                    <span class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 font-black text-blue-600 flex-shrink-0">${index + 1}</span>
                    <span class="flex-1 flex items-center justify-center text-3xl">🔊</span>
                `
                audiosEl.appendChild(div)
            })

            shuffle(items).forEach((item) => {
                const div = document.createElement("div")
                div.dataset.side = "right"
                div.dataset.id = item.id
                div.className =
                    "item-box border-4 border-purple-200 rounded-2xl p-4 cursor-pointer transition-all shadow-md flex items-center gap-3 h-24 select-none"
                div.innerHTML = `<span class="text-5xl flex-shrink-0">${item.emoji}</span><span class="font-black text-lg text-gray-800">${item.name}</span>`
                picturesEl.appendChild(div)
            })

            bindItems()
        }

        function getPoint(evt) {
            const rect = board.getBoundingClientRect()
            const clientX = evt.touches ? evt.touches[0].clientX : evt.clientX
            const clientY = evt.touches ? evt.touches[0].clientY : evt.clientY
            return { x: clientX - rect.left, y: clientY - rect.top }
        }

        function getCenter(el) {
            const r = el.getBoundingClientRect()
            const b = board.getBoundingClientRect()
            const side = el.dataset.side
            return {
                x: side === "left" ? r.right - b.left : r.left - b.left,
                y: r.top - b.top + r.height / 2,
            }
        }

        function startPreview(leftEl) {
            const p1 = getCenter(leftEl)
            previewLine = document.createElementNS("http://www.w3.org/2000/svg", "line")
            previewLine.setAttribute("x1", p1.x)
            previewLine.setAttribute("y1", p1.y)
            previewLine.setAttribute("x2", p1.x)
            previewLine.setAttribute("y2", p1.y)
            previewLine.setAttribute("stroke", "#888780")
            previewLine.setAttribute("stroke-width", "2.5")
            previewLine.setAttribute("stroke-dasharray", "5,4")
            linesLayer.appendChild(previewLine)
        }

        function updatePreview(evt) {
            if (!previewLine) return
            const p = getPoint(evt)
            previewLine.setAttribute("x2", p.x)
            previewLine.setAttribute("y2", p.y)
        }

        function removePreview() {
            if (previewLine) {
                previewLine.remove()
                previewLine = null
            }
        }

        board.addEventListener("mousemove", updatePreview)
        board.addEventListener("touchmove", updatePreview)

        function drawLine(leftEl, rightEl, isCorrect) {
            const p1 = getCenter(leftEl),
                p2 = getCenter(rightEl)
            const line = document.createElementNS("http://www.w3.org/2000/svg", "line")
            line.setAttribute("x1", p1.x)
            line.setAttribute("y1", p1.y)
            line.setAttribute("x2", p2.x)
            line.setAttribute("y2", p2.y)
            line.setAttribute("stroke", isCorrect ? "#639922" : "#e24b4a")
            line.setAttribute("stroke-width", "3")
            linesLayer.appendChild(line)
        }

        function checkWin() {
            const leftItems = document.querySelectorAll('[data-side="left"]')
            const allCorrect = Array.from(leftItems).every((el) =>
                el.classList.contains("correct"),
            )
            if (allCorrect) {
                statusEl.textContent = "🎉 Bagus! Semua sudah cocok dengan benar."
                setTimeout(
                    () =>
                        document
                            .getElementById("successModal")
                            .classList.remove("hidden"),
                    400,
                )
            }
        }

        function bindItems() {
            document.querySelectorAll(".item-box").forEach((el) => {
                el.onclick = () => {
                    const side = el.dataset.side
                    const id = el.dataset.id

                    if (side === "left") {
                        if (el.classList.contains("correct")) return

                        const audioSrc = el.dataset.audio
                        if (audioSrc) new Audio(audioSrc).play()

                        document
                            .querySelectorAll(".item-box")
                            .forEach((i) => i.classList.remove("selected"))
                        removePreview()
                        selectedLeft = el
                        el.classList.add("selected")
                        startPreview(el)
                    } else {
                        if (!selectedLeft) return
                        const isCorrect = selectedLeft.dataset.id === id

                        removePreview()
                        drawLine(selectedLeft, el, isCorrect)

                        selectedLeft.classList.remove("selected")
                        selectedLeft.classList.add(isCorrect ? "correct" : "wrong")
                        el.classList.add(isCorrect ? "correct" : "wrong")

                        if (!isCorrect) {
                            const badLeft = selectedLeft,
                                badRight = el
                            setTimeout(() => {
                                badLeft.classList.remove("wrong")
                                badRight.classList.remove("wrong")
                                linesLayer.querySelectorAll("line").forEach((l) => {
                                    if (l.getAttribute("stroke") === "#e24b4a")
                                        l.remove()
                                })
                            }, 700)
                        }

                        selectedLeft = null
                        checkWin()
                    }
                }
            })
        }

        function resetGame() {
            document
                .querySelectorAll(".item-box")
                .forEach((i) => i.classList.remove("selected", "correct", "wrong"))
            linesLayer.innerHTML = ""
            statusEl.textContent = ""
            selectedLeft = null
            previewLine = null
            renderBoard()
        }

        document.getElementById("resetBtn").addEventListener("click", resetGame)

        document.addEventListener("DOMContentLoaded", () => {
            renderBoard()
        })
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
