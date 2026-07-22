<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman6 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalamanGameLengkapiHuruf();

        return $this->melengkapiHuruf(
            hurufs: $data['hurufs'],
            hurufHilang: $data['hurufHilang'],   // ← penting sesuai request
            halaman: 7,
            judul: 'Game Lengkapi Huruf yang Hilang 🔤',
            deskripsi: 'Pilih huruf yang benar untuk melengkapi nama binatang dan buah!',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalamanGameLengkapiHuruf(): array
    {
        // Data soal game (huruf yang hilang)
        $hurufHilang = [
            [
                'kategori' => 'binatang',
                'kata' => 'KANGURU',
                'hint' => 'Binatang yang melompat tinggi 🦘',
                'huruf_hilang' => [0, 3, 6],
                'emoji' => '🦘',
            ],
            [
                'kategori' => 'binatang',
                'kata' => 'KELINCI',
                'hint' => 'Binatang lucu suka wortel 🐰',
                'huruf_hilang' => [2, 4],
                'emoji' => '🐰',
            ],
            [
                'kategori' => 'binatang',
                'kata' => 'HARIMAU',
                'hint' => 'Raja hutan yang belang 🐅',
                'huruf_hilang' => [1, 5],
                'emoji' => '🐅',
            ],
            [
                'kategori' => 'buah',
                'kata' => 'APEL',
                'hint' => 'Buah merah yang renyah 🍎',
                'huruf_hilang' => [1, 3],
                'emoji' => '🍎',
            ],
            [
                'kategori' => 'buah',
                'kata' => 'PISANG',
                'hint' => 'Buah kuning panjang 🍌',
                'huruf_hilang' => [0, 4],
                'emoji' => '🍌',
            ],
            [
                'kategori' => 'buah',
                'kata' => 'MANGGA',
                'hint' => 'Buah manis tropis 🥭',
                'huruf_hilang' => [2, 5],
                'emoji' => '🥭',
            ],
            [
                'kategori' => 'binatang',
                'kata' => 'GAJAH',
                'hint' => 'Hewan besar berdungun 🐘',
                'huruf_hilang' => [1, 3],
                'emoji' => '🐘',
            ],
        ];

        // Data huruf alfabet (sama seperti Halaman 6)
        $hurufs = [
            ['huruf' => 'A', 'spelling' => 'A', 'audio' => asset('audio/Halaman 6/Salinan 1.A.m4a'), 'color' => '#FF6B6B'],
            ['huruf' => 'B', 'spelling' => 'Be', 'audio' => asset('audio/Halaman 6/Salinan 2.B.m4a'), 'color' => '#4ECDC4'],
            ['huruf' => 'C', 'spelling' => 'Ce', 'audio' => asset('audio/Halaman 6/Salinan 3.C.m4a'), 'color' => '#FFB6C1'],
            ['huruf' => 'D', 'spelling' => 'De', 'audio' => asset('audio/Halaman 6/Salinan 4.D.m4a'), 'color' => '#A29BFE'],
            ['huruf' => 'E', 'spelling' => 'E', 'audio' => asset('audio/Halaman 6/Salinan 5.E.m4a'), 'color' => '#FD79A8'],
            ['huruf' => 'F', 'spelling' => 'Ef', 'audio' => asset('audio/Halaman 6/Salinan 6.F.m4a'), 'color' => '#74B9FF'],
            ['huruf' => 'G', 'spelling' => 'Ge', 'audio' => asset('audio/Halaman 6/Salinan 7.G.m4a'), 'color' => '#55EFC4'],
            ['huruf' => 'H', 'spelling' => 'Ha', 'audio' => asset('audio/Halaman 6/Salinan 8.H.m4a'), 'color' => '#FDCB6E'],
            ['huruf' => 'I', 'spelling' => 'I', 'audio' => asset('audio/Halaman 6/Salinan 9.I.m4a'), 'color' => '#E17055'],
            ['huruf' => 'J', 'spelling' => 'Je', 'audio' => asset('audio/Halaman 6/Salinan 10.J.m4a'), 'color' => '#00CEC9'],
            ['huruf' => 'K', 'spelling' => 'Ka', 'audio' => asset('audio/Halaman 6/Salinan 11.K.m4a'), 'color' => '#6C5CE7'],
            ['huruf' => 'L', 'spelling' => 'El', 'audio' => asset('audio/Halaman 6/Salinan 12.L.m4a'), 'color' => '#FF7675'],
            ['huruf' => 'M', 'spelling' => 'Em', 'audio' => asset('audio/Halaman 6/Salinan 13.M.m4a'), 'color' => '#FAB1A0'],
            ['huruf' => 'N', 'spelling' => 'En', 'audio' => asset('audio/Halaman 6/Salinan 14.N.m4a'), 'color' => '#81ECEC'],
            ['huruf' => 'O', 'spelling' => 'O', 'audio' => asset('audio/Halaman 6/Salinan 15.O.m4a'), 'color' => '#FECA57'],
            ['huruf' => 'P', 'spelling' => 'Pe', 'audio' => asset('audio/Halaman 6/Salinan 16.P.m4a'), 'color' => '#A29BFE'],
            ['huruf' => 'Q', 'spelling' => 'Ki', 'audio' => asset('audio/Halaman 6/Salinan 17.Q.m4a'), 'color' => '#FD79A8'],
            ['huruf' => 'R', 'spelling' => 'Er', 'audio' => asset('audio/Halaman 6/Salinan 18.R.m4a'), 'color' => '#74B9FF'],
            ['huruf' => 'S', 'spelling' => 'Es', 'audio' => asset('audio/Halaman 6/Salinan 19.S.m4a'), 'color' => '#55EFC4'],
            ['huruf' => 'T', 'spelling' => 'Te', 'audio' => asset('audio/Halaman 6/Salinan 20.T.m4a'), 'color' => '#FDCB6E'],
            ['huruf' => 'U', 'spelling' => 'U', 'audio' => asset('audio/Halaman 6/Salinan 21.U.m4a'), 'color' => '#E17055'],
            ['huruf' => 'V', 'spelling' => 'Ve', 'audio' => asset('audio/Halaman 6/Salinan 22.V.m4a'), 'color' => '#00CEC9'],
            ['huruf' => 'W', 'spelling' => 'We', 'audio' => asset('audio/Halaman 6/Salinan 23.W.m4a'), 'color' => '#6C5CE7'],
            ['huruf' => 'X', 'spelling' => 'Eks', 'audio' => asset('audio/Halaman 6/Salinan 24.X.m4a'), 'color' => '#FF7675'],
            ['huruf' => 'Y', 'spelling' => 'Ye', 'audio' => asset('audio/Halaman 6/Salinan 25.Y.m4a'), 'color' => '#FAB1A0'],
            ['huruf' => 'Z', 'spelling' => 'Zet', 'audio' => asset('audio/Halaman 6/Salinan 26.Z.m4a'), 'color' => '#81ECEC'],
        ];

        return [
            'hurufs' => $hurufs,
            'hurufHilang' => $hurufHilang,
            'total_item' => count($hurufs),
        ];
    }
}
