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

        return $this->deskripsiObject(
            data:  $this->getDataPublicHalaman32(),
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
                'id' => 'mountain',
                'emoji' => asset('gambar/halaman_31-32/gunung.webp'),
                'audio' => asset('audio/en/Halaman 32/gunung.m4a'),
                'texts' => [
                    ['text' => 'A tall mountain rises upward.', 'audio' => asset('audio/id/Halaman 32/text1.wav')],
                    ['text' => 'An eagle flies above the mountain.', 'audio' => asset('audio/id/Halaman 32/text2.wav')],
                    ['text' => 'At night, the moon rises above the mountain peak.', 'audio' => asset('audio/id/Halaman 32/text3.wav')],
                    ['text' => 'Mountains have large rocks.', 'audio' => asset('audio/id/Halaman 32/text4.wav')],
                    ['text' => 'People climb mountains to enjoy the view.', 'audio' => asset('audio/id/Halaman 32/text5.wav')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
