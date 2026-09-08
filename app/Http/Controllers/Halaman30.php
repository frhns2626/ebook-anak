<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman30 extends Controller
{
    /**
     * @param  Request  $request
     * @return View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = $request->input('lang', 'id');
            $judul = $lang === 'en' ? 'Page 30 - Read and Rewrite' : 'Halaman 30 - Baca dan Tulis Kembali';
            $deskripsi = $lang === 'en' ? 'Read the syllables, then rewrite the full word!' : 'Baca suku katanya, lalu tulis kembali kata utuhnya!';

            return $this->tulisKata(
                data: $this->getDataPublicHalaman30($lang),
                halaman: 30,
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
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman30(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $pembukaan = asset('audio/en/Halaman 29 -30/halaman 30.m4a');
            $items = [
                ['id' => 'Bola', 'emoji' => asset('gambar/halaman_30/bola.webp'), 'audio' => asset('audio/en/Halaman 29 -30/4. bola.m4a')],
                ['id' => 'Buaya', 'emoji' => asset('gambar/halaman_30/buaya.webp'), 'audio' => asset('audio/en/Halaman 29 -30/5. buaya.m4a')],
                ['id' => 'Donat', 'emoji' => asset('gambar/halaman_30/donat.webp'), 'audio' => asset('audio/en/Halaman 29 -30/6. donat.m4a')],
                ['id' => 'Jerapah', 'emoji' => asset('gambar/halaman_30/jerapah.webp'), 'audio' => asset('audio/en/Halaman 29 -30/7 jerapah.m4a')],
            ];
        } else {
            $pembukaan = asset('audio/id/Halaman 30/pembukaan.wav');
            $items = [
                ['id' => 'Bola', 'emoji' => asset('gambar/halaman_30/bola.webp'), 'audio' => asset('audio/id/Halaman 30/bola.wav')],
                ['id' => 'Buaya', 'emoji' => asset('gambar/halaman_30/buaya.webp'), 'audio' => asset('audio/id/Halaman 30/buaya.wav')],
                ['id' => 'Donat', 'emoji' => asset('gambar/halaman_30/donat.webp'), 'audio' => asset('audio/id/Halaman 30/donat.wav')],
                ['id' => 'Jerapah', 'emoji' => asset('gambar/halaman_30/jerapah.webp'), 'audio' => asset('audio/id/Halaman 30/jerapah.wav')],
            ];
        }

        return [
            'pembukaan' => $pembukaan,
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
