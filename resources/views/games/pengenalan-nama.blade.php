<x-layout-game
    title="{{ $judul }}"
    halaman="{{ $halaman }}"
    :lang_on="true"
    lang="{{ $lang }}"
>
    <div class="my-auto grid grid-cols-2 gap-4 pt-10">
        @foreach ($items as $item)
            <div class="relative flex flex-col justify-between gap-8">
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
    const items = @json($items)
    let currentIndex = 0
    let viewed = new Set()
    let audioPlayer = new Audio()

    function playAudio() {
        const item = items[currentIndex]
        if (!item.audio) return
        audioPlayer.pause()
        audioPlayer = new Audio(item.audio)
        audioPlayer.play().catch(() => {})
    }

    document.querySelectorAll(".target-img").forEach((img) => {
        img.style.cursor = "pointer"
        img.addEventListener("click", () => {
            img.classList.add("drop-shadow-[0_0_12px_rgba(74,222,128,0.9)]")

            const idx = items.findIndex((it) => it.id === img.alt)
            if (idx !== -1) {
                currentIndex = idx
                viewed.add(idx)
                playAudio()
            }
        })
    })
</script>
