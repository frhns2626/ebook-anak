<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman33 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        return $this->cariKataGame(
            data: $this->getDataPublicHalaman33(),
            halaman: 33,
            judul: 'Halaman 33 - Cari Kata 🔍',
            deskripsi: 'Temukan kata yang tersembunyi!'
        );
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman33(): array
    {
        $items = [
            [
                'id' => 'Meja',
                'emoji' => asset('gambar/halaman_33/meja.webp'),
                'audio' => asset('audio/id/Halaman 33/meja.wav'),

            ],
            [
                'id' => 'Kue',
                'emoji' => asset('gambar/halaman_33/kue.webp'),
                'audio' => asset('audio/id/Halaman 33/kue.wav'),

            ],
            [
                'id' => 'Buku',
                'emoji' => asset('gambar/halaman_33/buku.webp'),
                'audio' => asset('audio/id/Halaman 33/buku.wav'),

            ],
            [
                'id' => 'Udang',
                'emoji' => asset('gambar/halaman_33/udang.webp'),
                'audio' => asset('audio/id/Halaman 33/udang.wav'),

            ],
            [
                'id' => 'Sapi',
                'emoji' => asset('gambar/halaman_33/sapi.webp'),
                'audio' => asset('audio/id/Halaman 33/sapi.wav'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
