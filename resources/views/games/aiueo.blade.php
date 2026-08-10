<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
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

        /* Card Biru Pastel Bergelombang */
        .vowel-card {
            background-color: #dbe4f8;
            border-radius: 1.5rem;
        }

        /* Font khusus untuk kata di bawah ilustrasi */
        .vowel-word {
            font-family: 'Fredoka', cursive, sans-serif;
            color: #000000;
        }

        .vocal-img {
            cursor: pointer;
            transition: all 0.15s ease;
        }
    </style>
    @php
        $grouped = collect($items)->groupBy('vocal');
    @endphp
    <div class="flex flex-col items-center justify-between h-full w-full my-auto">
        <!-- Judul Atas -->
        <div class="text-center mt-1 mb-2">
            <h1 class="title-text text-2xl sm:text-3xl font-extrabold tracking-wide">
                Huruf vokal
            </h1>
        </div>
        <!-- Daftar Baris Huruf Vokal (A, I, U, E, O) -->
        <div class="flex flex-col space-y-2.5 w-full my-auto px-1">
            @foreach ($grouped as $vocal => $group)
                @php $lower = strtolower($vocal); @endphp
                    <!-- Baris {{ $vocal }}{{ $lower }} -->
                <div class="vowel-card py-2 px-3 sm:px-4 flex items-center justify-between shadow-sm">
                    <span class="text-3xl sm:text-4xl font-extrabold text-black w-12 text-center">{{ $vocal }}{{ $lower }}</span>
                    <div class="grid grid-cols-3 gap-2 flex-1 text-center items-end">
                        @foreach ($group as $item)
                            @php $word = str($item['id'])->after('-'); @endphp
                            <div class="flex flex-col items-center">
                                <img
                                    src="{{ $item['emoji'] }}"
                                    alt="{{ $item['id'] }}"
                                    data-audio="{{ $item['audio'] }}"
                                    class="vocal-img w-auto sm:h-24 h-14 object-contain rounded-xl"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts')
        <script>
            (function () {
                if (window.__vocalAudioBound) return; // prevent double-binding if script runs twice
                window.__vocalAudioBound = true;

                document.addEventListener('DOMContentLoaded', () => {
                    let audioPlayer = new Audio();
                    let isPlaying = false;

                    document.querySelectorAll('.vocal-img').forEach(img => {
                        img.addEventListener('click', () => {
                            if (isPlaying) return; // ignore repeat trigger while one is in-flight

                            const src = img.dataset.audio;
                            if (!src) return;

                            isPlaying = true;

                            audioPlayer.pause();
                            audioPlayer.removeAttribute('src');
                            audioPlayer.load();

                            audioPlayer = new Audio(src);
                            audioPlayer.addEventListener('ended', () => { isPlaying = false; });
                            audioPlayer.addEventListener('error', () => { isPlaying = false; });

                            audioPlayer.play().catch(() => { isPlaying = false; });

                            img.classList.add('drop-shadow-[0_0_12px_rgba(74,222,128,0.9)]');
                        });
                    });
                });
            })();
        </script>
    @endpush
</x-layout-game>
