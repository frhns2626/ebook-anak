<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;
use Illuminate\Http\Request;

class Halaman31 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {

        return $this->deskripsiObject(
            data: $this->getDataPublicHalaman31(),
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
                'id' => 'gunung',
                'emoji' => asset('gambar/halaman_31-32/gunung.webp'),
                'audio' => asset('audio/id/Halaman 31/objek.wav'),
                'texts' => [
                    ['text' => 'Gunung tinggi menjulang ke atas.', 'audio' => asset('audio/id/Halaman 31/text1.wav')],
                    ['text' => 'Seekor burung elang terbang di atas gunung.', 'audio' => asset('audio/id/Halaman 31/text2.wav')],
                    ['text' => 'Di malam hari, bulan terbit di atas puncak gunung.', 'audio' => asset('audio/id/Halaman 31/text3.wav')],
                    ['text' => 'Gunung memiliki batu besar.', 'audio' => asset('audio/id/Halaman 31/text4.wav')],
                    ['text' => 'Mendaki gunung untuk menikmati pemandangan.', 'audio' => asset('audio/id/Halaman 31/text5.wav')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
