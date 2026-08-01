<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kata Pengantar</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Pattern background mirip kertas milimeter/grid biru */
        .bg-grid-pattern {
            background-color: #dbeafe;
            background-image:
                linear-gradient(to right, #bfdbfe 1px, transparent 1px),
                linear-gradient(to bottom, #bfdbfe 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="bg-grid-pattern flex min-h-screen items-center justify-center p-4 md:p-8">
    <!-- Container Utama / Lembaran Putih -->
    <div class="relative w-full max-w-2xl rounded-[2.5rem] border border-gray-100 bg-white px-8 pt-16 pb-12 text-gray-800 shadow-xl">
        <!-- Lencana Judul (Kata Pengantar) -->
        <div class="absolute -top-7 left-1/2 -translate-x-1/2 rounded-2xl border border-gray-100 bg-white px-8 py-2 shadow-md">
            <h1 class="text-2xl font-extrabold tracking-wide text-black md:text-3xl">Kata Pengantar</h1>
        </div>

        <!-- Isi Paragraf -->
        <div class="space-y-4 text-justify text-sm leading-relaxed font-normal md:text-base">
            <p>
                Puji Syukur penulis panjatkan kehadirat Allah SWT, dengan ketekunan dan kerja keras sehingga buku
                panduan membaca ini dapat diselesaikan. Buku ini ditulis khusus untuk menciptakan pengalaman membaca
                yang menyenangkan bagi anak usia dini. Melalui visualisai berwarna dan interaktif, penulis berharap
                dapat membangkitkan minat baca sejak dini, membentuk dasar yang kokoh untuk perkembangan literasi yang
                berkelanjutan.
            </p>

            <p>
                Buku panduan membaca ini dilengkapi dengan gambar yang menarik sehingga dapat memudahkan anak untuk
                memahami setiap huruf dan kata. Sumber utama dalam pembuatan buku panduan membaca ini melibatkan
                penelitian mendalam, konsultasi dengan ahli pendidikan, dan penggunaan metode fonik. Proses ini
                bertujuan untuk menyajikan buku panduan membaca yang mudah dipahami, dan sesuai dengan kebutuhan
                perkembangan membaca anak.
            </p>

            <p>
                Buku panduan ini dapat digunakan untuk anak mulai usia tiga tahun, dan dapat dimanfaatkan secara efektif
                jika anak berada dalam kondisi senang, tanpa paksaan, dan tidak ada tekanan. Karena buku panduan membaca
                ini disertai dengan elemen kreatif dan interaktif sehingga membuat proses pembelajaran lebih
                menyenangkan.
            </p>

            <p>
                Dengan berbagai keunggulannya, penulis berharap buku panduan ini dapat bermanfaat dan berkontribusi
                lebih untuk menambah khazanah literasi anak dengan cara yang menyenangkan. Karya ini mencerminkan
                langkah-langkah kecil yang diambil sebagai bagian dari upaya pengabdian. Setiap langkah menunjukkan
                komitmen untuk memberikan kontribusi positif, meskipun dalam bentuk yang sederhana, demi mencapai tujuan
                pengabdian yang lebih besar.
            </p>
        </div>

        <!-- Tanda Tangan / Tanggal -->
        <div class="mt-8 text-right text-sm font-normal md:text-base">
            <p>Jepara, Juni 2026</p>
            <p class="mt-1 font-bold text-black">Penulis</p>
        </div>
    </div>
</body>
</html>
