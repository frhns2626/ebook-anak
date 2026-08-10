<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
>
    <div class=" flex w-full justify-center">
        <select
            id="langSelect"
            class="rounded-full border-2 border-black bg-white px-4 py-1 font-bold"
            style="font-family: 'Fredoka', cursive, sans-serif;"
            onchange="window.location.href = '?lang=' + this.value"
        >
            <option value="id" {{ $lang === 'id' ? 'selected' : '' }}>Indonesia</option>
            <option value="en" {{ $lang === 'en' ? 'selected' : '' }}>English</option>
        </select>
    </div>
    <div class="grid grid-cols-2 gap-4 my-auto pt-2">
        @foreach ($items as $item)
            <div class="flex flex-col justify-between gap-8 relative">
                <img
                    src="{{ $item['emoji'] }}"
                    alt="{{ $item['id'] }}"
                    class="w-full {{ count($items) < 8 ? 'h-32 sm:h-48' : 'h-24 sm:h-36' }} object-contain rounded-lg transition-all target-img"
                />
            </div>
        @endforeach
    </div>
</x-layout-game>
<script>
    const items = @json($items);
    let currentIndex = 0;
    let viewed = new Set();
    let audioPlayer = new Audio();

    function playAudio() {
        const item = items[currentIndex];
        if (!item.audio) return;
        audioPlayer.pause();
        audioPlayer = new Audio(item.audio);
        audioPlayer.play().catch(() => {
        });
    }

    document.querySelectorAll('.target-img').forEach(img => {
        img.style.cursor = 'pointer';
        img.addEventListener('click', () => {
            img.classList.add('drop-shadow-[0_0_12px_rgba(74,222,128,0.9)]');

            const idx = items.findIndex(it => it.id === img.alt);
            if (idx !== -1) {
                currentIndex = idx;
                viewed.add(idx);
                playAudio();
            }
        });
    });
</script>
