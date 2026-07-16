<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class Halaman1 extends Controller
{
    public function index()
    {


        return view('halaman1', [
            'data' => $this->getDataPublicHalaman1(),
            'halaman'    => 1,
            'judul'      => 'Pengenalan Huruf Abjad',
            'deskripsi'  => 'Belajar huruf A sampai Z dengan suara dan pengucapan',

        ]);
    }

    public function getDataPublicHalaman1()
    {
        $basePath = 'audio/Halaman 1/';

        $data = [

            'items' => [
                ['huruf' => 'A', 'spelling' => 'A',    'audio' => Storage::disk('public')->url($basePath . 'A.mp3'),    'color' => '#FF6B6B'],
                ['huruf' => 'B', 'spelling' => 'Be',   'audio' => Storage::disk('public')->url($basePath . 'B.mp3'),    'color' => '#4ECDC4'],
                ['huruf' => 'C', 'spelling' => 'Ce',   'audio' => Storage::disk('public')->url($basePath . 'C.mp3'),    'color' => '#FFE66D'],
                ['huruf' => 'D', 'spelling' => 'De',   'audio' => Storage::disk('public')->url($basePath . 'D.mp3'),    'color' => '#A29BFE'],
                ['huruf' => 'E', 'spelling' => 'E',    'audio' => Storage::disk('public')->url($basePath . 'E.mp3'),    'color' => '#FD79A8'],
                ['huruf' => 'F', 'spelling' => 'Ef',   'audio' => Storage::disk('public')->url($basePath . 'F.mp3'),    'color' => '#74B9FF'],
                ['huruf' => 'G', 'spelling' => 'Ge',   'audio' => Storage::disk('public')->url($basePath . 'G.mp3'),    'color' => '#55EFC4'],
                ['huruf' => 'H', 'spelling' => 'Ha',   'audio' => Storage::disk('public')->url($basePath . 'H.mp3'),    'color' => '#FDCB6E'],
                ['huruf' => 'I', 'spelling' => 'I',    'audio' => Storage::disk('public')->url($basePath . 'I.mp3'),    'color' => '#E17055'],
                ['huruf' => 'J', 'spelling' => 'Je',   'audio' => Storage::disk('public')->url($basePath . 'J.mp3'),    'color' => '#00CEC9'],
                ['huruf' => 'K', 'spelling' => 'Ka',   'audio' => Storage::disk('public')->url($basePath . 'K.mp3'),    'color' => '#6C5CE7'],
                ['huruf' => 'L', 'spelling' => 'El',   'audio' => Storage::disk('public')->url($basePath . 'L.mp3'),    'color' => '#FF7675'],
                ['huruf' => 'M', 'spelling' => 'Em',   'audio' => Storage::disk('public')->url($basePath . 'M.mp3'),    'color' => '#FAB1A0'],
                ['huruf' => 'N', 'spelling' => 'En',   'audio' => Storage::disk('public')->url($basePath . 'N.mp3'),    'color' => '#81ECEC'],
                ['huruf' => 'O', 'spelling' => 'O',    'audio' => Storage::disk('public')->url($basePath . 'O.mp3'),    'color' => '#FECA57'],
                ['huruf' => 'P', 'spelling' => 'Pe',   'audio' => Storage::disk('public')->url($basePath . 'P.mp3'),    'color' => '#A29BFE'],
                ['huruf' => 'Q', 'spelling' => 'Ki',   'audio' => Storage::disk('public')->url($basePath . 'Q.mp3'),    'color' => '#FD79A8'],
                ['huruf' => 'R', 'spelling' => 'Er',   'audio' => Storage::disk('public')->url($basePath . 'R.mp3'),    'color' => '#74B9FF'],
                ['huruf' => 'S', 'spelling' => 'Es',   'audio' => Storage::disk('public')->url($basePath . 'S.mp3'),    'color' => '#55EFC4'],
                ['huruf' => 'T', 'spelling' => 'Te',   'audio' => Storage::disk('public')->url($basePath . 'T.mp3'),    'color' => '#FDCB6E'],
                ['huruf' => 'U', 'spelling' => 'U',    'audio' => Storage::disk('public')->url($basePath . 'U.mp3'),    'color' => '#E17055'],
                ['huruf' => 'V', 'spelling' => 'Ve',   'audio' => Storage::disk('public')->url($basePath . 'V.mp3'),    'color' => '#00CEC9'],
                ['huruf' => 'W', 'spelling' => 'We',   'audio' => Storage::disk('public')->url($basePath . 'W.mp3'),    'color' => '#6C5CE7'],
                ['huruf' => 'X', 'spelling' => 'Eks',  'audio' => Storage::disk('public')->url($basePath . 'X.mp3'),    'color' => '#FF7675'],
                ['huruf' => 'Y', 'spelling' => 'Ye',   'audio' => Storage::disk('public')->url($basePath . 'Y.mp3'),    'color' => '#FAB1A0'],
                ['huruf' => 'Z', 'spelling' => 'Zet',  'audio' => Storage::disk('public')->url($basePath . 'Z.mp3'),    'color' => '#81ECEC'],
            ],

            'total_item' => 26,
        ];

        return $data;
    }
}
