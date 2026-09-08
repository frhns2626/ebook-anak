<x-layout-game
    title="{{ $judul }}"
    halaman="{{ $halaman }}"
    :lang_on="true"
    lang="{{ $lang }}"
>
    <style>
        /* Typography Judul Pop-out */
        .header-title {
            font-family: "Fredoka", cursive, sans-serif;
            color: #fbbf24;
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        /* Container Biru Bergelombang */
        .group-card {
            background-color: #dbeafe;
            border-radius: 1rem;
            border: 2px solid #bfdbfe;
            position: relative;
        }

        /* Teks Kata & Suku Kata */
        .syllable-word {
            font-family: "Fredoka", cursive, sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #1a100c;
            line-height: 1;
        }

        /* Indikator Titik Pembaca di Bawah Vokal */
        .reading-dot {
            display: inline-block;
            width: 5px;
            height: 5px;
            background-color: #881337;
            border-radius: 50%;
            margin-top: 3px;
        }

        /* Kartu Gambar Putih */
        .img-box {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 0.25rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 4.5rem;
            height: 4.5rem;
        }

        .suku-img {
            cursor: pointer;
            transition: all 0.15s ease;
        }
    </style>
    <div
        class="mx-auto flex h-full w-full max-w-xl flex-col justify-between pb-2 select-none"
    >
        {{-- Loop 2 Blok Grup Suku Kata (Grup 1: ak ik uk ek ok | Grup 2: an in un en on) --}}
        @foreach ($data['items'] as $groupIndex => $group)
            <div
                class="group-card my-1 flex flex-1 flex-col justify-between p-2"
            >
                <!-- Master Pola Header (ak ik uk ek ok) -->
                <div
                    class="suku-img mb-1 flex cursor-pointer items-center justify-around transition-all"
                    data-audio="{{ $group['audio'] }}"
                >
                    @foreach (explode(' ', $group['masterPola']) as $pola)
                        <span
                            class="header-title text-2xl font-black sm:text-3xl"
                        >
                            {{ $pola }}
                        </span>
                    @endforeach
                </div>
                <!-- Content Grid 2 Kolom (Kiri: 3 Item, Kanan: 2 Item) -->
                <div class="my-auto grid grid-cols-2 items-center gap-3">
                    <!-- Kolom Kiri (3 Item Awal) -->
                    <div class="flex flex-col space-y-3">
                        @foreach (array_slice($group['items'], 0, 3) as $item)
                            <div
                                class="flex transform items-center space-x-3 transition-transform hover:scale-105"
                            >
                                <img
                                    src="{{ $item['emoji'] }}"
                                    alt="{{ $item['id'] }}"
                                    data-audio="{{ $item['audio'] }}"
                                    class="suku-img h-auto w-36 shrink-0 object-contain"
                                />
                            </div>
                        @endforeach
                    </div>
                    <!-- Kolom Kanan (2 Item Sisa) -->
                    <div class="flex flex-col space-y-3 pl-2">
                        @foreach (array_slice($group['items'], 3, 2) as $item)
                            <div
                                class="flex transform items-center space-x-3 transition-transform hover:scale-105"
                            >
                                <img
                                    src="{{ $item['emoji'] }}"
                                    alt="{{ $item['id'] }}"
                                    data-audio="{{ $item['audio'] }}"
                                    class="suku-img h-auto w-36 shrink-0 object-contain"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                let audioPlayer = new Audio()
                let isPlaying = false

                document.querySelectorAll(".suku-img").forEach((img) => {
                    img.addEventListener("click", () => {
                        if (isPlaying) return

                        const src = img.dataset.audio
                        if (!src || src === "null") {
                            if (typeof showFlashMessage === "function") {
                                showFlashMessage(
                                    "error",
                                    "Audio belum tersedia",
                                )
                            }
                            return
                        }

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

                        img.classList.add(
                            "drop-shadow-[0_0_12px_rgba(74,222,128,0.9)]",
                        )
                    })
                })
            })
        </script>
    @endpush
</x-layout-game>
