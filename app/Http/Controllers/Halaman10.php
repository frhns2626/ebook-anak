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
        return $this->belajarHurufVokalKonsonan(
            data: $this->getDataPublicHalaman10(),
            halaman: 10,
            judul: 'Halaman 10 - Membaca Suku Kata Terbuka',
            deskripsi: 'Mengenal bunyi konsonan dan vokal (A, I, U, E, O)!');
    }

    /**
     * @return array{
     *     items: list<array{
     *     vokal:string,
     *     suku_kata:list<array{
     *              text:string,
     *              audio:string
     *              }
     *     }
     *  }>>,
     * total_item: int}
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman10(): array
    {
        $items = [
            [
                'vokal' => 'A',
                'suku_kata' => [
                    ['text' => 'A', 'audio' => asset('audio/id/halaman 10/a.wav')],
                    ['text' => 'ba', 'audio' => asset('audio/id/halaman 10/ba.wav')],
                    ['text' => 'ca', 'audio' => asset('audio/id/halaman 10/ca.wav')],
                    ['text' => 'da', 'audio' => asset('audio/id/halaman 10/da.wav')],
                    ['text' => 'fa', 'audio' => asset('audio/id/halaman 10/fa.wav')],
                    ['text' => 'ga', 'audio' => asset('audio/id/halaman 10/ga.wav')],
                    ['text' => 'ha', 'audio' => asset('audio/id/halaman 10/ha.wav')],
                    ['text' => 'ja', 'audio' => asset('audio/id/halaman 10/ja.wav')],
                    ['text' => 'ka', 'audio' => asset('audio/id/halaman 10/ka.wav')],
                    ['text' => 'la', 'audio' => asset('audio/id/halaman 10/la.wav')],
                    ['text' => 'ma', 'audio' => asset('audio/id/halaman 10/ma.wav')],
                ],
            ],
            [
                'vokal' => 'I',
                'suku_kata' => [
                    ['text' => 'I', 'audio' => asset('audio/id/halaman 10/i.wav')],
                    ['text' => 'bi', 'audio' => asset('audio/id/halaman 10/bi.wav')],
                    ['text' => 'ci', 'audio' => asset('audio/id/halaman 10/ci.wav')],
                    ['text' => 'di', 'audio' => asset('audio/id/halaman 10/di.wav')],
                    ['text' => 'fi', 'audio' => asset('audio/id/halaman 10/fi.wav')],
                    ['text' => 'gi', 'audio' => asset('audio/id/halaman 10/gi.wav')],
                    ['text' => 'hi', 'audio' => asset('audio/id/halaman 10/hi.wav')],
                    ['text' => 'ji', 'audio' => asset('audio/id/halaman 10/ji.wav')],
                    ['text' => 'ki', 'audio' => asset('audio/id/halaman 10/ki.wav')],
                    ['text' => 'li', 'audio' => asset('audio/id/halaman 10/li.wav')],
                    ['text' => 'mi', 'audio' => asset('audio/id/halaman 10/mi.wav')],
                ],
            ],
            [
                'vokal' => 'U',
                'suku_kata' => [
                    ['text' => 'U', 'audio' => asset('audio/id/halaman 10/u.wav')],
                    ['text' => 'bu', 'audio' => asset('audio/id/halaman 10/bu.wav')],
                    ['text' => 'cu', 'audio' => asset('audio/id/halaman 10/cu.wav')],
                    ['text' => 'du', 'audio' => asset('audio/id/halaman 10/du.wav')],
                    ['text' => 'fu', 'audio' => asset('audio/id/halaman 10/fu.wav')],
                    ['text' => 'gu', 'audio' => asset('audio/id/halaman 10/gu.wav')],
                    ['text' => 'hu', 'audio' => asset('audio/id/halaman 10/hu.wav')],
                    ['text' => 'ju', 'audio' => asset('audio/id/halaman 10/ju.wav')],
                    ['text' => 'ku', 'audio' => asset('audio/id/halaman 10/ku.wav')],
                    ['text' => 'lu', 'audio' => asset('audio/id/halaman 10/lu.wav')],
                    ['text' => 'mu', 'audio' => asset('audio/id/halaman 10/mu.wav')],
                ],
            ],
            [
                'vokal' => 'E',
                'suku_kata' => [
                    ['text' => 'E', 'audio' => asset('audio/id/halaman 10/e.wav')],
                    ['text' => 'be', 'audio' => asset('audio/id/halaman 10/be.wav')],
                    ['text' => 'ce', 'audio' => asset('audio/id/halaman 10/ce.wav')],
                    ['text' => 'de', 'audio' => asset('audio/id/halaman 10/de.wav')],
                    ['text' => 'fe', 'audio' => asset('audio/id/halaman 10/fe.wav')],
                    ['text' => 'ge', 'audio' => asset('audio/id/halaman 10/ge.wav')],
                    ['text' => 'he', 'audio' => asset('audio/id/halaman 10/he.wav')],
                    ['text' => 'je', 'audio' => asset('audio/id/halaman 10/je.wav')],
                    ['text' => 'ke', 'audio' => asset('audio/id/halaman 10/ke.wav')],
                    ['text' => 'le', 'audio' => asset('audio/id/halaman 10/le.wav')],
                    ['text' => 'me', 'audio' => asset('audio/id/halaman 10/me.wav')],
                ],
            ],
            [
                'vokal' => 'O',
                'suku_kata' => [
                    ['text' => 'O', 'audio' => asset('audio/id/halaman 10/o.wav')],
                    ['text' => 'bo', 'audio' => asset('audio/id/halaman 10/bo.wav')],
                    ['text' => 'co', 'audio' => asset('audio/id/halaman 10/co.wav')],
                    ['text' => 'do', 'audio' => asset('audio/id/halaman 10/do.wav')],
                    ['text' => 'fo', 'audio' => asset('audio/id/halaman 10/fo.wav')],
                    ['text' => 'go', 'audio' => asset('audio/id/halaman 10/go.wav')],
                    ['text' => 'ho', 'audio' => asset('audio/id/halaman 10/ho.wav')],
                    ['text' => 'jo', 'audio' => asset('audio/id/halaman 10/jo.wav')],
                    ['text' => 'ko', 'audio' => asset('audio/id/halaman 10/ko.wav')],
                    ['text' => 'lo', 'audio' => asset('audio/id/halaman 10/lo.wav')],
                    ['text' => 'mo', 'audio' => asset('audio/id/halaman 10/mo.wav')],
                ],
            ],
        ];

        return [
            'pembukaan' => asset('audio/id/Halaman 10/pembukaan.wav'),
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
