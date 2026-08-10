<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman7 extends Controller
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
            return $this->aioeoGame(
                data: $this->getDataPublicHalaman7($lang),
                halaman: 7,
                judul: 'Halaman 7 - Mengenal Huruf Vokal',
                deskripsi: 'Membaca kosakata yang diawali huruf vokal A, I, U, E, O!',
                lang: $lang,
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * Data kosakata huruf vokal AIUEO (A-I-U-E-O) Halaman 7.
     * Setiap item punya:
     *   - id    : identitas unik
     *   - emoji : path gambar (webp)
     *   - vocal : huruf vokal utama
     *   - audio : path file audio sesuai bahasa yang dipilih
     *
     * @param string $lang 'id' (Indonesia, default) atau 'en' (English)
     * @return array{items: list<array{id: string, emoji: string, vocal: string, audio: string}>, total_item: int}
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getDataPublicHalaman7(string $lang): array
    {
        $id = [
            ['id' => 'a-ayam', 'emoji' => asset('gambar/halaman_7/ayam.webp'), 'vocal' => 'A', 'audio' => asset('audio/id/Halaman 7/ayam.wav')],
            ['id' => 'a-awan', 'emoji' => asset('gambar/halaman_7/awan.webp'), 'vocal' => 'A', 'audio' => asset('audio/id/Halaman 7/awan.wav')],
            ['id' => 'a-akar', 'emoji' => asset('gambar/halaman_7/akar.webp'), 'vocal' => 'A', 'audio' => asset('audio/id/Halaman 7/akar.wav')],
            ['id' => 'i-ikan', 'emoji' => asset('gambar/halaman_7/ikan.webp'), 'vocal' => 'I', 'audio' => asset('audio/id/Halaman 7/ikan.wav')],
            ['id' => 'i-iguana', 'emoji' => asset('gambar/halaman_7/iguana.webp'), 'vocal' => 'I', 'audio' => asset('audio/id/Halaman 7/iguana.wav')],
            ['id' => 'i-itik', 'emoji' => asset('gambar/halaman_7/itik.webp'), 'vocal' => 'I', 'audio' => asset('audio/id/Halaman 7/itik.wav')],
            ['id' => 'u-ular', 'emoji' => asset('gambar/halaman_7/ular.webp'), 'vocal' => 'U', 'audio' => asset('audio/id/Halaman 7/ular.wav')],
            ['id' => 'u-udang', 'emoji' => asset('gambar/halaman_7/udang.webp'), 'vocal' => 'U', 'audio' => asset('audio/id/Halaman 7/udang.wav')],
            ['id' => 'u-ubi', 'emoji' => asset('gambar/halaman_7/ubi.webp'), 'vocal' => 'U', 'audio' => asset('audio/id/Halaman 7/ubi.wav')],
            ['id' => 'e-elang', 'emoji' => asset('gambar/halaman_7/elang.webp'), 'vocal' => 'E', 'audio' => asset('audio/id/Halaman 7/elang.wav')],
            ['id' => 'e-ember', 'emoji' => asset('gambar/halaman_7/ember.webp'), 'vocal' => 'E', 'audio' => asset('audio/id/Halaman 7/ember.wav')],
            ['id' => 'e-emas', 'emoji' => asset('gambar/halaman_7/emas.webp'), 'vocal' => 'E', 'audio' => asset('audio/id/Halaman 7/emas.wav')],
            ['id' => 'o-obor', 'emoji' => asset('gambar/halaman_7/obor.webp'), 'vocal' => 'O', 'audio' => asset('audio/id/Halaman 7/obor.wav')],
            ['id' => 'o-obeng', 'emoji' => asset('gambar/halaman_7/obeng.webp'), 'vocal' => 'O', 'audio' => asset('audio/id/Halaman 7/obeng.wav')],
            ['id' => 'o-ombak', 'emoji' => asset('gambar/halaman_7/ombak.webp'), 'vocal' => 'O', 'audio' => asset('audio/id/Halaman 7/ombak.wav')],
        ];

        $en = [
            ['id' => 'a-ayam', 'emoji' => asset('gambar/halaman_7/ayam.webp'), 'vocal' => 'A', 'audio' => asset('audio/en/Halaman 7/1A. ayam.m4a')],
            ['id' => 'a-awan', 'emoji' => asset('gambar/halaman_7/awan.webp'), 'vocal' => 'A', 'audio' => asset('audio/en/Halaman 7/2A. awan.m4a')],
            ['id' => 'a-akar', 'emoji' => asset('gambar/halaman_7/akar.webp'), 'vocal' => 'A', 'audio' => asset('audio/en/Halaman 7/3A. akar.m4a')],
            ['id' => 'i-ikan', 'emoji' => asset('gambar/halaman_7/ikan.webp'), 'vocal' => 'I', 'audio' => asset('audio/en/Halaman 7/4I. ikan.m4a')],
            ['id' => 'i-iguana', 'emoji' => asset('gambar/halaman_7/iguana.webp'), 'vocal' => 'I', 'audio' => asset('audio/en/Halaman 7/5I. iguana_.m4a')],
            ['id' => 'i-itik', 'emoji' => asset('gambar/halaman_7/itik.webp'), 'vocal' => 'I', 'audio' => asset('audio/en/Halaman 7/6I. itik.m4a')],
            ['id' => 'u-ular', 'emoji' => asset('gambar/halaman_7/ular.webp'), 'vocal' => 'U', 'audio' => asset('audio/en/Halaman 7/7U. ular.m4a')],
            ['id' => 'u-udang', 'emoji' => asset('gambar/halaman_7/udang.webp'), 'vocal' => 'U', 'audio' => asset('audio/en/Halaman 7/8U. udang.m4a')],
            ['id' => 'u-ubi', 'emoji' => asset('gambar/halaman_7/ubi.webp'), 'vocal' => 'U', 'audio' => asset('audio/en/Halaman 7/9U. ubi.m4a')],
            ['id' => 'e-elang', 'emoji' => asset('gambar/halaman_7/elang.webp'), 'vocal' => 'E', 'audio' => asset('audio/en/Halaman 7/10E. elang.m4a')],
            ['id' => 'e-ember', 'emoji' => asset('gambar/halaman_7/ember.webp'), 'vocal' => 'E', 'audio' => asset('audio/en/Halaman 7/11E. ember.m4a')],
            ['id' => 'e-emas', 'emoji' => asset('gambar/halaman_7/emas.webp'), 'vocal' => 'E', 'audio' => asset('audio/en/Halaman 7/12E. emas.m4a')],
            ['id' => 'o-obor', 'emoji' => asset('gambar/halaman_7/obor.webp'), 'vocal' => 'O', 'audio' => asset('audio/en/Halaman 7/13O. obor.m4a')],
            ['id' => 'o-obeng', 'emoji' => asset('gambar/halaman_7/obeng.webp'), 'vocal' => 'O', 'audio' => asset('audio/en/Halaman 7/14O. obeng.m4a')],
            ['id' => 'o-ombak', 'emoji' => asset('gambar/halaman_7/ombak.webp'), 'vocal' => 'O', 'audio' => asset('audio/en/Halaman 7/15O. ombak.m4a')],
        ];

        $items = $lang === 'en' ? $en : $id;

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
