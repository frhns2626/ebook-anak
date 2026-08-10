<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman20 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {

        return $this->deskripsiObject(
            data: $this->getDataPublicHalaman20(),
            halaman: 20,
            object: 'Badak',
            iconText: '🦏',
            judul: 'Badak - Hewan Bertanduk Kuat',   // More specific
            deskripsi: 'Pelajari fakta menarik tentang Badak!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman20(): array
    {
        $items = [
            [
                'id' => 'badak',
                'emoji' => asset('gambar/halaman_20-21/badak.webp'),
                'audio' => asset('audio/id/Halaman 20/object.wav'),
                'texts' => [
                    ['text' => 'Badak adalah hewan besar dan kuat.', 'audio' => asset('audio/id/Halaman 20/text1.wav')],
                    ['text' => 'Badak memiliki kulit yang tebal dan keras.', 'audio' => asset('audio/id/Halaman 20/text2.wav')],
                    ['text' => 'Badak memiliki tanduk di hidung.', 'audio' => asset('audio/id/Halaman 20/text3.wav')],
                    ['text' => 'Badak suka makan rumput.', 'audio' => asset('audio/id/Halaman 20/text4.wav')],
                    ['text' => 'Badak suka berendam di lumpur.', 'audio' => asset('audio/id/Halaman 20/text5.wav')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
