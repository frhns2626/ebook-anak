<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman2 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman2();

        return $this->pengenalanAudio(
            data: $data,
            items: $data['items'],
            halaman: 2,
            judul: 'Halaman 2 - Mengenal Dunia Hewan 🦁',
            deskripsi: 'Mengenal macam - macam teman hewan yang lucu!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman2(): array
    {
        $items = [
            ['id' => 'ayam', 'name' => 'Ayam', 'emoji' => '🐔', 'hint' => 'Ayam adalah hewan yang bisa berkokok dan bertelur!', 'color' => 'hover:border - yellow - 200', 'bg' => 'bg - yellow - 100 text - yellow - 600', 'audio' => asset('audio/Halaman 2/1. ayam.m4a')],
            ['id' => 'beruang', 'name' => 'Beruang', 'emoji' => '🐻', 'hint' => 'Beruang adalah hewan yang kuat dan lucu!', 'color' => 'hover:border - brown - 200', 'bg' => 'bg - brown - 100 text - brown - 600', 'audio' => asset('audio/Halaman 2/2. beruang.m4a')],
            ['id' => 'cabai', 'name' => 'Cabai', 'emoji' => '🌶️', 'hint' => 'Cabai adalah bumbu yang pedas!', 'color' => 'hover:border - red - 200', 'bg' => 'bg - red - 100 text - red - 600', 'audio' => asset('audio/Halaman 2/3. cabai.m4a')],
            ['id' => 'dasi', 'name' => 'Dasi', 'emoji' => '👔', 'hint' => 'Dasi adalah aksesoris pakaian yang keren!', 'color' => 'hover:border - blue - 200', 'bg' => 'bg - blue - 100 text - blue - 600', 'audio' => asset('audio/Halaman 2/4. dasi.m4a')],
            ['id' => 'elang', 'name' => 'Elang', 'emoji' => '🦅', 'hint' => 'Elang adalah burung yang gagah dan tinggi!', 'color' => 'hover:border - purple - 200', 'bg' => 'bg - purple - 100 text - purple - 600', 'audio' => asset('audio/Halaman 2/5. elang.m4a')],
            ['id' => 'flamingo', 'name' => 'Flamingo', 'emoji' => '🦩', 'hint' => 'Flamingo adalah burung berwarna pink yang indah!', 'color' => 'hover:border - pink - 200', 'bg' => 'bg - pink - 100 text - pink - 600', 'audio' => asset('audio/Halaman 2/6. flamingo.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
