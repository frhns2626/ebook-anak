<x-layout-game
    title="{{ $judul }}"
    halaman="{{ $halaman }}"
    :lang_on="true"
    lang="{{ $lang }}"
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

        .item-card {
            background-color: #ffffff;
            border-radius: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .check-box {
            width: 2.5rem;
            height: 2.5rem;
            background-color: #ffffff;
            border: 3px solid #cbd5e1;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 1.25rem;
            font-weight: 900;
        }

        .check-box:hover {
            border-color: #3b82f6;
            transform: scale(1.05);
        }

        .check-box.correct {
            background-color: #22c55e !important;
            border-color: #16a34a !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
            transform: scale(1.1);
        }

        .check-box.wrong {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
            color: #ef4444 !important;
            animation: shake 0.3s ease-in-out;
        }

        @keyframes shake {
            0%,
            100% {
                transform: translateX(0);
            }
            20%,
            60% {
                transform: translateX(-4px);
            }
            40%,
            80% {
                transform: translateX(4px);
            }
        }
    </style>

    <div
        class="my-auto flex h-full w-full flex-col items-center justify-between px-2 select-none"
    >
        <!-- Judul Aktivitas -->
        <div class="mt-1 mb-2 text-center">
            <h1
                class="title-text flex items-center justify-center gap-1 text-lg leading-tight font-extrabold tracking-wide sm:text-xl md:text-2xl"
            >
                Temukan huruf depan setiap<br />objek berikut, beri tanda
                <span
                    class="inline-block text-green-500 drop-shadow-none"
                    style="-webkit-text-stroke: 0"
                    >✔</span
                >
            </h1>
        </div>

        <!-- Grid 2x2 Objek -->
        <div class="my-auto grid w-full max-w-xl grid-cols-2 gap-3 sm:gap-6">
            @foreach ($items as $item)
                <!-- {{ $item['id'] }} -->
                <div class="item-card flex items-center justify-between p-3">
                    <div
                        class="flex flex-col items-center justify-center space-y-1"
                    >
                        {{--                        <span class="text-lg sm:text-xl font-extrabold text-black">{{ strtolower($item['id']) }}</span>--}}
                        <img
                            src="{{ $item['emoji'] }}"
                            alt="{{ $item['id'] }}"
                            class="pointer-events-none h-auto w-30 rounded object-contain"
                        />
                    </div>
                    <div class="flex flex-col space-y-2 pr-1">
                        @foreach ($item['options'] as $opt)
                            <div class="flex items-center space-x-2">
                                <span
                                    class="w-4 text-center text-4xl font-black text-black"
                                    >{{ $opt['letter'] }}</span
                                >
                                <div
                                    class="check-box"
                                    data-target="{{ $item['id'] }}"
                                    data-letter="{{ $opt['letter'] }}"
                                    data-correct="{{ $opt['correct'] ? 'true' : 'false' }}"
                                    data-audio="{{ $item['audio'] }}"
                                ></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const checkBoxes = document.querySelectorAll(".check-box")

                let audioPlayer = new Audio()
                let isPlaying = false

                checkBoxes.forEach((box) => {
                    box.addEventListener("click", () => {
                        const isCorrect = box.dataset.correct === "true"
                        const targetName = box.dataset.target
                        const letter = box.dataset.letter

                        if (box.classList.contains("correct")) return

                        if (isCorrect) {
                            const siblings = document.querySelectorAll(
                                `.check-box[data-target="${targetName}"]`,
                            )
                            siblings.forEach((s) => {
                                s.classList.remove("correct", "wrong")
                                s.innerHTML = ""
                            })

                            box.classList.add("correct")
                            box.innerHTML = "✔"

                            const src = box.dataset.audio
                            if (src && !isPlaying) {
                                isPlaying = true

                                audioPlayer.pause()
                                audioPlayer.removeAttribute("src")
                                audioPlayer.load()

                                audioPlayer = new Audio(src)
                                audioPlayer.addEventListener("ended", () => {
                                    isPlaying = false
                                })
                                audioPlayer.addEventListener("error", () => {
                                    isPlaying = false
                                })
                                audioPlayer.play().catch(() => {
                                    isPlaying = false
                                })
                            }

                            if (typeof showFlashMessage === "function") {
                                showFlashMessage(
                                    "success",
                                    `Benar! Huruf depan ${targetName} adalah '${letter}'`,
                                )
                            }
                        } else {
                            box.classList.add("wrong")
                            box.innerHTML = "✖"

                            if (typeof showFlashMessage === "function") {
                                showFlashMessage(
                                    "error",
                                    "Salah, coba pilih huruf yang lain!",
                                )
                            }

                            setTimeout(() => {
                                box.classList.remove("wrong")
                                box.innerHTML = ""
                            }, 500)
                        }
                    })
                })
            })
        </script>
    @endpush
</x-layout-game>
