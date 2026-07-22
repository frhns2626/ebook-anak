<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman8 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman8();

        return $this->hubungkanGame(
            data: $data,
            items: $data['items'],
            halaman: 8,
            judul: 'Halaman 8 - Mencocokkan Huruf & Hewan',
            deskripsi: 'Ayo cocokkan huruf dengan nama hewan yang sesuai!'

        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman8(): array
    {
        /** @var list<array{
         * id: string,
         * letter: string,
         * name: string,
         * emoji: string,
         * hint: string,
         * audio: string
         * }> $items
         */
        $items = [
            [
                'id' => 'bebek',
                'letter' => 'B',
                'name' => 'Bebek',
                'emoji' => '🦆',
                'hint' => 'Bebek adalah burung air yang suka berenang di kolam!',
                'audio' => asset('audio/Halaman 8/1. bebek.m4a'),
            ],
            [
                'id' => 'kucing',
                'letter' => 'K',
                'name' => 'Kucing',
                'emoji' => '🐱',
                'hint' => 'Kucing adalah hewan peliharaan yang lucu dan suka mengeong!',
                'audio' => asset('audio/Halaman 8/2. kucing.m4a'),
            ],
            [
                'id' => 'gurita',
                'letter' => 'G',
                'name' => 'Gurita',
                'emoji' => '🐙',
                'hint' => 'Gurita adalah hewan laut dengan 8 lengan yang panjang!',
                'audio' => asset('audio/Halaman 8/3. gurita.m4a'),
            ],
            [
                'id' => 'hiu',
                'letter' => 'H',
                'name' => 'Hiu',
                'emoji' => '🦈',
                'hint' => 'Hiu adalah ikan predator besar yang tinggal di laut!',
                'audio' => asset('audio/Halaman 8/4 .hiu.m4a'),
            ],
        ];

        return [
            'audio' => asset('audio/Halaman 8/halaman 8 bhs. indonesia.m4a'),
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
