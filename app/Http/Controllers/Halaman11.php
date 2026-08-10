<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Override;


class Halaman11 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(Request $request): View
    {
        $lang = $request->query('lang', 'id');
        return $this->belajarHurufVokalKonsonan(
            data: $this->getDataPublicHalaman11(),
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
                'vokal' => 'A',
                'suku_kata' => [
//                    ['text' => 'A', 'audio' => asset('audio/id/Halaman 11/a.wav')],
                    ['text' => 'na', 'audio' => asset('audio/id/Halaman 11/na.wav')],
                    ['text' => 'pa', 'audio' => asset('audio/id/Halaman 11/pa.wav')],
                    ['text' => 'qa', 'audio' => asset('audio/id/Halaman 11/qa.wav')],
                    ['text' => 'ra', 'audio' => asset('audio/id/Halaman 11/ra.wav')],
                    ['text' => 'sa', 'audio' => asset('audio/id/Halaman 11/sa.wav')],
                    ['text' => 'ta', 'audio' => asset('audio/id/Halaman 11/ta.wav')],
                    ['text' => 'va', 'audio' => asset('audio/id/Halaman 11/va.wav')],
                    ['text' => 'wa', 'audio' => asset('audio/id/Halaman 11/wa.wav')],
                    ['text' => 'xa', 'audio' => asset('audio/id/Halaman 11/xa.wav')],
                    ['text' => 'ya', 'audio' => asset('audio/id/Halaman 11/ya.wav')],
                    ['text' => 'za', 'audio' => asset('audio/id/Halaman 11/za.wav')],
                ],
            ],
            [
                'vokal' => 'I',
                'suku_kata' => [
//                    ['text' => 'I', 'audio' => asset('audio/id/Halaman 11/i.wav')],
                    ['text' => 'ni', 'audio' => asset('audio/id/Halaman 11/ni.wav')],
                    ['text' => 'pi', 'audio' => asset('audio/id/Halaman 11/pi.wav')],
                    ['text' => 'qi', 'audio' => asset('audio/id/Halaman 11/qi.wav')],
                    ['text' => 'ri', 'audio' => asset('audio/id/Halaman 11/ri.wav')],
                    ['text' => 'si', 'audio' => asset('audio/id/Halaman 11/si.wav')],
                    ['text' => 'ti', 'audio' => asset('audio/id/Halaman 11/ti.wav')],
                    ['text' => 'vi', 'audio' => asset('audio/id/Halaman 11/vi.wav')],
                    ['text' => 'wi', 'audio' => asset('audio/id/Halaman 11/wi.wav')],
                    ['text' => 'xi', 'audio' => asset('audio/id/Halaman 11/xi.wav')],
                    ['text' => 'yi', 'audio' => asset('audio/id/Halaman 11/yi.wav')],
                    ['text' => 'zi', 'audio' => asset('audio/id/Halaman 11/zi.wav')],
                ],
            ],
            [
                'vokal' => 'U',
                'suku_kata' => [
//                    ['text' => 'U', 'audio' => asset('audio/id/Halaman 11/u.wav')],
                    ['text' => 'nu', 'audio' => asset('audio/id/Halaman 11/nu.wav')],
                    ['text' => 'pu', 'audio' => asset('audio/id/Halaman 11/pu.wav')],
                    ['text' => 'qu', 'audio' => asset('audio/id/Halaman 11/qu.wav')],
                    ['text' => 'ru', 'audio' => asset('audio/id/Halaman 11/ru.wav')],
                    ['text' => 'su', 'audio' => asset('audio/id/Halaman 11/su.wav')],
                    ['text' => 'tu', 'audio' => asset('audio/id/Halaman 11/tu.wav')],
                    ['text' => 'vu', 'audio' => asset('audio/id/Halaman 11/vu.wav')],
                    ['text' => 'wu', 'audio' => asset('audio/id/Halaman 11/wu.wav')],
                    ['text' => 'xu', 'audio' => asset('audio/id/Halaman 11/xu.wav')],
                    ['text' => 'yu', 'audio' => asset('audio/id/Halaman 11/yu.wav')],
                    ['text' => 'zu', 'audio' => asset('audio/id/Halaman 11/zu.wav')],
                ],
            ],
            [
                'vokal' => 'E',
                'suku_kata' => [
//                    ['text' => 'E', 'audio' => asset('audio/id/Halaman 11/e.wav')],
                    ['text' => 'ne', 'audio' => asset('audio/id/Halaman 11/ne.wav')],
                    ['text' => 'pe', 'audio' => asset('audio/id/Halaman 11/pe.wav')],
                    ['text' => 'qe', 'audio' => asset('audio/id/Halaman 11/qe.wav')],
                    ['text' => 're', 'audio' => asset('audio/id/Halaman 11/re.wav')],
                    ['text' => 'se', 'audio' => asset('audio/id/Halaman 11/se.wav')],
                    ['text' => 'te', 'audio' => asset('audio/id/Halaman 11/te.wav')],
                    ['text' => 've', 'audio' => asset('audio/id/Halaman 11/ve.wav')],
                    ['text' => 'we', 'audio' => asset('audio/id/Halaman 11/we.wav')],
                    ['text' => 'xe', 'audio' => asset('audio/id/Halaman 11/xe.wav')],
                    ['text' => 'ye', 'audio' => asset('audio/id/Halaman 11/ye.wav')],
                    ['text' => 'ze', 'audio' => asset('audio/id/Halaman 11/ze.wav')],
                ],
            ],
            [
                'vokal' => 'O',
                'suku_kata' => [
//                    ['text' => 'O', 'audio' => asset('audio/id/Halaman 11/o.wav')],
                    ['text' => 'no', 'audio' => asset('audio/id/Halaman 11/no.wav')],
                    ['text' => 'po', 'audio' => asset('audio/id/Halaman 11/po.wav')],
                    ['text' => 'qo', 'audio' => asset('audio/id/Halaman 11/qo.wav')],
                    ['text' => 'ro', 'audio' => asset('audio/id/Halaman 11/ro.wav')],
                    ['text' => 'so', 'audio' => asset('audio/id/Halaman 11/so.wav')],
                    ['text' => 'to', 'audio' => asset('audio/id/Halaman 11/to.wav')],
                    ['text' => 'vo', 'audio' => asset('audio/id/Halaman 11/vo.wav')],
                    ['text' => 'wo', 'audio' => asset('audio/id/Halaman 11/wo.wav')],
                    ['text' => 'xo', 'audio' => asset('audio/id/Halaman 11/xo.wav')],
                    ['text' => 'yo', 'audio' => asset('audio/id/Halaman 11/yo.wav')],
                    ['text' => 'zo', 'audio' => asset('audio/id/Halaman 11/zo.wav')],
                ],
            ],
        ];

        return [
            'pembukaan' => asset('audio/id/Halaman 11/pembukaan.wav'),
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
