<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman27 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman27();

        return $this->aiueoPilih(
            data: $data,
            items: $data['items'],
            halaman: 27,
            judul: 'Halaman 27 - Bakso & Panci 🍜',
            deskripsi: 'Mengenal macam-macam!'
        );
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman27(): array
    {
        $items = [
            [
                'master' => 'mb mp nd nt ks',
                'items' => [
                    [
                        'id' => 'bambu',
                        'name' => 'Bambu',
                        'emoji' => '🎋',
                        'hint' => 'Bambu adalah tanaman yang tinggi dan kuat!',
                        'audio' => asset('audio/halaman 27/halaman 27 bambu.m4a'),
                    ],
                    [
                        'id' => 'pompa',
                        'name' => 'Pompa',
                        'emoji' => '🚰',
                        'hint' => 'Pompa digunakan untuk mengalirkan air!',
                        'audio' => asset('audio/halaman 27/halaman 27 pompa.m4a'),
                    ],
                    [
                        'id' => 'landak',
                        'name' => 'Landak',
                        'emoji' => '🦔',
                        'hint' => 'Landak memiliki banyak duri di tubuhnya!',
                        'audio' => asset('audio/halaman 27/halaman 27 landak.m4a'),
                    ],
                    [
                        'id' => 'bantal',
                        'name' => 'Bantal',
                        'emoji' => '🛏️',
                        'hint' => 'Bantal membuat tidur menjadi nyaman!',
                        'audio' => asset('audio/halaman 27/halaman 27 bantal.m4a'),
                    ],
                    [
                        'id' => 'bakso',
                        'name' => 'Bakso',
                        'emoji' => '🍜',
                        'hint' => 'Bakso adalah makanan favorit banyak orang!',
                        'audio' => asset('audio/halaman 27/halaman 27 bakso.m4a'),
                    ],
                ],
            ],
            [
                'master' => 'nc nj rb rt kt',
                'items' => [
                    [
                        'id' => 'panci',
                        'name' => 'Panci',
                        'emoji' => '🍲',
                        'hint' => 'Panci digunakan untuk memasak makanan!',
                        'audio' => asset('audio/halaman 27/halaman 27 panci.m4a'),
                    ],
                    [
                        'id' => 'banjir',
                        'name' => 'Banjir',
                        'emoji' => '🌊',
                        'hint' => 'Banjir terjadi saat air meluap!',
                        'audio' => asset('audio/halaman 27/halaman 27 banjir.m4a'),
                    ],
                    [
                        'id' => 'barbel',
                        'name' => 'Barbel',
                        'emoji' => '🏋️',
                        'hint' => 'Barbel digunakan untuk latihan kekuatan!',
                        'audio' => asset('audio/halaman 27/halaman 27 barbel.m4a'),
                    ],
                    [
                        'id' => 'kertas',
                        'name' => 'Kertas',
                        'emoji' => '📄',
                        'hint' => 'Kertas digunakan untuk menulis dan menggambar!',
                        'audio' => asset('audio/halaman 27/halaman 27 kertas.m4a'),
                    ],
                    [
                        'id' => 'dokter',
                        'name' => 'Dokter',
                        'emoji' => '👨‍⚕️',
                        'hint' => 'Dokter membantu menjaga kesehatan kita!',
                        'audio' => asset('audio/halaman 27/halaman 27 dokter.m4a'),
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
