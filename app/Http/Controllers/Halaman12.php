<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman12 extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = $request->query('lang', 'id');
            return $this->tebakAkhirHuruf(
                data: $this->getDataPublicHalaman12($lang),
                halaman: 12,
                judul: 'Halaman 12 - Benda Sekitar',
                deskripsi: 'Mengenal benda-benda di sekitar kita!',
                lang: $lang
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * Data game "Tebak Akhir Huruf" - Halaman 12 (Multi Bahasa).
     *
     * Item = 10 benda/hewan:
     *   meja, kursi, buku, lele, piano, bola, sapi, kue, sate, foto
     *
     * @param string $lang 'id' (Bahasa Indonesia, default) | 'en' (English)
     * @return array{
     *     pembukaan: string,
     *     items: list<array{id: string, emoji: string, audio: string}>,
     *     total_item: int
     * }
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getDataPublicHalaman12(string $lang): array
    {
        if ($lang === 'en') {
            $pembukaan = asset('audio/en/Halaman 12/halaman 12.m4a');
            $items = [
                ['id' => 'meja', 'emoji' => asset('gambar/halaman_12/meja.webp'), 'audio' => asset('audio/en/Halaman 12/1. meja.m4a')],
                ['id' => 'kursi', 'emoji' => asset('gambar/halaman_12/kursi.webp'), 'audio' => asset('audio/en/Halaman 12/2. kursi.m4a')],
                ['id' => 'buku', 'emoji' => asset('gambar/halaman_12/buku.webp'), 'audio' => asset('audio/en/Halaman 12/3. buku.m4a')],
                ['id' => 'lele', 'emoji' => asset('gambar/halaman_12/lele.webp'), 'audio' => asset('audio/en/Halaman 12/4. lele.m4a')],
                ['id' => 'piano', 'emoji' => asset('gambar/halaman_12/piano.webp'), 'audio' => asset('audio/en/Halaman 12/piano.mp3')],
                ['id' => 'bola', 'emoji' => asset('gambar/halaman_12/bola.webp'), 'audio' => asset('audio/en/Halaman 12/6. ball.m4a')],
                ['id' => 'sapi', 'emoji' => asset('gambar/halaman_12/sapi.webp'), 'audio' => asset('audio/en/Halaman 12/7. sapi.m4a')],
                ['id' => 'kue', 'emoji' => asset('gambar/halaman_12/kue.webp'), 'audio' => asset('audio/en/Halaman 12/8. kue.m4a')],
                ['id' => 'sate', 'emoji' => asset('gambar/halaman_12/sate.webp'), 'audio' => asset('audio/en/Halaman 12/9. sate.m4a')],
                ['id' => 'foto', 'emoji' => asset('gambar/halaman_12/foto.webp'), 'audio' => asset('audio/en/Halaman 12/10. foto.m4a')],
            ];
        } else {
            $pembukaan = asset('audio/id/Halaman 12/pembukaan.wav');
            $items = [
                ['id' => 'meja', 'emoji' => asset('gambar/halaman_12/meja.webp'), 'audio' => asset('audio/id/Halaman 12/meja.wav')],
                ['id' => 'kursi', 'emoji' => asset('gambar/halaman_12/kursi.webp'), 'audio' => asset('audio/id/Halaman 12/kursi.wav')],
                ['id' => 'buku', 'emoji' => asset('gambar/halaman_12/buku.webp'), 'audio' => asset('audio/id/Halaman 12/buku.wav')],
                ['id' => 'lele', 'emoji' => asset('gambar/halaman_12/lele.webp'), 'audio' => asset('audio/id/Halaman 12/lele.wav')],
                ['id' => 'piano', 'emoji' => asset('gambar/halaman_12/piano.webp'), 'audio' => asset('audio/id/Halaman 12/piano.wav')],
                ['id' => 'bola', 'emoji' => asset('gambar/halaman_12/bola.webp'), 'audio' => asset('audio/id/Halaman 12/bola.wav')],
                ['id' => 'sapi', 'emoji' => asset('gambar/halaman_12/sapi.webp'), 'audio' => asset('audio/id/Halaman 12/sapi.wav')],
                ['id' => 'kue', 'emoji' => asset('gambar/halaman_12/kue.webp'), 'audio' => asset('audio/id/Halaman 12/kue.wav')],
                ['id' => 'sate', 'emoji' => asset('gambar/halaman_12/sate.webp'), 'audio' => asset('audio/id/Halaman 12/sate.wav')],
                ['id' => 'foto', 'emoji' => asset('gambar/halaman_12/foto.webp'), 'audio' => asset('audio/id/Halaman 12/foto.wav')],
            ];
        }

        return [
            'pembukaan' => $pembukaan,
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
