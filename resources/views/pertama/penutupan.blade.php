<x-layout-game
    title="Penutupan"
    halaman="0"
>
    <style>
        /* Pattern grid background */
        .bg-grid-pattern {
            background-color: #ffffff;
            background-image: linear-gradient(to right, #bfdbfe 1px, transparent 1px),
            linear-gradient(to bottom, #bfdbfe 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Bentuk latar belakang abstrak */
        .bg-blob-top-left {
            width: 220px;
            height: 120px;
            background-color: #93c5fd; /* Soft Blue */
            border-radius: 0 0 80% 50%;
        }

        .bg-blob-bottom-pink {
            width: 200px;
            height: 180px;
            background-color: #fbcfe8; /* Soft Pink */
            border-radius: 60% 40% 50% 50%;
        }

        .bg-blob-bottom-blue {
            width: 140px;
            height: 160px;
            background-color: #93c5fd;
            border-radius: 40% 60% 70% 30%;
        }
    </style>
    <!-- Frame Utama Buku (A4 Aspect Ratio) -->
    <div class="bg-grid-pattern relative flex aspect-[1/1.41] w-full max-w-xl flex-col justify-between overflow-hidden rounded-xl border-8 border-black p-6 shadow-2xl sm:p-8">
        <!-- Abstract Background Blobs -->
        <div class="bg-blob-top-left absolute -top-10 -left-10 z-0"></div>
        <div class="bg-blob-bottom-pink absolute -right-10 -bottom-10 z-0"></div>
        <div class="bg-blob-bottom-blue absolute -bottom-10 -left-10 z-0"></div>
        <!-- Top Decorative Icons -->
        <div class="relative z-10 flex w-full items-start justify-between">
            <!-- Pengserut Biru (Kiri Atas) -->
            <div class="-rotate-12 transform">
                <svg class="h-12 w-12" viewBox="0 0 100 100" fill="none">
                    <rect x="15" y="20" width="70" height="60" rx="10" fill="#3b82f6" stroke="#000" stroke-width="4"/>
                    <circle cx="50" cy="50" r="16" fill="#fbbf24" stroke="#000" stroke-width="4"/>
                    <polygon points="50,34 64,58 36,58" fill="#d1d5db" stroke="#000" stroke-width="2"/>
                </svg>
            </div>
            <!-- Gunting (Kanan Atas) -->
            <div class="-mr-2 rotate-45 transform">
                <svg class="h-16 w-16" viewBox="0 0 100 100" fill="none" stroke="#000" stroke-width="4">
                    <circle cx="70" cy="30" r="14" fill="#f43f5e"/>
                    <circle cx="70" cy="30" r="8" fill="#fff"/>
                    <circle cx="30" cy="70" r="14" fill="#f43f5e"/>
                    <circle cx="30" cy="70" r="8" fill="#fff"/>
                    <path d="M 60 38 L 20 20 L 25 30 L 48 48 Z" fill="#e5e7eb"/>
                    <path d="M 38 60 L 20 20 L 30 25 L 48 48 Z" fill="#e5e7eb"/>
                    <circle cx="48" cy="48" r="3" fill="#000"/>
                </svg>
            </div>
        </div>
        <!-- Kotak Sinopsis Utama -->
        <div class="relative z-10 my-2 rounded-3xl border border-blue-100 bg-[#e4ecfb]/90 p-6 text-center shadow-sm backdrop-blur-sm sm:p-7">
            <p class="text-justify text-sm leading-relaxed font-extrabold tracking-tight text-black sm:text-base">
                Selamat datang di dunia membaca yang menyenangkan untuk si kecil ! Buku ini adalah sahabat setia dalam
                mengantarkan anak ke dunia keajaiban kata-kata. Dengan cerita yang riang dan gambar yang cerah, panduan
                ini mempersembahkan pengalaman belajar yang penuh kegembiraan. Ajak anak menjelajahi petualangan membaca
                yang tak terlupakan, menemukan kata-kata baru di setiap halaman, dan merasakan kegembiraan belajar yang
                menyenangkan. Dengan panduan ini, membaca dikemas secara menyenangkan berpetualang bersama
                karakter-karakter yang penuh warna. Temukan keajaiban membaca bersama anak-anak, di mana setiap halaman
                adalah jendela ilmu dengan beragam pengetahuan !
            </p>
        </div>
        <!-- Character Illustrations & Element Scatter Section -->
        <div class="relative z-10 flex w-full flex-grow items-center justify-between px-2">
            <!-- Ornamen Tambahan (Bintang & Musik) -->
            <span class="absolute top-2 left-[48%] z-0 text-3xl font-bold text-yellow-500">⭐</span>
            <span class="absolute -top-4 left-[38%] z-0 text-2xl font-bold text-yellow-500">🎵</span>
            <span class="absolute top-[30%] left-[2%] z-0 text-2xl font-bold text-yellow-500">%</span>
            <span class="absolute top-[60%] left-[30%] z-0 text-2xl font-bold text-yellow-500">%</span>
            <span class="absolute top-[20%] right-[5%] z-0 text-xl font-bold text-yellow-500">%</span>
            <!-- Karakter Anak Laki-Laki (Kiri) -->
            <img
                src="{{asset('gambar/pembukaan/cowok.webp')}}"
                alt="Anak Laki-laki"
                class="z-10 ml-[-15px] h-44  object-contain sm:h-52"
            />
            <!-- Karakter Anak Perempuan (Kanan) -->
            <img
                src="{{asset('gambar/pembukaan/cewek.webp')}}"
                alt="Anak Perempuan"
                class="z-10 mr-[-10px] h-44 object-contain sm:h-52"
            />
            <!-- Pengserut Hijau (Kanan Tengah) -->
            <div class="absolute top-[15%] right-0 z-0 rotate-12 transform">
                <svg class="h-10 w-10" viewBox="0 0 100 100" fill="none">
                    <rect x="15" y="20" width="70" height="60" rx="10" fill="#10b981" stroke="#000" stroke-width="4"/>
                    <circle cx="50" cy="50" r="16" fill="#fff" stroke="#000" stroke-width="4"/>
                </svg>
            </div>
        </div>
        <!-- Bottom Decorative Elements -->
        <div class="relative z-10 -mb-2 flex w-full items-end justify-between">
            <!-- Pensil (Kiri Bawah) -->
            <div class="ml-[-20px] -rotate-45 transform">
                <svg class="h-16 w-16" viewBox="0 0 100 100">
                    <rect x="20" y="40" width="60" height="20" fill="#f59e0b" stroke="#000" stroke-width="3"/>
                    <polygon points="80,40 100,50 80,60" fill="#fde047" stroke="#000" stroke-width="3"/>
                    <polygon points="92,46 100,50 92,54" fill="#000"/>
                    <rect x="5" y="40" width="15" height="20" rx="3" fill="#ec4899" stroke="#000" stroke-width="3"/>
                </svg>
            </div>
            <!-- Botol Lem (Kanan Bawah) -->
            <div class="mr-[-10px] rotate-12 transform">
                <svg class="h-14 w-14" viewBox="0 0 100 100">
                    <rect x="25" y="35" width="50" height="55" rx="8" fill="#ffffff" stroke="#000" stroke-width="4"/>
                    <polygon points="40,35 50,10 60,35" fill="#a855f7" stroke="#000" stroke-width="4"/>
                    <circle cx="50" cy="62" r="12" fill="#a855f7" stroke="#000" stroke-width="3"/>
                </svg>
            </div>
        </div>
    </div>
</x-layout-game>
