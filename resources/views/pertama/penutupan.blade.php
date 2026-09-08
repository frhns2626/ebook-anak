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
    </style>
    <body
        class="bg-grid-pattern flex min-h-screen items-start justify-center p-4"
    >
        <div
            class="relative flex w-full max-w-xl flex-col justify-between gap-10 overflow-auto"
        >
            <img
                src="{{ asset('gambar/pembukaan/penutup.webp') }}"
                alt="penutupan"
            />
        </div>
    </body>
</x-layout-game>
