<x-layout-game title="🔤 Belajar Huruf A-Z - Ebook Anak TK">
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🦁</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">{{ $judul }}</h1>
            <p class="text-gray-500 text-[1rem]">{{ $deskripsi }}</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-6">
            @foreach($items as $index => $item)
                <div
                    class="bg-white rounded-3xl p-6 shadow-xl text-center cursor-pointer hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border-4 border-transparent {{ $item['color'] }}"
                    onclick="selectItem('{{ $item['id'] }}')">
                    <div class="text-[4rem] md:text-[5rem] mb-3 animate-float-up" style="animation-delay: {{ ($index % 5) * 0.3 }}s">{{ $item['emoji'] }}</div>
                    <h3 class="text-[1.2rem] md:text-[1.4rem] font-black text-gray-800 mb-1">{{ $item['name'] }}</h3>
                    <p class="text-gray-500 text-xs">{{ $item['name'] }}</p>
                    <div class="mt-3 {{ $item['bg'] }} px-3 py-1 rounded-full text-xs font-bold inline-block">Hewan</div>
                </div>
            @endforeach
        </div>
        <div id="itemDisplay" class="bg-white rounded-3xl p-8 shadow-2xl text-center mb-6 hidden">
            <div class="text-[8rem] md:text-[10rem] mb-4 animate-pop" id="itemEmoji">🐔</div>
            <h2 class="text-[2.5rem] md:text-[3rem] font-black text-gray-800 mb-2" id="itemName">Ayam</h2>
            <p class="text-gray-500 text-[1.2rem] mb-6" id="itemHint">Ayam adalah hewan yang bisa berkokok dan bertelur!</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <button onclick="playAudio()" class="bg-gradient-to-r from-blue-400 to-blue-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:scale-105 transition-all">🔊 Dengarkan
                </button>
                <button onclick="nextItem()" class="bg-gradient-to-r from-green-400 to-green-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:scale-105 transition-all">➡️ Lanjut
                </button>
            </div>
        </div>
        {{--        // status bar--}}
        <div class="bg-white rounded-2xl p-4 shadow-lg">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-bold text-sm">Progress</span>
                <span id="progressText" class="text-green-500 font-bold text-sm">0 / {{ count($items) }}</span>
            </div>
            <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                <div id="progressBar" class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>
    </main>
    <script>
        const items = @json($items);
        let currentIndex = 0;
        let viewed = new Set();
        let audioPlayer = new Audio();

        function selectItem(id) {
            currentIndex = items.findIndex(item => item.id === id);
            showItem();
            viewed.add(id);
            updateProgress();
            document.getElementById('itemDisplay').scrollIntoView({behavior: 'smooth', block: 'center'});
        }

        function showItem() {
            const item = items[currentIndex];
            document.getElementById('itemDisplay').classList.remove('hidden');
            document.getElementById('itemEmoji').textContent = item.emoji;
            document.getElementById('itemName').textContent = item.name;
            document.getElementById('itemHint').textContent = item.hint;
        }

        function updateProgress() {
            const count = viewed.size;
            document.getElementById('progressText').textContent = count + ' / ' + items.length;
            document.getElementById('progressBar').style.width = (count / items.length) * 100 + '%';
        }

        function playAudio() {
            const item = items[currentIndex];
            if (!item.audio) return;
            audioPlayer.pause();
            audioPlayer = new Audio(item.audio);
            audioPlayer.play().catch(() => {
            });
        }

        function nextItem() {
            currentIndex = (currentIndex + 1) % items.length;
            showItem();
        }

        showItem();
    </script>
</x-layout-game>
