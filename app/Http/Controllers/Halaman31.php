<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman31 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman31();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
            halaman: 31,
            object: 'Gunung',
            iconText: '🏔️',
            judul: 'Halaman 31 - Gunung 🏔️',
            deskripsi: 'Belajar mengenal gunung dan keindahan alam di sekitarnya.',
        );
    }

    /**
     * @return array{
     *     items: list<array{
     *         id: int,
     *         text: string,
     *         audio: string
     *     }>,
     *     total_item: int
     * }
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman31(): array
    {
        $items = [
            [
                'id' => 1,
                'text' => 'Gunung',
                'audio' => asset('audio/Halaman 31/Halaman 31.m4a'),
            ],
            [
                'id' => 2,
                'text' => 'Gunung tinggi menjulang ke atas.',
                'audio' => asset('audio/Halaman 31/Halaman 31.m4a'),
            ],
            [
                'id' => 3,
                'text' => 'Seekor burung elang terbang di atas gunung.',
                'audio' => asset('audio/Halaman 31/Halaman 31.m4a'),
            ],
            [
                'id' => 4,
                'text' => 'Di malam hari, bulan terbit di atas puncak gunung.',
                'audio' => asset('audio/Halaman 31/Halaman 31.m4a'),
            ],
            [
                'id' => 5,
                'text' => 'Gunung memiliki batu besar.',
                'audio' => asset('audio/Halaman 31/Halaman 31.m4a'),
            ],
            [
                'id' => 6,
                'text' => 'Mendaki gunung untuk menikmati pemandangan.',
                'audio' => asset('audio/Halaman 31/Halaman 31.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
