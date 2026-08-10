<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman27 extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = $request->query('lang', 'id');
            $judul = $lang === 'en' ? 'Page 27 - Meatballs & Pan 🍜' : 'Halaman 27 - Bakso & Panci 🍜';
            $deskripsi = $lang === 'en' ? 'Learn about various letter combinations!' : 'Mengenal macam-macam!';

            return $this->sukuBerakhiran(
                data: $this->getDataPublicHalaman27($lang),
                halaman: 27,
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
     */
    public function getDataPublicHalaman27(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'masterPola' => 'mb mp nd nt ks',
                    'audio' => asset('audio/id/Halaman 27/mb.wav'),

                    'items' => [
                        ['id' => 'Bambu', 'emoji' => asset('gambar/halaman_27/bambu.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 bambu.m4a')],
                        ['id' => 'Pompa', 'emoji' => asset('gambar/halaman_27/pompa.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 pompa.m4a')],
                        ['id' => 'Landak', 'emoji' => asset('gambar/halaman_27/landak.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 landak.m4a')],
                        ['id' => 'Bantal', 'emoji' => asset('gambar/halaman_27/bantal.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 bantal.m4a')],
                        ['id' => 'Bakso', 'emoji' => asset('gambar/halaman_27/bakso.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 bakso.m4a')],
                    ],
                ],
                [
                    'masterPola' => 'nc nj rb rt kt',
                    'audio' => asset('audio/id/Halaman 27/nc.wav'),
                    'items' => [
                        ['id' => 'Panci', 'emoji' => asset('gambar/halaman_27/panci.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 panci.m4a')],
                        ['id' => 'Banjir', 'emoji' => asset('gambar/halaman_27/banjir.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 banjir.m4a')],
                        ['id' => 'Barbel', 'emoji' => asset('gambar/halaman_27/barber.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 barbel.m4a')],
                        ['id' => 'Kertas', 'emoji' => asset('gambar/halaman_27/kertas.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 kertas.m4a')],
                        ['id' => 'Dokter', 'emoji' => asset('gambar/halaman_27/dokter.webp'), 'audio' => asset('audio/en/halaman 27/halaman 27 dokter.m4a')],
                    ],
                ],
            ];
        } else {
            $items = [
                [
                    'masterPola' => 'mb mp nd nt ks',
                    'audio' => asset('audio/id/Halaman 27/mb.wav'),
                    'items' => [
                        ['id' => 'Bambu', 'emoji' => asset('gambar/halaman_27/bambu.webp'), 'audio' => asset('audio/id/Halaman 27/bambu.wav')],
                        ['id' => 'Pompa', 'emoji' => asset('gambar/halaman_27/pompa.webp'), 'audio' => asset('audio/id/Halaman 27/pompa.wav')],
                        ['id' => 'Landak', 'emoji' => asset('gambar/halaman_27/landak.webp'), 'audio' => asset('audio/id/Halaman 27/landak.wav')],
                        ['id' => 'Bantal', 'emoji' => asset('gambar/halaman_27/bantal.webp'), 'audio' => asset('audio/id/Halaman 27/bantal.wav')],
                        ['id' => 'Bakso', 'emoji' => asset('gambar/halaman_27/bakso.webp'), 'audio' => asset('audio/id/Halaman 27/bakso.wav')],
                    ],
                ],
                [
                    'masterPola' => 'nc nj rb rt kt',
                    'audio' => asset('audio/id/Halaman 27/nc.wav'),
                    'items' => [
                        ['id' => 'Panci', 'emoji' => asset('gambar/halaman_27/panci.webp'), 'audio' => asset('audio/id/Halaman 27/panci.wav')],
                        ['id' => 'Banjir', 'emoji' => asset('gambar/halaman_27/banjir.webp'), 'audio' => asset('audio/id/Halaman 27/banjir.wav')],
                        ['id' => 'Barbel', 'emoji' => asset('gambar/halaman_27/barber.webp'), 'audio' => asset('audio/id/Halaman 27/barbel.wav')],
                        ['id' => 'Kertas', 'emoji' => asset('gambar/halaman_27/kertas.webp'), 'audio' => asset('audio/id/Halaman 27/kertas.wav')],
                        ['id' => 'Dokter', 'emoji' => asset('gambar/halaman_27/dokter.webp'), 'audio' => asset('audio/id/Halaman 27/dokter.wav')],
                    ],
                ],
            ];
        }

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}

