<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman18 extends Controller
{
    /**
     * @param  Request  $request
     * @return View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = $request->query('lang', 'id');
            $judul = $lang === 'en'
                ? 'Page 18 - Closed Syllables -S & -M 🥬'
                : 'Halaman 18 - Suku Kata Berakhiran -M & -S 🥬';
            $deskripsi = $lang === 'en'
                ? 'Match words with their ending consonants!'
                : 'Cocokkan kata dengan akhiran konsonan matinya!';

            return $this->sukuBerakhiran(
                data: $this->getDataPublicHalaman18($lang),
                halaman: 18,
                judul: $judul,
                deskripsi: $deskripsi,
                lang: $lang
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * @param  string  $lang  'id' (default) | 'en'
     * @return array
     *
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman18(string $lang = 'id'): array
    {
        if ($lang === 'en') {
            $items = [
                [
                    'masterPola' => 'as is us es os',
                    'audio' => asset('audio/id/Halaman 18/as is us es os.wav'),

                    'items' => [
                        ['id' => 'Asem', 'emoji' => asset('gambar/halaman_18/asem.webp'), 'ending' => 'as', 'audio' => asset('audio/en/halaman 16-19/halaman 18 asem.m4a')],
                        ['id' => 'Kubis', 'emoji' => asset('gambar/halaman_18/kubis.webp'), 'ending' => 'is', 'audio' => asset('audio/en/halaman 16-19/halaman 18 kubis.m4a')],
                        ['id' => 'Dimsum', 'emoji' => asset('gambar/halaman_18/dimsum.webp'), 'ending' => 'us', 'audio' => asset('audio/en/halaman 16-19/halaman 18 dimsum.m4a')],
                        ['id' => 'Meses', 'emoji' => asset('gambar/halaman_18/meses.webp'), 'ending' => 'es', 'audio' => asset('audio/en/halaman 16-19/halaman 18 meses.m4a')],
                        ['id' => 'Kaos', 'emoji' => asset('gambar/halaman_18/kaos.webp'), 'ending' => 'os', 'audio' => asset('audio/en/halaman 16-19/halaman 18 kaos.m4a')],
                    ],
                ],
                [
                    'masterPola' => 'am im um em om',
                    'audio' => asset('audio/id/Halaman 18/an in un en on.wav'),

                    'items' => [
                        ['id' => 'Bayam', 'emoji' => asset('gambar/halaman_18/bayam.webp'), 'ending' => 'am', 'audio' => asset('audio/en/halaman 16-19/halaman 18 bayam.m4a')],
                        ['id' => 'Eskrim', 'emoji' => asset('gambar/halaman_18/eskrim.webp'), 'ending' => 'im', 'audio' => asset('audio/en/halaman 16-19/halaman 18 eskrim.m4a')],
                        ['id' => 'Paus', 'emoji' => asset('gambar/halaman_18/paus.webp'), 'ending' => 'us', 'audio' => asset('audio/en/halaman 16-19/paus.mp3')],
                        ['id' => 'Kapas', 'emoji' => asset('gambar/halaman_18/kapas.webp'), 'ending' => 'as', 'audio' => asset('audio/en/halaman 16-19/halaman 18 kapas.m4a')],
                        ['id' => 'Pompom', 'emoji' => asset('gambar/halaman_18/pompom.webp'), 'ending' => 'om', 'audio' => asset('audio/en/halaman 16-19/halaman 18 pom pom.m4a')],
                    ],
                ],
            ];
        } else {
            $items = [
                [
                    'masterPola' => 'as is us es os',
                    'audio' => asset('audio/id/Halaman 18/as is us es os.wav'),
                    'items' => [
                        ['id' => 'Asem', 'emoji' => asset('gambar/halaman_18/asem.webp'), 'ending' => 'as', 'audio' => asset('audio/id/Halaman 18/asem.wav')],
                        ['id' => 'Kubis', 'emoji' => asset('gambar/halaman_18/kubis.webp'), 'ending' => 'is', 'audio' => asset('audio/id/Halaman 18/kubis.wav')],
                        ['id' => 'Dimsum', 'emoji' => asset('gambar/halaman_18/dimsum.webp'), 'ending' => 'us', 'audio' => asset('audio/id/Halaman 18/dinsum.wav')],
                        ['id' => 'Meses', 'emoji' => asset('gambar/halaman_18/meses.webp'), 'ending' => 'es', 'audio' => asset('audio/id/Halaman 18/meses.wav')],
                        ['id' => 'Kaos', 'emoji' => asset('gambar/halaman_18/kaos.webp'), 'ending' => 'os', 'audio' => asset('audio/id/Halaman 18/kaos.wav')],
                    ],
                ],
                [
                    'masterPola' => 'am im um em om',
                    'audio' => asset('audio/id/Halaman 18/an in un en on.wav'),
                    'items' => [
                        ['id' => 'Bayam', 'emoji' => asset('gambar/halaman_18/bayam.webp'), 'ending' => 'am', 'audio' => asset('audio/id/Halaman 18/bayam.wav')],
                        ['id' => 'Eskrim', 'emoji' => asset('gambar/halaman_18/eskrim.webp'), 'ending' => 'im', 'audio' => asset('audio/id/Halaman 18/eskrim.wav')],
                        ['id' => 'Paus', 'emoji' => asset('gambar/halaman_18/paus.webp'), 'ending' => 'us', 'audio' => asset('audio/id/Halaman 18/paus.wav')],
                        ['id' => 'Kapas', 'emoji' => asset('gambar/halaman_18/kapas.webp'), 'ending' => 'as', 'audio' => asset('audio/id/Halaman 18/kapas.wav')],
                        ['id' => 'Pompom', 'emoji' => asset('gambar/halaman_18/pompom.webp'), 'ending' => 'om', 'audio' => asset('audio/id/Halaman 18/pompom.wav')],
                    ],
                ],
            ];
        }

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
