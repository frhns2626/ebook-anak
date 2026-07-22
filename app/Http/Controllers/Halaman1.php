<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman1 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman1();

        return $this->abcdHuruf(
            data: $data,
            halaman: 1,
            judul: 'Pengenalan Huruf Abjad',
            deskripsi: 'Belajar huruf A sampai Z dengan suara dan pengucapan');
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman1(): array
    {
        return [
            //
            //            'items' => [
            //                ['huruf' => 'A', 'spelling' => 'A', 'audio' => Storage::disk('public')->url('audio/Halaman 1/1.A.m4a'), 'color' => '#FF6B6B'],
            //                ['huruf' => 'B', 'spelling' => 'Be', 'audio' => Storage::disk('public')->url('audio/Halaman 1/2.B.m4a'), 'color' => '#4ECDC4'],
            //                ['huruf' => 'C', 'spelling' => 'Ce', 'audio' => Storage::disk('public')->url('audio/Halaman 1/3.C.m4a'), 'color' => '#FFB6C1'],
            //                ['huruf' => 'D', 'spelling' => 'De', 'audio' => Storage::disk('public')->url('audio/Halaman 1/4.D.m4a'), 'color' => '#A29BFE'],
            //                ['huruf' => 'E', 'spelling' => 'E', 'audio' => Storage::disk('public')->url('audio/Halaman 1/5.E.m4a'), 'color' => '#FD79A8'],
            //                ['huruf' => 'F', 'spelling' => 'Ef', 'audio' => Storage::disk('public')->url('audio/Halaman 1/6.F.m4a'), 'color' => '#74B9FF'],
            //                ['huruf' => 'G', 'spelling' => 'Ge', 'audio' => Storage::disk('public')->url('audio/Halaman 1/7.G.m4a'), 'color' => '#55EFC4'],
            //                ['huruf' => 'H', 'spelling' => 'Ha', 'audio' => Storage::disk('public')->url('audio/Halaman 1/8.H.m4a'), 'color' => '#FDCB6E'],
            //                ['huruf' => 'I', 'spelling' => 'I', 'audio' => Storage::disk('public')->url('audio/Halaman 1/9.I.m4a'), 'color' => '#E17055'],
            //                ['huruf' => 'J', 'spelling' => 'Je', 'audio' => Storage::disk('public')->url('audio/Halaman 1/10.J.m4a'), 'color' => '#00CEC9'],
            //                ['huruf' => 'K', 'spelling' => 'Ka', 'audio' => Storage::disk('public')->url('audio/Halaman 1/11.K.m4a'), 'color' => '#6C5CE7'],
            //                ['huruf' => 'L', 'spelling' => 'El', 'audio' => Storage::disk('public')->url('audio/Halaman 1/12.L.m4a'), 'color' => '#FF7675'],
            //                ['huruf' => 'M', 'spelling' => 'Em', 'audio' => Storage::disk('public')->url('audio/Halaman 1/13.M.m4a'), 'color' => '#FAB1A0'],
            //                ['huruf' => 'N', 'spelling' => 'En', 'audio' => Storage::disk('public')->url('audio/Halaman 1/14.N.m4a'), 'color' => '#81ECEC'],
            //                ['huruf' => 'O', 'spelling' => 'O', 'audio' => Storage::disk('public')->url('audio/Halaman 1/15.O.m4a'), 'color' => '#FECA57'],
            //                ['huruf' => 'P', 'spelling' => 'Pe', 'audio' => Storage::disk('public')->url('audio/Halaman 1/16.P.m4a'), 'color' => '#A29BFE'],
            //                ['huruf' => 'Q', 'spelling' => 'Ki', 'audio' => Storage::disk('public')->url('audio/Halaman 1/17.Q.m4a'), 'color' => '#FD79A8'],
            //                ['huruf' => 'R', 'spelling' => 'Er', 'audio' => Storage::disk('public')->url('audio/Halaman 1/18.R.m4a'), 'color' => '#74B9FF'],
            //                ['huruf' => 'S', 'spelling' => 'Es', 'audio' => Storage::disk('public')->url('audio/Halaman 1/19.S.m4a'), 'color' => '#55EFC4'],
            //                ['huruf' => 'T', 'spelling' => 'Te', 'audio' => Storage::disk('public')->url('audio/Halaman 1/20.T.m4a'), 'color' => '#FDCB6E'],
            //                ['huruf' => 'U', 'spelling' => 'U', 'audio' => Storage::disk('public')->url('audio/Halaman 1/21.U.m4a'), 'color' => '#E17055'],
            //                ['huruf' => 'V', 'spelling' => 'Ve', 'audio' => Storage::disk('public')->url('audio/Halaman 1/22.V.m4a'), 'color' => '#00CEC9'],
            //                ['huruf' => 'W', 'spelling' => 'We', 'audio' => Storage::disk('public')->url('audio/Halaman 1/23.W.m4a'), 'color' => '#6C5CE7'],
            //                ['huruf' => 'X', 'spelling' => 'Eks', 'audio' => Storage::disk('public')->url('audio/Halaman 1/24.X.m4a'), 'color' => '#FF7675'],
            //                ['huruf' => 'Y', 'spelling' => 'Ye', 'audio' => Storage::disk('public')->url('audio/Halaman 1/25.Y.m4a'), 'color' => '#FAB1A0'],
            //                ['huruf' => 'Z', 'spelling' => 'Zet', 'audio' => Storage::disk('public')->url('audio/Halaman 1/26.Z.m4a'), 'color' => '#81ECEC'],
            //            ],

            'items' => [
                ['huruf' => 'A', 'spelling' => 'A', 'audio' => asset('audio/Halaman 1/1.A.m4a'), 'color' => '#FF6B6B'],
                ['huruf' => 'B', 'spelling' => 'Be', 'audio' => asset('audio/Halaman 1/2.B.m4a'), 'color' => '#4ECDC4'],
                ['huruf' => 'C', 'spelling' => 'Ce', 'audio' => asset('audio/Halaman 1/3.C.m4a'), 'color' => '#FFB6C1'],
                ['huruf' => 'D', 'spelling' => 'De', 'audio' => asset('audio/Halaman 1/4.D.m4a'), 'color' => '#A29BFE'],
                ['huruf' => 'E', 'spelling' => 'E', 'audio' => asset('audio/Halaman 1/5.E.m4a'), 'color' => '#FD79A8'],
                ['huruf' => 'F', 'spelling' => 'Ef', 'audio' => asset('audio/Halaman 1/6.F.m4a'), 'color' => '#74B9FF'],
                ['huruf' => 'G', 'spelling' => 'Ge', 'audio' => asset('audio/Halaman 1/7.G.m4a'), 'color' => '#55EFC4'],
                ['huruf' => 'H', 'spelling' => 'Ha', 'audio' => asset('audio/Halaman 1/8.H.m4a'), 'color' => '#FDCB6E'],
                ['huruf' => 'I', 'spelling' => 'I', 'audio' => asset('audio/Halaman 1/9.I.m4a'), 'color' => '#E17055'],
                ['huruf' => 'J', 'spelling' => 'Je', 'audio' => asset('audio/Halaman 1/10.J.m4a'), 'color' => '#00CEC9'],
                ['huruf' => 'K', 'spelling' => 'Ka', 'audio' => asset('audio/Halaman 1/11.K.m4a'), 'color' => '#6C5CE7'],
                ['huruf' => 'L', 'spelling' => 'El', 'audio' => asset('audio/Halaman 1/12.L.m4a'), 'color' => '#FF7675'],
                ['huruf' => 'M', 'spelling' => 'Em', 'audio' => asset('audio/Halaman 1/13.M.m4a'), 'color' => '#FAB1A0'],
                ['huruf' => 'N', 'spelling' => 'En', 'audio' => asset('audio/Halaman 1/14.N.m4a'), 'color' => '#81ECEC'],
                ['huruf' => 'O', 'spelling' => 'O', 'audio' => asset('audio/Halaman 1/15.O.m4a'), 'color' => '#FECA57'],
                ['huruf' => 'P', 'spelling' => 'Pe', 'audio' => asset('audio/Halaman 1/16.P.m4a'), 'color' => '#A29BFE'],
                ['huruf' => 'Q', 'spelling' => 'Ki', 'audio' => asset('audio/Halaman 1/17.Q.m4a'), 'color' => '#FD79A8'],
                ['huruf' => 'R', 'spelling' => 'Er', 'audio' => asset('audio/Halaman 1/18.R.m4a'), 'color' => '#74B9FF'],
                ['huruf' => 'S', 'spelling' => 'Es', 'audio' => asset('audio/Halaman 1/19.S.m4a'), 'color' => '#55EFC4'],
                ['huruf' => 'T', 'spelling' => 'Te', 'audio' => asset('audio/Halaman 1/20.T.m4a'), 'color' => '#FDCB6E'],
                ['huruf' => 'U', 'spelling' => 'U', 'audio' => asset('audio/Halaman 1/21.U.m4a'), 'color' => '#E17055'],
                ['huruf' => 'V', 'spelling' => 'Ve', 'audio' => asset('audio/Halaman 1/22.V.m4a'), 'color' => '#00CEC9'],
                ['huruf' => 'W', 'spelling' => 'We', 'audio' => asset('audio/Halaman 1/23.W.m4a'), 'color' => '#6C5CE7'],
                ['huruf' => 'X', 'spelling' => 'Eks', 'audio' => asset('audio/Halaman 1/24.X.m4a'), 'color' => '#FF7675'],
                ['huruf' => 'Y', 'spelling' => 'Ye', 'audio' => asset('audio/Halaman 1/25.Y.m4a'), 'color' => '#FAB1A0'],
                ['huruf' => 'Z', 'spelling' => 'Zet', 'audio' => asset('audio/Halaman 1/26.Z.m4a'), 'color' => '#81ECEC'],
            ],
            'total_item' => 26,
        ];
    }
}
