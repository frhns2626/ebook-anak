<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
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
        $dongeng = Category::where('slug', 'dongeng')->first()->id;

        // Sample chapters content for each book
        $chapterContents = [
            [
                ['title' => 'Halaman 1 - Awal Cerita', 'content' => 'Di sebuah kebun yang hijau dan indah, hiduplah seekor kelinci kecil yang bernama Kiki. Kiki sangat suka memakan wortel dari kebunya sendiri.'],
                ['title' => 'Halaman 2 - Penemuan Ajaib', 'content' => 'Suatu hari, ketika Kiki sedang berkebun, ia menemukan wortel yang berbeda! Wortel itu bersinar terang dan berwarna emas. "Wah, wortel apa ini?" kata Kiki dengan kaget.'],
                ['title' => 'Halaman 3 - Wortel Ajaib', 'content' => 'Kiki menggali wortel itu dan tiba-tiba... wortel itu menjadi besar sekali! Kiki tertawa kegirangan. "Ini pasti wortel ajaib!" serunya bahagia.'],
                ['title' => 'Halaman 4 - Akhir Cerita', 'content' => 'Sejak hari itu, setiap wortel yang Kiki tanam menjadi sangat lezat dan sehat. Kiki berbagi wortel dengan semua teman-temannya di kebun. Mereka semua hidup bahagia! 🎉'],
            ],
            [
                ['title' => 'Halaman 1 - Awal Petualangan', 'content' => 'Di sebuah hutan purba, hiduplah Dino kecil yang bernama Dino. Dino sangat penasaran dan suka berpetualang.'],
                ['title' => 'Halaman 2 - Bertemu Teman Baru', 'content' => 'Suatu hari, Dino bertemu dengan teman-teman baru: Pterry si pterosaurus dan Tricky si triceratops. "Ayo kita jelajahi hutan bersama!" kata Pterry.'],
                ['title' => 'Halaman 3 - Petualangan Seru', 'content' => 'Mereka menjelajahi gua-gua misterius dan menemukan fosil kuno! Dino sangat senang bisa belajar hal baru bersama teman-temannya.'],
                ['title' => 'Halaman 4 - Pulang ke Rumah', 'content' => 'Setelah petualangan yang seru, Dino pulang ke rumah dengan hati yang bahagia. Ia menceritakan semua pengalamannya kepada keluarga. Teman-teman promessa untuk adventure lagi besok! 🚀'],
            ],
            [
                ['title' => 'Halaman 1 - Pagi yang Cemas', 'content' => 'Hari ini adalah hari pertama Ani masuk sekolah TK. Ani sangat nervous tapi juga excited! "Ayah, Ibu, ayo berangkat!" teriak Ani dari kamarnya.'],
                ['title' => 'Halaman 2 - Di Sekolah', 'content' => 'Setibanya di sekolah, Ani bertemu dengan Bu Guru yang ramah. "Selamat datang di TK Ceria!" kata Bu Guru sambil tersenyum.'],
                ['title' => 'Halaman 3 - Bermain dengan Teman', 'content' => 'Ani bermain balok, mewarnai, dan bernyanyi bersama teman-teman baru. Semua orang sangat baik dan ramah. Ani merasa senang sekali!'],
                ['title' => 'Halaman 4 - Pulang Sekolah', 'content' => 'Setelah pulang sekolah, Ani erz pada Orang tuanya. "Sekolah itu seru banget! Besok aku mau pergi lagi!" kata Ani dengan riang. 🌈✨'],
            ],
        ];

        // Create sample books with chapters
        $booksData = [
            [
                'title' => 'Kelinci Lucu dan Wortel Ajaib',
                'slug' => 'kelinci-lucu-wortel-ajaib',
                'description' => 'Cerita tentang kelinci kecil yang menemukan wortel ajaib di kebun.',
                'author' => 'Bu Ani',
                'category_id' => $hewan,
                'age_range_min' => 3,
                'age_range_max' => 5,
            ],
            [
                'title' => 'Petualangan Dino si Pemberani',
                'slug' => 'petualangan-dino-pemberani',
                'description' => 'Dino kecil berani menjelajahi hutan dan bertemu teman-teman baru.',
                'author' => 'Kak Roni',
                'category_id' => $petualangan,
                'age_range_min' => 5,
                'age_range_max' => 8,
            ],
            [
                'title' => 'Hari Pertamaku di Sekolah',
                'slug' => 'hari-pertamaku-di-sekolah',
                'description' => 'Pengalaman seru seorang anak TK yang pertama kali masuk sekolah.',
                'author' => 'Bu Sari',
                'category_id' => $pengalaman,
                'age_range_min' => 3,
                'age_range_max' => 5,
            ],
            [
                'title' => 'Keluarga Bear yang Harmonis',
                'slug' => 'keluarga-bear-harmonis',
                'description' => 'Cerita tentang keluarga beruang yang saling mencintai dan membantu.',
                'author' => 'Om Budi',
                'category_id' => $keluarga,
                'age_range_min' => 3,
                'age_range_max' => 5,
            ],
            [
                'title' => 'Putri Tidur yang Menguap',
                'slug' => 'putri-tidur-menguap',
                'description' => 'Versi lucu dari dongeng Putri Tidur yang membuat anak-anak tertawa.',
                'author' => 'Nenek Saya',
                'category_id' => $dongeng,
                'age_range_min' => 5,
                'age_range_max' => 8,
            ],
            [
                'title' => 'Kucing Oren Si Manja',
                'slug' => 'kucing-oren-si-manja',
                'description' => 'Kucing oren yang manja tapi tetap berani menolong teman-temannya.',
                'author' => 'Bu Rosa',
                'category_id' => $hewan,
                'age_range_min' => 3,
                'age_range_max' => 6,
            ],
            [
                'title' => 'Jelajah Planet Mars',
                'slug' => 'jelajah-planet-mars',
                'description' => 'Petualangan seru anak-anak menjelajahi planet Mars dengan roket.',
                'author' => 'Om Ahmad',
                'category_id' => $petualangan,
                'age_range_min' => 5,
                'age_range_max' => 8,
            ],
            [
                'title' => 'Liburan di Pantai',
                'slug' => 'liburan-di-pantai',
                'description' => 'Serunya bermain pasir dan berenang di pantai saat musim panas.',
                'author' => 'Bu Lina',
                'category_id' => $pengalaman,
                'age_range_min' => 4,
                'age_range_max' => 7,
            ],
            [
                'title' => 'Adik Baru di Rumah',
                'slug' => 'adik-baru-di-rumah',
                'description' => 'Cerita tentang anak yang senang dapat adik baru di rumah.',
                'author' => 'Bu Maya',
                'category_id' => $keluarga,
                'age_range_min' => 3,
                'age_range_max' => 6,
            ],
            [
                'title' => 'Burung Hantu Bijak',
                'slug' => 'burung-hantu-bijak',
                'description' => 'Burung hantu yang cerdas membantu hewan hutan memecahkan masalah.',
                'author' => 'Kak Adi',
                'category_id' => $hewan,
                'age_range_min' => 4,
                'age_range_max' => 7,
            ],
            [
                'title' => 'Timun Mas si Gadis Pemberani',
                'slug' => 'timun-mas-gadis-pemberani',
                'description' => 'Cerita rakyat Indonesia tentang gadis kecil yang berani melawan raksasa.',
                'author' => 'Nenek',
                'category_id' => $dongeng,
                'age_range_min' => 4,
                'age_range_max' => 8,
            ],
            [
                'title' => 'Lagu Nusantara untuk Anak',
                'slug' => 'lagu-nusantara-untuk-anak',
                'description' => 'Kumpulan lagu-lagu daerah Indonesia yang dinyanyikan untuk anak-anak.',
                'author' => 'Kak Dewi',
                'category_id' => Category::where('slug', 'lagu')->first()->id,
                'age_range_min' => 3,
                'age_range_max' => 8,
            ],
        ];

        foreach ($booksData as $index => $bookData) {
            $book = Book::create(array_merge($bookData, ['is_active' => true]));

            // Add chapters for each book
            $contents = $chapterContents[$index % count($chapterContents)];
            foreach ($contents as $order => $chapter) {
                Chapter::create([
                    'book_id' => $book->id,
                    'title' => $chapter['title'],
                    'page_number' => $order + 1,
                    'content' => $chapter['content'],
                    'order' => $order + 1,
                ]);
            }
        }
    }
}
