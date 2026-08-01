<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman10 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman10();

        return $this->belajarHurufVokalKonsonan(
            data: $data,
            items: $data['items'],
            halaman: 10,
            judul: 'Halaman 10 - Membaca Suku Kata Terbuka',
            deskripsi: 'Mengenal bunyi konsonan dan vokal (A, I, U, E, O)!');
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman10(): array
    {
        /**
         * audio file (D:\_kerja\php\ebook-anak\public\audio\halaman 10\halaman 10.m4a)
         * halaman 10/
         * └── halaman 10.m4a
         */
        $items = [
            [
                'audio' => asset('audio/halaman 10/halaman 10.m4a'),
                'vokal' => 'A', 'suku_kata' => ['A', 'ba', 'ca', 'da', 'fa', 'ga', 'ha', 'ja', 'ka', 'la', 'ma']],
            [
                'audio' => asset('audio/halaman 10/halaman 10.m4a'),
                'vokal' => 'I', 'suku_kata' => ['I', 'bi', 'ci', 'di', 'fi', 'gi', 'hi', 'ji', 'ki', 'li', 'mi']],
            [
                'audio' => asset('audio/halaman 10/halaman 10.m4a'),
                'vokal' => 'U', 'suku_kata' => ['U', 'bu', 'cu', 'du', 'fu', 'gu', 'hu', 'ju', 'ku', 'lu', 'mu']],
            [
                'audio' => asset('audio/halaman 10/halaman 10.m4a'),
                'vokal' => 'E', 'suku_kata' => ['E', 'be', 'ce', 'de', 'fe', 'ge', 'he', 'je', 'ke', 'le', 'me']],
            [
                'audio' => asset('audio/halaman 10/halaman 10.m4a'),
                'vokal' => 'O', 'suku_kata' => ['O', 'bo', 'co', 'do', 'fo', 'go', 'ho', 'jo', 'ko', 'lo', 'mo']],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
