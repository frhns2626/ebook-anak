<x-layout-game title="{{ $judul }}">
    <main class="relative z-10 mx-auto max-w-4xl p-6">
        <div class="relative mb-8 overflow-hidden rounded-3xl bg-white p-6 text-center shadow-xl">
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
            >
                ← Kembali
            </a>
            <!-- Big Animal -->
            <div class="mb-4 text-[7rem] md:text-[9rem]">{{ $iconText }}</div>
            <h1 class="mb-1 text-[2rem] font-black text-gray-800 md:text-[2.5rem]">{{ $judul }}</h1>
            <p class="text-gray-500">{{ $deskripsi }}</p>
        </div>
        <!-- Facts List -->
        <div class="rounded-3xl bg-white p-6 shadow-xl">
            <h2 class="mb-6 flex items-center gap-3 text-xl font-bold text-gray-800">
                <span>Fakta tentang {{ $object }}</span>
                <span class="text-sm font-normal text-gray-500">({{ count($items) }} Fakta)</span>
            </h2>
            <div class="space-y-3" id="factsList">
                @foreach ($items as $item)
                    <div
                        class="fact-item group flex items-center gap-4 rounded-2xl border border-transparent bg-gray-50 p-5 transition-all hover:border-emerald-200 hover:bg-gray-100"
                        data-id="{{ $item['id'] }}"
                    >
                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-lg font-bold text-emerald-700">
                            {{ $item['id'] }}
                        </div>
                        <div class="flex-1 text-[1.1rem] leading-relaxed text-gray-700">{{ $item['text'] }}</div>
                        <button
                            onclick="playAudio({{ $item['id'] }})"
                            id="play-btn-{{ $item['id'] }}"
                            class="play-button flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-2xl bg-emerald-500 text-2xl text-white shadow-md transition-all hover:bg-emerald-600 active:scale-95"
                        >
                            ▶️
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Progress -->
        <div class="mt-6 rounded-2xl bg-white p-4 shadow-lg">
            <div class="mb-2 flex items-center justify-between">
                <span class="text-sm font-bold text-gray-600">Progress Mendengarkan</span>
                <span id="progressText" class="text-sm font-bold text-emerald-500">0 / {{ count($items) }}</span>
            </div>
            <div class="h-4 overflow-hidden rounded-full bg-gray-200">
                <div
                    id="progressBar"
                    class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-teal-500 transition-all duration-500"
                    style="width: 0%"
                ></div>
            </div>
        </div>
    </main>
    <script>
        let audioPlayer = new Audio();
        let completed = new Set();

        function playAudio(id) {
            const item = @json($items).find((i) => i.id === id);
            if (!item || !item.audio) {
                return;
            }

            const btn = document.getElementById(`play-btn-${id}`);

            // Reset semua tombol
            document.querySelectorAll('.play-button').forEach((b) => (b.textContent = '▶️'));

            // Play audio
            audioPlayer.pause();
            audioPlayer = new Audio(item.audio);

            audioPlayer.onended = () => {
                btn.textContent = '✅';
                btn.classList.add('!bg-green-500');
                completed.add(id);
                updateProgress();
            };

            audioPlayer.play().catch((e) => console.log('Audio error' + e));
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
