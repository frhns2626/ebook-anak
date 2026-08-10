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

        return $this->hubungkanAudioDanGambar(
            data: $this->getDataPublicHalaman15(),
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
         */
        $items = [
            [
                'id' => 'kacamata',
                'emoji' => asset('gambar/halaman_15/kacamata.webp'),
                'audio' => asset('audio/en/Halaman 15/1. kacamata.m4a'),
            ],
            [
                'id' => 'timun',
                'emoji' => asset('gambar/halaman_15/timun.webp'),
                'audio' => asset('audio/en/Halaman 15/2. timun.m4a'),
            ],
            [
                'id' => 'kuda',
                'emoji' => asset('gambar/halaman_15/kuda.webp'),
                'audio' => asset('audio/en/Halaman 15/3. kuda.m4a'),
            ],
            [
                'id' => 'terong',
                'emoji' => asset('gambar/halaman_15/terong.webp'),
                'audio' => asset('audio/en/Halaman 15/4. terong.m4a'),
            ],
            [
                'id' => 'rusa',
                'emoji' => asset('gambar/halaman_15/rusa.webp'),
                'audio' => asset('audio/en/Halaman 15/5. rusa.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
