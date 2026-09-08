<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman9 extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = (string) $request->query('lang', 'id');
            return $this->hubungkanSukukataTerakhir(
                data: $this->getDataPublicHalaman9($lang),
                halaman: 9,
                judul: 'Halaman 9 - Menghubungkan Suku Kata',
                deskripsi: 'Gabungkan ba + suku kata jadi kata baru!'
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * Data game hubungkan suku kata (awalan "ba-" + akhiran = kata lengkap) - Halaman 9.
     *
     * Per item:
     *   - id     : identifier unik (kata lengkap, lowercase)
     *   - suffix : akhiran suku kata (ditambah "ba-" di awal jadi kata: ba + ju = baju)
     *   - name   : nama tampilan (kapital awal)
     *   - emoji  : gambar / icon (bisa diganti asset('gambar/halaman_9/...webp') nanti)
     *   - hint   : deskripsi singkat (tooltip / penjelasan)
     *   - audio  : path file audio per bahasa
     *
     * @param string $lang 'id' (default) | 'en'
     * @return array{items: list<array{id: string, suffix: string, name: string, emoji: string, hint: string, audio: string}>, total_item: int}
     * @throws Exception
     */
    public function getDataPublicHalaman9(string $lang): array
    {
        if ($lang === 'en') {
            $items = [
                ['audio' => asset('audio/en/halaman 9/halaman 9.m4a'), 'id' => 'baju', 'suffix' => 'ju', 'name' => 'Shirt', 'emoji' => '👕', 'hint' => 'Shirt is clothing worn on the body!'],
                ['audio' => asset('audio/en/halaman 9/halaman 9.m4a'), 'id' => 'batu', 'suffix' => 'tu', 'name' => 'Stone', 'emoji' => '🪨', 'hint' => 'Stone is a hard solid object from nature!'],
                ['audio' => asset('audio/en/halaman 9/halaman 9.m4a'), 'id' => 'bata', 'suffix' => 'ta', 'name' => 'Brick', 'emoji' => '🧱', 'hint' => 'Brick is a material for building houses!'],
                ['audio' => asset('audio/en/halaman 9/halaman 9.m4a'), 'id' => 'baca', 'suffix' => 'ca', 'name' => 'Read', 'emoji' => '📖', 'hint' => 'Reading is looking and understanding writing!'],
                ['audio' => asset('audio/en/halaman 9/halaman 9.m4a'), 'id' => 'bapak', 'suffix' => 'pak', 'name' => 'Father', 'emoji' => '👨', 'hint' => 'Father is a parent in the family!'],
                ['audio' => asset('audio/en/halaman 9/halaman 9.m4a'), 'id' => 'bali', 'suffix' => 'li', 'name' => 'Bali', 'emoji' => '🏝️', 'hint' => 'Bali is a beautiful island in Indonesia!'],
            ];
        } else {
            $items = [
                ['audio' => asset('audio/id/Halaman 9/halaman 9.wav'), 'id' => 'baju', 'suffix' => 'ju', 'name' => 'Baju', 'emoji' => '👕', 'hint' => 'Baju adalah pakaian yang dipakai di badan!'],
                ['audio' => asset('audio/id/Halaman 9/halaman 9.wav'), 'id' => 'batu', 'suffix' => 'tu', 'name' => 'Batu', 'emoji' => '🪨', 'hint' => 'Batu adalah benda keras dari alam!'],
                ['audio' => asset('audio/id/Halaman 9/halaman 9.wav'), 'id' => 'bata', 'suffix' => 'ta', 'name' => 'Bata', 'emoji' => '🧱', 'hint' => 'Bata adalah bahan untuk membangun rumah!'],
                ['audio' => asset('audio/id/Halaman 9/halaman 9.wav'), 'id' => 'baca', 'suffix' => 'ca', 'name' => 'Baca', 'emoji' => '📖', 'hint' => 'Baca adalah kegiatan melihat dan memahami tulisan!'],
                ['audio' => asset('audio/id/Halaman 9/halaman 9.wav'), 'id' => 'bapak', 'suffix' => 'pak', 'name' => 'Bapak', 'emoji' => '👨', 'hint' => 'Bapak adalah ayah dalam keluarga!'],
                ['audio' => asset('audio/id/Halaman 9/halaman 9.wav'), 'id' => 'bali', 'suffix' => 'li', 'name' => 'Bali', 'emoji' => '🏝️', 'hint' => 'Bali adalah pulau yang indah di Indonesia!'],
            ];
        }

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
