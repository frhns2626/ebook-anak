<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman17 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        return $this->sukuBerakhiran(
            data:  $this->getDataPublicHalaman17(),
            halaman: 17,
            judul: 'Halaman 17 - Suku Kata Berakhiran -K & -N 🦏',
            deskripsi: 'Cocokkan kata dengan akhiran konsonan matinya!');
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman17(): array
    {
        /**
         * Latihan Membaca Suku Kata Tertutup (konsonan mati -K dan -N)
         *
         * 1. Akhiran -K: ak, ik, uk, ek, ok
         *    ak → Ba-dak 🦏 | ik → Ba-tik 🎨 | uk → La-uk 🍽️ | ek → Be-bek 🦆 | ok → Ko-dok 🐸
         * 2. Akhiran -N: an, in, un, en, on
         *    an → Ta-man 🌻 | in → Ko-in 🪙 | un → Ti-mun 🥒 | en → Per-men 🍬 | on → Me-lon 🍈
         */
        $items = [
            [
                'masterPola' => 'at it ut et ot',
                'audio' => asset('audio/en/halaman 16-19/halaman 17.m4a'),
                'items' => [
                    ['id' => 'Donat', 'emoji' => asset('gambar/halaman_17/donat.webp'), 'ending' => 'at', 'audio' => asset('audio/en/halaman 16-19/halaman 17 donat.m4a')],
                    ['id' => 'Sakit', 'emoji' => asset('gambar/halaman_17/sakit.webp'), 'ending' => 'it', 'audio' => asset('audio/en/halaman 16-19/halaman 17 sakit.m4a')],
                    ['id' => 'Laut', 'emoji' => asset('gambar/halaman_17/laut.webp'), 'ending' => 'ut', 'audio' => asset('audio/en/halaman 16-19/halaman 17 laut.m4a')],
                    ['id' => 'Senter', 'emoji' => asset('gambar/halaman_17/senter.webp'), 'ending' => 'et', 'audio' => asset('audio/en/halaman 16-19/halaman 17 senter.m4a')],
                    ['id' => 'Pilot', 'emoji' => asset('gambar/halaman_17/pilot.webp'), 'ending' => 'ot', 'audio' => asset('audio/en/halaman 16-19/halaman 17 pilot.m4a')],
                ],
            ],
            [
                'masterPola' => 'ar ir ur er or',
                'audio' => asset('audio/en/halaman 16-19/halaman 17.m4a'),
                'items' => [
                    ['id' => 'Pasir', 'emoji' => asset('gambar/halaman_17/pasir.webp'), 'ending' => 'ir', 'audio' => asset('audio/en/halaman 16-19/halaman 17 pasir.m4a')],
                    ['id' => 'Sayur', 'emoji' => asset('gambar/halaman_17/sayur.webp'), 'ending' => 'ur', 'audio' => asset('audio/en/halaman 16-19/halaman 17 sayur.m4a')],
                    ['id' => 'Gitar', 'emoji' => asset('gambar/halaman_17/gitar.webp'), 'ending' => 'ar', 'audio' => asset('audio/en/halaman 16-19/halaman 17 gitar.m4a')],
                    ['id' => 'Obor', 'emoji' => asset('gambar/halaman_17/obor.webp'), 'ending' => 'or', 'audio' => asset('audio/en/halaman 16-19/halaman 17 obor.m4a')],
                    ['id' => 'Roket', 'emoji' => asset('gambar/halaman_17/roket.webp'), 'ending' => 'et', 'audio' => asset('audio/en/halaman 16-19/halaman 17 roket.m4a')],
                ],
            ],
        ];


        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
