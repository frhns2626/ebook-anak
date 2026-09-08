<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman3 extends Controller
{
    /**
     * @param  Request  $request
     * @return View
     *
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {
        $lang = $request->query('lang', 'id');

        return $this->pengenalanAudio(
            data: $this->getDataPublicHalaman3($lang),
            halaman: 3,
            judul: 'Halaman 3 - Mengenal Benda & Hewan 🦒',
            deskripsi: 'Mengenal macam-macam benda dan hewan yang seru!',
            lang: $lang,
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman3($lang): array
    {
        $id = [
            ['id' => 'gajah', 'emoji' => asset('gambar/halaman_3/gajah.webp'), 'audio' => asset('audio/id/Halaman 3/gajah.wav')],
            ['id' => 'helicopter', 'emoji' => asset('gambar/halaman_3/helikopter.webp'), 'audio' => asset('audio/id/Halaman 3/helipoter.wav')],
            ['id' => 'ikan', 'emoji' => asset('gambar/halaman_3/ikan.webp'), 'audio' => asset('audio/id/Halaman 3/ikan.wav')],
            ['id' => 'jerapah', 'emoji' => asset('gambar/halaman_3/jerapah.webp'), 'audio' => asset('audio/id/Halaman 3/jerapah.wav')],
            ['id' => 'kelelawar', 'emoji' => asset('gambar/halaman_3/kelelawar.webp'), 'audio' => asset('audio/id/Halaman 3/kelelawar.wav')],
            ['id' => 'lampu', 'emoji' => asset('gambar/halaman_3/lampu.webp'), 'audio' => asset('audio/id/Halaman 3/lampu.wav')],
        ];

        $en = [
            ['id' => 'gajah', 'emoji' => asset('gambar/halaman_3/gajah.webp'), 'audio' => asset('audio/en/Halaman 3/1. gajah.m4a')],
            ['id' => 'helicopter', 'emoji' => asset('gambar/halaman_3/helikopter.webp'), 'audio' => asset('audio/en/Halaman 3/2. helikopter.m4a')],
            ['id' => 'ikan', 'emoji' => asset('gambar/halaman_3/ikan.webp'), 'audio' => asset('audio/en/Halaman 3/3. ikan.m4a')],
            ['id' => 'jerapah', 'emoji' => asset('gambar/halaman_3/jerapah.webp'), 'audio' => asset('audio/en/Halaman 3/4. jerapah.m4a')],
            ['id' => 'kelelawar', 'emoji' => asset('gambar/halaman_3/kelelawar.webp'), 'audio' => asset('audio/en/Halaman 3/5. kelelawar.m4a')],
            ['id' => 'lampu', 'emoji' => asset('gambar/halaman_3/lampu.webp'), 'audio' => asset('audio/en/Halaman 3/6. lampu.m4a')],
        ];
        $items = $lang === 'en' ? $en : $id;

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
