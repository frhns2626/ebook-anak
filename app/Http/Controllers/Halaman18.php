<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman18 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->sukuBerakhiran(
            data:  $this->getDataPublicHalaman18(),
            halaman: 18,
            judul: 'Halaman 18 - Suku Kata Berakhiran -M & -S 🥬',
            deskripsi: 'Cocokkan kata dengan akhiran konsonan matinya!'
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman18(): array
    {
        /**
         * Latihan Membaca Suku Kata Tertutup (konsonan mati -M dan -S)
         *
         * 1. Akhiran -M: am, im, um, em, om
         *    am → Ba-yam 🥬 | im → Es-krim 🍦 | um → Dim-sum 🥟 | em → A-sem 🥭 | om → Pom-pom 📣
         * 2. Akhiran -S: as, is, us, es, os
         *    as → Ka-pas ☁️ | is → Ku-bis 🥬 | us → Pa-us 🐋 | es → Me-ses 🍫 | os → Ka-os 👕
         */
        $items = [
            [
                'masterPola' => 'as is us es os',
                'audio' => asset('audio/en/halaman 16-19/halaman 18.m4a'),
                'items' => [
                    ['id' => 'Asem', 'emoji' => asset('gambar/halaman_18/asem.webp'), 'ending' => 'as', 'audio' => asset('audio/en/halaman 16-19/halaman 18 asem.m4a')],
                    ['id' => 'Kubis', 'emoji' => asset('gambar/halaman_18/kubis.webp'), 'ending' => 'is', 'audio' => asset('audio/en/halaman 16-19/halaman 18 kubis.m4a')],
                    ['id' => 'Dimsum', 'emoji' => asset('gambar/halaman_18/dimsum.webp'), 'ending' => 'us', 'audio' => asset('audio/en/halaman 16-19/halaman 18 dimsum.m4a')],
                    ['id' => 'Meses', 'emoji' => asset('gambar/halaman_18/meses.webp'), 'ending' => 'es', 'audio' => asset('audio/en/halaman 16-19/halaman 18 meses.m4a')],
                    ['id' => 'Kaos', 'emoji' => asset('gambar/halaman_18/kaos.webp'), 'ending' => 'os', 'audio' => asset('audio/en/halaman 16-19/halaman 18 kaos.m4a')],
                ],
            ],
            [
                'masterPola' => 'am im um em om',
                'audio' => asset('audio/en/halaman 16-19/halaman 18.m4a'),
                'items' => [
                    ['id' => 'Bayam', 'emoji' => asset('gambar/halaman_18/bayam.webp'), 'ending' => 'am', 'audio' => asset('audio/en/halaman 16-19/halaman 18 bayam.m4a')],
                    ['id' => 'Eskrim', 'emoji' => asset('gambar/halaman_18/eskrim.webp'), 'ending' => 'im', 'audio' => asset('audio/en/halaman 16-19/halaman 18 eskrim.m4a')],
                    ['id' => 'Paus', 'emoji' => asset('gambar/halaman_18/paus.webp'), 'ending' => 'us', 'audio' => asset('audio/en/halaman 16-19/halaman 18 paus.m4a')],
                    ['id' => 'Kapas', 'emoji' => asset('gambar/halaman_18/kapas.webp'), 'ending' => 'as', 'audio' => asset('audio/en/halaman 16-19/halaman 18 kapas.m4a')],
                    ['id' => 'Pompom', 'emoji' => asset('gambar/halaman_18/pompom.webp'), 'ending' => 'om', 'audio' => asset('audio/en/halaman 16-19/halaman 18 pompom.m4a')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
