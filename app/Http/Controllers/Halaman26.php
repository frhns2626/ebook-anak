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
        $data = $this->getDataPublicHalaman26();

        return $this->aiueoPilih(
            data: $data,
            items: $data['items'],
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
                'master' => 'ai au ao oi ei',
                'items' => [
                    [
                        'id' => 'cabai',
                        'name' => 'Cabai',
                        'emoji' => '🌶️',
                        'hint' => 'Cabai adalah bumbu pedas!',
                        'audio' => asset('audio/halaman 26/halaman 26 cabai.m4a'),
                    ],
                    ['id' => 'danau', 'name' => 'Danau', 'emoji' => '🏞️',
                        'hint' => 'Danau adalah air yang dikelilingi daratan!', 'audio' => asset('audio/halaman 26/halaman 26 danau.m4a')],
                    ['id' => 'bakpao', 'name' => 'Bakpao', 'emoji' => '🥮', 'hint' => 'Bakpao adalah roti kukus isi daging!', 'audio' => asset('audio/halaman 26/halaman 26 bakpao.m4a')],
                    ['id' => 'koboi', 'name' => 'Koboi', 'emoji' => '🤠', 'hint' => 'Koboi adalah penunggang kuda dari Barat!', 'audio' => asset('audio/halaman 26/halaman 26 koboi.m4a')],
                    ['id' => 'bulberry', 'name' => 'Bulberry', 'emoji' => '🫐', 'hint' => 'Bulberry adalah buah kecil berwarna biru!', 'audio' => asset('audio/halaman 26/halaman 26 mulberry.m4a')],
                ],
            ],
            [
                'master' => 'ia iu ue ua eo',
                'items' => [
                    ['id' => 'bakpia', 'name' => 'Bakpia', 'emoji' => '🥮', 'hint' => 'Bakpia adalah kue khas Yogyakarta!', 'audio' => asset('audio/halaman 26/halaman 26 bakpia.m4a')],
                    ['id' => 'hiu', 'name' => 'Hiu', 'emoji' => '🦈', 'hint' => 'Hiu adalah ikan predator laut!', 'audio' => asset('audio/halaman 26/halaman 26 hiu.m4a')],
                    ['id' => 'kue', 'name' => 'Kue', 'emoji' => '🎂', 'hint' => 'Kue adalah makanan manis untuk pesta!', 'audio' => asset('audio/halaman 26/halaman 26 kue.m4a')],
                    ['id' => 'benua', 'name' => 'Benua', 'emoji' => '🌍', 'hint' => 'Benua adalah daratan luas di bumi!', 'audio' => asset('audio/halaman 26/halaman 26 benua.m4a')],
                    ['id' => 'video', 'name' => 'Video', 'emoji' => '📹', 'hint' => 'Video adalah rekaman gambar bergerak!', 'audio' => asset('audio/halaman 26/halaman 26 video.m4a')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
