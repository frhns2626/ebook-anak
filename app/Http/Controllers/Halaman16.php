<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman16 extends Controller
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
                ? 'Page 16 - Closed Syllables -K & -N 🪙'
                : 'Halaman 16 - Suku Kata Berakhiran -N 🪙';
            $deskripsi = $lang === 'en'
                ? 'Match words with their ending consonants!'
                : 'Cocokkan kata dengan akhiran konsonan matinya!';

            return $this->sukuBerakhiran(
                data: $this->getDataPublicHalaman16($lang),
                halaman: 16,
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
    public function getDataPublicHalaman16(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'masterPola' => 'ak ik uk ek ok',
                    'audio' => asset('audio/id/Halaman 16/ak ik uk ek ok.wav'),
                    'items' => [
                        ['id' => 'Badak', 'emoji' => asset('gambar/halaman_16/badak.webp'), 'ending' => 'ak', 'audio' => asset('audio/en/halaman 16-19/halaman 16. badak.m4a')],
                        ['id' => 'Batik', 'emoji' => asset('gambar/halaman_16/batik.webp'), 'ending' => 'ik', 'audio' => asset('audio/en/halaman 16-19/batik.mp3')],
                        ['id' => 'Lauk', 'emoji' => asset('gambar/halaman_16/lauk.webp'), 'ending' => 'uk', 'audio' => asset('audio/en/halaman 16-19/lauk.mp3')],
                        ['id' => 'Bebek', 'emoji' => asset('gambar/halaman_16/bebek.webp'), 'ending' => 'ek', 'audio' => asset('audio/en/halaman 16-19/halaman 16. bebek.m4a')],
                        ['id' => 'Kodok', 'emoji' => asset('gambar/halaman_16/kodok.webp'), 'ending' => 'ok', 'audio' => asset('audio/en/halaman 16-19/kodok.mp3')],
                    ],
                ],
                [
                    'masterPola' => 'an in un en on',
                    'audio' => asset('audio/id/Halaman 16/an in un en on.wav'),

                    'items' => [
                        ['id' => 'Taman', 'emoji' => asset('gambar/halaman_16/taman.webp'), 'ending' => 'an', 'audio' => asset('audio/en/halaman 16-19/halaman 16 taman.m4a')],
                        ['id' => 'Koin', 'emoji' => asset('gambar/halaman_16/koin.webp'), 'ending' => 'in', 'audio' => asset('audio/en/halaman 16-19/halaman 16 koin.m4a')],
                        ['id' => 'Timun', 'emoji' => asset('gambar/halaman_16/timun.webp'), 'ending' => 'un', 'audio' => asset('audio/en/halaman 16-19/halaman 16 timun.m4a')],
                        ['id' => 'Permen', 'emoji' => asset('gambar/halaman_16/permen.webp'), 'ending' => 'en', 'audio' => asset('audio/en/halaman 16-19/halaman 16 permen.m4a')],
                        ['id' => 'Melon', 'emoji' => asset('gambar/halaman_16/melon.webp'), 'ending' => 'on', 'audio' => asset('audio/en/halaman 16-19/halaman 16 melon.m4a')],
                    ],
                ],
            ];
        } else {
            $items = [
                [
                    'masterPola' => 'ak ik uk ek ok',
                    'audio' => asset('audio/id/Halaman 16/ak ik uk ek ok.wav'),
                    'items' => [
                        ['id' => 'Badak', 'emoji' => asset('gambar/halaman_16/badak.webp'), 'ending' => 'ak', 'audio' => asset('audio/id/Halaman 16/badak.wav')],
                        ['id' => 'Batik', 'emoji' => asset('gambar/halaman_16/batik.webp'), 'ending' => 'ik', 'audio' => asset('audio/id/Halaman 16/batik.wav')],
                        ['id' => 'Lauk', 'emoji' => asset('gambar/halaman_16/lauk.webp'), 'ending' => 'uk', 'audio' => asset('audio/id/Halaman 16/lauk.wav')],
                        ['id' => 'Bebek', 'emoji' => asset('gambar/halaman_16/bebek.webp'), 'ending' => 'ek', 'audio' => asset('audio/id/Halaman 16/bebek.wav')],
                        ['id' => 'Kodok', 'emoji' => asset('gambar/halaman_16/kodok.webp'), 'ending' => 'ok', 'audio' => asset('audio/id/Halaman 16/kodok.wav')],
                    ],
                ],
                [
                    'masterPola' => 'an in un en on',
                    'audio' => asset('audio/id/Halaman 16/an in un en on.wav'),
                    'items' => [
                        ['id' => 'Taman', 'emoji' => asset('gambar/halaman_16/taman.webp'), 'ending' => 'an', 'audio' => asset('audio/id/Halaman 16/taman.wav')],
                        ['id' => 'Koin', 'emoji' => asset('gambar/halaman_16/koin.webp'), 'ending' => 'in', 'audio' => asset('audio/id/Halaman 16/koin.wav')],
                        ['id' => 'Timun', 'emoji' => asset('gambar/halaman_16/timun.webp'), 'ending' => 'un', 'audio' => asset('audio/id/Halaman 16/timun.wav')],
                        ['id' => 'Permen', 'emoji' => asset('gambar/halaman_16/permen.webp'), 'ending' => 'en', 'audio' => asset('audio/id/Halaman 16/permen.wav')],
                        // Note: melon.wav not in ID folder — fallback to EN audio
                        ['id' => 'Melon', 'emoji' => asset('gambar/halaman_16/melon.webp'), 'ending' => 'on', 'audio' => asset('audio/id/Halaman 16/melon.wav')],
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
