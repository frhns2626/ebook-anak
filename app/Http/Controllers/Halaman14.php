<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman14 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman14();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
            halaman: 14,
            object: 'Ball',
            iconText: '⚽',
            judul: 'Halaman 14 - Ball ⚽',
            deskripsi: 'Learn about balls and the different games they are used for.',
        );
    }

    /**
     * @return array{
     *     items: list<array{
     *         id: int,
     *         text: string,
     *         audio: string
     *     }>,
     *     total_item: positive-int
     * }
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman14(): array
    {
        $items = [
            [
                'id' => 1,
                'text' => 'Ball',
                'audio' => asset('audio/Halaman 14/bola.m4a'),
            ],
            [
                'id' => 2,
                'text' => 'A small ball slides across the table.',
                'audio' => asset('audio/Halaman 14/definisi bola.m4a'),
            ],
            [
                'id' => 3,
                'text' => 'The soccer ball is guarded by the goalkeeper in the goal.',
                'audio' => asset('audio/Halaman 14/definisi bola.m4a'),
            ],
            [
                'id' => 4,
                'text' => 'The basketball is thrown into the high hoop.',
                'audio' => asset('audio/Halaman 14/definisi bola.m4a'),
            ],
            [
                'id' => 5,
                'text' => 'Little brother likes playing with a plastic ball.',
                'audio' => asset('audio/Halaman 14/definisi bola.m4a'),
            ],
            [
                'id' => 6,
                'text' => 'The tennis ball is hit with the racket.',
                'audio' => asset('audio/Halaman 14/definisi bola.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
