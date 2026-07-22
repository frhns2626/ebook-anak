<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman11 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman11();

        return $this->belajarHurufVokalKonsonan(
            data: $data,
            items: $data['items'],
            halaman: 11,
            judul: 'Halaman 11 - Membaca Suku Kata Terbuka (Bagian 2)',
            deskripsi: 'Mengenal bunyi konsonan dan vokal (A, I, U, E, O)!');
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman11(): array
    {
        /**
         * audio file (D:\_kerja\php\ebook-anak\public\audio\halaman 11\halaman 11.m4a)
         * halaman 11/
         * └── halaman 11.m4a
         */
        $items = [
            [
                'audio' => asset('audio/halaman 11/halaman 11.m4a'),
                'vokal' => 'A', 'suku_kata' => ['A', 'na', 'pa', 'qa', 'ra', 'sa', 'ta', 'va', 'wa', 'xa', 'ya', 'za']],
            [
                'audio' => asset('audio/halaman 11/halaman 11.m4a'),
                'vokal' => 'I', 'suku_kata' => ['I', 'ni', 'pi', 'qi', 'ri', 'si', 'ti', 'vi', 'wi', 'xi', 'yi', 'zi']],
            [
                'audio' => asset('audio/halaman 11/halaman 11.m4a'),
                'vokal' => 'U', 'suku_kata' => ['U', 'nu', 'pu', 'qu', 'ru', 'su', 'tu', 'fu', 'wu', 'xu', 'yu', 'zu']],
            [
                'audio' => asset('audio/halaman 11/halaman 11.m4a'),
                'vokal' => 'E', 'suku_kata' => ['E', 'ne', 'pe', 'qe', 're', 'se', 'te', 'fe', 'we', 'xe', 'ye', 'ze']],
            [
                'audio' => asset('audio/halaman 11/halaman 11.m4a'),
                'vokal' => 'O', 'suku_kata' => ['O', 'no', 'po', 'qo', 'ro', 'so', 'to', 'fo', 'wo', 'xo', 'yo', 'zo']],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
