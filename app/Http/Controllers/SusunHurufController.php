<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use Override;

class SusunHurufController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    #[Override]
    public function index(): View
    {
        return $this->susunKataKata(
            items: $this->getDataPublicSusunHuruf()['items'],
            data: $this->getDataPublicSusunHuruf(),
            halaman: 8,
            judul: 'Susun Huruf ABC 📝',
            deskripsi: 'Klik huruf untuk menyusun kata yang benar!',
        );
    }

    /**
     * @return array
     */
    public function getDataPublicSusunHuruf(): array
    {
        $items = [
            ['word' => 'APEL', 'emoji' => '🍎'],
            ['word' => 'BUKU', 'emoji' => '📚'],
            ['word' => 'RUMAH', 'emoji' => '🏠'],
            ['word' => 'KUCING', 'emoji' => '🐱'],
            ['word' => 'BINTANG', 'emoji' => '⭐'],
            ['word' => 'SEMANGKA', 'emoji' => '🍉'],
            ['word' => 'KELINCI', 'emoji' => '🐰'],
            ['word' => 'BURUNG', 'emoji' => '🐦'],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
