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

        /* Styling Kartu Putih Bergelombang */
        .item-card {
            background-color: #ffffff;
            border-radius: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            cursor: pointer;
        }

        /* Styling Input Angka Jawaban */
        .number-input {
            width: 2.3rem;
            height: 2.3rem;
            border-radius: 0.75rem;
            border: 3px solid #cbd5e1;
            font-family: "Fredoka", cursive, sans-serif;
            font-size: 1rem;
            font-weight: 700;
            text-align: center;
            outline: none;
            transition: all 0.2s ease;
        }

        .number-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        /* Feedback Jawaban Benar / Salah */
        .input-correct {
            border-color: #22c55e !important;
            background-color: #f0fdf4;
            color: #166534;
        }

        .input-wrong {
            border-color: #ef4444 !important;
            background-color: #fef2f2;
            color: #991b1b;
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
    @php
        // Perpasangan tetap (permutasi tanpa titik tetap), sesuai desain asli:
        // baris 1 -> target kata milik item ke-3, baris 2 -> item ke-4, dst.
        $targetOrder = [3, 4, 5, 2, 1];
    @endphp
    <div
        class="my-auto flex h-full w-full flex-col items-center justify-between px-2 select-none"
    >
        <!-- Judul Atas -->
        <div class="mt-1 mb-3 text-center">
            <h1
                class="title-text text-lg leading-tight font-extrabold tracking-wide sm:text-xl md:text-2xl"
            >
                Cocokkan gambar dan kata dengan menuliskan angka !
            </h1>
        </div>
        <!-- List Baris Matching (5 Pasang) -->
        <div
            class="my-auto flex w-full max-w-lg flex-col space-y-2 sm:space-y-3"
        >
            @foreach ($items as $i => $left)
                @php
                    $target = $items[$targetOrder[$i] - 1];
                @endphp
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center space-x-2">
                        <span
                            class="text-2xl font-black text-black sm:text-3xl"
                            >{{ $i + 1 }}</span
                        >
                        <img
                            src="{{ $left['emoji'] }}"
                            alt="{{ $left['id'] }}"
                            data-audio="{{ $left['audio'] }}"
                            @class([
                                    'baca-item object-contain',
                                    'w-[72px] h-auto' => $left['id'] !== 'kacamata',
                                    'w-20 h-auto' => $left['id'] === 'kacamata',
                             ])
                        />
                    </div>
                    <div class="flex items-center space-x-2">
                        <input
                            type="text"
                            maxlength="1"
                            data-answer="{{ $targetOrder[$i] }}"
                            class="number-input text-black"
                        />
                        <div
                            class="item-card baca-item w-32 px-4 py-2 text-center sm:w-36"
                            data-audio="{{ $target['audio'] }}"
                        >
                            <span
                                class="text-lg font-bold text-black sm:text-xl"
                                >{{ $target['id'] }}</span
                            >
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const inputs = document.querySelectorAll(".number-input")

                inputs.forEach((input) => {
                    input.addEventListener("input", (e) => {
                        const val = e.target.value.trim()
                        const correctAnswer = input.dataset.answer

                        input.classList.remove("input-correct", "input-wrong")

                        if (val === "") return

                        if (val === correctAnswer) {
                            input.classList.add("input-correct")
                            if (typeof showFlashMessage === "function") {
                                showFlashMessage("success", "Benar!")
                            }

                            const row = input.closest(
                                ".flex.items-center.justify-between",
                            )
                            const targetCard = row?.querySelector(
                                ".item-card[data-audio]",
                            )
                            const src = targetCard?.dataset.audio
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
                        } else {
                            input.classList.add("input-wrong")
                            if (typeof showFlashMessage === "function") {
                                showFlashMessage("error", "Coba lagi!")
                            }
                        }
                    })
                })

                let audioPlayer = new Audio()
                let isPlaying = false

                document.querySelectorAll(".baca-item").forEach((card) => {
                    card.addEventListener("click", () => {
                        if (isPlaying) return

                        const src = card.dataset.audio
                        if (!src) return

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

                        card.classList.add(
                            "drop-shadow-[0_0_10px_rgba(74,222,128,0.9)]",
                        )
                    })
                })
            })
        </script>
    @endpush
</x-layout-game>
