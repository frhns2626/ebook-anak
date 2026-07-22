<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman21 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman21();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
            halaman: 21,
            object: 'Rhino',
            iconText: '🦏',
            judul: 'Halaman 21 - Rhino 🦏',
            deskripsi: 'Learn about rhinos and their unique features.',
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
    public function getDataPublicHalaman21(): array
    {
        $items = [
            [
                'id' => 1,
                'text' => 'Badak',
                'audio' => asset('audio/Halaman 21/badak.m4a'),
            ],
            [
                'id' => 2,
                'text' => 'A rhinoceros is a large and strong animal.',
                'audio' => asset('audio/Halaman 21/definisi badak.m4a'),
            ],
            [
                'id' => 3,
                'text' => 'A rhinoceros has thick and tough skin.',
                'audio' => asset('audio/Halaman 21/definisi badak.m4a'),
            ],
            [
                'id' => 4,
                'text' => 'A rhinoceros has a horn on its nose.',
                'audio' => asset('audio/Halaman 21/definisi badak.m4a'),
            ],
            [
                'id' => 5,
                'text' => 'A rhinoceros likes to eat grass.',
                'audio' => asset('audio/Halaman 21/definisi badak.m4a'),
            ],
            [
                'id' => 6,
                'text' => 'A rhinoceros likes to wallow in the mud.',
                'audio' => asset('audio/Halaman 21/definisi badak.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
