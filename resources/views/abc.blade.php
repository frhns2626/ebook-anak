<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman 1 - Alphabet</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Fredoka / Bubble font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&display=swap"
        rel="stylesheet"
    />
    <style>
        /* Custom Grid Background */
        .bg-grid-pattern {
            background-color: #d8e2f8;
            background-image:
                linear-gradient(to right, #b8ccf3 1px, transparent 1px),
                linear-gradient(to bottom, #b8ccf3 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Bubble text style for alphabet */
        .alphabet-text {
            font-family: "Fredoka", cursive, sans-serif;
            color: #fbbf24; /* Yellow fill */
            -webkit-text-stroke: 2px #000000; /* Black border/outline */
            paint-order: stroke fill;
            filter: drop-shadow(2px 3px 0px rgba(0, 0, 0, 0.8));
        }

        /* Smooth wavy shape for top and bottom clouds */
        .cloud-shape-top {
            border-radius: 0 0 50% 50% / 0 0 100% 100%;
        }
    </style>
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-800 p-4">
    <!-- Book Page Frame -->
    <div
        class="bg-grid-pattern relative flex aspect-[1/1.41] w-full max-w-xl flex-col justify-between overflow-hidden rounded-xl border-8 border-black p-6 shadow-2xl"
    >
        <!-- Top White Wave Deco -->
        <div
            class="cloud-shape-top pointer-events-none absolute -top-12 right-0 left-0 h-28 bg-white"
        ></div>

        <!-- Alphabet Grid Container -->
        <div class="relative z-10 my-auto px-4 pt-10 pb-8">
            <!-- Row 1: Aa Bb Cc Dd -->
            <div class="mb-6 grid grid-cols-4 gap-x-2 gap-y-6 text-center">
                <span class="alphabet-text text-4xl sm:text-5xl">Aa</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Bb</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Cc</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Dd</span>
            </div>

            <!-- Row 2: Ee Ff Gg Hh Ii -->
            <div class="mb-6 grid grid-cols-5 gap-x-1 gap-y-6 text-center">
                <span class="alphabet-text text-4xl sm:text-5xl">Ee</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Ff</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Gg</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Hh</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Ii</span>
            </div>

            <!-- Row 3: Jj Kk Ll Mm Nn -->
            <div class="mb-6 grid grid-cols-5 gap-x-1 gap-y-6 text-center">
                <span class="alphabet-text text-4xl sm:text-5xl">Jj</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Kk</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Ll</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Mm</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Nn</span>
            </div>

            <!-- Row 4: Oo Pp Qq Rr Ss -->
            <div class="mb-6 grid grid-cols-5 gap-x-1 gap-y-6 text-center">
                <span class="alphabet-text text-4xl sm:text-5xl">Oo</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Pp</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Qq</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Rr</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Ss</span>
            </div>

            <!-- Row 5: Tt Uu Vv Ww -->
            <div class="mb-6 grid grid-cols-4 gap-x-2 gap-y-6 px-4 text-center">
                <span class="alphabet-text text-4xl sm:text-5xl">Tt</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Uu</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Vv</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Ww</span>
            </div>

            <!-- Row 6: Xx Yy Zz -->
            <div class="flex justify-center space-x-8 text-center">
                <span class="alphabet-text text-4xl sm:text-5xl">Xx</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Yy</span>
                <span class="alphabet-text text-4xl sm:text-5xl">Zz</span>
            </div>
        </div>

        <!-- Bottom White Wave & Footer -->
        <div
            class="pointer-events-none absolute right-0 -bottom-10 left-0 h-24 rounded-t-[50%] bg-white"
        ></div>

        <!-- Page Number Badge (Halaman 1) -->
        <div class="relative z-20 mx-auto mb-1">
            <div
                class="rounded-xl border-2 border-black bg-[#facc15] px-5 py-0.5 shadow-[2px_2px_0px_rgba(0,0,0,1)]"
            >
                <span
                    class="text-xs font-extrabold tracking-wide text-black sm:text-sm"
                >
                    Halaman 1
                </span>
            </div>
        </div>
    </div>
</body>
</html>
