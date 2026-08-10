<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman27 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->sukuBerakhiran(
            data: $this->getDataPublicHalaman27(),
            halaman: 27,
            judul: 'Halaman 27 - Bakso & Panci 🍜',
            deskripsi: 'Mengenal macam-macam!'
        );
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman27(): array
    {
        $items = [
            [
                'masterPola' => 'mb mp nd nt ks',
                'audio' => asset('audio/id/Halaman 27/mb.wav'),
                'items' => [
                    ['id' => 'Bambu', 'emoji' => asset('gambar/halaman_27/bambu.webp'), 'audio' => asset('audio/id/Halaman 27/bambu.wav')],
                    ['id' => 'Pompa', 'emoji' => asset('gambar/halaman_27/pompa.webp'), 'audio' => asset('audio/id/Halaman 27/pompa.wav')],
                    ['id' => 'Landak', 'emoji' => asset('gambar/halaman_27/landak.webp'), 'audio' => asset('audio/id/Halaman 27/landak.wav')],
                    ['id' => 'Bantal', 'emoji' => asset('gambar/halaman_27/bantal.webp'), 'audio' => asset('audio/id/Halaman 27/bantal.wav')],
                    ['id' => 'Bakso', 'emoji' => asset('gambar/halaman_27/bakso.webp'), 'audio' => asset('audio/id/Halaman 27/bakso.wav')],
                ],
            ],
            [
                'masterPola' => 'nc nj rb rt kt',
                'audio' => asset('audio/id/Halaman 27/nc.wav'),
                'items' => [
                    ['id' => 'Panci', 'emoji' => asset('gambar/halaman_27/panci.webp'), 'audio' => asset('audio/id/Halaman 27/panci.wav')],
                    ['id' => 'Banjir', 'emoji' => asset('gambar/halaman_27/banjir.webp'), 'audio' => asset('audio/id/Halaman 27/banjir.wav')],
                    ['id' => 'Barbel', 'emoji' => asset('gambar/halaman_27/bakso.webp'), 'audio' => asset('audio/id/Halaman 27/bakso.wav')],
                    ['id' => 'Kertas', 'emoji' => asset('gambar/halaman_27/kertas.webp'), 'audio' => asset('audio/id/Halaman 27/kertas.wav')],
                    ['id' => 'Dokter', 'emoji' => asset('gambar/halaman_27/dokter.webp'), 'audio' => asset('audio/id/Halaman 27/dokter.wav')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
