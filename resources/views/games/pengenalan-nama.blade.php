<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
>
    <div class="grid grid-cols-2 gap-4  my-auto pt-2">
        @php
            $palette = ['#73c7b5', '#facc15', '#818cf8', '#ef4444', '#ef4444', '#73c7b5'];
        @endphp

        @foreach ($items as $item)
            @php
                $color = $palette[$loop->index % count($palette)];
                $letter = strtoupper(substr($item['id'], 0, 1)) . strtolower(substr($item['id'], 0, 1));
            @endphp
                <!-- Kartu {{ $letter }} - {{ $item['id'] }} -->
            <div class="flex flex-col justify-between gap-8 relative">
                <img
                    src="{{ $item['emoji'] }}"
                    alt="{{ $item['id'] }}"
                    class="w-full sm:h-36 h-24  object-contain rounded-lg transition-all target-img"
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
        audioPlayer.play().catch(() => {});
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
