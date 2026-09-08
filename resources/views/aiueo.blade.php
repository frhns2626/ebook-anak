<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman 10 - Ayo coba baca lagi !</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Fredoka / Bubble font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&display=swap"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: "Fredoka", cursive, sans-serif;
        }

        /* Grid pattern background */
        .bg-grid-pattern {
            background-color: #d8e2f8;
            background-image:
                linear-gradient(to right, #b8ccf3 1px, transparent 1px),
                linear-gradient(to bottom, #b8ccf3 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Style Judul Pop-out */
        .title-text {
            color: #fbbf24; /* Yellow fill */
            -webkit-text-stroke: 1.5px #000000;
            paint-order: stroke fill;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.8));
        }

        /* Typography Suku Kata */
        .syllable-text {
            font-size: 2rem; /* ~32px */
            font-weight: 700;
            line-height: 1.1;
            user-select: none;
        }

        /* Skema Warna per Baris sesuai Gambar */
        .row-red {
            color: #ef4444;
        } /* a i u e o & fa... & ka... */
        .row-green {
            color: #6ee7b7;
        } /* ba... & ga... & la... */
        .row-yellow {
            color: #facc15;
        } /* ca... & ha... */
        .row-blue {
            color: #60a5fa;
        } /* da... & ja... & ma... */
    </style>
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-800 p-4">
    <!-- Frame Utama Buku -->
    <div
        class="bg-grid-pattern relative flex aspect-[1/1.41] w-full max-w-xl flex-col justify-between overflow-hidden rounded-xl border-8 border-black p-4 shadow-2xl sm:p-6"
    >
        <!-- Kartu Putih Bergelombang di Tengah -->
        <div
            class="relative flex h-full w-full flex-col justify-between overflow-hidden rounded-[2.5rem] bg-white p-6 shadow-md"
        >
            <!-- Judul Bagian Atas -->
            <div class="z-10 mt-1 text-center">
                <h1
                    class="title-text text-2xl font-extrabold tracking-wide sm:text-3xl"
                >
                    Ayo coba baca lagi !
                </h1>
            </div>

            <!-- Tabel / Grid Suku Kata (5 Kolom x 11 Baris) -->
            <div
                class="my-auto grid grid-cols-5 items-center justify-items-center gap-y-2 text-center sm:gap-y-3"
            >
                <!-- Baris 1: Vokal (Merah) -->
                <span class="syllable-text row-red">a</span>
                <span class="syllable-text row-red">i</span>
                <span class="syllable-text row-red">u</span>
                <span class="syllable-text row-red">e</span>
                <span class="syllable-text row-red">o</span>

                <!-- Baris 2: ba (Hijau) -->
                <span class="syllable-text row-green">ba</span>
                <span class="syllable-text row-green">bi</span>
                <span class="syllable-text row-green">bu</span>
                <span class="syllable-text row-green">be</span>
                <span class="syllable-text row-green">bo</span>

                <!-- Baris 3: ca (Kuning) -->
                <span class="syllable-text row-yellow">ca</span>
                <span class="syllable-text row-yellow">ci</span>
                <span class="syllable-text row-yellow">cu</span>
                <span class="syllable-text row-yellow">ce</span>
                <span class="syllable-text row-yellow">co</span>

                <!-- Baris 4: da (Biru) -->
                <span class="syllable-text row-blue">da</span>
                <span class="syllable-text row-blue">di</span>
                <span class="syllable-text row-blue">du</span>
                <span class="syllable-text row-blue">de</span>
                <span class="syllable-text row-blue">do</span>

                <!-- Baris 5: fa (Merah) -->
                <span class="syllable-text row-red">fa</span>
                <span class="syllable-text row-red">fi</span>
                <span class="syllable-text row-red">fu</span>
                <span class="syllable-text row-red">fe</span>
                <span class="syllable-text row-red">fo</span>

                <!-- Baris 6: ga (Hijau) -->
                <span class="syllable-text row-green">ga</span>
                <span class="syllable-text row-green">gi</span>
                <span class="syllable-text row-green">gu</span>
                <span class="syllable-text row-green">ge</span>
                <span class="syllable-text row-green">go</span>

                <!-- Baris 7: ha (Kuning) -->
                <span class="syllable-text row-yellow">ha</span>
                <span class="syllable-text row-yellow">hi</span>
                <span class="syllable-text row-yellow">hu</span>
                <span class="syllable-text row-yellow">he</span>
                <span class="syllable-text row-yellow">ho</span>

                <!-- Baris 8: ja (Biru Ungu) -->
                <span class="syllable-text row-blue">ja</span>
                <span class="syllable-text row-blue">ji</span>
                <span class="syllable-text row-blue">ju</span>
                <span class="syllable-text row-blue">je</span>
                <span class="syllable-text row-blue">jo</span>

                <!-- Baris 9: ka (Merah) -->
                <span class="syllable-text row-red">ka</span>
                <span class="syllable-text row-red">ki</span>
                <span class="syllable-text row-red">ku</span>
                <span class="syllable-text row-red">ke</span>
                <span class="syllable-text row-red">ko</span>

                <!-- Baris 10: la (Hijau) -->
                <span class="syllable-text row-green">la</span>
                <span class="syllable-text row-green">li</span>
                <span class="syllable-text row-green">lu</span>
                <span class="syllable-text row-green">le</span>
                <span class="syllable-text row-green">lo</span>

                <!-- Baris 11: ma (Biru) -->
                <span class="syllable-text row-blue">ma</span>
                <span class="syllable-text row-blue">mi</span>
                <span class="syllable-text row-blue">mu</span>
                <span class="syllable-text row-blue">me</span>
                <span class="syllable-text row-blue">mo</span>
            </div>

            <!-- Badge Nomor Halaman -->
            <div class="relative z-20 mx-auto mt-1">
                <div
                    class="rounded-xl border-2 border-black bg-[#facc15] px-5 py-0.5 shadow-[2px_2px_0px_rgba(0,0,0,1)]"
                >
                    <span
                        class="text-xs font-extrabold tracking-wide text-black sm:text-sm"
                    >
                        Halaman 10
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
