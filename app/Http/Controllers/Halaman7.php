<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Override;

class Halaman7 extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    #[Override]
    public function index(): View
    {
        $data = $this->getDataPublicHalaman7();

        return $this->aioeoGame(
            data: $data,
            items: $data['items'],
            halaman: 7,
            judul: 'Mengenal Huruf Vokal 🎵',
            deskripsi: 'Membaca kosakata yang diawali huruf vokal A, I, U, E, O! 👶✨',
        );
    }

    /**
     * @throws BindingResolutionException
     */
    public function getDataPublicHalaman7(): array
    {
        $items = [
            ['id' => 'a-ayam', 'name' => 'A - Ayam', 'emoji' => '🐔', 'hint' => 'Huruf Vokal A - Ayam! Ayam berkokok di pagi hari! 🐔', 'color' => 'hover:border-yellow-200', 'bg' => 'bg-yellow-100 text-yellow-600', 'vocal' => 'A', 'audio' => asset('audio/Halaman 7/1A. ayam.m4a')],
            ['id' => 'a-awan', 'name' => 'A - Awan', 'emoji' => '☁️', 'hint' => 'Huruf Vokal A - Awan! Awan biru menghiasi langit yang indah! ☁️', 'color' => 'hover:border-blue-200', 'bg' => 'bg-blue-100 text-blue-600', 'vocal' => 'A', 'audio' => asset('audio/Halaman 7/2A. awan.m4a')],
            ['id' => 'a-akar', 'name' => 'A - Akar', 'emoji' => '🌱', 'hint' => 'Huruf Vokal A - Akar! Akar tanaman menyerap air di dalam tanah! 🌱', 'color' => 'hover:border-green-200', 'bg' => 'bg-green-100 text-green-600', 'vocal' => 'A', 'audio' => asset('audio/Halaman 7/3A. akar.m4a')],
            ['id' => 'i-ikan', 'name' => 'I - Ikan', 'emoji' => '🐟', 'hint' => 'Huruf Vokal I - Ikan! Ikan lincah berenang di dalam air! 🐟', 'color' => 'hover:border-blue-300', 'bg' => 'bg-blue-100 text-blue-700', 'vocal' => 'I', 'audio' => asset('audio/Halaman 7/4I. ikan.m4a')],
            ['id' => 'i-iguana', 'name' => 'I - Iguana', 'emoji' => '🦎', 'hint' => 'Huruf Vokal I - Iguana! Iguana adalah reptil hijau pemakan tumbuhan! 🦎', 'color' => 'hover:border-green-300', 'bg' => 'bg-green-100 text-green-700', 'vocal' => 'I', 'audio' => asset('audio/Halaman 7/5I. iguana_.m4a')],
            ['id' => 'i-itik', 'name' => 'I - Itik', 'emoji' => '🦆', 'hint' => 'Huruf Vokal I - Itik! Itik berjalan berbaris yang lucu! 🦆', 'color' => 'hover:border-yellow-300', 'bg' => 'bg-yellow-150 text-yellow-600', 'vocal' => 'I', 'audio' => asset('audio/Halaman 7/6I. itik.m4a')],
            ['id' => 'u-ular', 'name' => 'U - Ular', 'emoji' => '🐍', 'hint' => 'Huruf Vokal U - Ular! Ular adalah hewan melata yang panjang! 🐍', 'color' => 'hover:border-purple-300', 'bg' => 'bg-purple-100 text-purple-700', 'vocal' => 'U', 'audio' => asset('audio/Halaman 7/7U. ular.m4a')],
            ['id' => 'u-udang', 'name' => 'U - Udang', 'emoji' => '🦐', 'hint' => 'Huruf Vokal U - Udang! Udang laut yang lezat dan gurih! 🦐', 'color' => 'hover:border-red-350', 'bg' => 'bg-red-100 text-red-650', 'vocal' => 'U', 'audio' => asset('audio/Halaman 7/8U. udang.m4a')],
            ['id' => 'u-ubi', 'name' => 'U - Ubi', 'emoji' => '🍠', 'hint' => 'Huruf Vokal U - Ubi! Ubi manis yang sangat enak direbus! 🍠', 'color' => 'hover:border-purple-200', 'bg' => 'bg-purple-100 text-purple-600', 'vocal' => 'U', 'audio' => asset('audio/Halaman 7/9U. ubi.m4a')],
            ['id' => 'e-elang', 'name' => 'E - Elang', 'emoji' => '🦅', 'hint' => 'Huruf Vokal E - Elang! Elang gagah terbang tinggi di angkasa! 🦅', 'color' => 'hover:border-gray-200', 'bg' => 'bg-gray-100 text-gray-600', 'vocal' => 'E', 'audio' => asset('audio/Halaman 7/10E. elang.m4a')],
            ['id' => 'e-ember', 'name' => 'E - Ember', 'emoji' => '🪣', 'hint' => 'Huruf Vokal E - Ember! Ember digunakan untuk menampung air bersih! 🪣', 'color' => 'hover:border-blue-200', 'bg' => 'bg-blue-100 text-blue-600', 'vocal' => 'E', 'audio' => asset('audio/Halaman 7/11E. ember.m4a')],
            ['id' => 'e-emas', 'name' => 'E - Emas', 'emoji' => '🥇', 'hint' => 'Huruf Vokal E - Emas! Medali emas berkilau hadiah untuk juara! 🥇', 'color' => 'hover:border-yellow-400', 'bg' => 'bg-yellow-100 text-yellow-800', 'vocal' => 'E', 'audio' => asset('audio/Halaman 7/12E. emas.m4a')],
            ['id' => 'o-obor', 'name' => 'O - Obor', 'emoji' => '🔥', 'hint' => 'Huruf Vokal O - Obor! Obor menerangi kegelapan dengan apinya! 🔥', 'color' => 'hover:border-orange-300', 'bg' => 'bg-orange-100 text-orange-700', 'vocal' => 'O', 'audio' => asset('audio/Halaman 7/13O. obor.m4a')],
            ['id' => 'o-obeng', 'name' => 'O - Obeng', 'emoji' => '🔧', 'hint' => 'Huruf Vokal O - Obeng! Obeng digunakan untuk mengencangkan baut! 🔧', 'color' => 'hover:border-gray-400', 'bg' => 'bg-gray-100 text-gray-800', 'vocal' => 'O', 'audio' => asset('audio/Halaman 7/14O. obeng.m4a')],
            ['id' => 'o-ombak', 'name' => 'O - Ombak', 'emoji' => '🌊', 'hint' => 'Huruf Vokal O - Ombak! Ombak laut bergulung-gulung di tepi pantai! 🌊', 'color' => 'hover:border-blue-400', 'bg' => 'bg-blue-100 text-blue-800', 'vocal' => 'O', 'audio' => asset('audio/Halaman 7/15O. ombak.m4a')],
        ];

        return [
            'items' => $items,
            'total_item' => count($items),
        ];
    }
}
