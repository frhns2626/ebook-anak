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

        .letter-card {
            background-color: #ffffff;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #1a100c;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
            user-select: none;
        }

        .drop-target {
            background-color: #ffffff;
            border: 2px dashed #93c5fd;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }

        .drop-target.drag-over {
            background-color: #dbeafe;
            border-color: #3b82f6;
            transform: scale(1.05);
        }

        .draggable-item {
            cursor: grab;
            transition: transform 0.15s ease;
        }

        .draggable-item:active {
            cursor: grabbing;
            transform: scale(1.1);
        }
    </style>

    @php
        $alphabet = range('a', 'z');
        $blankCount = 8; // jumlah huruf yang dikosongkan
        $willEmpety = collect($alphabet)->random($blankCount)->values()->all();
        $bank = collect($willEmpety)->shuffle()->values(); // Collection, for ->chunk()
    @endphp

    <div class="flex flex-col items-center justify-between h-full w-full my-auto">
        <div class="text-center mt-1 mb-3">
            <h1 class="title-text text-xl sm:text-2xl md:text-3xl font-extrabold tracking-wide">
                Lengkapi huruf yang hilang !
            </h1>
        </div>

        <!-- Grid Utama Alfabet (A-Z dengan Slot Kosong, acak) -->
        <div class="grid grid-cols-5 gap-2 sm:gap-2.5 w-full max-w-md px-2">
            @foreach ($alphabet as $letter)
                @if (in_array($letter, $willEmpety))
                    <div class="drop-target h-10 sm:h-12 flex items-center justify-center text-xl sm:text-2xl font-bold" data-answer="{{ $letter }}"></div>
                @else
                    <div class="letter-card h-10 sm:h-12 text-xl sm:text-2xl">{{ $letter }}</div>
                @endif
            @endforeach
            @for ($i = 0; $i < (5 - (count($alphabet) % 5)) % 5; $i++)
                <div></div>
            @endfor
        </div>

        <div class="my-2"></div>

        <!-- Bank Pilihan Huruf (sama persis dengan $willEmpety, cuma diacak urutannya) -->
        <div class="flex flex-col items-center gap-2 w-full max-w-md px-2">
            @foreach ($bank->chunk(6) as $row)
                <div class="grid grid-cols-6 gap-2 w-full">
                    @foreach ($row as $letter)
                        <div class="letter-card draggable-item h-10 sm:h-12 text-xl sm:text-2xl" draggable="true" data-letter="{{ $letter }}">{{ $letter }}</div>
                    @endforeach
                    @for ($i = 0; $i < 6 - $row->count(); $i++)
                        <div></div>
                    @endfor
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const draggables = document.querySelectorAll('.draggable-item');
                const dropTargets = document.querySelectorAll('.drop-target');
                let selectedLetterNode = null;

                draggables.forEach(item => {
                    item.addEventListener('dragstart', (e) => {
                        selectedLetterNode = item;
                        e.dataTransfer.setData('text/plain', item.dataset.letter);
                    });

                    item.addEventListener('click', () => {
                        draggables.forEach(d => d.classList.remove('ring-4', 'ring-yellow-400'));
                        selectedLetterNode = item;
                        item.classList.add('ring-4', 'ring-yellow-400');
                    });
                });

                dropTargets.forEach(target => {
                    target.addEventListener('dragover', (e) => {
                        e.preventDefault();
                        target.classList.add('drag-over');
                    });

                    target.addEventListener('dragleave', () => {
                        target.classList.remove('drag-over');
                    });

                    target.addEventListener('drop', (e) => {
                        e.preventDefault();
                        target.classList.remove('drag-over');
                        const letter = e.dataTransfer.getData('text/plain');
                        checkAnswer(target, letter);
                    });

                    target.addEventListener('click', () => {
                        if (selectedLetterNode) {
                            const letter = selectedLetterNode.dataset.letter;
                            checkAnswer(target, letter);
                        }
                    });
                });

                function checkAnswer(target, letter) {
                    const correctAnswer = target.dataset.answer;

                    if (letter === correctAnswer) {
                        target.textContent = letter;
                        target.classList.remove('drop-target', 'border-dashed');
                        target.classList.add('letter-card', 'text-green-600', 'animate-pop');

                        if (selectedLetterNode) {
                            selectedLetterNode.style.visibility = 'hidden';
                            selectedLetterNode.classList.remove('ring-4', 'ring-yellow-400');
                            selectedLetterNode = null;
                        }

                        showFlashMessage('success', 'Benar!');
                    } else {
                        showFlashMessage('error', 'Salah!');
                    }
                }
            });
        </script>
    @endpush
</x-layout-game>
