<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
>
    <style>
        /* Font tebal untuk kata kunci */
        .header-word {
            font-family: 'Fredoka', cursive, sans-serif;
            color: #1a100c;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        /* Card khusus bersudut halus tidak beraturan */
        .custom-card {
            background-color: #dbe4f8;
            border-radius: 2rem;
        }

        .baca-text {
            cursor: pointer;
            transition: all 0.15s ease;
        }
    </style>
    @php
        $item = $items[0];
        $sentences = $item['texts']; // all 5 are real sentences, nothing to slice
    @endphp

        <!-- Kotak Header (kata objek + Gambar) -->
    <div class=" flex w-full items-center justify-around ">
        <img
            src="{{ $item['emoji'] }}"
            alt="{{ $item['id'] }}"
            class="relative mr-2 h-auto w-96  object-contain baca-text rounded-lg"
            data-audio="{{ $item['audio'] }}"
            {{--                data-audio="{{ $header['audio'] }}"--}}
        />
    </div>
    <!-- Kotak Kalimat Latihan Baca -->
    <div class="custom-card flex w-full flex-col space-y-6 px-6 py-8 text-center text-2xl shadow-sm">
        @foreach ($sentences as $sentence)
            <p
                class="baca-text leading-tight font-extrabold tracking-wide text-black"
                data-audio="{{ $sentence['audio'] }}"
            >{{ $sentence['text'] }}</p>
        @endforeach
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let audioPlayer = new Audio();
                let isPlaying = false;

                document.querySelectorAll('.baca-text').forEach(el => {
                    el.addEventListener('click', () => {
                        if (isPlaying) return;

                        const src = el.dataset.audio;
                        if (!src) return;

                        isPlaying = true;

                        audioPlayer.pause();
                        audioPlayer.removeAttribute('src');
                        audioPlayer.load();

                        audioPlayer = new Audio(src);
                        audioPlayer.addEventListener('ended', () => {
                            isPlaying = false;
                        });
                        audioPlayer.addEventListener('error', () => {
                            isPlaying = false;
                        });
                        audioPlayer.play().catch(() => {
                            isPlaying = false;
                        });

                        el.classList.add('text-green-600', 'drop-shadow-[0_0_8px_rgba(74,222,128,0.7)]');
                    });
                });
            });
        </script>
    @endpush
</x-layout-game>
