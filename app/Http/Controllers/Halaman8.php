<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman8 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        return $this->hubungkanGame(
            data: $this->getDataPublicHalaman8(),
            halaman: 8,
            judul: 'Halaman 8 - Mencocokkan Huruf & Hewan',
            deskripsi: 'Ayo cocokkan huruf dengan nama hewan yang sesuai!'

        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman8(): array
    {
        /** @var list<array{
         * id: string,
         * letter: string,
         * name: string,
         * emoji: string,
         * hint: string,
         * audio: string
         * }> $items
         */
        $items = [
            [
                'id' => 'Bebek',
                'letter' => 'Bb',
                'emoji' => asset('gambar/halaman_8/bebek.webp'),
                'audio' => asset('audio/Halaman 8/1. bebek.m4a'),
            ],
            [
                'id' => 'Kucing',
                'letter' => 'Kk',
                'emoji' => asset('gambar/halaman_8/kucing.webp'),
                'audio' => asset('audio/Halaman 8/2. kucing.m4a'),
            ],
            [
                'id' => 'Gurita',
                'letter' => 'Gg',
                'emoji' => asset('gambar/halaman_8/gurita.webp'),
                'audio' => asset('audio/Halaman 8/3. gurita.m4a'),
            ],
            [
                'id' => 'Hiu',
                'letter' => 'Hh',
                'emoji' => asset('gambar/halaman_8/hiu.webp'),
                'audio' => asset('audio/Halaman 8/4 .hiu.m4a'),
            ],
        ];

        return [
            'audio' => asset('audio/Halaman 8/halaman 8 bhs. indonesia.m4a'),
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
