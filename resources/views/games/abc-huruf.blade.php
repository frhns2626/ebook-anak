<x-layout-game title="🔤 Belajar Huruf A-Z - Ebook Anak TK">
    {{-- Main content --}}
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        {{-- Header --}}
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🔤</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1" style="font-family: 'Fredoka One', cursive;">Belajar Huruf A-Z 🌟</h1>
            <p class="text-gray-500 text-[1rem]">Klik huruf untuk mendengar bunyinya! 📚✨</p>
        </div>
        {{-- Main Display --}}
        <div class="bg-white rounded-3xl p-8 mb-6 shadow-xl text-center">
            <div class="text-[12rem] md:text-[16rem] font-black leading-none mb-4 bg-gradient-to-b from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-transparent" id="bigLetter"
                 style="font-family: 'Fredoka', sans-serif;">Aa
            </div>
            <p class="text-gray-600 text-[1.5rem] mb-6 font-bold" id="letterHint">Huruf A Besar & a Kecil</p>
            {{-- Audio buttons --}}
            <div class="flex justify-center gap-4 flex-wrap mb-4">
                <button onclick="playLetter()"
                        class="bg-gradient-to-r from-blue-400 to-blue-500 text-white px-8 py-4 rounded-full text-lg font-bold shadow-lg hover:scale-105 hover:shadow-xl transition-all flex items-center gap-2"
                        style="font-family: 'Fredoka', sans-serif;">
                    🔊 Dengarkan Suara
                </button>
            </div>
            {{-- Feedback --}}
            <div id="feedback" class="hidden text-[1.3rem] font-bold p-4 rounded-2xl mb-4"></div>
        </div>
        {{-- Letter Grid --}}
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl">
            <h3 class="text-center text-gray-700 text-[1.1rem] font-bold mb-4">📝 Pilih Huruf:</h3>
            <div id="letterGrid" class="grid grid-cols-7 md:grid-cols-9 gap-2 md:gap-3"></div>
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
                alphabet.forEach(letter => {
                    const item = letterData[letter];
                    const btn = document.createElement('button');
                    btn.className = 'w-12 h-12 md:w-14 md:h-14 rounded-xl font-bold text-base md:text-lg shadow-md hover:scale-110 hover:shadow-lg transition-all cursor-pointer border-4 border-transparent hover:border-yellow-300';
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

                document.querySelectorAll('#letterGrid button').forEach(btn => {
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
                audioPlayer.play().catch(() => {
                });
            }

            // Init
            initLetterGrid();
            selectLetter('A');
        </script>
    @endpush
</x-layout-game>
