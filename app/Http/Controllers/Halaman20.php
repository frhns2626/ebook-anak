<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman20 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman20();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
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
                'id' => 1,
                'text' => 'Badak',
                'audio' => asset('audio/Halaman 20/Halaman 20.m4a'),
            ],
            [
                'id' => 2,
                'text' => 'Badak adalah hewan besar dan kuat.',
                'audio' => asset('audio/Halaman 20/Halaman 20.m4a'),
            ],
            [
                'id' => 3,
                'text' => 'Badak memiliki kulit yang tebal dan keras.',
                'audio' => asset('audio/Halaman 20/Halaman 20.m4a'),
            ],
            [
                'id' => 4,
                'text' => 'Badak memiliki tanduk di hidung.',
                'audio' => asset('audio/Halaman 20/Halaman 20.m4a'),
            ],
            [
                'id' => 5,
                'text' => 'Badak suka makan rumput.',
                'audio' => asset('audio/Halaman 20/Halaman 20.m4a'),
            ],
            [
                'id' => 6,
                'text' => 'Badak suka berendam di lumpur.',
                'audio' => asset('audio/Halaman 20/Halaman 20.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
