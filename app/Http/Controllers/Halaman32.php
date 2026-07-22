<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman32 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman32();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
            halaman: 32,
            object: 'Mountain',
            iconText: '🏔️',
            judul: 'Halaman 32 - Mountain 🏔️',
            deskripsi: 'Learn about mountains and the beauty of nature around them.',
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
    public function getDataPublicHalaman32(): array
    {
        $items = [
            [
                'id' => 1,
                'text' => 'Mountain',
                'audio' => asset('audio/Halaman 32/gunung.m4a'),
            ],
            [
                'id' => 2,
                'text' => 'A tall mountain rises upward.',
                'audio' => asset('audio/Halaman 32/definisi gunung.m4a'),
            ],
            [
                'id' => 3,
                'text' => 'An eagle flies above the mountain.',
                'audio' => asset('audio/Halaman 32/definisi gunung.m4a'),
            ],
            [
                'id' => 4,
                'text' => 'At night, the moon rises above the mountain peak.',
                'audio' => asset('audio/Halaman 32/definisi gunung.m4a'),
            ],
            [
                'id' => 5,
                'text' => 'Mountains have large rocks.',
                'audio' => asset('audio/Halaman 32/definisi gunung.m4a'),
            ],
            [
                'id' => 6,
                'text' => 'People climb mountains to enjoy the view.',
                'audio' => asset('audio/Halaman 32/definisi gunung.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
