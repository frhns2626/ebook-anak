<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman13 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman13();

        return $this->deskripsiObject(
            data: $data,
            items: $data['items'],
            halaman: 13,
            object: 'Bola',
            iconText: '⚽',
            judul: 'Bola - Benda Bulat untuk Bermain',
            deskripsi: 'Pelajari fakta menarik tentang Bola!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman13(): array
    {
        $items = [
            ['id' => 1, 'text' => 'Bola', 'audio' => asset('audio/halaman 13/halaman 13 bola.m4a')],
            ['id' => 2, 'text' => 'Bola kecil meluncur di atas meja.', 'audio' => asset('audio/halaman 13/halaman 13 kalimat-1.m4a')],
            ['id' => 3, 'text' => 'Bola sepak dijaga oleh kiper di gawang.', 'audio' => asset('audio/halaman 13/halaman 13 kalimat-2.m4a')],
            ['id' => 4, 'text' => 'Bola basket dilempar ke keranjang tinggi.', 'audio' => asset('audio/halaman 13/halaman 13 kalimat-3.m4a')],
            ['id' => 5, 'text' => 'Adik suka memainkan bola plastik.', 'audio' => asset('audio/halaman 13/halaman 13 kalimat-4.m4a')],
            ['id' => 6, 'text' => 'Bola tenis dipukul dengan raket.', 'audio' => asset('audio/halaman 13/halaman 13 kalimat-5.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
