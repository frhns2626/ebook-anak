<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman9 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {

        return $this->hubungkanSukukataTerakhir(
            data: $this->getDataPublicHalaman9(),
            halaman: 9,
            judul: 'Halaman 9 - Menghubungkan Suku Kata',
            deskripsi: 'Gabungkan ba + suku kata jadi kata baru!',

        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman9(): array
    {
        $items = [
            [
                'audio' => asset('audio/halaman 9/halaman 9.m4a'), // masih belum di chop audio
                'id' => 'baju', 'suffix' => 'ju', 'name' => 'Baju', 'emoji' => '👕', 'hint' => 'Baju adalah pakaian yang dipakai di badan!', ],
            [
                'audio' => asset('audio/halaman 9/halaman 9.m4a'),
                'id' => 'batu', 'suffix' => 'tu', 'name' => 'Batu', 'emoji' => '🪨', 'hint' => 'Batu adalah benda keras dari alam!', ],
            [
                'audio' => asset('audio/halaman 9/halaman 9.m4a'),
                'id' => 'bata', 'suffix' => 'ta', 'name' => 'Bata', 'emoji' => '🧱', 'hint' => 'Bata adalah bahan untuk membangun rumah!', ],
            [
                'audio' => asset('audio/halaman 9/halaman 9.m4a'),
                'id' => 'baca', 'suffix' => 'ca', 'name' => 'Baca', 'emoji' => '📖', 'hint' => 'Baca adalah kegiatan melihat dan memahami tulisan!', ],
            [
                'audio' => asset('audio/halaman 9/halaman 9.m4a'),
                'id' => 'bapak', 'suffix' => 'pak', 'name' => 'Bapak', 'emoji' => '👨', 'hint' => 'Bapak adalah ayah dalam keluarga!', ],
            [
                'audio' => asset('audio/halaman 9/halaman 9.m4a'),
                'id' => 'bali', 'suffix' => 'li', 'name' => 'Bali', 'emoji' => '🏝️', 'hint' => 'Bali adalah pulau yang indah di Indonesia!', ],
        ];

        return [

            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
