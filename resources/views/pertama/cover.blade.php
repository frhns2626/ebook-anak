<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Book Membaca Menyenangkan</title>
    <!-- Tailwind CSS via CDN (for demonstration) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles that complement Tailwind */

        /* 1. The main grid background */
        .page-background {
            background-image:
                linear-gradient(#e0f2fe 1px, transparent 1px), linear-gradient(90deg, #e0f2fe 1px, transparent 1px);
            background-size: 20px 20px;
            background-color: white;
            position: relative;
            overflow: hidden; /* Prevent illustrations from creating scrollbars */
        }

        /* 2. Abstract background shapes */
        .page-background::before,
        .page-background::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 50%;
        }

        /* Blue shape - Top Right */
        .page-background::before {
            width: 250px;
            height: 150px;
            background-color: #a7f3d0; /* A soft teal/blue */
            top: -50px;
            right: -80px;
            opacity: 0.8;
        }

        /* Pink shape - Bottom Right */
        .page-background::after {
            width: 180px;
            height: 120px;
            background-color: #fce7f3; /* A soft pink */
            bottom: 30px;
            right: -60px;
            opacity: 0.8;
        }

        /* Dark Blue shape - Bottom Left (using a child element) */
        .background-blob-blue {
            width: 150px;
            height: 180px;
            background-color: #dbeafe; /* A soft blue */
            bottom: -30px;
            left: -50px;
            position: absolute;
            border-radius: 50%;
            z-index: 0;
            opacity: 0.8;
        }

        /* 3. Title typography and effect */
        .title-text {
            font-family: 'Times New Roman', Times, serif; /* Using a classic serif for the main title */
            font-weight: 900;
            color: #b91c1c; /* Deep red color */
            text-shadow:
                2px 2px 0 #fff,
                3px 3px 0 #fff,
                4px 4px 0 #ca8a04; /* Yellow/Gold shadow effect */
            display: inline-block;
        }

        /* 4. Subtitle typography and background */
        .subtitle-box {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #bfdbfe; /* Light blue box */
            color: #ffffff; /* White text */
            font-weight: bold;
            font-size: 1.1rem;
            display: inline-block;
            box-shadow: inset 0 -2px 0 rgba(0, 0, 0, 0.1);
        }

        /* 5. Blue Ribbon for 'TIM PENULIS' text */
        .ribbon-banner {
            background-color: #3b82f6; /* Tailwind's blue-500 */
            color: white;
            position: relative;
            z-index: 5;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .ribbon-banner::before,
        .ribbon-banner::after {
            content: '';
            position: absolute;
            border-style: solid;
            border-width: 12px;
            bottom: -10px;
            z-index: -1;
        }

        /* Create the triangular ribbon ends */
        .ribbon-banner::before {
            left: -20px;
            border-color: #3b82f6 #3b82f6 #3b82f6 transparent;
        }

        .ribbon-banner::after {
            right: -20px;
            border-color: #3b82f6 transparent #3b82f6 #3b82f6;
        }

        /* Small triangular shadows where ribbon folds */
        .ribbon-shadow::before,
        .ribbon-shadow::after {
            content: '';
            position: absolute;
            border-style: solid;
            border-color: #1d4ed8 transparent transparent transparent; /* Darker blue shadow */
            border-width: 5px;
            top: 100%;
            z-index: 10;
        }
        .ribbon-shadow::before {
            left: 0;
        }
        .ribbon-shadow::after {
            right: 0;
        }

        /* Author list styles */
        .author-list {
            font-family: Arial, Helvetica, sans-serif;
            color: #1e3a8a; /* Deep blue */
            font-weight: normal;
        }
    </style>
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-100 p-4">
    <!-- The E-Book Cover Container -->
    <div class="page-background relative flex aspect-[1/1.41] w-full max-w-[500px] flex-col items-center rounded-lg border-4 border-black p-6 shadow-xl">
        <div class="background-blob-blue"></div>
        <!-- Bottom-left shape -->

        <!-- Top Row Items -->
        <div class="z-10 mb-1 flex w-full items-start justify-between">
            <!-- Left: Pencil Sharpener -->
            <div class="flex -rotate-15 transform items-center justify-center rounded border-2 border-black bg-yellow-400 p-2">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                    <circle cx="9" cy="9" r="2" fill="white" stroke="none" />
                    <line x1="12" y1="9" x2="19" y2="9" />
                    <line x1="9" y1="12" x2="9" y2="19" />
                    }
                </svg>
            </div>

            <!-- Center: e-Book Label -->
            <div class="z-10 mt-1 rounded-full border-2 border-yellow-500 bg-yellow-400 px-4 py-1 text-sm font-bold text-black">
                e-Book
            </div>

            <!-- Right: Scissors -->
            <div class="mt-2 -mr-4 rotate-45 transform">
                <svg class="h-12 w-12" viewBox="0 0 100 100" fill="none" stroke="black" stroke-width="3">
                    <!-- Right handle -->
                    <circle cx="65" cy="35" r="15" fill="none" />
                    <circle cx="65" cy="35" r="12" fill="white" />
                    <path d="M 65 50 Q 80 65 95 80 L 70 80 Q 55 65 40 50 L 65 50 Z" fill="none" />
                    <!-- Left handle -->
                    <circle cx="35" cy="65" r="15" fill="none" />
                    <circle cx="35" cy="65" r="12" fill="white" />
                    <path d="M 35 50 Q 20 35 5 20 L 30 20 Q 45 35 60 50 L 35 50 Z" fill="none" />
                    <!-- Blades -->
                    <line x1="40" y1="40" x2="80" y2="20" stroke="pink" stroke-width="4" />
                    <line x1="40" y1="40" x2="60" y2="60" stroke="black" />
                    <line x1="60" y1="60" x2="80" y2="20" stroke="pink" stroke-width="4" />
                    <circle cx="50" cy="50" r="3" fill="black" stroke="none" />
                </svg>
            </div>
        </div>

        <!-- Decorative Icons Top-Middle -->
        <div class="absolute top-[80px] left-[15%] z-10 rotate-12 transform text-xl font-black text-yellow-500">✨</div>
        <div class="absolute top-[85px] left-[35%] z-10 -rotate-12 transform text-xl font-black text-yellow-500">
            ⭐
        </div>

        <!-- Main Titles -->
        <div class="z-10 mt-[-30px] mb-4 text-center">
            <h1 class="title-text text-3xl leading-none">Membaca</h1>
            <br />
            <h1 class="title-text text-3xl leading-none">Menyenangkan</h1>
        </div>

        <!-- Secondary Title -->
        <div class="z-10 text-center">
            <div class="subtitle-box mb-2 rounded-full px-3 py-1 text-base">"Menggunakan Metode Fonik"</div>
        </div>

        <!-- Main Character Illustrations -->
        <div class="relative z-10 mb-4 flex w-full flex-grow items-center justify-center">
            <!-- Left: Boy running -->
            <img
                src="https://images.vexels.com/content/226123/preview/little-boy-running-illustration-bb88c1.png"
                alt="Anak laki-laki berlari"
                class="ml-[-20px] h-40 scale-x-[-1] object-contain"
            />
            <!-- Right: Girl holding book -->
            <img
                src="https://images.vexels.com/content/226127/preview/little-girl-holding-book-illustration-e9b251.png"
                alt="Anak perempuan memegang buku"
                class="mr-[-10px] h-40 object-contain"
            />

            <!-- Scattered Decorative elements -->
            <div class="absolute top-[50%] left-[2%] z-10 rotate-12 transform text-2xl font-black text-yellow-500">
                ✨
            </div>
            <div class="absolute top-[70%] left-[20%] text-2xl font-black text-yellow-500">✨</div>
            <div class="absolute top-[20%] left-[65%] z-10 -rotate-12 transform text-xl font-black text-yellow-500">
                ⭐
            </div>
            <div class="absolute top-[60%] left-[80%] text-3xl font-black text-yellow-500">✨</div>
            <div class="absolute top-[80%] left-[65%] text-2xl font-black text-yellow-500">✨</div>
            <div class="absolute bottom-10 left-[45%] text-2xl font-black text-yellow-500">⭐</div>
        </div>

        <!-- Bottom Icons -->
        <div class="relative z-10 mb-2 flex w-full items-center justify-between px-4">
            <div class="absolute bottom-[-15px] left-2 flex -rotate-15 transform items-center justify-center rounded border-2 border-black bg-yellow-400 p-2">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                    <circle cx="9" cy="9" r="2" fill="white" stroke="none" />
                    <line x1="12" y1="9" x2="19" y2="9" />
                    <line x1="9" y1="12" x2="9" y2="19" />
                    }
                </svg>
            </div>
            <div class="absolute right-2 bottom-[-10px] z-10 rotate-15 transform">
                <svg class="h-10 w-10" viewBox="0 0 100 100" fill="none" stroke="black" stroke-width="3">
                    <rect x="10" y="20" width="10" height="60" rx="2" fill="pink" />
                    <rect x="20" y="20" width="70" height="60" rx="5" fill="purple" />
                    <circle cx="80" cy="50" r="5" fill="white" />
                    <circle cx="20" cy="50" r="5" fill="white" />
                </svg>
            </div>
        </div>

        <!-- Author Panel with Ribbon and Card -->
        <div class="relative mt-auto w-full">
            <!-- Ribbon Banner -->
            <div class="absolute -top-3 left-1/2 z-20 -translate-x-1/2 rounded-t-lg px-10 pt-1.5 pb-2">
                <div class="ribbon-banner rounded-sm px-6 py-1 text-sm font-bold shadow-md">TIM PENULIS</div>
            </div>

            <!-- Content Card -->
            <div class="relative z-10 w-full overflow-hidden rounded-lg border-2 border-yellow-500 bg-yellow-100 p-6 pt-10 text-center">
                <!-- Golden Stars -->
                <span class="absolute top-4 left-6 text-xl font-bold text-yellow-500">⭐</span>
                <span class="absolute top-4 right-6 text-xl font-bold text-yellow-500">✨</span>
                <span class="absolute top-10 left-3 text-lg font-bold text-yellow-500">✨</span>
                <span class="absolute bottom-4 left-2 text-xl font-bold text-yellow-500">✨</span>
                <span class="absolute right-2 bottom-4 text-2xl font-bold text-yellow-500">⭐</span>

                <div class="author-list mb-2 space-y-1.5 px-4 text-sm">
                    <p class="text-[0.8rem] font-normal">
                        Dina Amalia, S.Pd., M.Pd. <span class="text-xs">✨</span> Syailin Nichla Choirin Attalina,
                        S.Pd., M.Pd.
                    </p>
                    <p class="text-[0.8rem] font-normal">
                        Aliva Rosdiana, S.S., M.Pd. <span class="text-xs">✨</span> Ersila Devy Rinjani, M.Pd.
                    </p>
                    <p class="mt-1.5 text-[0.8rem] font-normal">Nugroho Eko Budiyanto, S.T., M.Kom</p>
                </div>

                <!-- Bottom Pencil Decor -->
                <div class="mt-2 flex w-full items-center justify-center space-x-1 border-t-2 border-yellow-300 px-1 pt-2">
                    <div class="h-1.5 w-1/3 rounded-l bg-blue-400"></div>
                    <div class="h-2 w-1.5 bg-yellow-500"></div>
                    <div class="h-2 w-1/5 rounded-r-sm bg-gray-400"></div>
                    <div class="h-1.5 w-1/5 bg-blue-300"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
