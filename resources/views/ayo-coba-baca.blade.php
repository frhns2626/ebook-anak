<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ayo coba baca ! - Halaman 13</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Fredoka & Quicksand -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700;800&family=Quicksand:wght@700&display=swap"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }

        /* Pattern background grid biru */
        .bg-grid-pattern {
            background-color: #ffffff;
            background-image:
                linear-gradient(to right, #b8ccf3 1px, transparent 1px),
                linear-gradient(to bottom, #b8ccf3 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Style Judul Pop-out */
        .title-text {
            font-family: 'Fredoka', cursive, sans-serif;
            color: #fbbf24; /* Kuning */
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        /* Font tebal untuk kata kunci 'bola' */
        .header-word {
            font-family: 'Fredoka', cursive, sans-serif;
            color: #1a100c;
        }

        /* Card khusus bersudut halus tidak beraturan */
        .custom-card {
            background-color: #dbe4f8;
            border-radius: 2rem;
        }
    </style>
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-800 p-4">
    <!-- Frame Utama Buku (A4 Aspect Ratio) -->
    <div class="bg-grid-pattern relative flex aspect-[1/1.41] w-full max-w-xl flex-col items-center justify-between overflow-hidden rounded-xl border-8 border-black p-6 shadow-2xl sm:p-8">
        <!-- Judul Atas -->
        <div class="mt-1 text-center">
            <h1 class="title-text text-2xl font-extrabold tracking-wide sm:text-3xl">Ayo coba baca !</h1>
        </div>

        <!-- Container Isi Utama -->
        <div class="my-auto flex w-full flex-col items-center space-y-5">
            <!-- Kotak Header (bola + Gambar Bola) -->
            <div class="custom-card flex w-full items-center justify-around px-8 py-5 shadow-sm">
                <span class="header-word ml-2 text-5xl font-extrabold tracking-tight sm:text-6xl"> bola </span>

                <!-- Ilustrasi Bola Sepak dan Rumput Hijau -->
                <div class="relative mr-2 flex items-center justify-center">
                    <!-- Bayangan Rumput Hijau -->
                    <div class="absolute -bottom-1 h-11 w-32 rounded-[50%] bg-[#95c11f]"></div>
                    <!-- SVG Bola Sepak -->
                    <svg class="relative z-10 h-20 w-20 drop-shadow-sm sm:h-24 sm:w-24" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="45" fill="#ffffff" stroke="#222" stroke-width="4" />
                        <!-- Pentagon Tengah -->
                        <polygon points="50,32 65,43 59,60 41,60 35,43" fill="#333" />
                        <!-- Garis-garis Bola -->
                        <line x1="50" y1="32" x2="50" y2="10" stroke="#222" stroke-width="3" />
                        <line x1="65" y1="43" x2="88" y2="35" stroke="#222" stroke-width="3" />
                        <line x1="59" y1="60" x2="78" y2="78" stroke="#222" stroke-width="3" />
                        <line x1="41" y1="60" x2="22" y2="78" stroke="#222" stroke-width="3" />
                        <line x1="35" y1="43" x2="12" y2="35" stroke="#222" stroke-width="3" />
                    </svg>
                </div>
            </div>

            <!-- Kotak Kalimat Latihan Baca -->
            <div class="custom-card flex w-full flex-col space-y-6 px-6 py-8 text-center text-2xl shadow-sm">
                <p class="leading-tight font-extrabold tracking-wide text-black">bola kecil meluncur di atas meja</p>
                <p class="leading-tight font-extrabold tracking-wide text-black">
                    bola sepak dijaga oleh kipper di gawang
                </p>
                <p class="leading-tight font-extrabold tracking-wide text-black">
                    bola basket dilempar ke keranjang tinggi
                </p>
                <p class="leading-tight font-extrabold tracking-wide text-black">adik suka memainkan bola plastik</p>
                <p class="leading-tight font-extrabold tracking-wide text-black">bola tenis dipukul dengan raket</p>
            </div>
        </div>

        <!-- Badge Nomor Halaman (Halaman 13) -->
        <div class="relative z-20 mx-auto mt-1 mb-0">
            <div class="rounded-xl border-2 border-black bg-[#facc15] px-5 py-0.5 shadow-[2px_2px_0px_rgba(0,0,0,1)]">
                <span class="text-xs font-extrabold tracking-wide text-black sm:text-sm"> Halaman 13 </span>
            </div>
        </div>
    </div>
</body>
</html>
