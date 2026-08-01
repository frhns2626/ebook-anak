<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman30 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman30();

        return $this->tulisKata(
            data: $data,
            items: $data['items'],
            halaman: 30,
            judul: 'Halaman 30 - Baca dan Tulis Kembali',
            deskripsi: 'Baca suku katanya, lalu tulis kembali kata utuhnya!');
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman30(): array
    {
        /**
         * audio file (D:\_kerja\php\ebook-anak\public\audio\Halaman 29 -30\5. buaya.m4a)
         * Halaman 29 -30/
         * ├── 1. tomat.m4a
         * ├── 2. payung.m4a
         * ├── 3. kelinci.m4a
         * ├── 4. bola.m4a
         * ├── 5. buaya.m4a
         * ├── 6. donat.m4a
         * ├── 7 jerapah.m4a
         * ├── halaman 29.m4a
         * └── halaman 30.m4a
         */
        $items = [
            ['id' => 'bola', 'name' => 'Bola', 'emoji' => '⚽', 'hint' => 'Bola adalah alat main bulat!', 'syllables' => ['Bo', 'la'], 'audio' => asset('audio/Halaman 29 -30/4. bola.m4a')],
            ['id' => 'buaya', 'name' => 'Buaya', 'emoji' => '🐊', 'hint' => 'Buaya adalah hewan yang hidup di air dan darat!', 'syllables' => ['Bu', 'a', 'ya'], 'audio' => asset('audio/Halaman 29 -30/5. buaya.m4a')],
            ['id' => 'donat', 'name' => 'Donat', 'emoji' => '🍩', 'hint' => 'Donat adalah kue manis berbentuk cincin!', 'syllables' => ['Do', 'nat'], 'audio' => asset('audio/Halaman 29 -30/6. donat.m4a')],
            ['id' => 'jerapah', 'name' => 'Jerapah', 'emoji' => '🦒', 'hint' => 'Jerapah adalah hewan berleher panjang!', 'syllables' => ['Je', 'ra', 'pah'], 'audio' => asset('audio/Halaman 29 -30/7 jerapah.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
