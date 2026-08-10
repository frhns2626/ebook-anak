<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman3 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        return $this->pengenalanAudio(
            data: $this->getDataPublicHalaman3(),
            halaman: 3,
            judul: 'Halaman 3 - Mengenal Benda & Hewan 🦒',
            deskripsi: 'Mengenal macam-macam benda dan hewan yang seru!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman3(): array
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
            ['id' => 'helicopter', 'emoji' => asset('gambar/halaman_3/helicopter.webp'), 'audio' => asset('audio/en/Halaman 3/2. helicopter.m4a')],
            ['id' => 'ikan', 'emoji' => asset('gambar/halaman_3/ikan.webp'), 'audio' => asset('audio/en/Halaman 3/3. ikan.m4a')],
            ['id' => 'jerapah', 'emoji' => asset('gambar/halaman_3/jerapah.webp'), 'audio' => asset('audio/en/Halaman 3/4. jerapah.m4a')],
            ['id' => 'kelelawar', 'emoji' => asset('gambar/halaman_3/kelelawar.webp'), 'audio' => asset('audio/en/Halaman 3/5. kelelawar.m4a')],
            ['id' => 'lampu', 'emoji' => asset('gambar/halaman_3/lampu.webp'), 'audio' => asset('audio/en/Halaman 3/6. lampu.m4a')],
        ];

        return [
            'items' => $id,
            'total_item' => count($id),
        ];
    }
}
