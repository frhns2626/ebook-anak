<x-layout-game title="{{ $judul }}" halaman="{{ $halaman }}">
    <style>
        /* Typography Suku Kata */
        .syllable-text {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.1;
            user-select: none;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .row-red {
            color: #ef4444;
        }

        .row-green {
            color: #6ee7b7;
        }

        .row-yellow {
            color: #facc15;
        }

        .row-blue {
            color: #60a5fa;
        }

        .title-text {
            cursor: pointer;
        }
    </style>
    @php
        $rowColors = ['row-red', 'row-green', 'row-yellow', 'row-blue', 'row-red', 'row-green', 'row-yellow', 'row-blue', 'row-red', 'row-green', 'row-blue'];
    @endphp
    <div class="flex flex-col gap-5">
        <!-- Judul Bagian Atas -->
        <div class="z-10 text-center">
            <h1
                id="pembukaanAudio"
                data-audio="{{ $data['pembukaan'] }}"
                class="title-text text-2xl font-extrabold tracking-wide sm:text-3xl"
                style="
                    color: #fbbf24;
                    -webkit-text-stroke: 1.5px #000;
                    paint-order: stroke fill;
                    filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
                "
            >
                Ayo coba baca lagi !
            </h1>
        </div>
        <!-- Tabel / Grid Suku Kata (5 Kolom x 11 Baris) -->
        <div
            class="my-auto grid grid-cols-5 items-center justify-items-center gap-2 text-center"
        >
            @for ($row = 0; $row < 11; $row++)
                @foreach ($items as $col => $item)
                    @php $syllable = $item['suku_kata'][$row]; @endphp
                    <span
                        class="syllable-text {{ $rowColors[$row] }} suku-kata"
                        data-audio="{{ $syllable['audio'] }}"
                        >{{ $syllable['text'] }}</span
                    >
                @endforeach
            @endfor
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                let audioPlayer = new Audio()
                let isPlaying = false

                function playAudio(src, el) {
                    if (isPlaying || !src) return

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

                    if (el)
                        el.classList.add(
                            "drop-shadow-[0_0_10px_rgba(74,222,128,0.9)]",
                        )
                }

                document.querySelectorAll(".suku-kata").forEach((el) => {
                    el.addEventListener("click", () =>
                        playAudio(el.dataset.audio, el),
                    )
                })

                const pembukaan = document.getElementById("pembukaanAudio")
                if (pembukaan) {
                    pembukaan.addEventListener("click", () =>
                        playAudio(pembukaan.dataset.audio, null),
                    )
                }
            })
        </script>
    @endpush
</x-layout-game>
