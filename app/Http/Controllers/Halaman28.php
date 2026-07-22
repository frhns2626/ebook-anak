<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman28 extends Controller
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    /**
     * @return \Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman28();

        return $this->aiueoPilih(
            data: $data,
            items: $data['items'],
            halaman: 28,
            judul: 'Halaman 28 - pilih AIUEO',
            deskripsi: 'Mengenal macam-macam! AIUEO',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman28(): array
    {
        /** @var list<array{
         *     master: string,
         *     items: list<array{
         *         id: string,
         *         name: string,
         *         emoji: string,
         *         hint: string,
         *         audio: string
         *     }>
         * }> $groups
         */
        $groups = [
            [
                'master' => 'Kelompok Bunyi "NY" (Nya, Nyi, Nyu, Nye, Nyo)',
                'items' => [
                    ['id' => 'minyak', 'name' => 'Minyak', 'emoji' => '🛢️', 'hint' => 'Minyak adalah cairan untuk memasak!', 'audio' => asset('audio/halaman 28/halaman 28 minyak.m4a')],
                    ['id' => 'nyanyi', 'name' => 'Nyanyi', 'emoji' => '🎤', 'hint' => 'Nyanyi adalah mengeluarkan suara dengan irama!', 'audio' => asset('audio/halaman 28/halaman 28 nyanyi.m4a')],
                    ['id' => 'senyum', 'name' => 'Senyum', 'emoji' => '😊', 'hint' => 'Senyum adalah wajah bahagia!', 'audio' => asset('audio/halaman 28/halaman 38 senyum.m4a')],
                    ['id' => 'nyenyak', 'name' => 'Nyenyak', 'emoji' => '😴', 'hint' => 'Nyenyak adalah tidur dengan nyenyak!', 'audio' => asset('audio/halaman 28/halaman 28 nyenyak.m4a')],
                    ['id' => 'nyonya', 'name' => 'Nyonya', 'emoji' => '👩', 'hint' => 'Nyonya adalah sebutan untuk wanita!', 'audio' => asset('audio/halaman 28/halaman 28 nyonya.m4a')],
                ],
            ],
            [
                'master' => 'Kelompok Bunyi "NG" (Ang, Ing, Ung, Eng, Ong)',
                'items' => [
                    ['id' => 'mangga', 'name' => 'Mangga', 'emoji' => '🥭', 'hint' => 'Mangga adalah buah tropis manis!', 'audio' => asset('audio/halaman 28/halaman 28 mangga.m4a')],
                    ['id' => 'singa', 'name' => 'Singa', 'emoji' => '🦁', 'hint' => 'Singa adalah raja hutan!', 'audio' => asset('audio/halaman 28/halaman 28 singa.m4a')],
                    ['id' => 'sungai', 'name' => 'Sungai', 'emoji' => '🏞️', 'hint' => 'Sungai adalah air yang mengalir!', 'audio' => asset('audio/halaman 28/halaman 28 sungai.m4a')],
                    ['id' => 'banteng', 'name' => 'Banteng', 'emoji' => '🐂', 'hint' => 'Banteng adalah hewan liar mirip sapi!', 'audio' => asset('audio/halaman 28/halaman 28 banteng.m4a')],
                    ['id' => 'tongkat', 'name' => 'Tongkat', 'emoji' => '🏏', 'hint' => 'Tongkat adalah alat untuk menopang!', 'audio' => asset('audio/halaman 28/halaman 28 tongkat.m4a')],
                ],
            ],
        ];

        return [
            'items' => $groups,
            'total_item' => array_sum(array_map(fn($g) => count($g['items']), $groups)),
        ];
    }
}
