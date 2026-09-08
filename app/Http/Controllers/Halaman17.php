<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman17 extends Controller
{
    /**
     * @param  Request  $request
     * @return View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = $request->query('lang', 'id');
            $judul = $lang === 'en'
                ? 'Page 17 - Closed Syllables -T & -R 🦏'
                : 'Halaman 17 - Suku Kata Berakhiran -K & -N 🦏';
            $deskripsi = $lang === 'en'
                ? 'Match words with their ending consonants!'
                : 'Cocokkan kata dengan akhiran konsonan matinya!';

            return $this->sukuBerakhiran(
                data: $this->getDataPublicHalaman17($lang),
                halaman: 17,
                judul: $judul,
                deskripsi: $deskripsi,
                lang: $lang
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * @param  string  $lang  'id' (default) | 'en'
     * @return array
     */
    public function getDataPublicHalaman17(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'masterPola' => 'at it ut et ot',
                    'audio' => asset('audio/id/Halaman 17/at it ut et ot.wav'),

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
                    'audio' => asset('audio/id/Halaman 17/ar ir ur er or.wav'),
                    'items' => [
                        ['id' => 'Pasir', 'emoji' => asset('gambar/halaman_17/pasir.webp'), 'ending' => 'ir', 'audio' => asset('audio/en/halaman 16-19/halaman 17 pasir.m4a')],
                        ['id' => 'Sayur', 'emoji' => asset('gambar/halaman_17/sayur.webp'), 'ending' => 'ur', 'audio' => asset('audio/en/halaman 16-19/halaman 17 sayur.m4a')],
                        ['id' => 'Gitar', 'emoji' => asset('gambar/halaman_17/gitar.webp'), 'ending' => 'ar', 'audio' => asset('audio/en/halaman 16-19/halaman 17 gitar.m4a')],
                        ['id' => 'Obor', 'emoji' => asset('gambar/halaman_17/obor.webp'), 'ending' => 'or', 'audio' => asset('audio/en/halaman 16-19/halaman 17 obor.m4a')],
                        ['id' => 'Roket', 'emoji' => asset('gambar/halaman_17/roket.webp'), 'ending' => 'et', 'audio' => asset('audio/en/halaman 16-19/halaman 17 roket.m4a')],
                    ],
                ],
            ];
        } else {
            $items = [
                [
                    'masterPola' => 'at it ut et ot',
                    'audio' => asset('audio/id/Halaman 17/at it ut et ot.wav'),
                    'items' => [
                        ['id' => 'Donat', 'emoji' => asset('gambar/halaman_17/donat.webp'), 'ending' => 'at', 'audio' => asset('audio/id/Halaman 17/donat.wav')],
                        ['id' => 'Sakit', 'emoji' => asset('gambar/halaman_17/sakit.webp'), 'ending' => 'it', 'audio' => asset('audio/id/Halaman 17/sakit.wav')],
                        ['id' => 'Laut', 'emoji' => asset('gambar/halaman_17/laut.webp'), 'ending' => 'ut', 'audio' => asset('audio/id/Halaman 17/laut.wav')],
                        ['id' => 'Senter', 'emoji' => asset('gambar/halaman_17/senter.webp'), 'ending' => 'et', 'audio' => asset('audio/id/Halaman 17/senter.wav')],
                        ['id' => 'Pilot', 'emoji' => asset('gambar/halaman_17/pilot.webp'), 'ending' => 'ot', 'audio' => asset('audio/id/Halaman 17/pilot.wav')],
                    ],
                ],
                [
                    'masterPola' => 'ar ir ur er or',
                    'audio' => asset('audio/id/Halaman 17/ar ir ur er or.wav'),
                    'items' => [
                        ['id' => 'Pasir', 'emoji' => asset('gambar/halaman_17/pasir.webp'), 'ending' => 'ir', 'audio' => asset('audio/id/Halaman 17/kasir.wav')],
                        ['id' => 'Sayur', 'emoji' => asset('gambar/halaman_17/sayur.webp'), 'ending' => 'ur', 'audio' => asset('audio/id/Halaman 17/sayur.wav')],
                        ['id' => 'Gitar', 'emoji' => asset('gambar/halaman_17/gitar.webp'), 'ending' => 'ar', 'audio' => asset('audio/id/Halaman 17/gitar.wav')],
                        ['id' => 'Obor', 'emoji' => asset('gambar/halaman_17/obor.webp'), 'ending' => 'or', 'audio' => asset('audio/id/Halaman 17/obor.wav')],
                        ['id' => 'Roket', 'emoji' => asset('gambar/halaman_17/roket.webp'), 'ending' => 'et', 'audio' => asset('audio/id/Halaman 17/roket.wav')],
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
