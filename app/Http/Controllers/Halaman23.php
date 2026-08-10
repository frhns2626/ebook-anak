<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman23 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {

        return $this->deskripsiObject(
            data: $this->getDataPublicHalaman23(),
            halaman: 23,
            object: 'Wortel',
            iconText: '🥕',
            judul: 'Halaman 23 - Wortel 🥕',
            deskripsi: 'Belajar mengenal wortel dan manfaatnya bagi kesehatan.',
        );
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman23(): array
    {$items = [
        [
            'id' => 'wortel',
            'emoji' => asset('gambar/halaman_23-24/wortel.webp'),
            'audio' => asset('audio/id/Halaman 23/objeck.wav'),
            'texts' => [
                ['text' => 'Wortel berwarna oranye.', 'audio' => asset('audio/id/Halaman 23/text1.wav')],
                ['text' => 'Paman menanam wortel di kebun.', 'audio' => asset('audio/id/Halaman 23/text2.wav')],
                ['text' => 'Mama membuat jus wortel di dapur.', 'audio' => asset('audio/id/Halaman 23/text3.wav')],
                ['text' => 'Wortel mengandung vitamin A.', 'audio' => asset('audio/id/Halaman 23/text4.wav')],
                ['text' => 'Wortel membantu mata kita tetap sehat.', 'audio' => asset('audio/id/Halaman 23/text5.wav')],
            ],
        ],
    ];
        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
