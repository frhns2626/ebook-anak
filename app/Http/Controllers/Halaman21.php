<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman21 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {

        return $this->deskripsiObject(
            data:  $this->getDataPublicHalaman21(),
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
     *         emoji: string,
     *         audio: string,
     *         texts: list<array{
     *              text:string,
     *              audio: string,
     *          }>
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
                'id' => 'badak',
                'emoji' => asset('gambar/halaman_20-21/badak_en.webp'),
                'audio' => asset('audio/id/Halaman 21/badak.m4a'),
                'texts' => [
                    ['text' => 'A rhinoceros is a large and strong animal.', 'audio' => asset('audio/id/Halaman 21/text1.wav')],
                    ['text' => 'A rhinoceros has thick and tough skin.', 'audio' => asset('audio/id/Halaman 21/text2.wav')],
                    ['text' => 'A rhinoceros has a horn on its nose.', 'audio' => asset('audio/id/Halaman 21/text3.wav')],
                    ['text' => 'A rhinoceros likes to eat grass.', 'audio' => asset('audio/id/Halaman 21/text4.wav')],
                    ['text' => 'A rhinoceros likes to wallow in the mud.', 'audio' => asset('audio/id/Halaman 21/text5.wav')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
