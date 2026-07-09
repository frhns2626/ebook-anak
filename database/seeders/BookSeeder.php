<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            ['name' => 'Hewan', 'slug' => 'hewan', 'icon' => '🐰'],
            ['name' => 'Petualangan', 'slug' => 'petualangan', 'icon' => '🚀'],
            ['name' => 'Pengalaman', 'slug' => 'pengalaman', 'icon' => '🌈'],
            ['name' => 'Keluarga', 'slug' => 'keluarga', 'icon' => '👨‍👩‍👧'],
            ['name' => 'Lagu', 'slug' => 'lagu', 'icon' => '🎵'],
            ['name' => 'Dongeng', 'slug' => 'dongeng', 'icon' => '🎭'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Get category IDs
        $hewan = Category::where('slug', 'hewan')->first()->id;
        $petualangan = Category::where('slug', 'petualangan')->first()->id;
        $pengalaman = Category::where('slug', 'pengalaman')->first()->id;
        $keluarga = Category::where('slug', 'keluarga')->first()->id;
        $lagu = Category::where('slug', 'lagu')->first()->id;
        $dongeng = Category::where('slug', 'dongeng')->first()->id;

        // Create sample books
        $books = [
            [
                'title' => 'Kelinci Lucu dan Wortel Ajaib',
                'slug' => 'kelinci-lucu-wortel-ajaib',
                'description' => 'Cerita tentang kelinci kecil yang menemukan wortel ajaib di kebun.',
                'cover_image' => null,
                'author' => 'Bu Ani',
                'category_id' => $hewan,
                'age_range_min' => 3,
                'age_range_max' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Petualangan Dino si Pemberani',
                'slug' => 'petualangan-dino-pemberani',
                'description' => 'Dino kecil berani menjelajahi hutan dan bertemu teman-teman baru.',
                'cover_image' => null,
                'author' => 'Kak Roni',
                'category_id' => $petualangan,
                'age_range_min' => 5,
                'age_range_max' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Hari Pertamaku di Sekolah',
                'slug' => 'hari-pertamaku-di-sekolah',
                'description' => 'Pengalaman seru seorang anak TK yang pertama kali masuk sekolah.',
                'cover_image' => null,
                'author' => 'Bu Sari',
                'category_id' => $pengalaman,
                'age_range_min' => 3,
                'age_range_max' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Lagu Nusantara untuk Anak',
                'slug' => 'lagu-nusantara-untuk-anak',
                'description' => 'Kumpulan lagu-lagu daerah Indonesia yang dinyanyikan untuk anak-anak.',
                'cover_image' => null,
                'author' => 'Kak Dewi',
                'category_id' => $lagu,
                'age_range_min' => 3,
                'age_range_max' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Keluarga Bear yang Harmonis',
                'slug' => 'keluarga-bear-harmonis',
                'description' => 'Cerita tentang keluarga beruang yang saling mencintai dan membantu.',
                'cover_image' => null,
                'author' => 'Om Budi',
                'category_id' => $keluarga,
                'age_range_min' => 3,
                'age_range_max' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Putri Tidur yang Menguap',
                'slug' => 'putri-tidur-menguap',
                'description' => 'Versi lucu dari dongeng Putri Tidur yang membuat anak-anak tertawa.',
                'cover_image' => null,
                'author' => 'Nenek Saya',
                'category_id' => $dongeng,
                'age_range_min' => 5,
                'age_range_max' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Kucing Oren Si Manja',
                'slug' => 'kucing-oren-si-manja',
                'description' => 'Kucing oren yang manja tapi tetap berani menolong teman-temannya.',
                'cover_image' => null,
                'author' => 'Bu Rosa',
                'category_id' => $hewan,
                'age_range_min' => 3,
                'age_range_max' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Jelajah Planet Mars',
                'slug' => 'jelajah-planet-mars',
                'description' => 'Petualangan seru anak-anak menjelajahi planet Mars dengan roket.',
                'cover_image' => null,
                'author' => 'Om Ahmad',
                'category_id' => $petualangan,
                'age_range_min' => 5,
                'age_range_max' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Liburan di Pantai',
                'slug' => 'liburan-di-pantai',
                'description' => 'Serunya bermain pasir dan berenang di pantai saat musim panas.',
                'cover_image' => null,
                'author' => 'Bu Lina',
                'category_id' => $pengalaman,
                'age_range_min' => 4,
                'age_range_max' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Adik Baru di Rumah',
                'slug' => 'adik-baru-di-rumah',
                'description' => 'Cerita tentang anak yang senang dapat adik baru di rumah.',
                'cover_image' => null,
                'author' => 'Bu Maya',
                'category_id' => $keluarga,
                'age_range_min' => 3,
                'age_range_max' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Burung Hantu Bijak',
                'slug' => 'burung-hantu-bijak',
                'description' => 'Burung hantu yang cerdas membantu hewan hutan memecahkan masalah.',
                'cover_image' => null,
                'author' => 'Kak Adi',
                'category_id' => $hewan,
                'age_range_min' => 4,
                'age_range_max' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Timun Mas si Gadis Pemberani',
                'slug' => 'timun-mas-gadis-pemberani',
                'description' => 'Cerita rakyat Indonesia tentang gadis kecil yang berani melawan raksasa.',
                'cover_image' => null,
                'author' => 'Nenek',
                'category_id' => $dongeng,
                'age_range_min' => 4,
                'age_range_max' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
