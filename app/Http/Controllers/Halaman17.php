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
        $data = $this->getDataPublicHalaman17();

        return $this->sukuBerakhiran(
            data: $data,
            items: $data['items'],
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
        $base = 'audio/halaman 16-19/';

        $items = [
            [
                'masterPola' => 'ak ik uk ek ok',
                'audio' => asset($base.'halaman 17.m4a'),
                'items' => [
                    ['id' => 'badak', 'name' => 'Badak', 'emoji' => '🦏', 'ending' => 'ak', 'hint' => 'Badak adalah hewan besar bertanduk!', 'audio' => asset($base.'Salinan badak.m4a')],
                    ['id' => 'batik', 'name' => 'Batik', 'emoji' => '🎨', 'ending' => 'ik', 'hint' => 'Batik adalah kain bermotif khas Indonesia!', 'audio' => null],
                    ['id' => 'lauk', 'name' => 'Lauk', 'emoji' => '🍽️', 'ending' => 'uk', 'hint' => 'Lauk adalah makanan pendamping nasi!', 'audio' => null],
                    ['id' => 'bebek', 'name' => 'Bebek', 'emoji' => '🦆', 'ending' => 'ek', 'hint' => 'Bebek adalah unggas air yang berenang!', 'audio' => asset($base.'Salinan 1. bebek.m4a')],
                    ['id' => 'kodok', 'name' => 'Kodok', 'emoji' => '🐸', 'ending' => 'ok', 'hint' => 'Kodok adalah hewan yang suka melompat!', 'audio' => null],
                ],
            ],
            [
                'masterPola' => 'an in un en on',
                'audio' => asset($base.'halaman 17.m4a'),
                'items' => [
                    ['id' => 'taman', 'name' => 'Taman', 'emoji' => '🌻', 'ending' => 'an', 'hint' => 'Taman adalah tempat yang ditanami bunga!', 'audio' => asset($base.'halaman 16 taman.m4a')],
                    ['id' => 'koin', 'name' => 'Koin', 'emoji' => '🪙', 'ending' => 'in', 'hint' => 'Koin adalah uang logam yang bulat!', 'audio' => asset($base.'halaman 16 koin.m4a')],
                    ['id' => 'timun', 'name' => 'Timun', 'emoji' => '🥒', 'ending' => 'un', 'hint' => 'Timun adalah sayur hijau yang segar!', 'audio' => asset($base.'halaman 16 timun.m4a')],
                    ['id' => 'permen', 'name' => 'Permen', 'emoji' => '🍬', 'ending' => 'en', 'hint' => 'Permen adalah makanan manis yang lucu!', 'audio' => asset($base.'halaman 16 permen.m4a')],
                    ['id' => 'melon', 'name' => 'Melon', 'emoji' => '🍈', 'ending' => 'on', 'hint' => 'Melon adalah buah manis berwarna hijau!', 'audio' => asset($base.'halaman 16 melon.m4a')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
