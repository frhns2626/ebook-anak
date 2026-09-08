<x-layout-game title="Penutupan" halaman="0">
    <style>
        /* Pattern grid background */
        .bg-grid-pattern {
            background-color: #ffffff;
            background-image:
                linear-gradient(to right, #bfdbfe 1px, transparent 1px),
                linear-gradient(to bottom, #bfdbfe 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Bentuk latar belakang abstrak */
        .bg-blob-top-left {
            width: 220px;
            height: 120px;
            background-color: #93c5fd;
            /* Soft Blue */
            border-radius: 0 0 80% 50%;
        }

        .bg-blob-bottom-pink {
            width: 200px;
            height: 180px;
            background-color: #fbcfe8;
            /* Soft Pink */
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
    <div
        class="relative flex aspect-[1/1.41] w-full max-w-xl flex-col justify-between overflow-hidden"
    >
        <!-- Abstract Background Blobs -->
        <div class="bg-blob-top-left absolute -top-10 -left-10 z-0"></div>
        <div
            class="bg-blob-bottom-pink absolute -right-10 -bottom-10 z-0"
        ></div>
        <div class="bg-blob-bottom-blue absolute -bottom-10 -left-10 z-0"></div>
    </div>
</x-layout-game>
