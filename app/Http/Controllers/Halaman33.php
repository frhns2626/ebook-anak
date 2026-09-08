<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman33 extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = $request->input('lang', 'id');
            $judul = $lang === 'en' ? 'Page 33 - Word Search 🔍' : 'Halaman 33 - Cari Kata 🔍';
            $deskripsi = $lang === 'en' ? 'Find the hidden words!' : 'Temukan kata yang tersembunyi!';

            return $this->cariKataGame(
                data: $this->getDataPublicHalaman33($lang),
                halaman: 33,
                judul: $judul,
                deskripsi: $deskripsi,
                lang: $lang
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * @param string $lang 'id' (default) | 'en'
     * @return array
     * @throws Exception
     */
    public function getDataPublicHalaman33(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $pembukaan = asset('audio/en/Halaman 33/halaman 33.m4a');
            $items = [
                [
                    'id' => 'Meja',
                    'emoji' => asset('gambar/halaman_33/meja.webp'),
                    'audio' => asset('audio/en/Halaman 33/1. meja.m4a'),
                ],
                [
                    'id' => 'Kue',
                    'emoji' => asset('gambar/halaman_33/kue.webp'),
                    'audio' => asset('audio/en/Halaman 33/2. kue.m4a'),
                ],
                [
                    'id' => 'Buku',
                    'emoji' => asset('gambar/halaman_33/buku.webp'),
                    'audio' => asset('audio/en/Halaman 33/3. buku.m4a'),
                ],
                [
                    'id' => 'Udang',
                    'emoji' => asset('gambar/halaman_33/udang.webp'),
                    'audio' => asset('audio/en/Halaman 33/4. udang.m4a'),
                ],
                [
                    'id' => 'Sapi',
                    'emoji' => asset('gambar/halaman_33/sapi.webp'),
                    'audio' => asset('audio/en/Halaman 33/5. sapi.m4a'),
                ],
            ];
        } else {
            $pembukaan = asset('audio/id/Halaman 33/pembukaan.wav');
            $items = [
                [
                    'id' => 'Meja',
                    'emoji' => asset('gambar/halaman_33/meja.webp'),
                    'audio' => asset('audio/id/Halaman 33/meja.wav'),
                ],
                [
                    'id' => 'Kue',
                    'emoji' => asset('gambar/halaman_33/kue.webp'),
                    'audio' => asset('audio/id/Halaman 33/kue.wav'),
                ],
                [
                    'id' => 'Buku',
                    'emoji' => asset('gambar/halaman_33/buku.webp'),
                    'audio' => asset('audio/id/Halaman 33/buku.wav'),
                ],
                [
                    'id' => 'Udang',
                    'emoji' => asset('gambar/halaman_33/udang.webp'),
                    'audio' => asset('audio/id/Halaman 33/udang.wav'),
                ],
                [
                    'id' => 'Sapi',
                    'emoji' => asset('gambar/halaman_33/sapi.webp'),
                    'audio' => asset('audio/id/Halaman 33/sapi.wav'),
                ],
            ];
        }

        return [
            'pembukaan' => $pembukaan,
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}

