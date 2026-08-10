<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman15 extends Controller
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
            return $this->hubungkanAudioDanGambar(
                data: $this->getDataPublicHalaman15($lang),
                halaman: 15,
                judul: 'Halaman 15 - Cari Huruf Pertama',
                deskripsi: 'Dengarkan nama benda, lalu tebak huruf pertamanya!',
                lang: $lang
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * Data game "Cari Huruf Pertama" - Halaman 15 (Multi Bahasa).
     *
     * Item = 5 benda: kacamata, timun, kuda, terong, rusa
     *
     * @param string $lang 'id' (Bahasa Indonesia, default) | 'en' (English)
     * @return array{
     *     pembukaan: string,
     *     items: list<array{id: string, emoji: string, audio: string}>,
     *     total_item: int
     * }
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getDataPublicHalaman15(string $lang): array
    {
        if ($lang === 'en') {
            $pembukaan = asset('audio/en/Halaman 15/halaman 15.m4a');
            $items = [
                ['id' => 'kacamata', 'emoji' => asset('gambar/halaman_15/kacamata.webp'), 'audio' => asset('audio/en/Halaman 15/1. kacamata.m4a')],
                ['id' => 'timun', 'emoji' => asset('gambar/halaman_15/timun.webp'), 'audio' => asset('audio/en/Halaman 15/2. timun.m4a')],
                ['id' => 'kuda', 'emoji' => asset('gambar/halaman_15/kuda.webp'), 'audio' => asset('audio/en/Halaman 15/3. kuda.m4a')],
                ['id' => 'terong', 'emoji' => asset('gambar/halaman_15/terong.webp'), 'audio' => asset('audio/en/Halaman 15/4. terong.m4a')],
                ['id' => 'rusa', 'emoji' => asset('gambar/halaman_15/rusa.webp'), 'audio' => asset('audio/en/Halaman 15/5. rusa.m4a')],
            ];
        } else {
            // ID: pembukaan file ADA (halaman 15.wav). Audio per item:
            // Untuk sementara pakai EN sebagai fallback (file ID per item belum di-chop).
            // Nanti kalau kamu punya file ID sendiri (kacamata.wav, timun.wav, dll),
            // ganti pathnya ke: asset('audio/id/Halaman 15/{nama}.wav')
            $pembukaan = asset('audio/id/Halaman 15/halaman 15.wav');
            $items = [
                ['id' => 'kacamata', 'emoji' => asset('gambar/halaman_15/kacamata.webp'), 'audio' => asset('audio/id/Halaman 15/kacamata.mp3')],
                ['id' => 'timun', 'emoji' => asset('gambar/halaman_15/timun.webp'), 'audio' => asset('audio/id/Halaman 15/timun.mp3')],
                ['id' => 'kuda', 'emoji' => asset('gambar/halaman_15/kuda.webp'), 'audio' => asset('audio/id/Halaman 15/kuda.mp3')],
                ['id' => 'terong', 'emoji' => asset('gambar/halaman_15/terong.webp'), 'audio' => asset('audio/id/Halaman 15/terong.mp3')],
                ['id' => 'rusa', 'emoji' => asset('gambar/halaman_15/rusa.webp'), 'audio' => asset('audio/id/Halaman 15/rusa.mp3')],
            ];
        }

        return [
            'pembukaan' => $pembukaan,
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
