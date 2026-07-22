<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman23 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman23();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
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
    {
        $items = [
            [
                'id' => 1,
                'text' => 'Wortel',
                'audio' => asset('audio/Halaman 23/Halaman 23.m4a'),
            ],
            [
                'id' => 2,
                'text' => 'Wortel berwarna oranye.',
                'audio' => asset('audio/Halaman 23/Halaman 23.m4a'),
            ],
            [
                'id' => 3,
                'text' => 'Paman menanam wortel di kebun.',
                'audio' => asset('audio/Halaman 23/Halaman 23.m4a'),
            ],
            [
                'id' => 4,
                'text' => 'Mama membuat jus wortel di dapur.',
                'audio' => asset('audio/Halaman 23/Halaman 23.m4a'),
            ],
            [
                'id' => 5,
                'text' => 'Wortel mengandung vitamin A.',
                'audio' => asset('audio/Halaman 23/Halaman 23.m4a'),
            ],
            [
                'id' => 6,
                'text' => 'Wortel membantu mata kita tetap sehat.',
                'audio' => asset('audio/Halaman 23/Halaman 23.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
