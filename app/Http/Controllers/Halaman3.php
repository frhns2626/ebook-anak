<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;

class Halaman3 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function index(): View
    {
        $data = $this->getDataPublicHalaman3();

        return $this->pengenalanAudio(
            data: $data,
            items: $data['items'],
            halaman: 3,
            judul: 'Halaman 3 - Mengenal Benda & Hewan 🦒',
            deskripsi: 'Mengenal macam-macam benda dan hewan yang seru!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman3(): array
    {
        $items = [
            ['id' => 'gajah', 'name' => 'Gajah', 'emoji' => '🐘', 'hint' => 'Gajah adalah hewan darat terbesar dengan belalai!', 'color' => 'hover:border-gray-200', 'bg' => 'bg-gray-100 text-gray-600', 'audio' => asset('audio/Halaman 3/1. gajah.m4a')],
            ['id' => 'helicopter', 'name' => 'Helicopter', 'emoji' => '🚁', 'hint' => 'Helicopter adalah pesawat yang bisa terbang tinggi!', 'color' => 'hover:border-blue-200', 'bg' => 'bg-blue-100 text-blue-600', 'audio' => asset('audio/Halaman 3/2. helikopter.m4a')],
            ['id' => 'ikan', 'name' => 'Ikan', 'emoji' => '🐟', 'hint' => 'Ikan adalah hewan yang hidup di air!', 'color' => 'hover:border-cyan-200', 'bg' => 'bg-cyan-100 text-cyan-600', 'audio' => asset('audio/Halaman 3/3. ikan.m4a')],
            ['id' => 'jerapah', 'name' => 'Jerapah', 'emoji' => '🦒', 'hint' => 'Jerapah adalah hewan dengan leher paling panjang!', 'color' => 'hover:border-yellow-200', 'bg' => 'bg-yellow-100 text-yellow-600', 'audio' => asset('audio/Halaman 3/4. jerapah.m4a')],
            ['id' => 'kelelawar', 'name' => 'Kelelawar', 'emoji' => '🦇', 'hint' => 'Kelelawar adalah satu-satunya mamalia yang bisa terbang!', 'color' => 'hover:border-purple-200', 'bg' => 'bg-purple-100 text-purple-600', 'audio' => asset('audio/Halaman 3/5. kelelawar.m4a')],
            ['id' => 'lampu', 'name' => 'Lampu', 'emoji' => '💡', 'hint' => 'Lampu menerangi ruangan agar terang!', 'color' => 'hover:border-amber-200', 'bg' => 'bg-amber-100 text-amber-600', 'audio' => asset('audio/Halaman 3/6. lampu.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
