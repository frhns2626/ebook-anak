<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman24 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {

        return $this->deskripsiObject(
            data: $this->getDataPublicHalaman24(),
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
                'id' => 'carrot',
                'emoji' => asset('gambar/halaman_23-24/wortel_en.webp'),
                'audio' => asset('audio/en/Halaman 24/wortel.m4a'),
                'texts' => [
                    ['text' => 'Carrots are orange.', 'audio' => asset('audio/id/Halaman 24/text1.wav')],
                    ['text' => 'My uncle plants carrots in the garden.', 'audio' => asset('audio/id/Halaman 24/text2.wav')],
                    ['text' => 'Mom makes carrot juice in the kitchen.', 'audio' => asset('audio/id/Halaman 24/text3.wav')],
                    ['text' => 'Carrots contain vitamin A.', 'audio' => asset('audio/id/Halaman 24/text4.wav')],
                    ['text' => 'Carrots help keep our eyes healthy.', 'audio' => asset('audio/id/Halaman 24/text5.wav')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
