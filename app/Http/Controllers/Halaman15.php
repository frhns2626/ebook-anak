<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman15 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman15();

        return $this->hubungkanAudioDanGambar(
            data: $data,
            items: $data['items'],
            halaman: 15,
            judul: 'Halaman 15 - Hubungkan Audio & Gambar 🎧🖼️',
            deskripsi: 'Dengarkan audio, lalu pilih gambar yang sesuai!'

        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman15(): array
    {
        /**
         * D:\_kerja\php\ebook-anak\public\audio\Halaman 15
         * ├── 1. kacamata.m4a
         * ├── 2. timun.m4a
         * ├── 3. kuda.m4a
         * ├── 4. terong.m4a
         * ├── 5. rusa.m4a
         * └── halaman 15.m4a
         *
         * Cara bermain:
         * - Tekan tombol Putar Audio.
         * - Dengarkan nama benda atau hewan yang disebutkan.
         * - Ketuk gambar yang benar.
         * - Jika benar, kamu akan mendapat skor.
         */
        $items = [
            ['id' => 'kacamata',
                'name' => 'Kacamata',
                'emoji' => '👓',
                'hint' => 'Kacamata membantu kita melihat lebih jelas!',
                'color' => 'hover:border-blue-200',
                'bg' => 'bg-blue-100 text-blue-600',
                'audio' => asset('audio/Halaman 15/1. kacamata.m4a')],
            ['id' => 'timun',
                'name' => 'Timun',
                'emoji' => '🥒',
                'hint' => 'Timun adalah sayur hijau yang segar!',
                'color' => 'hover:border-green-200',
                'bg' => 'bg-green-100 text-green-600',
                'audio' => asset('audio/Halaman 15/2. timun.m4a')],
            ['id' => 'kuda',
                'name' => 'Kuda',
                'emoji' => '🐴',
                'hint' => 'Kuda adalah hewan peliharaan yang kuat!',
                'color' => 'hover:border-amber-200',
                'bg' => 'bg-amber-100 text-amber-600',
                'audio' => asset('audio/Halaman 15/3. kuda.m4a')],
            ['id' => 'terong',
                'name' => 'Terong',
                'emoji' => '🍆',
                'hint' => 'Terong adalah sayur berwarna ungu!',
                'color' => 'hover:border-purple-200',
                'bg' => 'bg-purple-100 text-purple-600',
                'audio' => asset('audio/Halaman 15/4. terong.m4a')],
            ['id' => 'rusa',
                'name' => 'Rusa',
                'emoji' => '🦌',
                'hint' => 'Rusa adalah hewan yang indah dengan tanduk!',
                'color' => 'hover:border-orange-200',
                'bg' => 'bg-orange-100 text-orange-600',
                'audio' => asset('audio/Halaman 15/5. rusa.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
