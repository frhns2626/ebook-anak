<x-layout-game
    title="{{ $judul }}"
    halaman="{{ $halaman }}"
    :lang_on="true"
    lang="{{ $lang }}"
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

        .item-card {
            /*background-color: #ffffff;*/
            /*border-radius: 1.5rem;*/
            /*box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);*/
            /*display: flex;*/
            /*flex-direction: column;*/
            /*align-items: center;*/
            /*justify-content: center;*/
            /*padding: 1rem;*/
            /*width: 100%;*/
            /*border: 2px solid #e2e8f0;*/
        }

        .word-display {
            font-family: 'Fredoka', cursive, sans-serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: #1a100c;
            line-height: 1.1;
        }

        .rewrite-input {
            width: 100%;
            max-width: 12rem;
            border-radius: 1rem;
            border: 3px solid #cbd5e1;
            background-color: #ffffff;
            font-family: 'Fredoka', cursive, sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a100c;
            text-align: center;
            outline: none;
            transition: all 0.2s ease;
            margin-top: -0.5rem;
        }

        .rewrite-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .rewrite-input.correct {
            border-color: #22c55e !important;
            background-color: #f0fdf4 !important;
            color: #166534 !important;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.3);
            pointer-events: none;
        }

        .rewrite-input.wrong {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
            color: #991b1b !important;
            animation: shake 0.3s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-4px); }
            40%, 80% { transform: translateX(4px); }
        }
    </style>

    @php $byWord = collect($items)->keyBy(fn ($i) => strtolower($i['id'])); @endphp

    <div class="flex flex-col items-center justify-between h-full w-full my-auto select-none px-2 z-10">

        <div class="text-center mt-1 mb-2">
            <h1 class="title-text text-xl sm:text-2xl md:text-3xl font-extrabold tracking-wide px-2 leading-tight">
                Baca dan tulis kembali !
            </h1>
        </div>

        <div class="grid grid-cols-2 gap-4 sm:gap-6 w-full max-w-2xl px-1 sm:px-2 my-auto z-10">

            <!-- 1. Bola -->
            <div class="flex flex-col items-center space-y-2">
                <div class="item-card">
                    <img src="{{ $byWord['bola']['emoji'] }}" alt="bola" class="h-40 object-contain pointer-events-none" />
                </div>
                <input type="text" data-answer="bola" data-audio="{{ $byWord['bola']['audio'] }}" class="rewrite-input text-black" placeholder=". . ." />
            </div>

            <!-- 2. Buaya -->
            <div class="flex flex-col items-center space-y-2">
                <div class="item-card">
                    <img src="{{ $byWord['buaya']['emoji'] }}" alt="buaya" class="h-40 object-contain pointer-events-none" />
                </div>
                <input type="text" data-answer="buaya" data-audio="{{ $byWord['buaya']['audio'] }}" class="rewrite-input text-black" placeholder=". . ." />
            </div>

            <!-- 3. Donat -->
            <div class="flex flex-col items-center space-y-2">
                <div class="item-card">
                    <img src="{{ $byWord['donat']['emoji'] }}" alt="donat" class="h-40 object-contain pointer-events-none" />
                </div>
                <input type="text" data-answer="donat" data-audio="{{ $byWord['donat']['audio'] }}" class="rewrite-input text-black" placeholder=". . ." />
            </div>

            <!-- 4. Jerapah -->
            <div class="flex flex-col items-center space-y-2">
                <div class="item-card">
                    <img src="{{ $byWord['jerapah']['emoji'] }}" alt="jerapah" class="h-40 object-contain pointer-events-none" />
                </div>
                <input type="text" data-answer="jerapah" data-audio="{{ $byWord['jerapah']['audio'] }}" class="rewrite-input text-black" placeholder=". . ." />
            </div>

        </div>

        <div class="flex-1 min-h-10 z-10"></div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const inputs = document.querySelectorAll('.rewrite-input');


                inputs.forEach(input => {
                    input.addEventListener('input', (e) => {
                        const val = e.target.value.toLowerCase().trim();
                        const correctAnswer = input.dataset.answer.toLowerCase();

                        input.classList.remove('wrong', 'correct');

                        if (val === '') return;

                        if (val === correctAnswer) {
                            input.classList.add('correct');

                            if (input.dataset.audio) {
                                const wordAudio = new Audio(input.dataset.audio);
                                wordAudio.play().catch(() => {});
                            }

                            if (typeof showFlashMessage === 'function') {
                                showFlashMessage('success', 'Hebat! Penulisan tepat!');
                            }
                        } else if (val.length >= correctAnswer.length) {
                            input.classList.add('wrong');
                            if (typeof showFlashMessage === 'function') {
                                showFlashMessage('error', 'Salah, coba tulis ulang dengan benar!');
                            }

                            setTimeout(() => {
                                input.classList.remove('wrong');
                                input.value = '';
                            }, 500);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-layout-game>
