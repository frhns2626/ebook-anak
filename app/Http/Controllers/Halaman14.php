<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman14 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {
        return $this->deskripsiObject(
            data: $this->getDataPublicHalaman14(),
            halaman: 14,
            object: 'Ball',
            iconText: '⚽',
            judul: 'Halaman 14 - Ball ⚽',
            deskripsi: 'Learn about balls and the different games they are used for.',
        );
    }


    /**
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getDataPublicHalaman14(): array
    {
        $items = [
            [
                'id' => 'Ball',
                'emoji' => asset('gambar/halaman_13-14/ball.webp'),
                'audio' => asset('audio/en/Halaman 14/bola.m4a'),
                'texts' => [
                    [
                        'text' => 'A small ball slides across the table.',
                        'audio' => asset('audio/id/Halaman 14/text1.wav'),
                    ],
                    [
                        'text' => 'The soccer ball is guarded by the goalkeeper in the goal.',
                        'audio' => asset('audio/id/Halaman 14/text2.wav'),

                    ],
                    [
                        'text' => 'The basketball is thrown into the high hoop.',
                        'audio' => asset('audio/id/Halaman 14/text3.wav'),

                    ],
                    [
                        'text' => 'Little brother likes playing with a plastic ball.',
                        'audio' => asset('audio/id/Halaman 14/text4.wav'),

                    ],
                    [
                        'text' => 'The tennis ball is hit with the racket.',
                        'audio' => asset('audio/id/Halaman 14/text5.wav'),

                    ],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
