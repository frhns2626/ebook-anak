<x-layout-game title="{{ $judul }}">
    {{-- Main content --}}
    <main class="relative z-10 mx-auto max-w-4xl p-6">
        {{-- Header --}}
        <div class="relative mb-6 overflow-hidden rounded-3xl bg-white p-6 text-center shadow-xl">
            <div
                class="absolute top-0 right-0 left-0 h-2"
                style="
                    background: linear-gradient(90deg, #ff6b6b, #ff9f43, #ffe66d, #4ecdc4, #6c5ce7, #ff6b6b);
                    background-size: 200% 100%;
                    animation: rainbow 3s linear infinite;
                "
            ></div>
            <a
                href="{{ route('belajar.index') }}"
                class="absolute top-1/2 left-4 -translate-y-1/2 rounded-full bg-red-100 px-4 py-2 text-sm font-bold text-red-500 transition-all hover:bg-red-200"
            >← Kembali</a>
            <span class="animate-bounce-subtle mb-2 block text-[3rem]">🔤</span>
            <h1
                class="mb-1 text-[1.8rem] font-black text-gray-800 md:text-[2.2rem]"
                style="font-family: 'Fredoka One', cursive"
            >
                Belajar Huruf A-Z 🌟
            </h1>
            <p class="text-[1rem] text-gray-500">Klik huruf untuk mendengar bunyinya! 📚✨</p>
        </div>
        {{-- Main Display --}}
        <div class="mb-6 rounded-3xl bg-white p-8 text-center shadow-xl">
            <div
                id="bigLetter"
                class="mb-6 bg-gradient-to-b from-red-400 via-orange-400 to-yellow-400 bg-clip-text pb-4 text-[12rem] leading-none font-black text-transparent md:text-[16rem]"
                style="font-family: 'Fredoka', sans-serif"
            >
                Aa
            </div>
            <p class="mt-2 mb-6 text-[1.5rem] font-bold text-gray-600" id="letterHint">Huruf A Besar & a Kecil</p>
            {{-- Audio buttons --}}
            <div class="mb-4 flex flex-wrap justify-center gap-4">
                <button
                    onclick="playLetter()"
                    class="flex items-center gap-2 rounded-full bg-gradient-to-r from-blue-400 to-blue-500 px-8 py-4 text-lg font-bold text-white shadow-lg transition-all hover:scale-105 hover:shadow-xl"
                    style="font-family: 'Fredoka', sans-serif"
                >
                    🔊 Dengarkan Suara
                </button>
            </div>
            {{-- Feedback --}}
            <div id="feedback" class="mb-4 hidden rounded-2xl p-4 text-[1.3rem] font-bold"></div>
        </div>
        {{-- Letter Grid --}}
        <div class="mb-6 rounded-3xl bg-white p-6 shadow-xl">
            <h3 class="mb-4 text-center text-[1.1rem] font-bold text-gray-700">📝 Pilih Huruf:</h3>
            <div id="letterGrid" class="grid grid-cols-7 gap-2 md:grid-cols-9 md:gap-3"></div>
        </div>
    </main>
    @push('scripts')
        <script>
            const letterData = @json(collect($data['items'])->keyBy('huruf'));
            const alphabet = Object.keys(letterData);

            let currentLetter = 'A';
            let audioPlayer = new Audio();

            function initLetterGrid() {
                const grid = document.getElementById('letterGrid');
                alphabet.forEach((letter) => {
                    const item = letterData[letter];
                    const btn = document.createElement('button');
                    btn.className =
                        'w-12 h-12 md:w-14 md:h-14 rounded-xl font-bold text-base md:text-lg shadow-md hover:scale-110 hover:shadow-lg transition-all cursor-pointer border-4 border-transparent hover:border-yellow-300';
                    btn.style.background = item.color;
                    btn.style.color = 'white';
                    btn.style.fontFamily = "'Fredoka', sans-serif";
                    btn.textContent = letter + letter.toLowerCase();
                    btn.dataset.letter = letter;
                    btn.onclick = () => selectLetter(letter);
                    grid.appendChild(btn);
                });
            }

            function selectLetter(letter) {
                currentLetter = letter;

                document.getElementById('bigLetter').textContent = letter + letter.toLowerCase();
                document.getElementById('letterHint').textContent = `Huruf ${letter} Besar & ${letter.toLowerCase()} Kecil`;

                document.querySelectorAll('#letterGrid button').forEach((btn) => {
                    const active = btn.dataset.letter === letter;
                    btn.classList.toggle('ring-4', active);
                    btn.classList.toggle('ring-yellow-400', active);
                    btn.classList.toggle('scale-125', active);
                    btn.classList.toggle('shadow-xl', active);
                });

                document.getElementById('feedback').classList.add('hidden');
                playLetter();
            }

            function playLetter() {
                const data = letterData[currentLetter];
                if (!data?.audio) return;
                audioPlayer.pause();
                audioPlayer = new Audio(data.audio);
                audioPlayer.play().catch(() => {});
            }

            // Init
            initLetterGrid();
            selectLetter('A');
        </script>
    @endpush
</x-layout-game>
