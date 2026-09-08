<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman28 extends Controller
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
            $judul = $lang === 'en' ? 'Page 28 - Choose AIUEO' : 'Halaman 28 - pilih AIUEO';
            $deskripsi = $lang === 'en' ? 'Learn about various letter sounds!' : 'Mengenal macam-macam! AIUEO';

            return $this->sukuBerakhiran(
                data: $this->getDataPublicHalaman28($lang),
                halaman: 28,
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
    public function getDataPublicHalaman28(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'masterPola' => 'nya nyi nyu nye nyo',
                    'audio' => asset('audio/id/Halaman 28/nya-nyi-nyu.wav'),

                    'items' => [
                        ['id' => 'Minyak', 'emoji' => asset('gambar/halaman_28/minyak.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 minyak.m4a')],
                        ['id' => 'Nyanyi', 'emoji' => asset('gambar/halaman_28/nyanyi.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 nyanyi.m4a')],
                        ['id' => 'Senyum', 'emoji' => asset('gambar/halaman_28/senyum.webp'), 'audio' => asset('audio/en/halaman 28/halaman 38 senyum.m4a')],
                        ['id' => 'Nyenyak', 'emoji' => asset('gambar/halaman_28/nyenyak.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 nyenyak.m4a')],
                        ['id' => 'Nyonya', 'emoji' => asset('gambar/halaman_28/nyonya.webp'), 'audio' => asset('audio/id/Halaman 28/nyonya.wav')],
                    ],
                ],
                [
                    'masterPola' => 'ang ing ung eng ong',
                    'audio' => asset('audio/id/Halaman 28/ang-ing-ung.wav'),

                    'items' => [
                        ['id' => 'Mangga', 'emoji' => asset('gambar/halaman_28/mangga.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 mangga.m4a')],
                        ['id' => 'Singa', 'emoji' => asset('gambar/halaman_28/singa.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 singa.m4a')],
                        ['id' => 'Sungai', 'emoji' => asset('gambar/halaman_28/sungai.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 sungai.m4a')],
                        ['id' => 'Banteng', 'emoji' => asset('gambar/halaman_28/banteng.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 banteng.m4a')],
                        ['id' => 'Tongkat', 'emoji' => asset('gambar/halaman_28/tongkat.webp'), 'audio' => asset('audio/en/halaman 28/halaman 28 tongkat.m4a')],
                    ],
                ],
            ];
        } else {
            $items = [
                [
                    'masterPola' => 'nya nyi nyu nye nyo',
                    'audio' => asset('audio/id/Halaman 28/nya-nyi-nyu.wav'),
                    'items' => [
                        ['id' => 'Minyak', 'emoji' => asset('gambar/halaman_28/minyak.webp'), 'audio' => asset('audio/id/Halaman 28/minyak.wav')],
                        ['id' => 'Nyanyi', 'emoji' => asset('gambar/halaman_28/nyanyi.webp'), 'audio' => asset('audio/id/Halaman 28/nyanyi.wav')],
                        ['id' => 'Senyum', 'emoji' => asset('gambar/halaman_28/senyum.webp'), 'audio' => asset('audio/id/Halaman 28/senyum.wav')],
                        ['id' => 'Nyenyak', 'emoji' => asset('gambar/halaman_28/nyenyak.webp'), 'audio' => asset('audio/id/Halaman 28/nyenyak.wav')],
                        ['id' => 'Nyonya', 'emoji' => asset('gambar/halaman_28/nyonya.webp'), 'audio' => asset('audio/id/Halaman 28/nyonya.wav')],
                    ],
                ],
                [
                    'masterPola' => 'ang ing ung eng ong',
                    'audio' => asset('audio/id/Halaman 28/ang-ing-ung.wav'),
                    'items' => [
                        ['id' => 'Mangga', 'emoji' => asset('gambar/halaman_28/mangga.webp'), 'audio' => asset('audio/id/Halaman 28/mangga.wav')],
                        ['id' => 'Singa', 'emoji' => asset('gambar/halaman_28/singa.webp'), 'audio' => asset('audio/id/Halaman 28/singa.wav')],
                        ['id' => 'Sungai', 'emoji' => asset('gambar/halaman_28/sungai.webp'), 'audio' => asset('audio/id/Halaman 28/sungai.wav')],
                        ['id' => 'Banteng', 'emoji' => asset('gambar/halaman_28/banteng.webp'), 'audio' => asset('audio/id/Halaman 28/banteng.wav')],
                        ['id' => 'Tongkat', 'emoji' => asset('gambar/halaman_28/tongkat.webp'), 'audio' => asset('audio/id/Halaman 28/tongkat.wav')],
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
