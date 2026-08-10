<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman5 extends Controller
{


    /**
     * @return \Illuminate\View\View
     * @throws Exception
     */
    #[Override]
    public function index(): View
    {
        try {
            return $this->pengenalanAudio(
                data: $this->getDataPublicHalaman5(),
                halaman: 5,
                judul: 'Halaman 5 - Mengenal Dunia Hewan 🦁',
                deskripsi: 'Mengenal macam-macam teman hewan yang lucu!',
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman5(): array
    {
        $id = [
            ['id' => 'singa', 'emoji' => asset('gambar/halaman_5/singa.webp'), 'audio' => asset('audio/id/Halaman 5/singa.wav')],
            ['id' => 'tomat', 'emoji' => asset('gambar/halaman_5/tomat.webp'), 'audio' => asset('audio/id/Halaman 5/tomat.wav')],
            ['id' => 'ubi', 'emoji' => asset('gambar/halaman_5/ubi.webp'), 'audio' => asset('audio/id/Halaman 5/ubi.wav')],
            ['id' => 'vespa', 'emoji' => asset('gambar/halaman_5/vespa.webp'), 'audio' => asset('audio/id/Halaman 5/vespa.wav')],
            ['id' => 'wortel', 'emoji' => asset('gambar/halaman_5/wortel.webp'), 'audio' => asset('audio/id/Halaman 5/wortel.wav')],
            ['id' => 'xilofon', 'emoji' => asset('gambar/halaman_5/xilofon.webp'), 'audio' => asset('audio/id/Halaman 5/xilofon.wav')],
            ['id' => 'yoyo', 'emoji' => asset('gambar/halaman_5/yoyo.webp'), 'audio' => asset('audio/id/Halaman 5/yoyo.wav')],
            ['id' => 'zebra', 'emoji' => asset('gambar/halaman_5/zebra.webp'), 'audio' => asset('audio/id/Halaman 5/zebra.wav')],
        ];

        $en = [
            ['id' => 'singa', 'emoji' => asset('gambar/halaman_5/singa.webp'), 'audio' => asset('audio/en/Halaman 5/1. singa.m4a')],
            ['id' => 'tomat', 'emoji' => asset('gambar/halaman_5/tomat.webp'), 'audio' => asset('audio/en/Halaman 5/2. tomat.m4a')],
            ['id' => 'ubi', 'emoji' => asset('gambar/halaman_5/ubi.webp'), 'audio' => asset('audio/en/Halaman 5/3. ubi.m4a')],
            ['id' => 'vespa', 'emoji' => asset('gambar/halaman_5/vespa.webp'), 'audio' => asset('audio/en/Halaman 5/4. vespa.m4a')],
            ['id' => 'wortel', 'emoji' => asset('gambar/halaman_5/wortel.webp'), 'audio' => asset('audio/en/Halaman 5/5. wortel.m4a')],
            ['id' => 'xilofon', 'emoji' => asset('gambar/halaman_5/xilofon.webp'), 'audio' => asset('audio/en/Halaman 5/6. xilofon.m4a')],
            ['id' => 'yoyo', 'emoji' => asset('gambar/halaman_5/yoyo.webp'), 'audio' => asset('audio/en/Halaman 5/7. yoyo.m4a')],
            ['id' => 'zebra', 'emoji' => asset('gambar/halaman_5/zebra.webp'), 'audio' => asset('audio/en/Halaman 5/8. zebra.m4a')],
        ];

        return [
            'items' => $id,
            'total_item' => count($id),
        ];
    }
}
