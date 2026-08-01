<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

abstract class Controller
{
    protected int $size = 8;

    /**
     * 8 arah pencarian kata dalam grid, format [dr, dc]
     * (delta baris, delta kolom) — dipakai untuk menempatkan
     * huruf berikutnya relatif terhadap huruf sebelumnya.
     */
    protected array $directions = [
        [0, 1],   // kanan          (→)
        [1, 0],   // bawah          (↓)
        [1, 1],   // diagonal kanan-bawah (↘)
        [-1, 1],  // diagonal kanan-atas  (↗)
        [0, -1],  // kiri           (←)
        [-1, 0],  // atas           (↑)
        [-1, -1], // diagonal kiri-atas   (↖)
        [1, -1],  // diagonal kiri-bawah  (↙)
    ];

    abstract public function index(): View;

    /**
     * @throws BindingResolutionException
     */
    public function abcdHuruf(array $data, int $halaman, string $judul, string $deskripsi): View
    {
        return view('games.abc-huruf', [
            'data' => $data,
            'halaman' => $halaman,
            'judul' => $judul,
            'deskripsi' => $deskripsi,
        ]);
    }

    public function tulisKata(array $data, array $items, int $halaman, string $judul, string $deskripsi): View
    {
        try {
            return view('games.tulis-kata', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function melengkapiSukukata(array $data, array $items, int $halaman, string $judul, string $deskripsi): View
    {
        try {
            return view('games.melengkapi-sukukata', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function sukuBerakhiran(array $data, array $items, int $halaman, string $judul, string $deskripsi): View
    {
        try {
            return view('games.hubungkan-suku-berakhiran', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function hubungkanAudioDanGambar(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi): View
    {
        try {
            return view('games.hubungkan-audio-gambar', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    /**
     * @return Factory|\Illuminate\Contracts\View\View|View|void
     */
    public function hubungkanSukukataTerakhir(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi)
    {
        try {
            return view('games.hubungkan-sukukata-terakhir', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    // ---------------------------

    public function tebakAkhirHuruf(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi): View
    {
        try {
            return view('games.tebak-akhir-huruf', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    /**
     * @return Factory|\Illuminate\Contracts\View\View|View|void
     */
    public function belajarHurufVokalKonsonan(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi
    ) {
        try {
            return view('games.belajar-huruf-vokal-konsonan', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function cariKataGame($items, $halaman, $judul, $deskripsi): View
    {
        try {
            return view('games.cari-kata-game', [
                'grid' => $this->generateGrid($items),
                'items' => $items,
                'size' => $this->size,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    protected function generateGrid(array $items): array
    {
        $size = $this->size;
        $grid = array_fill(0, $size, array_fill(0, $size, null));

        $words = array_map(fn ($item) => strtoupper($item['name']), $items);
        usort($words, fn ($a, $b) => strlen($b) - strlen($a));

        foreach ($words as $word) {
            $placed = false;
            $attempts = 0;

            while (! $placed && $attempts < 200) {
                $attempts++;
                [$dr, $dc] = $this->directions[array_rand($this->directions)];
                $len = strlen($word);

                $row = rand(0, $size - 1);
                $col = rand(0, $size - 1);
                $endRow = $row + $dr * ($len - 1);
                $endCol = $col + $dc * ($len - 1);

                if ($endRow < 0 || $endRow >= $size || $endCol < 0 || $endCol >= $size) {
                    continue;
                }

                $fits = true;
                for ($i = 0; $i < $len; $i++) {
                    $r = $row + $dr * $i;
                    $c = $col + $dc * $i;
                    $existing = $grid[$r][$c];
                    if ($existing !== null && $existing !== $word[$i]) {
                        $fits = false;
                        break;
                    }
                }

                if ($fits) {
                    for ($i = 0; $i < $len; $i++) {
                        $r = $row + $dr * $i;
                        $c = $col + $dc * $i;
                        $grid[$r][$c] = $word[$i];
                    }
                    $placed = true;
                }
            }
        }

        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($r = 0; $r < $size; $r++) {
            for ($c = 0; $c < $size; $c++) {
                if ($grid[$r][$c] === null) {
                    $grid[$r][$c] = $alphabet[rand(0, 25)];
                }
            }
        }

        return $grid;
    }

    // ---------------------------

    public function aiueoPilih(array $data, array $items, int $halaman, string $judul, string $deskripsi): View
    {
        try {
            return view('games.aiueo-pilih', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function cariHurufPertama(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi): View
    {
        try {
            return view('games.cari-huruf-pertama', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function deskripsiObject(
        array $data,
        array $items,
        int $halaman,
        string $object,
        string $iconText,
        string $judul,
        string $deskripsi): View
    {
        try {
            return view('games.deskripsi-object', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'object' => $object,
                'iconText' => $iconText,
                'judul' => $judul,   // More specific
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function hubungkanGame(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi): View
    {
        try {
            return view('games.hubungkan-game', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    public function hubungkanTulisGame(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi): View
    {
        try {
            return view('games.hubungkan-tulis-game', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    /**
     * @return Factory|\Illuminate\Contracts\View\View|View|void
     */
    public function aioeoGame(array $data, array $items, int $halaman, string $judul, string $deskripsi)
    {
        try {
            return view('games.aiueo', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    /**
     * @return Factory|\Illuminate\Contracts\View\View|View|void
     */
    public function susunKataKata(
        array $items,
        array $data,
        int $halaman,
        string $judul,
        string $deskripsi)
    {
        try {
            return view('games.susun-game-huruf', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    /**
     * @return Factory|\Illuminate\Contracts\View\View|View|void
     */
    public function pengenalanAudio(
        array $data,
        array $items,
        int $halaman,
        string $judul,
        string $deskripsi
    ) {
        try {
            return view('games.pengenalan-nama', [
                'data' => $data,
                'items' => $items,
                'halaman' => $halaman,
                'judul' => $judul,
                'deskripsi' => $deskripsi,
            ]);
        } catch (BindingResolutionException $e) {
            abort(404, 'terjadi Kesalahan :'.$e->getMessage());
        }
    }

    /**
     * @throws BindingResolutionException
     */
    public function melengkapiHuruf(
        array $hurufs,
        array $hurufHilang,
        int $halaman,
        string $judul,
        string $deskripsi): Factory|\Illuminate\Contracts\View\View|View
    {
        return view('games.melengkapi-huruf', [
            'hurufs' => $hurufs,
            'hurufHilang' => $hurufHilang,   // ← penting sesuai request
            'halaman' => $halaman,
            'judul' => $judul,
            'deskripsi' => $deskripsi,
        ]);
    }
}
