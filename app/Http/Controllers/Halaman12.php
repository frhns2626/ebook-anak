<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman12 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->tebakAkhirHuruf(
            data: $this->getDataPublicHalaman12(),
            halaman: 12,
            judul: 'Halaman 12 - Benda Sekitar 🏠',
            deskripsi: 'Mengenal benda-benda di sekitar kita!');
    }

    /**
     * @throws BindingResolutionException
     */
    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman12(): array
    {
        $items = [
            [
                'id' => 'meja',
                'emoji' => asset('gambar/halaman_12/meja.webp'),
                'audio' => asset('audio/id/Halaman 12/meja.wav'),
            ],
            [
                'id' => 'kursi',
                'emoji' => asset('gambar/halaman_12/kursi.webp'),
                'audio' => asset('audio/id/Halaman 12/kursi.wav'),
            ],
            [
                'id' => 'buku',
                'emoji' => asset('gambar/halaman_12/buku.webp'),
                'audio' => asset('audio/id/Halaman 12/buku.wav'),
            ],
            [
                'id' => 'lele',
                'emoji' => asset('gambar/halaman_12/lele.webp'),
                'audio' => asset('audio/id/Halaman 12/lele.wav'),
            ],
            [
                'id' => 'bola',
                'emoji' => asset('gambar/halaman_12/bola.webp'),
                'audio' => asset('audio/id/Halaman 12/bola.wav'),
            ],
            [
                'id' => 'sapi',
                'emoji' => asset('gambar/halaman_12/sapi.webp'),
                'audio' => asset('audio/id/Halaman 12/sapi.wav'),
            ],
            [
                'id' => 'kue',
                'emoji' => asset('gambar/halaman_12/kue.webp'),
                'audio' => asset('audio/id/Halaman 12/kue.wav'),
            ],
            [
                'id' => 'sate',
                'emoji' => asset('gambar/halaman_12/sate.webp'),
                'audio' => asset('audio/id/Halaman 12/sate.wav'),
            ],
            [
                'id' => 'foto',
                'emoji' => asset('gambar/halaman_12/foto.webp'),
                'audio' => asset('audio/id/Halaman 12/foto.wav'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
