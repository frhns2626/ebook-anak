<x-layout-game>
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-8 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}"
               class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">
                ← Kembali
            </a>
            <!-- Big Animal -->
            <div class="text-[7rem] md:text-[9rem] mb-4">{{$iconText}}</div>
            <h1 class="text-[2rem] md:text-[2.5rem] text-gray-800 font-black mb-1">{{ $judul }}</h1>
            <p class="text-gray-500">{{ $deskripsi }}</p>
        </div>
        <!-- Facts List -->
        <div class="bg-white rounded-3xl p-6 shadow-xl">
            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                <span>Fakta tentang {{$object}}</span>
                <span class="text-sm font-normal text-gray-500">({{ count($items) }} Fakta)</span>
            </h2>
            <div class="space-y-3" id="factsList">
                @foreach($items as $item)
                    <div class="fact-item group flex items-center gap-4 bg-gray-50 hover:bg-gray-100 transition-all rounded-2xl p-5 border border-transparent hover:border-emerald-200"
                         data-id="{{ $item['id'] }}">
                        <div class="w-8 h-8 flex-shrink-0 rounded-xl bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center text-lg">
                            {{ $item['id'] }}
                        </div>
                        <div class="flex-1 text-[1.1rem] text-gray-700 leading-relaxed">
                            {{ $item['text'] }}
                        </div>
                        <button onclick="playAudio({{ $item['id'] }})"
                                id="play-btn-{{ $item['id'] }}"
                                class="play-button w-12 h-12 flex-shrink-0 bg-emerald-500 hover:bg-emerald-600 text-white rounded-2xl flex items-center justify-center text-2xl shadow-md transition-all active:scale-95">
                            ▶️
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Progress -->
        <div class="mt-6 bg-white rounded-2xl p-4 shadow-lg">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-bold text-sm">Progress Mendengarkan</span>
                <span id="progressText" class="text-emerald-500 font-bold text-sm">0 / {{ count($items) }}</span>
            </div>
            <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                <div id="progressBar" class="h-full bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full transition-all duration-500" style="width: 0%;"></div>
            </div>
        </div>
    </main>
    <script>
        let audioPlayer = new Audio();
        let completed = new Set();

        function playAudio(id) {
            const item = @json($items).
            find((i) => i.id === id);
            if (!item || !item.audio) {
                return;
            }

            const btn = document.getElementById(`play-btn-${id}`);

            // Reset semua tombol
            document.querySelectorAll('.play-button').forEach(b => b.textContent = '▶️');

            // Play audio
            audioPlayer.pause();
            audioPlayer = new Audio(item.audio);

            audioPlayer.onended = () => {
                btn.textContent = '✅';
                btn.classList.add('!bg-green-500');
                completed.add(id);
                updateProgress();
            };

            audioPlayer.play().catch(e => console.log('Audio error' + e));
            btn.textContent = '⏸️';
        }

        function updateProgress() {
            const count = completed.size;
            document.getElementById('progressText').textContent = count + ' / ' + {{ count($items) }};
            document.getElementById('progressBar').style.width = (count / {{ count($items) }}) * 100 + '%';
        }

        // Optional: Auto play first item when page loads
        // window.onload = () => playAudio(1);
    </script>
</x-layout-game>
