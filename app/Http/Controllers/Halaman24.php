<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman24 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman24();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
            halaman: 24,
            object: 'Carrot',
            iconText: '🥕',
            judul: 'Halaman 24 - Carrot 🥕',
            deskripsi: 'Learn about carrots and why they are good for you.',
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
    public function getDataPublicHalaman24(): array
    {
        /**
         * @var list<array{
         *     id: int,
         *     text: string,
         *     audio: string
         * }> $items
         */
        $items = [
            [
                'id' => 1,
                'text' => 'Carrot',
                'audio' => asset('audio/Halaman 24/wortel.m4a'),
            ],
            [
                'id' => 2,
                'text' => 'Carrots are orange.',
                'audio' => asset('audio/Halaman 24/definisi wortel.m4a'),
            ],
            [
                'id' => 3,
                'text' => 'My uncle plants carrots in the garden.',
                'audio' => asset('audio/Halaman 24/definisi wortel.m4a'),
            ],
            [
                'id' => 4,
                'text' => 'Mom makes carrot juice in the kitchen.',
                'audio' => asset('audio/Halaman 24/definisi wortel.m4a'),
            ],
            [
                'id' => 5,
                'text' => 'Carrots contain vitamin A.',
                'audio' => asset('audio/Halaman 24/definisi wortel.m4a'),
            ],
            [
                'id' => 6,
                'text' => 'Carrots help keep our eyes healthy.',
                'audio' => asset('audio/Halaman 24/definisi wortel.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
