<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman29 extends Controller
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
            $judul = $lang === 'en' ? 'Page 29 - Complete the Word' : 'Halaman 29 - Melengkapi kata';
            $deskripsi = $lang === 'en' ? 'Learn about various syllables!' : 'Mengenal macam-macam suku kata!';

            return $this->melengkapiSukukata(
                data: $this->getDataPublicHalaman29($lang),
                halaman: 29,
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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getDataPublicHalaman29(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $pembukaan = asset('audio/en/Halaman 29 -30/halaman 29.m4a');
            $items = [
                [
                    'id' => 'Tomat',
                    'emoji' => asset('gambar/halaman_29/tomat.webp'),
                    'audio' => asset('audio/en/Halaman 29 -30/1. tomat.m4a')
                ],
                [
                    'id' => 'Kelinci',
                    'emoji' => asset('gambar/halaman_29/kelinci.webp'),
                    'audio' => asset('audio/en/Halaman 29 -30/3. kelinci.m4a')
                ],
                [
                    'id' => 'Payung',
                    'emoji' => asset('gambar/halaman_29/payung.webp'),
                    'audio' => asset('audio/en/Halaman 29 -30/2. payung.m4a')
                ],
            ];
        } else {
            $pembukaan = asset('audio/id/Halaman 29/pembukaan.wav');
            $items = [
                [
                    'id' => 'Tomat',
                    'emoji' => asset('gambar/halaman_29/tomat.webp'),
                    'audio' => asset('audio/id/Halaman 29/tomat.wav')
                ],
                [
                    'id' => 'Kelinci',
                    'emoji' => asset('gambar/halaman_29/kelinci.webp'),
                    'audio' => asset('audio/id/Halaman 29/kelinci.wav')
                ],
                [
                    'id' => 'Payung',
                    'emoji' => asset('gambar/halaman_29/payung.webp'),
                    'audio' => asset('audio/id/Halaman 29/payung.wav')
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

