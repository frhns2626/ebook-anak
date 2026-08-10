<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman19 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->sukuBerakhiran(
            data: $this->getDataPublicHalaman19(),
            halaman: 19,
            judul: 'Halaman 19 - Suku Kata Berakhiran -L 🦎',
            deskripsi: 'Cocokkan kata dengan akhiran konsonan matinya!'
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman19(): array
    {
        /**
         * Latihan Membaca Suku Kata Tertutup (konsonan mati -L)
         * Pola: al, il, ul, el, ol
         *   al → Ka-dal 🦎 | il → Mo-bil 🚗 | ul → Cang-kul 🌾 | el → A-pel 🍎 | ol → Bo-tol 🍾
         */
        $items = [
            [
                'masterPola' => 'al el il ol ul',
                'audio' => asset('audio/en/halaman 16-19/halaman 19.m4a'),
                'items' => [
                    ['id' => 'Kadal', 'emoji' => asset('gambar/halaman_19/kadal.webp'), 'ending' => 'al', 'audio' => asset('audio/en/halaman 16-19/halaman 19 kadal.m4a')],
                    ['id' => 'Apel', 'emoji' => asset('gambar/halaman_19/apel.webp'), 'ending' => 'el', 'audio' => asset('audio/en/halaman 16-19/halaman 19. apel.m4a')],
                    ['id' => 'Mobil', 'emoji' => asset('gambar/halaman_19/mobil.webp'), 'ending' => 'il', 'audio' => asset('audio/en/halaman 16-19/halaman 19. mobil.m4a')],
                    ['id' => 'Botol', 'emoji' => asset('gambar/halaman_19/botol.webp'), 'ending' => 'ol', 'audio' => asset('audio/en/halaman 16-19/halaman 19. botol.m4a')],
                    ['id' => 'Cangkul', 'emoji' => asset('gambar/halaman_19/cangkul.webp'), 'ending' => 'ul', 'audio' => asset('audio/en/halaman 16-19/halaman 19. cangkul.m4a')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
