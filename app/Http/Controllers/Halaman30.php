<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman30 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->tulisKata(
            data: $this->getDataPublicHalaman30(),
            halaman: 30,
            judul: 'Halaman 30 - Baca dan Tulis Kembali',
            deskripsi: 'Baca suku katanya, lalu tulis kembali kata utuhnya!');
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman30(): array
    {
        /**
         * audio file (D:\_kerja\php\ebook-anak\public\audio\Halaman 29 -30\5. buaya.m4a)
         * Halaman 29 -30/
         * ├── 1. tomat.m4a
         * ├── 2. payung.m4a
         * ├── 3. kelinci.m4a
         * ├── 4. bola.m4a
         * ├── 5. buaya.m4a
         * ├── 6. donat.m4a
         * ├── 7 jerapah.m4a
         * ├── halaman 29.m4a
         * └── halaman 30.m4a
         */
        $items = [
            ['id' => 'Bola', 'emoji' => asset('gambar/halaman_30/bola.webp'), 'audio' => asset('audio/id/Halaman 30/bola.wav')],
            ['id' => 'Buaya', 'emoji' => asset('gambar/halaman_30/buaya.webp'), 'audio' => asset('audio/id/Halaman 30/buaya.wav')],
            ['id' => 'Donat', 'emoji' => asset('gambar/halaman_30/donat.webp'), 'audio' => asset('audio/id/Halaman 30/donat.wav')],
            ['id' => 'Jerapah', 'emoji' => asset('gambar/halaman_30/jerapah.webp'), 'audio' => asset('audio/id/Halaman 30/jerapah.wav')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
