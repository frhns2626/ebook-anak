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
            items: $this->getDataPublicHalaman33()['items'],
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
                'id' => 'meja',
                'name' => 'Meja',
                'emoji' => '🪑',
                'hint' => 'Meja adalah tempat untuk meletakkan berbagai barang.',
                'audio' => asset('audio/Halaman 33/1. meja.m4a'),
            ],
            [
                'id' => 'kue',
                'name' => 'Kue',
                'emoji' => '🎂',
                'hint' => 'Kue adalah makanan manis yang enak dimakan.',
                'audio' => asset('audio/Halaman 33/2. kue.m4a'),
            ],
            [
                'id' => 'buku',
                'name' => 'Buku',
                'emoji' => '📚',
                'hint' => 'Buku digunakan untuk membaca dan belajar.',
                'audio' => asset('audio/Halaman 33/3. buku.m4a'),
            ],
            [
                'id' => 'udang',
                'name' => 'Udang',
                'emoji' => '🦐',
                'hint' => 'Udang adalah hewan yang hidup di air.',
                'audio' => asset('audio/Halaman 33/4. udang.m4a'),
            ],
            [
                'id' => 'sapi',
                'name' => 'Sapi',
                'emoji' => '🐄',
                'hint' => 'Sapi adalah hewan ternak yang memakan rumput.',
                'audio' => asset('audio/Halaman 33/5. sapi.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
