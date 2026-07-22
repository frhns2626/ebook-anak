<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman4 extends Controller
{
    /**
     * @return \Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman4();

        return $this->pengenalanAudio(
            data: $data,
            items: $data['items'],
            halaman: 4,
            judul: 'Halaman 4 - Mengenal Benda & Hewan 🐋',
            deskripsi: 'Mengenal macam-macam benda dan hewan yang seru!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman4(): array
    {
        $items = [
            ['id' => 'mangga',
                'name' => 'Mangga',
                'emoji' => '🥭',
                'hint' => 'Mangga adalah buah berwarna kuning-oranye yang manis!',
                'color' => 'hover:border-red-200',
                'bg' => 'bg-red-100 text-red-600',
                'category' => 'Buah',
                'audio' => asset('audio/Halaman 4/1. mangga.m4a')],
            ['id' => 'nanas',
                'name' => 'Nanas',
                'emoji' => '🍍',
                'hint' => 'Nanas adalah buah berwarna kuning yang asam-manis!',
                'color' => 'hover:border-amber-200',
                'bg' => 'bg-amber-100 text-amber-600',
                'category' => 'Buah',
                'audio' => asset('audio/Halaman 4/2. nanas.m4a')],
            ['id' => 'obeng',
                'name' => 'Obeng',
                'emoji' => '🪛',
                'hint' => 'Obeng adalah alat untuk memutar sekrup!',
                'color' => 'hover:border-gray-200',
                'bg' => 'bg-gray-100 text-gray-600',
                'category' => 'Benda',
                'audio' => asset('audio/Halaman 4/3. obeng.m4a')],
            ['id' => 'paus',
                'name' => 'Paus',
                'emoji' => '🐋',
                'hint' => 'Paus adalah hewan terbesar di lautan!',
                'color' => 'hover:border-blue-200',
                'bg' => 'bg-blue-100 text-blue-600',
                'category' => 'Hewan',
                'audio' => asset('audio/Halaman 4/4. paus.m4a')],

            ['id' => 'quran',
                'name' => 'Quran',
                'emoji' => '📖',
                'hint' => 'Quran adalah kitab suci umat Islam!',
                'color' => 'hover:border-green-200',
                'bg' => 'bg-green-100 text-green-600',
                'category' => 'Benda',
                'audio' => asset('audio/Halaman 4/5. quran.m4a')],
            ['id' => 'rusa',
                'name' => 'Rusa',
                'emoji' => '🦌',
                'hint' => 'Rusa adalah hewan yang indah dengan tanduk!',
                'color' => 'hover:border-orange-200',
                'bg' => 'bg-orange-100 text-orange-600',
                'category' => 'Hewan',
                'audio' => asset('audio/Halaman 4/6. rusa.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
