<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman25 extends Controller
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
                ? 'Page 25 - Match & Write 🤖'
                : 'Halaman 25 - Mencocokan Dan Menulis 🤖';
            $deskripsi = $lang === 'en'
                ? 'Match the picture to the correct word!'
                : 'Mengenal macam-macam!';

            return $this->hubungkanTulisGame(
                data: $this->getDataPublicHalaman25($lang),
                halaman: 25,
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
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman25(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'id' => 'Robot',
                    'emoji' => asset('gambar/halaman_25/robot.webp'),
                    'audio' => asset('audio/en/Halaman 25/1. robot.m4a'),
                ],
                [
                    'id' => 'Lilin',
                    'emoji' => asset('gambar/halaman_25/lilin.webp'),
                    'audio' => asset('audio/en/Halaman 25/2. lilin.m4a'),
                ],
                [
                    'id' => 'Mobil',
                    'emoji' => asset('gambar/halaman_25/mobil.webp'),
                    'audio' => asset('audio/en/Halaman 25/3. mobil.m4a'),
                ],
            ];
        } else {
            $items = [
                [
                    'id' => 'Robot',
                    'emoji' => asset('gambar/halaman_25/robot.webp'),
                    'audio' => asset('audio/id/Halaman 25/robot.mp3'),
                ],
                [
                    'id' => 'Lilin',
                    'emoji' => asset('gambar/halaman_25/lilin.webp'),
                    'audio' => asset('audio/id/Halaman 25/lilin.mp3'),
                ],
                [
                    'id' => 'Mobil',
                    'emoji' => asset('gambar/halaman_25/mobil.webp'),
                    'audio' => asset('audio/id/Halaman 25/mobil.mp3'),
                ],
            ];
        }

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
