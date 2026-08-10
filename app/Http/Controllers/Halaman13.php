<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman13 extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {

        return $this->deskripsiObject(
            data: $this->getDataPublicHalaman13(),
            halaman: 13,
            object: 'Bola',
            iconText: '⚽',
            judul: 'Bola - Benda Bulat untuk Bermain',
            deskripsi: 'Pelajari fakta menarik tentang Bola!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman13(): array
    {
        /**
         * Halaman 13/
         * ├── objek.wav
         * ├── pembuka.wav
         * ├── text1.wav
         * ├── text2.wav
         * ├── text3.wav
         * ├── text4.wav
         * └── text5.wav
         */
        $items = [
            [
                'id' => 'bola',
                'emoji' => asset('gambar/halaman_13-14/bola.webp'),
                'audio' => asset('audio/id/Halaman 13/objek.wav'),
                'texts' => [
                    ['text' => 'Bola kecil meluncur di atas meja.', 'audio' => asset('audio/id/Halaman 13/text1.wav')],
                    ['text' => 'Bola sepak dijaga oleh kiper di gawang.', 'audio' => asset('audio/id/Halaman 13/text2.wav')],
                    ['text' => 'Bola basket dilempar ke keranjang tinggi.', 'audio' => asset('audio/id/Halaman 13/text3.wav')],
                    ['text' => 'Adik suka memainkan bola plastik.', 'audio' => asset('audio/id/Halaman 13/text4.wav')],
                    ['text' => 'Bola tenis dipukul dengan raket.', 'audio' => asset('audio/id/Halaman 13/text5.wav')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
