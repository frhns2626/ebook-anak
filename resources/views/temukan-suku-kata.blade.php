<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman 9 - Temukan Suku Kata "ba"</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Fredoka / Bubble font -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Fredoka', cursive, sans-serif;
        }

        /* Style Judul Pop-out */
        .title-text {
            color: #fbbf24; /* Kuning */
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        /* Style Suku Kata */
        .syllable {
            font-size: 2.25rem; /* ~36px */
            font-weight: 700;
            user-select: none;
        }

        /* Warna Suku Kata Berdasarkan Gambar */
        .c-green {
            color: #6ee7b7;
        } /* Hijau Muda */
        .c-purple {
            color: #a5b4fc;
        } /* Ungu / Biru Muda */
        .c-yellow {
            color: #facc15;
        } /* Kuning */
        .c-red {
            color: #ef4444;
        } /* Merah */
        .c-blue {
            color: #60a5fa;
        } /* Biru */

        /* Container Bergelombang Biru */
        .wavy-container {
            background-color: #dbeafe;
            border-radius: 3rem;
            border: 2px solid #bfdbfe;
        }
    </style>
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-800 p-4">
    <!-- Frame Halaman Buku -->
    <div class="relative flex aspect-[1/1.41] w-full max-w-xl flex-col justify-between overflow-hidden rounded-xl border-8 border-black bg-white p-4 shadow-2xl sm:p-6">
        <!-- Area Utama Bergelombang Biru Muda -->
        <div class="wavy-container relative flex h-full w-full flex-col justify-between overflow-hidden p-6">
            <!-- Judul Aktivitas -->
            <div class="z-10 mt-2 text-center">
                <h1 class="title-text text-xl font-extrabold tracking-wide sm:text-2xl">Temukan 5 suku kata “ba”.</h1>
                <h2 class="title-text mt-1 text-xl font-extrabold tracking-wide sm:text-2xl">Kemudian hubungkan !</h2>
            </div>

            <!-- Grid / Sebaran Suku Kata -->
            <div class="relative my-4 grid w-full flex-grow grid-cols-3 items-center justify-items-center gap-x-2 gap-y-4 text-center">
                <!-- Baris 1 -->
                <div class="syllable c-purple col-start-1">bi</div>
                <div class="syllable c-green col-start-3">be</div>

                <!-- Baris 2 -->
                <div class="syllable c-green relative col-start-1">
                    ba
                    <!-- Indikator lingkaran kecil hitam di bawah 'ba' pertama -->
                    <span class="absolute -bottom-2 left-1/2 h-2.5 w-2.5 -translate-x-1/2 rounded-full border-2 border-black bg-transparent"></span>
                </div>
                <div class="syllable c-yellow col-start-2">bu</div>
                <div class="syllable c-red col-start-3">bo</div>

                <!-- Baris 3 -->
                <div class="syllable c-red col-start-1">bi</div>
                <div class="syllable c-green col-start-2">ba</div>
                <div class="syllable c-blue col-start-3">be</div>

                <!-- Baris 4 -->
                <div class="syllable c-yellow col-start-1">bo</div>
                <div class="syllable c-purple col-start-3">bo</div>

                <!-- Baris 5 -->
                <div class="syllable c-red col-start-2">bu</div>
                <div class="syllable c-green col-start-3">ba</div>

                <!-- Baris 6 -->
                <div class="syllable c-purple col-start-1">ba</div>
                <div class="syllable c-yellow col-start-2">bo</div>
                <div class="syllable c-blue col-start-3">bu</div>

                <!-- Baris 7 -->
                <div class="syllable c-green col-start-1">be</div>
                <div class="syllable c-blue col-start-2">bi</div>
                <div class="syllable c-red col-start-3">be</div>

                <!-- Baris 8 -->
                <div class="syllable c-yellow col-start-1">ba</div>
                <div class="syllable c-red col-start-2">bi</div>
                <div class="syllable c-yellow col-start-3">bu</div>
            </div>

            <!-- Nomor Halaman -->
            <div class="relative z-20 mx-auto mt-2">
                <div class="rounded-xl border-2 border-black bg-[#facc15] px-5 py-0.5 shadow-[2px_2px_0px_rgba(0,0,0,1)]">
                    <span class="text-xs font-extrabold tracking-wide text-black sm:text-sm"> Halaman 9 </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
