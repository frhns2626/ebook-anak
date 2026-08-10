<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;

class Halaman25 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function index(): View
    {

        return $this->hubungkanTulisGame(
            data: $this->getDataPublicHalaman25(),
            halaman: 25,
            judul: 'Halaman 25 - Mencocokan Dan Menulis',
            deskripsi: 'Mengenal macam-macam!',
        );
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman25(): array
    {
        /** @var list<array{
         *     id: string,
         *     emoji: string,
         *     audio: string,
         * }> $items
         */
        $items = [
            [
                'id' => 'Robot',
                'emoji' => asset('gambar/halaman_25/robot.webp'),
                'audio' => asset('audio/en/Halaman 25/1. robot.m4a'),
            ],
            [
                'id' => 'Lilin',
                'emoji' => asset('gambar/halaman_25/lilin.webp'),
                'audio' => asset('audio/en/Halaman 25/2. lilin.m4a'),
            ],
            [
                'id' => 'Mobil',
                'emoji' => asset('gambar/halaman_25/mobil.webp'),
                'audio' => asset('audio/en/Halaman 25/3. mobil.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
