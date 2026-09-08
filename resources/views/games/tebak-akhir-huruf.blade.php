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

        /* Kartu Putih Bergelombang */
        .vowel-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
            cursor: pointer;
        }

        .vowel-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px -2px rgba(0, 0, 0, 0.1);
        }

        /* Font khusus teks kosakata */
        .word-text {
            font-family: "Fredoka", cursive, sans-serif;
            color: #1a100c;
        }
    </style>

    <div
        class="my-auto flex h-full w-full flex-col items-center justify-between select-none"
    >
        <!-- Judul Atas -->
        <div class="my-4 text-center">
            <h1
                class="title-text text-xl leading-tight font-extrabold tracking-wide sm:text-2xl"
            >
                Pengenalan huruf a,i,u,e,o diakhir
            </h1>
        </div>

        <!-- Grid 2 Kolom x 5 Baris Kartu Kosakata -->
        <div
            class="my-auto grid w-full grid-cols-2 items-center justify-items-center gap-3 px-1 sm:gap-4 sm:px-2"
        >
            @foreach ($items as $item)
                <img
                    src="{{ $item['emoji'] }}"
                    alt="{{ $item['id'] }}"
                    class="kosakata-card h-auto w-40 rounded-lg object-contain"
                    data-audio="{{ $item['audio'] }}"
                />
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                let audioPlayer = new Audio()
                let isPlaying = false

                document.querySelectorAll(".kosakata-card").forEach((card) => {
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
                            "drop-shadow-[0_0_12px_rgba(74,222,128,0.9)]",
                        )
                    })
                })
            })
        </script>
    @endpush
</x-layout-game>
