<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
>
    <style>
        /* Style Judul Pop-out */
        .title-text {
            font-family: 'Fredoka', cursive, sans-serif;
            color: #fbbf24;
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        /* Style Suku Kata Base */
        .syllable-item {
            font-size: 2rem;
            font-weight: 700;
            user-select: none;
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 0.25rem 0.75rem;
            border-radius: 0.75rem;
            border: 3px solid transparent; /* Placeholder border agar layout tidak bergeser */
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Warna Suku Kata */
        .c-green  { color: #10b981; }
        .c-purple { color: #818cf8; }
        .c-yellow { color: #eab308; }
        .c-red    { color: #ef4444; }
        .c-blue   { color: #3b82f6; }

        /* Container Bergelombang Biru Muda */
        .wavy-container {
            background-color: #dbeafe;
            border-radius: 2.5rem;
            border: 2px solid #bfdbfe;
        }

        /* Styling Kotak Hijau ketika 'ba' berhasil ditemukan */
        .found-box {
            background-color: rgba(34, 197, 94, 0.15) !important;
            border: 3px solid #22c55e !important;
            box-shadow: 0 4px 6px -1px rgba(34, 197, 94, 0.3);
            transform: scale(1.1);
        }

        /* Styling Kotak Merah sementara ketika salah memilih */
        .wrong-box {
            animation: shake 0.3s ease-in-out;
            border: 3px solid #ef4444 !important;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
    </style>

    <!-- Container Utama Dalam Layout Game -->
    <div class="wavy-container relative flex h-full w-full flex-col justify-between overflow-hidden p-4 sm:p-6 my-auto select-none">

        <!-- Judul Aktivitas -->
        <div class="z-10 mt-1 text-center">
            <h1 class="title-text text-lg sm:text-2xl font-extrabold tracking-wide">
                Temukan 5 suku kata “ba”.
            </h1>
            <h2 class="title-text mt-0.5 text-lg sm:text-2xl font-extrabold tracking-wide">
                Kemudian hubungkan !
            </h2>
        </div>

        <!-- Grid Sebaran Suku Kata -->
        <div class="relative my-2 grid w-full flex-grow grid-cols-3 items-center justify-items-center gap-x-2 gap-y-2 text-center">

            <!-- Baris 1 -->
            <div class="syllable-item c-purple col-start-1" data-syllable="bi">bi</div>
            <div class="syllable-item c-green col-start-3" data-syllable="be">be</div>

            <!-- Baris 2 -->
            <div class="syllable-item c-green relative col-start-1" data-syllable="ba">ba</div>
            <div class="syllable-item c-yellow col-start-2" data-syllable="bu">bu</div>
            <div class="syllable-item c-red col-start-3" data-syllable="bo">bo</div>

            <!-- Baris 3 -->
            <div class="syllable-item c-red col-start-1" data-syllable="bi">bi</div>
            <div class="syllable-item c-green col-start-2" data-syllable="ba">ba</div>
            <div class="syllable-item c-blue col-start-3" data-syllable="be">be</div>

            <!-- Baris 4 -->
            <div class="syllable-item c-yellow col-start-1" data-syllable="bo">bo</div>
            <div class="syllable-item c-purple col-start-3" data-syllable="bo">bo</div>

            <!-- Baris 5 -->
            <div class="syllable-item c-red col-start-2" data-syllable="bu">bu</div>
            <div class="syllable-item c-green col-start-3" data-syllable="ba">ba</div>

            <!-- Baris 6 -->
            <div class="syllable-item c-purple col-start-1" data-syllable="ba">ba</div>
            <div class="syllable-item c-yellow col-start-2" data-syllable="bo">bo</div>
            <div class="syllable-item c-blue col-start-3" data-syllable="bu">bu</div>

            <!-- Baris 7 -->
            <div class="syllable-item c-green col-start-1" data-syllable="be">be</div>
            <div class="syllable-item c-blue col-start-2" data-syllable="bi">bi</div>
            <div class="syllable-item c-red col-start-3" data-syllable="be">be</div>

            <!-- Baris 8 -->
            <div class="syllable-item c-yellow col-start-1" data-syllable="ba">ba</div>
            <div class="syllable-item c-red col-start-2" data-syllable="bi">bi</div>
            <div class="syllable-item c-yellow col-start-3" data-syllable="bu">bu</div>

        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const items = document.querySelectorAll('.syllable-item');
                let foundCount = 0;
                const targetCount = 5;

                items.forEach(item => {
                    item.addEventListener('click', () => {
                        const text = item.dataset.syllable;

                        // Abaikan jika item ini sudah berhasil ditemukan
                        if (item.classList.contains('found-box')) {
                            return;
                        }

                        if (text === 'ba') {
                            // Tambahkan Kotak Hijau pada suku kata "ba"
                            item.classList.add('found-box', 'animate-pop');
                            foundCount++;

                            if (typeof showFlashMessage === 'function') {
                                if (foundCount < targetCount) {
                                    showFlashMessage('success', `Benar! (${foundCount}/${targetCount})`);
                                } else {
                                    showFlashMessage('success', 'Hebat! Semua "ba" ditemukan! 🎉');
                                }
                            }
                        } else {
                            // Animasi salah sementara
                            item.classList.add('wrong-box');
                            if (typeof showFlashMessage === 'function') {
                                showFlashMessage('error', 'Coba cari "ba"!');
                            }

                            setTimeout(() => {
                                item.classList.remove('wrong-box');
                            }, 400);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-layout-game>
