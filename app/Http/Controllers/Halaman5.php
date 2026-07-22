<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman5 extends Controller
{
    /**
     * @return \Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman5();

        return $this->pengenalanAudio(
            data: $data,
            items: $data['items'],
            halaman: 5,
            judul: 'Halaman 5 - Mengenal Dunia Hewan 🦁',
            deskripsi: 'Mengenal macam-macam teman hewan yang lucu!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman5(): array
    {
        $items = [
            ['id' => 'singa', 'name' => 'Singa', 'emoji' => '🦁', 'hint' => 'Singa adalah raja hutan yang gagah dan perkasa!', 'color' => 'hover:border-amber-200', 'bg' => 'bg-amber-100 text-amber-600', 'category' => 'Hewan', 'audio' => asset('audio/Halaman 5/1. singa_.m4a')],
            ['id' => 'tomat', 'name' => 'Tomat', 'emoji' => '🍅', 'hint' => 'Tomat adalah buah merah yang segar dan sehat!', 'color' => 'hover:border-red-200', 'bg' => 'bg-red-100 text-red-600', 'category' => 'Buah', 'audio' => asset('audio/Halaman 5/2. tomat.m4a')],
            ['id' => 'ubi', 'name' => 'Ubi', 'emoji' => '🍠', 'hint' => 'Ubi adalah makanan tradisional yang manis dan enak!', 'color' => 'hover:border-purple-200', 'bg' => 'bg-purple-100 text-purple-600', 'category' => 'Makanan', 'audio' => asset('audio/Halaman 5/3. ubi.m4a')],
            ['id' => 'vespa', 'name' => 'Vespa', 'emoji' => '🛵', 'hint' => 'Vespa adalah sepeda motor antik yang keren!', 'color' => 'hover:border-orange-200', 'bg' => 'bg-orange-100 text-orange-600', 'category' => 'Benda', 'audio' => asset('audio/Halaman 5/4. vespa.m4a')],
            ['id' => 'wortel', 'name' => 'Wortel', 'emoji' => '🥕', 'hint' => 'Wortel adalah sayur oranye yang sehat untuk mata!', 'color' => 'hover:border-yellow-200', 'bg' => 'bg-yellow-100 text-yellow-600', 'category' => 'Sayur', 'audio' => asset('audio/Halaman 5/5. wortel_.m4a')],
            ['id' => 'xilofon', 'name' => 'Xilofon', 'emoji' => '🎵', 'hint' => 'Xilofon adalah alat musik yang menghasilkan bunyi indah!', 'color' => 'hover:border-pink-200', 'bg' => 'bg-pink-100 text-pink-600', 'category' => 'Benda', 'audio' => asset('audio/Halaman 5/6. xilofon.m4a')],
            ['id' => 'yoyo', 'name' => 'Yoyo', 'emoji' => '🪀', 'hint' => 'Yoyo adalah mainan yang bisa naik turun!', 'color' => 'hover:border-blue-200', 'bg' => 'bg-blue-100 text-blue-600', 'category' => 'Mainan', 'audio' => asset('audio/Halaman 5/7. yoyo.m4a')],
            ['id' => 'zebra', 'name' => 'Zebra', 'emoji' => '🦓', 'hint' => 'Zebra adalah kuda loreng dengan garis hitam putih!', 'color' => 'hover:border-gray-200', 'bg' => 'bg-gray-100 text-gray-600', 'category' => 'Hewan', 'audio' => asset('audio/Halaman 5/8. zebra_.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
