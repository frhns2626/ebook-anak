<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman12 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman12();

        return $this->tebakAkhirHuruf(
            data: $data,
            items: $data['items'],
            halaman: 12,
            judul: 'Halaman 12 - Benda Sekitar 🏠',
            deskripsi: 'Mengenal benda-benda di sekitar kita!');
    }

    /**
     * @throws BindingResolutionException
     */
    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman12(): array
    {
        /**
         * Halaman 12/
         * ├── 1. meja.m4a
         * ├── 10. foto.m4a
         * ├── 2. kursi.m4a
         * ├── 3. buku.m4a
         * ├── 4. lele.m4a
         * ├── 6. ball.m4a
         * ├── 7. sapi.m4a
         * ├── 8. kue.m4a
         * ├── 9. sate.m4a
         * └── halaman 12.m4a
         */
        $items = [
            [
                'id' => 'meja',
                'name' => 'Meja',
                'emoji' => null,
                'icon' => 'https://cdn-icons-png.flaticon.com/512/1663/1663945.png',
                'hint' => 'Meja adalah tempat untuk meletakkan barang.',
                'color' => 'hover:border-amber-200',
                'bg' => 'bg-amber-100 text-amber-600',
                'syllables' => ['Me', 'ja'],
                'audio' => asset('audio/Halaman 12/1. meja.m4a'),
            ],
            [
                'id' => 'kursi',
                'name' => 'Kursi',
                'emoji' => '🪑',
                'hint' => 'Kursi adalah tempat duduk yang nyaman.',
                'color' => 'hover:border-blue-200',
                'bg' => 'bg-blue-100 text-blue-600',
                'syllables' => ['Kur', 'si'],
                'audio' => asset('audio/Halaman 12/2. kursi.m4a'),
            ],
            ['id' => 'buku', 'name' => 'Buku', 'emoji' => '📚', 'hint' => 'Buku adalah sumber ilmu pengetahuan!', 'color' => 'hover:border-green-200', 'bg' => 'bg-green-100 text-green-600', 'syllables' => ['Bu', 'ku'], 'audio' => asset('audio/Halaman 12/3. buku.m4a')],
            ['id' => 'lele', 'name' => 'Lele', 'emoji' => '🐟', 'hint' => 'Lele adalah ikan air tawar yang enak!', 'color' => 'hover:border-gray-200', 'bg' => 'bg-gray-100 text-gray-600', 'syllables' => ['Le', 'le'], 'audio' => asset('audio/Halaman 12/4. lele.m4a')],
            ['id' => 'bola', 'name' => 'Bola', 'emoji' => '⚽', 'hint' => 'Ball adalah mainan bulat untuk bermain!', 'color' => 'hover:border-red-200', 'bg' => 'bg-red-100 text-red-600', 'syllables' => ['Bo', 'la'], 'audio' => asset('audio/Halaman 12/6. ball.m4a')],
            ['id' => 'sapi', 'name' => 'Sapi', 'emoji' => '🐄', 'hint' => 'Sapi adalah hewan penghasil susu!', 'color' => 'hover:border-orange-200', 'bg' => 'bg-orange-100 text-orange-600', 'syllables' => ['Sa', 'pi'], 'audio' => asset('audio/Halaman 12/7. sapi.m4a')],
            ['id' => 'kue', 'name' => 'Kue', 'emoji' => '🎂', 'hint' => 'Kue adalah makanan manis untuk pesta!', 'color' => 'hover:border-pink-200', 'bg' => 'bg-pink-100 text-pink-600', 'syllables' => ['Ku', 'e'], 'audio' => asset('audio/Halaman 12/8. kue.m4a')],
            ['id' => 'sate', 'name' => 'Sate', 'emoji' => '🍢', 'hint' => 'Sate adalah makanan grilling yang lezat!', 'color' => 'hover:border-yellow-200', 'bg' => 'bg-yellow-100 text-yellow-600', 'syllables' => ['Sa', 'te'], 'audio' => asset('audio/Halaman 12/9. sate.m4a')],
            ['id' => 'foto', 'name' => 'Foto', 'emoji' => '📷', 'hint' => 'Foto adalah gambar dari kamera!', 'color' => 'hover:border-purple-200', 'bg' => 'bg-purple-100 text-purple-600', 'syllables' => ['Fo', 'to'], 'audio' => asset('audio/Halaman 12/10. foto.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
