<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman29 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman29();

        return $this->melengkapiSukukata(
            data: $data,
            items: $data['items'],
            halaman: 29,
            judul: 'Halaman 29 - Melengkapi kata',
            deskripsi: 'Mengenal macam-macam suku kata!');
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman29(): array
    {
        $items = [
            ['id' => 'tomat', 'name' => 'Tomat', 'emoji' => '🍅', 'hint' => 'Tomat adalah buah merah untuk sauce!', 'syllables' => ['To', 'mat'], 'audio' => asset('audio/Halaman 29 -30/1. tomat.m4a')],
            ['id' => 'payung', 'name' => 'Payung', 'emoji' => '☂️', 'hint' => 'Payung adalah alat untuk berlindung dari hujan!', 'syllables' => ['Pa', 'yung'], 'audio' => asset('audio/Halaman 29 -30/2. payung.m4a')],
            ['id' => 'kelinci', 'name' => 'Kelinci', 'emoji' => '🐰', 'hint' => 'Kelinci adalah hewan berbulu yang lompat!', 'syllables' => ['Ke', 'lin', 'ci'], 'audio' => asset('audio/Halaman 29 -30/3. kelinci.m4a')],
            ['id' => 'bola', 'name' => 'Bola', 'emoji' => '⚽', 'hint' => 'Bola adalah alat main bulat!', 'syllables' => ['Bo', 'la'], 'audio' => asset('audio/Halaman 29 -30/4. bola.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
