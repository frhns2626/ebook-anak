<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman19 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman19();

        return view('belajar.halaman-19.index', [
            'data' => $data,
            'items' => $data['items'],
            'halaman' => 19,
            'judul' => 'Halaman 19 - Suku Kata Berakhiran -L 🦎',
            'deskripsi' => 'Cocokkan kata dengan akhiran konsonan matinya!',
        ]);
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman19(): array
    {
        /**
         * Latihan Membaca Suku Kata Tertutup (konsonan mati -L)
         * Pola: al, il, ul, el, ol
         *   al → Ka-dal 🦎 | il → Mo-bil 🚗 | ul → Cang-kul 🌾 | el → A-pel 🍎 | ol → Bo-tol 🍾
         */
        $base = 'audio/halaman 16-19/';

        $items = [
            [
                'masterPola' => 'al il ul el ol',
                'audio' => asset($base . 'halaman 19.m4a'),
                'items' => [
                    ['id' => 'kadal', 'name' => 'Kadal', 'emoji' => '🦎', 'ending' => 'al', 'hint' => 'Kadal adalah reptil kecil yang bisa memanjat!', 'audio' => asset($base . 'halaman 19 kadal.m4a')],
                    ['id' => 'mobil', 'name' => 'Mobil', 'emoji' => '🚗', 'ending' => 'il', 'hint' => 'Mobil adalah kendaraan beroda empat!', 'audio' => null],
                    ['id' => 'cangkul', 'name' => 'Cangkul', 'emoji' => '🌾', 'ending' => 'ul', 'hint' => 'Cangkul adalah alat untuk menggali tanah!', 'audio' => null],
                    ['id' => 'apel', 'name' => 'Apel', 'emoji' => '🍎', 'ending' => 'el', 'hint' => 'Apel adalah buah yang manis dan renyah!', 'audio' => null],
                    ['id' => 'botol', 'name' => 'Botol', 'emoji' => '🍾', 'ending' => 'ol', 'hint' => 'Botol adalah wadah untuk menyimpan cairan!', 'audio' => asset($base . 'halaman 18 botol.m4a')],
                ],
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
