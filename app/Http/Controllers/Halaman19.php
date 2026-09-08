<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman19 extends Controller
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
                ? 'Page 19 - Closed Syllables -L 🦎'
                : 'Halaman 19 - Suku Kata Berakhiran -L 🦎';
            $deskripsi = $lang === 'en'
                ? 'Match words with their ending consonants!'
                : 'Cocokkan kata dengan akhiran konsonan matinya!';

            return $this->sukuBerakhiran(
                data: $this->getDataPublicHalaman19($lang),
                halaman: 19,
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
    public function getDataPublicHalaman19(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'masterPola' => 'al il ul el ol',
                    'audio' => asset('audio/id/Halaman 19/al il ul el ol.wav'),
                    'items' => [
                        ['id' => 'Kadal', 'emoji' => asset('gambar/halaman_19/kadal.webp'), 'ending' => 'al', 'audio' => asset('audio/en/halaman 16-19/halaman 19 kadal.m4a')],
                        ['id' => 'Apel', 'emoji' => asset('gambar/halaman_19/apel.webp'), 'ending' => 'el', 'audio' => asset('audio/en/halaman 16-19/apel.mp3')],
                        ['id' => 'Mobil', 'emoji' => asset('gambar/halaman_19/mobil.webp'), 'ending' => 'il', 'audio' => asset('audio/en/halaman 16-19/mobil.mp3')],
                        ['id' => 'Botol', 'emoji' => asset('gambar/halaman_19/botol.webp'), 'ending' => 'ol', 'audio' => asset('audio/en/halaman 16-19/halaman 18 botol.m4a')],
                        ['id' => 'Cangkul', 'emoji' => asset('gambar/halaman_19/cangkul.webp'), 'ending' => 'ul', 'audio' => asset('audio/en/halaman 16-19/cangkul.mp3')],
                    ],
                ],
            ];
        } else {
            $items = [
                [
                    'masterPola' => 'al il ul el ol',
                    'audio' => asset('audio/id/Halaman 19/al il ul el ol.wav'),
                    'items' => [
                        ['id' => 'Kadal', 'emoji' => asset('gambar/halaman_19/kadal.webp'), 'ending' => 'al', 'audio' => asset('audio/id/Halaman 19/kadal.wav')],
                        ['id' => 'Apel', 'emoji' => asset('gambar/halaman_19/apel.webp'), 'ending' => 'el', 'audio' => asset('audio/id/Halaman 19/apel.wav')],
                        ['id' => 'Mobil', 'emoji' => asset('gambar/halaman_19/mobil.webp'), 'ending' => 'il', 'audio' => asset('audio/id/Halaman 19/mobil.wav')],
                        ['id' => 'Botol', 'emoji' => asset('gambar/halaman_19/botol.webp'), 'ending' => 'ol', 'audio' => asset('audio/id/Halaman 19/botol.wav')],
                        ['id' => 'Cangkul', 'emoji' => asset('gambar/halaman_19/cangkul.webp'), 'ending' => 'ul', 'audio' => asset('audio/id/Halaman 19/cangkul.wav')],
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
