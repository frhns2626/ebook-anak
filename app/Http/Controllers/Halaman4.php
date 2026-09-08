<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman4 extends Controller
{
    /**
     * @param  Request  $request
     * @return View
     *
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {
        $lang = $request->query('lang', 'id');

        return $this->pengenalanAudio(
            data: $this->getDataPublicHalaman4($lang),
            halaman: 4,
            judul: 'Halaman 4 - Mengenal Benda & Hewan 🐋',
            deskripsi: 'Mengenal macam-macam benda dan hewan yang seru!',
            lang: $lang,
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman4($lang): array
    {
        $id = [
            ['id' => 'mangga', 'emoji' => asset('gambar/halaman_4/mangga.webp'), 'audio' => asset('audio/id/Halaman 4/manga.wav')],
            ['id' => 'nanas', 'emoji' => asset('gambar/halaman_4/nanas.webp'), 'audio' => asset('audio/id/Halaman 4/nanas.wav')],
            ['id' => 'obeng', 'emoji' => asset('gambar/halaman_4/obeng.webp'), 'audio' => asset('audio/id/Halaman 4/obeng.wav')],
            ['id' => 'paus', 'emoji' => asset('gambar/halaman_4/paus.webp'), 'audio' => asset('audio/id/Halaman 4/paus.wav')],
            ['id' => 'quran', 'emoji' => asset('gambar/halaman_4/quran.webp'), 'audio' => asset('audio/id/Halaman 4/quran.wav')],
            ['id' => 'rusa', 'emoji' => asset('gambar/halaman_4/rusa.webp'), 'audio' => asset('audio/id/Halaman 4/rusa.wav')],
        ];

        $en = [
            ['id' => 'mangga', 'emoji' => asset('gambar/halaman_4/mangga.webp'), 'audio' => asset('audio/en/Halaman 4/1. mangga.m4a')],
            ['id' => 'nanas', 'emoji' => asset('gambar/halaman_4/nanas.webp'), 'audio' => asset('audio/en/Halaman 4/2. nanas.m4a')],
            ['id' => 'obeng', 'emoji' => asset('gambar/halaman_4/obeng.webp'), 'audio' => asset('audio/en/Halaman 4/3. obeng.m4a')],
            ['id' => 'paus', 'emoji' => asset('gambar/halaman_4/paus.webp'), 'audio' => asset('audio/en/Halaman 4/4. paus.m4a')],
            ['id' => 'quran', 'emoji' => asset('gambar/halaman_4/quran.webp'), 'audio' => asset('audio/en/Halaman 4/5. quran_.m4a')],
            ['id' => 'rusa', 'emoji' => asset('gambar/halaman_4/rusa.webp'), 'audio' => asset('audio/en/Halaman 4/6. rusa.m4a')],
        ];
        $items = $lang === 'en' ? $en : $id;

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
