<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman16 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->sukuBerakhiran(
            data: $this->getDataPublicHalaman16(),
            halaman: 16,
            judul: 'Halaman 16 - Suku Kata Berakhiran -N 🪙',
            deskripsi: 'Cocokkan kata dengan akhiran konsonan matinya!');
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman16(): array
    {
        /**
         * Latihan Membaca Suku Kata Tertutup (konsonan mati -K dan -N)
         *
         * 1. Akhiran -K: ak, ik, uk, ek, ok
         *    ak → Ba-dak 🦏 | ik → Ba-tik 🎨 | uk → La-uk 🍽️ | ek → Be-bek 🦆 | ok → Ko-dok 🐸
         * 2. Akhiran -N: an, in, un, en, on
         *    an → Ta-man 🌻 | in → Ko-in 🪙 | un → Ti-mun 🥒 | en → Per-men 🍬 | on → Me-lon 🍈
         *
         * halaman 16-19/
         * ├── Salinan badak.m4a       (badak — nama file belum konsisten)
         * ├── Salinan 1. bebek        (bebek — nama file belum konsisten)
         * ├── halaman 16 koin.m4a
         * ├── halaman 16 melon.m4a
         * ├── halaman 16 permen.m4a
         * ├── halaman 16 taman.m4a
         * ├── halaman 16 timun.m4a
         * └── halaman 16.m4a (intro)
         *
         * Belum ada file audio untuk: batik, lauk, kodok — pakai null sementara.
         */
        $items = [
            [
                'masterPola' => 'ak ik uk ek ok',
                'audio' => asset('audio/en/halaman 16-19/halaman 16.m4a'),
                'items' => [
                    ['id' => 'Badak', 'emoji' => asset('gambar/halaman_16/badak.webp'), 'ending' => 'ak', 'audio' => asset('audio/en/halaman 16-19/halaman 16. badak.m4a')],
                    ['id' => 'Batik', 'emoji' => asset('gambar/halaman_16/batik.webp'), 'ending' => 'ik', 'audio' => asset('audio/en/halaman 16-19/halaman 16. batik.m4a')],
                    ['id' => 'Lauk', 'emoji' => asset('gambar/halaman_16/lauk.webp'), 'ending' => 'uk', 'audio' => asset('audio/en/halaman 16-19/halaman 16. lauk.m4a')],
                    ['id' => 'Bebek', 'emoji' => asset('gambar/halaman_16/bebek.webp'), 'ending' => 'ek', 'audio' => asset('audio/en/halaman 16-19/halaman 16. bebek.m4a')],
                    ['id' => 'Kodok', 'emoji' => asset('gambar/halaman_16/kodok.webp'), 'ending' => 'ok', 'audio' => asset('audio / en / halaman 16 - 19 / halaman 16. kodok . m4a')],
                ],
            ],
            [
                'masterPola' => 'an in un en on',
                'audio' => asset('audio/en/halaman 16-19/halaman 16.m4a'),
                'items' => [
                    ['id' => 'Taman', 'emoji' => asset('gambar/halaman_16/taman.webp'), 'ending' => 'an', 'audio' => asset('audio/en/halaman 16-19/halaman 16 taman.m4a')],
                    ['id' => 'Koin', 'emoji' => asset('gambar/halaman_16/koin.webp'), 'ending' => 'in', 'audio' => asset('audio/en/halaman 16-19/halaman 16 koin.m4a')],
                    ['id' => 'Timun', 'emoji' => asset('gambar/halaman_16/timun.webp'), 'ending' => 'un', 'audio' => asset('audio/en/halaman 16-19/halaman 16 timun.m4a')],
                    ['id' => 'Permen', 'emoji' => asset('gambar/halaman_16/permen.webp'), 'ending' => 'en', 'audio' => asset('audio/en/halaman 16-19/halaman 16 permen.m4a')],
                    ['id' => 'Melon', 'emoji' => asset('gambar/halaman_16/melon.webp'), 'ending' => 'on', 'audio' => asset('audio/en/halaman 16-19/halaman 16 melon.m4a')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
