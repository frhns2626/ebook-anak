<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman22 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman22();

        return $this->cariHurufPertama(

            data: $data,
            items: $data['items'],
            halaman: 22,
            judul: 'Halaman 22 - Tebak Huruf Depan 🔤',
            deskripsi: 'Lihat gambarnya, tebak huruf depannya!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman22(): array
    {
        $items = [
            [
                'id' => 'kelinci',
                'name' => 'Kelinci',
                'emoji' => '🐰',
                'hint' => 'Kelinci adalah hewan berbulu yang lompat!',
                'audio' => asset('audio/Halaman 22/1. kelinci.m4a'),
            ],
            [
                'id' => 'jagung',
                'name' => 'Jagung',
                'emoji' => '🌽',
                'hint' => 'Jagung adalah tanaman pangan berwarna kuning!',
                'audio' => asset('audio/Halaman 22/2. jagung.m4a'),
            ],
            [
                'id' => 'alpukat',
                'name' => 'Alpukat',
                'emoji' => '🥑',
                'hint' => 'Alpukat adalah buah hijau berisi lemak sehat!',
                'audio' => asset('audio/Halaman 22/3. alpukat.m4a'),
            ],
            [
                'id' => 'bebek',
                'name' => 'Bebek',
                'emoji' => '🦆',
                'hint' => 'Bebek adalah unggas air yang berenang!',
                'audio' => asset('audio/Halaman 22/4. bebek.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
