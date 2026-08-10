<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman26 extends Controller
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
            $judul = $lang === 'en' ? 'Page 26 - Choose AIUEO' : 'Halaman 26 - pilih AIUEO';
            $deskripsi = $lang === 'en' ? 'Learn about various vowel combinations!' : 'Mengenal macam-macam! AIUEO';

            return $this->sukuBerakhiran(
                data: $this->getDataPublicHalaman26($lang),
                halaman: 26,
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
    public function getDataPublicHalaman26(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'masterPola' => 'ai au ao oi ei',
                    'audio' => asset('audio/id/Halaman 26/ai.wav'),
                    'items' => [
                        ['id' => 'Cabai', 'emoji' => asset('gambar/halaman_26/cabai.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 cabai.m4a')],
                        ['id' => 'Danau', 'emoji' => asset('gambar/halaman_26/danau.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 danau.m4a')],
                        ['id' => 'Bakpao', 'emoji' => asset('gambar/halaman_26/bakpau.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 bakpao.m4a')],
                        ['id' => 'Koboi', 'emoji' => asset('gambar/halaman_26/koboi.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 koboi.m4a')],
                        ['id' => 'Bulberry', 'emoji' => asset('gambar/halaman_26/murbei.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 mulberry.m4a')],
                    ],
                ],
                [
                    'masterPola' => 'ia iu ue ua eo',
                    'audio' => asset('audio/id/Halaman 26/ia.wav'),
                    'items' => [
                        ['id' => 'Bakpia', 'emoji' => asset('gambar/halaman_26/bakpia.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 bakpia.m4a')],
                        ['id' => 'Hiu', 'emoji' => asset('gambar/halaman_26/hiu.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 hiu.m4a')],
                        ['id' => 'Kue', 'emoji' => asset('gambar/halaman_26/kue.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 kue.m4a')],
                        ['id' => 'Benua', 'emoji' => asset('gambar/halaman_26/benua.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 benua.m4a')],
                        ['id' => 'Video', 'emoji' => asset('gambar/halaman_26/video.webp'), 'audio' => asset('audio/en/halaman 26/halaman 26 video.m4a')],
                    ],
                ],
            ];
        } else {
            $items = [
                [
                    'masterPola' => 'ai au ao oi ei',
                    'audio' => asset('audio/id/Halaman 26/ai.wav'),
                    'items' => [
                        ['id' => 'Cabai', 'emoji' => asset('gambar/halaman_26/cabai.webp'), 'audio' => asset('audio/id/Halaman 26/cabai.wav')],
                        ['id' => 'Danau', 'emoji' => asset('gambar/halaman_26/danau.webp'), 'audio' => asset('audio/id/Halaman 26/danau.wav')],
                        ['id' => 'Bakpao', 'emoji' => asset('gambar/halaman_26/bakpau.webp'), 'audio' => asset('audio/id/Halaman 26/bakpau.wav')],
                        ['id' => 'Koboi', 'emoji' => asset('gambar/halaman_26/koboi.webp'), 'audio' => asset('audio/id/Halaman 26/koboi.wav')],
                        ['id' => 'Bulberry', 'emoji' => asset('gambar/halaman_26/murbei.webp'), 'audio' => asset('audio/id/Halaman 26/murbei.wav')],
                    ],
                ],
                [
                    'masterPola' => 'ia iu ue ua eo',
                    'audio' => asset('audio/id/Halaman 26/ia.wav'),
                    'items' => [
                        ['id' => 'Bakpia', 'emoji' => asset('gambar/halaman_26/bakpia.webp'), 'audio' => asset('audio/id/Halaman 26/bakpia.wav')],
                        ['id' => 'Hiu', 'emoji' => asset('gambar/halaman_26/hiu.webp'), 'audio' => asset('audio/id/Halaman 26/hiu.wav')],
                        ['id' => 'Kue', 'emoji' => asset('gambar/halaman_26/kue.webp'), 'audio' => asset('audio/id/Halaman 26/kue.wav')],
                        ['id' => 'Benua', 'emoji' => asset('gambar/halaman_26/benua.webp'), 'audio' => asset('audio/id/Halaman 26/benua.wav')],
                        ['id' => 'Video', 'emoji' => asset('gambar/halaman_26/video.webp'), 'audio' => asset('audio/id/Halaman 26/video.wav')],
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

