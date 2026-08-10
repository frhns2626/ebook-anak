<x-layout-game
    title="{{$judul}}"
    halaman="{{$halaman}}"
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

        /* Card Putih Bergelombang */
        .item-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Titik Hubung Interactive */
        .connect-dot {
            width: 22px;
            height: 22px;
            background-color: #1a100c;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease;
            z-index: 30;
        }

        .connect-dot:hover, .connect-dot.active {
            transform: scale(1.35);
            background-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.3);
        }
    </style>

    <div id="gameContainer" class="relative flex flex-col items-center justify-between h-full w-full my-auto select-none">
        <canvas id="lineCanvas" class="absolute inset-0 w-full h-full pointer-events-none z-20"></canvas>

        <div class="text-center mt-1 mb-2 z-10">
            <h1 class="title-text text-lg sm:text-xl md:text-2xl font-extrabold tracking-wide px-2 leading-tight">
                Hubungkan huruf berikut<br>sesuai dengan nama objek pada gambar !
            </h1>
        </div>


        <div class="grid grid-cols-4 gap-3 sm:gap-4 w-full px-2 mt-2 z-10">
            @foreach (collect($items)->shuffle() as $item)
                <div class="flex flex-col items-center space-y-2">
                    <div class="item-card w-full h-16 sm:h-20 text-3xl sm:text-4xl font-extrabold text-black">{{ $item['letter'] }}</div>
                    <div class="connect-dot" data-type="top" data-id="{{ $item['letter'][0] }}" data-match="{{ strtolower($item['id']) }}"></div>
                </div>
            @endforeach
        </div>

        <div class="flex-1 min-h-[120px]"></div>

        <div class="grid grid-cols-4 gap-3 sm:gap-4 w-full px-2 mb-2 z-10">
            @foreach (collect($items)->shuffle() as $item)
                <div class="flex flex-col items-center space-y-2">
                    <div class="connect-dot" data-type="bottom" data-id="{{ strtolower($item['id']) }}"></div>
                    <div class="flex flex-col items-center w-full">
                        <img
                            src="{{ $item['emoji'] }}"
                            alt="{{ strtolower($item['id']) }}"
                            @class([
                               'min-w-36' => strtolower($item['id']) === 'hiu',
                               'max-w-32' => strtolower($item['id']) === 'gurita',
//                               '' => strtolower($item['id']) !== 'hiu',
                               'h-36 sm:h-40 object-contain pointer-events-none',
                   ])

                        />
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const container = document.getElementById('gameContainer');
                const canvas = document.getElementById('lineCanvas');
                const ctx = canvas.getContext('2d');
                const dots = document.querySelectorAll('.connect-dot');

                let selectedDot = null;
                let currentMousePos = {x: 0, y: 0};
                let connections = []; // Garis permanen yang benar [{from: Node, to: Node}]

                function resizeCanvas() {
                    const rect = container.getBoundingClientRect();
                    canvas.width = rect.width;
                    canvas.height = rect.height;
                    drawLines();
                }

                window.addEventListener('resize', resizeCanvas);
                setTimeout(resizeCanvas, 100);

                function getDotCenter(dot) {
                    const parentRect = container.getBoundingClientRect();
                    const dotRect = dot.getBoundingClientRect();
                    return {
                        x: dotRect.left + dotRect.width / 2 - parentRect.left,
                        y: dotRect.top + dotRect.height / 2 - parentRect.top
                    };
                }

                function updateMousePos(e) {
                    const parentRect = container.getBoundingClientRect();
                    const clientX = e.touches ? e.touches[0].clientX : e.clientX;
                    const clientY = e.touches ? e.touches[0].clientY : e.clientY;

                    currentMousePos = {
                        x: clientX - parentRect.left,
                        y: clientY - parentRect.top
                    };

                    if (selectedDot) {
                        drawLines();
                    }
                }

                // Tracking pergerakan kursor/touch di container
                container.addEventListener('mousemove', updateMousePos);
                container.addEventListener('touchmove', updateMousePos, {passive: true});

                function drawLines() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);

                    // 1. Gambar Garis Permanen (Pasangan Benar)
                    connections.forEach(conn => {
                        const start = getDotCenter(conn.from);
                        const end = getDotCenter(conn.to);

                        ctx.beginPath();
                        ctx.moveTo(start.x, start.y);
                        ctx.lineTo(end.x, end.y);
                        ctx.strokeStyle = '#16a34a'; // Hijau Sukses
                        ctx.lineWidth = 5;
                        ctx.lineCap = 'round';
                        ctx.stroke();
                    });

                    // 2. Gambar Garis Aktif yang Mengikuti Kursor Mouse
                    if (selectedDot) {
                        const start = getDotCenter(selectedDot);

                        ctx.beginPath();
                        ctx.moveTo(start.x, start.y);
                        ctx.lineTo(currentMousePos.x, currentMousePos.y);
                        ctx.strokeStyle = '#2563eb'; // Biru Aktif
                        ctx.lineWidth = 4;
                        ctx.lineCap = 'round';
                        ctx.setLineDash([8, 6]); // Garis Putus-putus Khas Game
                        ctx.stroke();
                        ctx.setLineDash([]); // Reset Line Dash
                    }
                }

                dots.forEach(dot => {
                    dot.addEventListener('click', (e) => {
                        e.stopPropagation();

                        // Abaikan jika titik ini sudah terhubung sempurna
                        if (connections.some(c => c.from === dot || c.to === dot)) {
                            return;
                        }

                        if (!selectedDot) {
                            // Pilih titik awal
                            selectedDot = dot;
                            dot.classList.add('active');
                            updateMousePos(e);
                        } else {
                            // Jika mengklik titik yang sama lagi -> batalkan
                            if (selectedDot === dot) {
                                selectedDot.classList.remove('active');
                                selectedDot = null;
                                drawLines();
                                return;
                            }

                            // Jika memilih dari tipe grup yang sama (misal top & top)
                            if (selectedDot.dataset.type === dot.dataset.type) {
                                selectedDot.classList.remove('active');
                                selectedDot = dot;
                                dot.classList.add('active');
                                drawLines();
                                return;
                            }

                            // Tentukan mana titik Atas dan mana titik Bawah
                            const topDot = selectedDot.dataset.type === 'top' ? selectedDot : dot;
                            const bottomDot = selectedDot.dataset.type === 'bottom' ? selectedDot : dot;

                            // Cek Kebenaran Pasangan
                            if (topDot.dataset.match === bottomDot.dataset.id) {
                                connections.push({from: topDot, to: bottomDot});
                                selectedDot.classList.remove('active');
                                selectedDot = null;
                                drawLines();
                                showFlashMessage('success', 'Benar!');
                            } else {
                                selectedDot.classList.remove('active');
                                selectedDot = null;
                                drawLines();
                                showFlashMessage('error', 'Salah!');
                            }
                        }
                    });
                });

                // Klik di area kosong untuk membatalkan penarikan garis aktif
                container.addEventListener('click', (e) => {
                    if (selectedDot && !e.target.classList.contains('connect-dot')) {
                        selectedDot.classList.remove('active');
                        selectedDot = null;
                        drawLines();
                    }
                });
            });
        </script>
    @endpush
</x-layout-game>
