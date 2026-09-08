<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
    :lang_on="true"
    lang="{{$lang}}"
>
    <style>
        .alphabet-card {
            font-family: 'Fredoka', cursive, sans-serif;
            color: #fbbf24;
            -webkit-text-stroke: 2px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(3px 3px 0px rgba(0, 0, 0, 0.85));
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            cursor: pointer;
            user-select: none;
        }

        .alphabet-card:hover {
            transform: scale(1.15) rotate(-3deg);
            filter: drop-shadow(4px 4px 0px rgba(0, 0, 0, 0.9));
        }

        .alphabet-card.playing {
            transform: scale(1.25) rotate(3deg);
        }

        .alphabet-card.clicked {
            color: #4ade80;
            filter: drop-shadow(0px 0px 10px rgba(74, 222, 128, 0.9));
        }

        .alphabet-card.disabled {
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
    @php
        $letterKey = $lang === 'en' ? 'huruf' : 'id';
        $byLetter = collect($items)->keyBy($letterKey);
    @endphp
    <div class="flex flex-col items-center justify-center h-full w-full my-auto select-none px-2 py-4 z-10 mt-10" >
        <div class="flex flex-col space-y-3 sm:space-y-5 w-full max-w-xl my-auto items-center justify-center">
            @php
                $alphabetRows = [
                    ['Aa', 'Bb', 'Cc', 'Dd'],
                    ['Ee', 'Ff', 'Gg', 'Hh', 'Ii'],
                    ['Jj', 'Kk', 'Ll', 'Mm', 'Nn'],
                    ['Oo', 'Pp', 'Qq', 'Rr', 'Ss'],
                    ['Tt', 'Uu', 'Vv', 'Ww'],
                    ['Xx', 'Yy', 'Zz']
                ];
            @endphp

            @foreach($alphabetRows as $row)
                <div class="flex justify-center items-center gap-6 sm:gap-10 w-full">
                    @foreach($row as $pair)
                        @php
                            $letter = strtoupper(substr($pair, 0, 1));
                        @endphp
                        <div class="alphabet-card text-5xl font-black tracking-tight"
                             data-letter="{{ $letter }}"
                             data-audio="{{ $byLetter[$letter]['audio'] ?? '' }}"
                             onclick="playLetterAudio(this)">
                            {{ $pair }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts')
        <script>
            let isPlaying = false;

            function playLetterAudio(element) {
                if (isPlaying) return;

                const letter = element.dataset.letter;
                const audioUrl = element.dataset.audio;
                const allCards = document.querySelectorAll('.alphabet-card');

                isPlaying = true;
                allCards.forEach(card => card.classList.add('disabled'));

                element.classList.add('playing', 'clicked');
                setTimeout(() => {
                    element.classList.remove('playing');
                }, 400);

                // if (typeof showFlashMessage === 'function') {
                //     showFlashMessage('success', `Huruf ${letter}!`);
                // }

                const unlock = () => {
                    isPlaying = false;
                    allCards.forEach(card => card.classList.remove('disabled'));
                };

                if (audioUrl) {
                    const audio = new Audio(audioUrl);
                    audio.currentTime = 0;
                    audio.addEventListener('ended', unlock);
                    audio.addEventListener('error', unlock);
                    audio.play().catch(() => {
                        console.log(`Audio untuk huruf ${letter} tidak ditemukan atau belum diunggah.`);
                        unlock();
                    });
                } else {
                    setTimeout(unlock, 400);
                }
            }
        </script>
    @endpush
</x-layout-game>
