<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman29 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->melengkapiSukukata(
            data: $this->getDataPublicHalaman29(),
            halaman: 29,
            judul: 'Halaman 29 - Melengkapi kata',
            deskripsi: 'Mengenal macam-macam suku kata!');
    }

    /**
     * @throws BindingResolutionException
     */

        public function getDataPublicHalaman29(): array
    {
        $items = [
            [   'id' => 'Tomat',
                'emoji' => asset('gambar/halaman_29/tomat.webp'),
                'audio' => asset('audio/id/Halaman 29/tomat.wav')
            ],
            [   'id' => 'Kelinci',
                'emoji' => asset('gambar/halaman_29/kelinci.webp'),
                'audio' => asset('audio/id/Halaman 29/kelinci.wav')
            ],
            [   'id' => 'Payung',
                'emoji' => asset('gambar/halaman_29/payung.webp'),
                'audio' => asset('audio/id/Halaman 29/payung.wav')
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];

    }
}
