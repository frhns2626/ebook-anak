<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman8 extends Controller
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

            return $this->hubungkanGame(
                data: $this->getDataPublicHalaman8($lang),
                halaman: 8,
                judul: 'Halaman 8 - Mencocokkan Huruf & Hewan',
                deskripsi: 'Ayo cocokkan huruf dengan nama hewan yang sesuai!',
                lang: $lang
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * Data pasangan huruf ↔ nama hewan Halaman 8 (Game Hubungkan / Match Pair).
     *
     * Struktur per item:
     *   - id     : nama unik (bahasa Indonesia, sebagai identifier)
     *   - letter : pasangan huruf (huruf besar + kecil, misal "Bb")
     *   - emoji  : path gambar hewan (webp, folder gambar/halaman_8)
     *   - audio  : path file audio (baca nama hewan) sesuai bahasa yang dipilih
     *
     * Return array:
     *   - audio      : path audio pembuka (narasi halaman)
     *   - items      : list data hewan
     *   - total_item : jumlah total item
     *
     * @param  string  $lang  'id' (default) | 'en'
     * @return array{audio: string, items: list<array{id: string, letter: string, emoji: string, audio: string}>, total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman8(string $lang): array
    {
        if ($lang === 'en') {
            $items = [
                ['id' => 'Bebek', 'letter' => 'Bb', 'emoji' => asset('gambar/halaman_8/bebek.webp'), 'audio' => asset('audio/en/Halaman 8/1. bebek.m4a')],
                ['id' => 'Kucing', 'letter' => 'Kk', 'emoji' => asset('gambar/halaman_8/kucing.webp'), 'audio' => asset('audio/en/Halaman 8/2. kucing.m4a')],
                ['id' => 'Gurita', 'letter' => 'Gg', 'emoji' => asset('gambar/halaman_8/gurita.webp'), 'audio' => asset('audio/en/Halaman 8/3. gurita.m4a')],
                ['id' => 'Hiu', 'letter' => 'Hh', 'emoji' => asset('gambar/halaman_8/hiu.webp'), 'audio' => asset('audio/en/Halaman 8/4. hiu.m4a')],
            ];
            $audioPembuka = asset('audio/en/Halaman 8/halaman 8 bhs. indonesia.m4a');
        } else {
            $items = [
                ['id' => 'Bebek', 'letter' => 'Bb', 'emoji' => asset('gambar/halaman_8/bebek.webp'), 'audio' => asset('audio/id/Halaman 8/bebek.wav')],
                ['id' => 'Kucing', 'letter' => 'Kk', 'emoji' => asset('gambar/halaman_8/kucing.webp'), 'audio' => asset('audio/id/Halaman 8/kucing.wav')],
                ['id' => 'Gurita', 'letter' => 'Gg', 'emoji' => asset('gambar/halaman_8/gurita.webp'), 'audio' => asset('audio/id/Halaman 8/gurita.wav')],
                ['id' => 'Hiu', 'letter' => 'Hh', 'emoji' => asset('gambar/halaman_8/hiu.webp'), 'audio' => asset('audio/id/Halaman 8/hiu.wav')],
            ];
            $audioPembuka = asset('audio/id/Halaman 8/pembuka.wav');
        }

        return [
            'audio' => $audioPembuka,
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
