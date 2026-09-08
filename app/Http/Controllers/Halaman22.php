<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman22 extends Controller
{
    /**
     * @param  Request  $request
     * @return View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = (string) $request->string('lang', 'id');
            $judul = $lang === 'en' ? 'Page 22 - Guess the First Letter 🔤' : 'Halaman 22 - Tebak Huruf Depan 🔤';
            $deskripsi = $lang === 'en' ? 'Look at the picture, guess the first letter!' : 'Lihat gambarnya, tebak huruf depannya!';

            return $this->cariHurufPertama(
                data: $this->getDataPublicHalaman22($lang),
                halaman: 22,
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
     *
     * @throws Exception
     */
    public function getDataPublicHalaman22(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $pembukaan = asset('audio/en/Halaman 22/halaman 22.m4a');
            $items = [
                [
                    'id' => 'Rabbit',
                    'emoji' => asset('gambar/halaman_22/kelinci.webp'),
                    'audio' => asset('audio/en/Halaman 22/1. kelinci.m4a'),
                    'options' => [
                        ['letter' => 'r', 'correct' => true],
                        ['letter' => 'b', 'correct' => false],
                        ['letter' => 'c', 'correct' => false],
                    ],
                ],
                [
                    'id' => 'Corn',
                    'emoji' => asset('gambar/halaman_22/jagung.webp'),
                    'audio' => asset('audio/en/Halaman 22/2. jagung.m4a'),
                    'options' => [
                        ['letter' => 'i', 'correct' => false],
                        ['letter' => 'c', 'correct' => true],
                        ['letter' => 'l', 'correct' => false],
                    ],
                ],
                [
                    'id' => 'Avocado',
                    'emoji' => asset('gambar/halaman_22/alpukat.webp'),
                    'audio' => asset('audio/en/Halaman 22/3. alpukat.m4a'),
                    'options' => [
                        ['letter' => 'u', 'correct' => false],
                        ['letter' => 'h', 'correct' => false],
                        ['letter' => 'a', 'correct' => true],
                    ],
                ],
                [
                    'id' => 'Duck',
                    'emoji' => asset('gambar/halaman_22/bebek.webp'),
                    'audio' => asset('audio/en/Halaman 22/4. bebek.m4a'),
                    'options' => [
                        ['letter' => 'a', 'correct' => false],
                        ['letter' => 'd', 'correct' => true],
                        ['letter' => 'b', 'correct' => false],
                    ],
                ],
            ];
        } else {
            $pembukaan = asset('audio/id/Halaman 22/pembukaan.wav');
            $items = [
                [
                    'id' => 'Kelinci',
                    'emoji' => asset('gambar/halaman_22/kelinci.webp'),
                    'audio' => asset('audio/id/Halaman 22/kelinci.wav'),
                    'options' => [
                        ['letter' => 'k', 'correct' => true],
                        ['letter' => 'b', 'correct' => false],
                        ['letter' => 'c', 'correct' => false],
                    ],
                ],
                [
                    'id' => 'Jagung',
                    'emoji' => asset('gambar/halaman_22/jagung.webp'),
                    'audio' => asset('audio/id/Halaman 22/jagung.wav'),
                    'options' => [
                        ['letter' => 'i', 'correct' => false],
                        ['letter' => 'j', 'correct' => true],
                        ['letter' => 'l', 'correct' => false],
                    ],
                ],
                [
                    'id' => 'Alpukat',
                    'emoji' => asset('gambar/halaman_22/alpukat.webp'),
                    'audio' => asset('audio/id/Halaman 22/alpukat.wav'),
                    'options' => [
                        ['letter' => 'u', 'correct' => false],
                        ['letter' => 'h', 'correct' => false],
                        ['letter' => 'a', 'correct' => true],
                    ],
                ],
                [
                    'id' => 'Bebek',
                    'emoji' => asset('gambar/halaman_22/bebek.webp'),
                    'audio' => asset('audio/id/Halaman 22/bebek.wav'),
                    'options' => [
                        ['letter' => 'a', 'correct' => false],
                        ['letter' => 'b', 'correct' => true],
                        ['letter' => 'd', 'correct' => false],
                    ],
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
