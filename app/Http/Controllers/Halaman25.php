<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;

class Halaman25 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function index(): View
    {
        $data = $this->getDataPublicHalaman25();

        return $this->hubungkanTulisGame(
            data: $data,
            items: $data['items'],
            halaman: 25,
            judul: 'Halaman 25 - Mencocokan Dan Menulis',
            deskripsi: 'Mengenal macam-macam!',
        );
    }

    /**
     * @return array{items: array[], total_item: int}
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman25(): array
    {
        /** @var list<array{
         *     id: string,
         *     letter: string,
         *     name: string,
         *     emoji: string,
         *     hint: string,
         *     audio: string
         * }> $items
         */
        $items = [
            [
                'id' => 'robot',
                'letter' => 'R',
                'name' => 'Robot',
                'emoji' => '🤖',
                'hint' => 'Robot adalah mesin yang bisa bekerja otomatis!',
                'audio' => asset('audio/Halaman 25/1. robot.m4a'),
            ],
            [
                'id' => 'lilin',
                'letter' => 'L',
                'name' => 'Lilin',
                'emoji' => '🕯️',
                'hint' => 'Lilin adalah alat penerangan dari wax!',
                'audio' => asset('audio/Halaman 25/2. lilin.m4a'),
            ],
            [
                'id' => 'mobil',
                'letter' => 'M',
                'name' => 'Mobil',
                'emoji' => '🚗',
                'hint' => 'Mobil adalah kendaraan bermotor beroda empat!',
                'audio' => asset('audio/Halaman 25/3. mobil.m4a'),
            ],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
