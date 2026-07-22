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
        $data = $this->getDataPublicHalaman18();

        return view('belajar.halaman-18.index', [
            'data' => $data,
            'items' => $data['items'],
            'halaman' => 18,
            'judul' => 'Halaman 18 - Suku Kata Berakhiran -M & -S 🥬',
            'deskripsi' => 'Cocokkan kata dengan akhiran konsonan matinya!',
        ]);
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
        $base = 'audio/halaman 16-19/';

        $items = [
            [
                'masterPola' => 'am im um em om',
                'audio' => asset($base . 'halaman 18.m4a'),
                'items' => [
                    ['id' => 'bayam', 'name' => 'Bayam', 'emoji' => '🥬', 'ending' => 'am', 'hint' => 'Bayam adalah sayur hijau yang menyehatkan!', 'audio' => asset($base . 'halaman 18 bayam.m4a')],
                    ['id' => 'eskrim', 'name' => 'Eskrim', 'emoji' => '🍦', 'ending' => 'im', 'hint' => 'Eskrim adalah makanan dingin yang manis!', 'audio' => asset($base . 'halaman 18 eskrim.m4a')],
                    ['id' => 'dimsum', 'name' => 'Dimsum', 'emoji' => '🥟', 'ending' => 'um', 'hint' => 'Dimsum adalah makanan kukus dari Cina!', 'audio' => asset($base . 'halaman 18 dimsum.m4a')],
                    ['id' => 'asem', 'name' => 'Asem', 'emoji' => '🥭', 'ending' => 'em', 'hint' => 'Asem adalah rasa buah yang kecut!', 'audio' => asset($base . 'halaman 18 asem.m4a')],
                    ['id' => 'pompom', 'name' => 'Pom-pom', 'emoji' => '📣', 'ending' => 'om', 'hint' => 'Pom-pom adalah alat yang digoyangkan saat bersorak!', 'audio' => asset($base . 'halaman 18 pom pom.m4a')],
                ],
            ],
            [
                'masterPola' => 'as is us es os',
                'audio' => asset($base . 'halaman 18.m4a'),
                'items' => [
                    ['id' => 'kapas', 'name' => 'Kapas', 'emoji' => '☁️', 'ending' => 'as', 'hint' => 'Kapas adalah serat lembut berwarna putih!', 'audio' => asset($base . 'halaman 18 kapas.m4a')],
                    ['id' => 'kubis', 'name' => 'Kubis', 'emoji' => '🥬', 'ending' => 'is', 'hint' => 'Kubis adalah sayur berlapis-lapis!', 'audio' => asset($base . 'halaman 18 kubis.m4a')],
                    ['id' => 'paus', 'name' => 'Paus', 'emoji' => '🐋', 'ending' => 'us', 'hint' => 'Paus adalah mamalia laut yang besar!', 'audio' => null],
                    ['id' => 'meses', 'name' => 'Meses', 'emoji' => '🍫', 'ending' => 'es', 'hint' => 'Meses adalah taburan cokelat untuk roti!', 'audio' => asset($base . 'halaman 18 meses.m4a')],
                    ['id' => 'kaos', 'name' => 'Kaos', 'emoji' => '👕', 'ending' => 'os', 'hint' => 'Kaos adalah baju kaus yang nyaman dipakai!', 'audio' => asset($base . 'halaman 18 kaos.m4a')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
