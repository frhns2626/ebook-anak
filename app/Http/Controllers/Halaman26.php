<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman26 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->sukuBerakhiran(
            data: $this->getDataPublicHalaman26(),
            halaman: 26,
            judul: 'Halaman 26 - pilih AIUEO',
            deskripsi: 'Mengenal macam-macam! AIUEO',
        );
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman26(): array
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
                'masterPola' => 'ai au ao oi ei',
                'audio' => asset('audio/id/Halaman 26/ia.wav'),
                'items' => [
                    ['id' => 'Cabai', 'emoji' => asset('gambar/halaman_26/cabai.webp'), 'audio' => asset('audio/id/Halaman 26/cabai.wav')],
                    ['id' => 'Danau', 'emoji' => asset('gambar/halaman_26/danau.webp'), 'audio' => asset('audio/id/Halaman 26/danau.wav')],
                    ['id' => 'Bakpao', 'emoji' => asset('gambar/halaman_26/bakpau.webp'), 'audio' => asset('audio/id/Halaman 26/bakpau.wav')],
                    ['id' => 'Koboi', 'emoji' => asset('gambar/halaman_26/koboi.webp'), 'audio' => asset('audio/id/Halaman 26/koboi.wav')],
                    ['id' => 'Bulberry', 'emoji' => asset('gambar/halaman_26/murbei.webp'), 'audio' => asset('audio/id/Halaman 26/bulberry.wav')],
                ],
            ],
            [
                'masterPola' => 'ia iu ue ua eo',
                'audio' => asset('audio/id/Halaman 26/ai.wav'),
                'items' => [
                    ['id' => 'Bakpia', 'emoji' => asset('gambar/halaman_26/bakpia.webp'), 'audio' => asset('audio/id/Halaman 26/bakpia.wav')],
                    ['id' => 'Hiu', 'emoji' => asset('gambar/halaman_26/hiu.webp'), 'audio' => asset('audio/id/Halaman 26/hiu.wav')],
                    ['id' => 'Kue', 'emoji' => asset('gambar/halaman_26/kue.webp'), 'audio' => asset('audio/id/Halaman 26/kue.wav')],
                    ['id' => 'Benua', 'emoji' => asset('gambar/halaman_26/benua.webp'), 'audio' => asset('audio/id/Halaman 26/benua.wav')],
                    ['id' => 'Video', 'emoji' => asset('gambar/halaman_26/video.webp'), 'audio' => asset('audio/id/Halaman 26/video.wav')],
                ],
            ],
        ];
        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
