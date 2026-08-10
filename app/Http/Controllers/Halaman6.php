<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Override;

class Halaman6 extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    #[Override]
    public function index(Request $request): View
    {
        try {
            $lang = $request->query('lang', 'id');
            return $this->melengkapiHuruf(
                hurufs: $this->getDataPublicHalaman6(lang: $lang),
                halaman: 6,
                judul: 'Halaman 6 - Lengkapi Huruf yang Hilang',
                lang: $lang,
                deskripsi: 'Berlatih melengkapi huruf A sampai Z yang hilang!'
            );
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman6(string $lang): array
    {
        $en = [
            ['huruf' => 'A', 'spelling' => 'A', 'audio' => asset('audio/en/Halaman 6/Salinan 1.A.m4a'),],
            ['huruf' => 'B', 'spelling' => 'Be', 'audio' => asset('audio/en/Halaman 6/Salinan 2.B.m4a'),],
            ['huruf' => 'C', 'spelling' => 'Ce', 'audio' => asset('audio/en/Halaman 6/Salinan 3.C.m4a'),],
            ['huruf' => 'D', 'spelling' => 'De', 'audio' => asset('audio/en/Halaman 6/Salinan 4.D.m4a'),],
            ['huruf' => 'E', 'spelling' => 'E', 'audio' => asset('audio/en/Halaman 6/Salinan 5.E.m4a'),],
            ['huruf' => 'F', 'spelling' => 'Ef', 'audio' => asset('audio/en/Halaman 6/Salinan 6.F.m4a'),],
            ['huruf' => 'G', 'spelling' => 'Ge', 'audio' => asset('audio/en/Halaman 6/Salinan 7.G.m4a'),],
            ['huruf' => 'H', 'spelling' => 'Ha', 'audio' => asset('audio/en/Halaman 6/Salinan 8.H.m4a'),],
            ['huruf' => 'I', 'spelling' => 'I', 'audio' => asset('audio/en/Halaman 6/Salinan 9.I.m4a'),],
            ['huruf' => 'J', 'spelling' => 'Je', 'audio' => asset('audio/en/Halaman 6/Salinan 10.J.m4a'),],
            ['huruf' => 'K', 'spelling' => 'Ka', 'audio' => asset('audio/en/Halaman 6/Salinan 11.K.m4a'),],
            ['huruf' => 'L', 'spelling' => 'El', 'audio' => asset('audio/en/Halaman 6/Salinan 12.L.m4a'),],
            ['huruf' => 'M', 'spelling' => 'Em', 'audio' => asset('audio/en/Halaman 6/Salinan 13.M.m4a'),],
            ['huruf' => 'N', 'spelling' => 'En', 'audio' => asset('audio/en/Halaman 6/Salinan 14.N.m4a'),],
            ['huruf' => 'O', 'spelling' => 'O', 'audio' => asset('audio/en/Halaman 6/Salinan 15.O.m4a'),],
            ['huruf' => 'P', 'spelling' => 'Pe', 'audio' => asset('audio/en/Halaman 6/Salinan 16.P.m4a'),],
            ['huruf' => 'Q', 'spelling' => 'Ki', 'audio' => asset('audio/en/Halaman 6/Salinan 17.Q.m4a'),],
            ['huruf' => 'R', 'spelling' => 'Er', 'audio' => asset('audio/en/Halaman 6/Salinan 18.R.m4a'),],
            ['huruf' => 'S', 'spelling' => 'Es', 'audio' => asset('audio/en/Halaman 6/Salinan 19.S.m4a'),],
            ['huruf' => 'T', 'spelling' => 'Te', 'audio' => asset('audio/en/Halaman 6/Salinan 20.T.m4a'),],
            ['huruf' => 'U', 'spelling' => 'U', 'audio' => asset('audio/en/Halaman 6/Salinan 21.U.m4a'),],
            ['huruf' => 'V', 'spelling' => 'Ve', 'audio' => asset('audio/en/Halaman 6/Salinan 22.V.m4a'),],
            ['huruf' => 'W', 'spelling' => 'We', 'audio' => asset('audio/en/Halaman 6/Salinan 23.W.m4a'),],
            ['huruf' => 'X', 'spelling' => 'Eks', 'audio' => asset('audio/en/Halaman 6/Salinan 24.X.m4a'),],
            ['huruf' => 'Y', 'spelling' => 'Ye', 'audio' => asset('audio/en/Halaman 6/Salinan 25.Y.m4a'),],
            ['huruf' => 'Z', 'spelling' => 'Zet', 'audio' => asset('audio/en/Halaman 6/Salinan 26.Z.m4a'),],
        ];

        $id = [
            ['id' => 'A', 'spelling' => 'A', 'audio' => asset('audio/id/Halaman 1/a.wav')],
            ['id' => 'B', 'spelling' => 'Be', 'audio' => asset('audio/id/Halaman 1/b.wav')],
            ['id' => 'C', 'spelling' => 'Ce', 'audio' => asset('audio/id/Halaman 1/c.wav')],
            ['id' => 'D', 'spelling' => 'De', 'audio' => asset('audio/id/Halaman 1/d.wav')],
            ['id' => 'E', 'spelling' => 'E', 'audio' => asset('audio/id/Halaman 1/e.wav')],
            ['id' => 'F', 'spelling' => 'Ef', 'audio' => asset('audio/id/Halaman 1/f.wav')],
            ['id' => 'G', 'spelling' => 'Ge', 'audio' => asset('audio/id/Halaman 1/g.wav')],
            ['id' => 'H', 'spelling' => 'Ha', 'audio' => asset('audio/id/Halaman 1/h.wav')],
            ['id' => 'I', 'spelling' => 'I', 'audio' => asset('audio/id/Halaman 1/i.wav')],
            ['id' => 'J', 'spelling' => 'Je', 'audio' => asset('audio/id/Halaman 1/j.wav')],
            ['id' => 'K', 'spelling' => 'Ka', 'audio' => asset('audio/id/Halaman 1/k.wav')],
            ['id' => 'L', 'spelling' => 'El', 'audio' => asset('audio/id/Halaman 1/l.wav')],
            ['id' => 'M', 'spelling' => 'Em', 'audio' => asset('audio/id/Halaman 1/m.wav')],
            ['id' => 'N', 'spelling' => 'En', 'audio' => asset('audio/id/Halaman 1/n.wav')],
            ['id' => 'O', 'spelling' => 'O', 'audio' => asset('audio/id/Halaman 1/o.wav')],
            ['id' => 'P', 'spelling' => 'Pe', 'audio' => asset('audio/id/Halaman 1/p.wav')],
            ['id' => 'Q', 'spelling' => 'Ki', 'audio' => asset('audio/id/Halaman 1/q.wav')],
            ['id' => 'R', 'spelling' => 'Er', 'audio' => asset('audio/id/Halaman 1/r.wav')],
            ['id' => 'S', 'spelling' => 'Es', 'audio' => asset('audio/id/Halaman 1/s.wav')],
            ['id' => 'T', 'spelling' => 'Te', 'audio' => asset('audio/id/Halaman 1/t.wav')],
            ['id' => 'U', 'spelling' => 'U', 'audio' => asset('audio/id/Halaman 1/u.wav')],
            ['id' => 'V', 'spelling' => 'Ve', 'audio' => asset('audio/id/Halaman 1/v.wav')],
            ['id' => 'W', 'spelling' => 'We', 'audio' => asset('audio/id/Halaman 1/w.wav')],
            ['id' => 'X', 'spelling' => 'Eks', 'audio' => asset('audio/id/Halaman 1/x.wav')],
            ['id' => 'Y', 'spelling' => 'Ye', 'audio' => asset('audio/id/Halaman 1/y.wav')],
            ['id' => 'Z', 'spelling' => 'Zet', 'audio' => asset('audio/id/Halaman 1/z.wav')],
        ];
        $lang = $lang === 'en' ?  $en : $id;

        return [
            'items' => $lang,
            'total_item' => 26,
        ];
    }
}
