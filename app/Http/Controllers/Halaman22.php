<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman22 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->cariHurufPertama(
            data: $this->getDataPublicHalaman22(),
            halaman: 22,
            judul: 'Halaman 22 - Tebak Huruf Depan 🔤',
            deskripsi: 'Lihat gambarnya, tebak huruf depannya!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman22(): array
    {
        $items = [
            [
                'id' => 'Kelinci',
                'emoji' => asset('gambar/halaman_22/kelinci.webp'),
                'audio' => asset('audio/id/Halaman 22/kelinci.wav'),
                'options' => [
                    ['letter' => 'k', 'correct' => true],
                    ['letter' => 'b', 'correct' => false],
                    ['letter' => 'c', 'correct' => false],
                ],
            ],
            [
                'id' => 'Jagung',
                'emoji' => asset('gambar/halaman_22/jagung.webp'),
                'audio' => asset('audio/id/Halaman 22/jagung.wav'),
                'options' => [
                    ['letter' => 'i', 'correct' => false],
                    ['letter' => 'j', 'correct' => true],
                    ['letter' => 'l', 'correct' => false],
                ],
            ],
            [
                'id' => 'Alpukat',
                'emoji' => asset('gambar/halaman_22/alpukat.webp'),
                'audio' => asset('audio/id/Halaman 22/alpukat.wav'),
                'options' => [
                    ['letter' => 'u', 'correct' => false],
                    ['letter' => 'h', 'correct' => false],
                    ['letter' => 'a', 'correct' => true],
                ],
            ],
            [
                'id' => 'Bebek',
                'emoji' => asset('gambar/halaman_22/bebek.webp'),
                'audio' => asset('audio/id/Halaman 22/bebek.wav'),
                'options' => [
                    ['letter' => 'a', 'correct' => false],
                    ['letter' => 'b', 'correct' => true],
                    ['letter' => 'd', 'correct' => false],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
