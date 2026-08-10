<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman2 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {
        $lang = $request->query('lang', 'id');
        return $this->pengenalanAudio(
            data: $this->getDataPublicHalaman2($lang),
            halaman: 2,
            judul: 'Halaman 2 - Mengenal Dunia Hewan 🦁',
            deskripsi: 'Mengenal macam - macam teman hewan yang lucu!',
            lang: $lang
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman2(string $lang): array
    {
        $id = [
            ['id' => 'ayam', 'emoji' => asset('gambar/halaman_2/ayam.webp'), 'audio' => asset('audio/id/Halaman 2/ayam.wav')],
            ['id' => 'beruang', 'emoji' => asset('gambar/halaman_2/beruang.webp'), 'audio' => asset('audio/id/Halaman 2/beruang.wav')],
            ['id' => 'cabai', 'emoji' => asset('gambar/halaman_2/cabai.webp'), 'audio' => asset('audio/id/Halaman 2/cabai.wav')],
            ['id' => 'dasi', 'emoji' => asset('gambar/halaman_2/dasi.webp'), 'audio' => asset('audio/id/Halaman 2/dasi.wav')],
            ['id' => 'elang', 'emoji' => asset('gambar/halaman_2/elang.webp'), 'audio' => asset('audio/id/Halaman 2/elang.wav')],
            ['id' => 'flamingo', 'emoji' => asset('gambar/halaman_2/flamingo.webp'), 'audio' => asset('audio/id/Halaman 2/flamingo.wav')],
        ];
        $en = [
            ['id' => 'ayam', 'emoji' => asset('gambar/halaman_2/ayam.webp'), 'audio' => asset('audio/en/Halaman 2/1. ayam.m4a')],
            ['id' => 'beruang', 'emoji' => asset('gambar/halaman_2/beruang.webp'), 'audio' => asset('audio/en/Halaman 2/2. beruang.m4a')],
            ['id' => 'cabai', 'emoji' => asset('gambar/halaman_2/cabai.webp'), 'audio' => asset('audio/en/Halaman 2/3. cabai.m4a')],
            ['id' => 'dasi', 'emoji' => asset('gambar/halaman_2/dasi.webp'), 'audio' => asset('audio/en/Halaman 2/4. dasi.m4a')],
            ['id' => 'elang', 'emoji' => asset('gambar/halaman_2/elang.webp'), 'audio' => asset('audio/en/Halaman 2/5. elang.m4a')],
            ['id' => 'flamingo', 'emoji' => asset('gambar/halaman_2/flamingo.webp'), 'audio' => asset('audio/en/Halaman 2/6. flamingo.m4a')],
        ];

        $items = $lang === 'en' ? $en : $id;

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
