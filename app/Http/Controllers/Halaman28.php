<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman28 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        return $this->sukuBerakhiran(
            data: $this->getDataPublicHalaman28(),
            halaman: 28,
            judul: 'Halaman 28 - pilih AIUEO',
            deskripsi: 'Mengenal macam-macam! AIUEO',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman28(): array
    {
        /** @var list<array{
         *     master: string,
         *     items: list<array{
         *         id: string,
         *         name: string,
         *         emoji: string,
         *         hint: string,
         *         audio: string
         *     }>
         * }> $items
         */
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
        return [
            'items' => $items,
            'total_item' => count($items),

        ];
    }
}
