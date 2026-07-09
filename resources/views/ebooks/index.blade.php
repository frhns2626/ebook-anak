<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 Perpustakaan Ebook Anak - TK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Comic Neue', cursive;
        }

        h1, h2, h3, .title {
            font-family: 'Fredoka One', cursive;
        }

        body {
            background: linear-gradient(135deg, #ffeaa7 0%, #a8e6cf 50%, #dcedc1 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            animation: bgMove 30s infinite alternate;
        }

        @keyframes bgMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Header */
        header {
            background: linear-gradient(90deg, #ff6b6b, #ff9f1c);
            color: white;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: '🌟 ✨ 🌈';
            position: absolute;
            top: -20px;
            left: 0;
            width: 100%;
            font-size: 2em;
            opacity: 0.3;
            animation: float 4s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .logo {
            font-size: 2.8em;
            margin: 0;
            text-shadow: 4px 4px 0 rgba(0,0,0,0.2);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Container */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Navigation tabs */
        .nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 25px 0;
            flex-wrap: wrap;
        }

        .nav-button {
            padding: 15px 30px;
            font-size: 1.2em;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        .nav-button:hover {
            transform: scale(1.12) rotate(3deg);
        }

        .nav-button.active {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        }

        /* Category pills */
        .category-pills {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin: 20px 0;
            flex-wrap: wrap;
        }

        .category-pill {
            padding: 12px 24px;
            font-size: 1.1em;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            border: 4px solid white;
            background: white;
            color: #666;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .category-pill:hover {
            transform: scale(1.08);
        }

        .category-pill.active {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            border-color: #6c5ce7;
        }

        /* Section cards */
        .section-card {
            background: rgba(255,255,255,0.95);
            border-radius: 30px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border: 8px solid #fff;
        }

        /* Book grid */
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
        }

        /* Book card */
        .book-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            cursor: pointer;
            border: 6px solid #fff;
        }

        .book-card:hover {
            transform: translateY(-15px) scale(1.08) rotate(2deg);
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
        }

        /* Book cover */
        .book-cover {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .book-card:hover .book-cover {
            transform: scale(1.1);
        }

        .cover-placeholder {
            width: 100%;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .cover-placeholder::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            width: 30px;
            height: 30px;
            background: rgba(255,255,255,0.4);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .cover-placeholder::after {
            content: '';
            position: absolute;
            bottom: 15px;
            right: 15px;
            width: 20px;
            height: 20px;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            animation: bounce 1.5s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.3); opacity: 0.8; }
        }

        /* Book content */
        .book-content {
            padding: 18px;
            text-align: center;
            background: linear-gradient(to bottom, #fff, #f8f9fa);
        }

        .book-title {
            font-size: 1.3em;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-author {
            font-size: 0.95em;
            color: #888;
            margin-bottom: 12px;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.85em;
            font-weight: bold;
            margin: 4px;
        }

        .badge-category {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
        }

        .badge-age {
            background: #ffeaa7;
            color: #d63031;
        }

        /* Read button */
        .read-btn {
            background: linear-gradient(#45b7d1, #2a8ba8);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1em;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
            margin-top: 10px;
        }

        .read-btn:hover {
            transform: scale(1.1);
        }

        /* Stats section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .stat-card {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
            padding: 25px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .stat-card:nth-child(2) {
            background: linear-gradient(135deg, #00b894, #00a085);
        }

        .stat-card:nth-child(3) {
            background: linear-gradient(135deg, #0984e3, #0652dd);
        }

        .stat-card:nth-child(4) {
            background: linear-gradient(135deg, #fdcb6e, #f39c12);
        }

        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        .stat-label {
            font-size: 1em;
            opacity: 0.9;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 25px;
            color: #555;
            font-size: 1.1em;
        }

        /* Section title */
        .section-title {
            text-align: center;
            color: #ff6b6b;
            font-size: 2.2em;
            margin-bottom: 25px;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state .emoji {
            font-size: 5em;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.8em;
            color: #666;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #999;
            font-size: 1.2em;
        }

        /* Hide sections by default */
        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
            animation: popIn 0.5s;
        }

        @keyframes popIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>
    <header>
        <h1 class="logo">📚 Perpustakaan Ebook Anak 🎉</h1>
        <p style="font-size:1.2em;margin:8px 0 0;">Cerita Lucu & Menyenangkan untuk Anak TK ✨</p>
    </header>

    <div class="container">
        {{-- Navigation --}}
        <div class="nav">
            <button onclick="showSection('all')" class="nav-button active" style="background: #ff6b6b;">
                📚 Semua Buku
            </button>
            <button onclick="showSection('favorites')" class="nav-button" style="background: #fdcb6e; color: #d63031;">
                ⭐ Terpopuler
            </button>
            <button onclick="showSection('new')" class="nav-button" style="background: #00b894; color: white;">
                🆕 Buku Baru
            </button>
            <a href="{{ route('games.index') }}" class="nav-button" style="background: linear-gradient(135deg, #6c5ce7, #a29bfe); color: white; text-decoration:none;">
                🎮 Games Edukasi
            </a>
        </div>

        {{-- Category Filter --}}
        <div class="category-pills">
            <span class="category-pill active" onclick="filterCategory('all')">✨ Semua</span>
            @foreach($categories as $cat)
                <span class="category-pill" onclick="filterCategory('{{ $cat->slug }}')">
                    {{ $cat->icon }} {{ $cat->name }}
                </span>
            @endforeach
        </div>

        {{-- All Books Section --}}
        <div id="section-all" class="content-section active">
            <div class="section-card">
                <h2 class="section-title">📚📚 Koleksi Buku Cerita 📚📚</h2>

                @if($books->count() > 0)
                    <div class="book-grid">
                        @foreach($books as $book)
                            <div class="book-card" onclick="goToBook('{{ $book->slug }}')">
                                @if($book->cover_image)
                                    <img src="{{ asset('storage/covers/' . $book->cover_image) }}"
                                         alt="{{ $book->title }}"
                                         class="book-cover">
                                @else
                                    <div class="cover-placeholder" style="background: linear-gradient(135deg, {{ $book->category->gradient_start ?? '#a29bfe' }}, {{ $book->category->gradient_end ?? '#6c5ce7' }});">
                                        <span style="font-size: 5em; z-index: 1;">{{ $book->category->icon ?? '📚' }}</span>
                                    </div>
                                @endif

                                <div class="book-content">
                                    <div style="min-height: 50px;">
                                        <span class="badge badge-category">{{ $book->category->icon ?? '' }} {{ $book->category->name ?? 'Umum' }}</span>
                                        <span class="badge badge-age">👶 {{ $book->age_range_min }}-{{ $book->age_range_max }} th</span>
                                    </div>

                                    <h3 class="book-title">{{ $book->title }}</h3>
                                    <p class="book-author">✍️ {{ $book->author }}</p>

                                    <button class="read-btn">
                                        🔊 Baca Sekarang!
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <div class="emoji">📚</div>
                        <h3>Belum Ada Buku Cerita</h3>
                        <p>Segera hadir cerita-cerita menarik untuk anak-anak!</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Favorites Section --}}
        <div id="section-favorites" class="content-section">
            <div class="section-card">
                <h2 class="section-title">⭐⭐ Buku Terpopuler ⭐⭐</h2>
                <p style="text-align: center; color: #888; font-size: 1.1em; margin-bottom: 25px;">
                    Buku favorit yang paling sering dibaca anak-anak!
                </p>

                <div class="book-grid">
                    @foreach($books->take(4) as $book)
                        <div class="book-card" onclick="goToBook('{{ $book->slug }}')">
                            @if($book->cover_image)
                                <img src="{{ asset('storage/covers/' . $book->cover_image) }}"
                                     alt="{{ $book->title }}"
                                     class="book-cover">
                            @else
                                <div class="cover-placeholder" style="background: linear-gradient(135deg, #fd79a8, #e84393);">
                                    <span style="font-size: 5em; z-index: 1;">{{ $book->category->icon ?? '📚' }}</span>
                                </div>
                            @endif

                            <div class="book-content">
                                <div>
                                    <span class="badge badge-category">{{ $book->category->icon ?? '' }} {{ $book->category->name ?? 'Umum' }}</span>
                                </div>
                                <h3 class="book-title">{{ $book->title }}</h3>
                                <p class="book-author">✍️ {{ $book->author }}</p>
                                <div style="color: #fdcb6e; font-size: 1.2em;">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- New Books Section --}}
        <div id="section-new" class="content-section">
            <div class="section-card">
                <h2 class="section-title">🆕🆕 Buku Baru Seru! 🆕🆕</h2>
                <p style="text-align: center; color: #888; font-size: 1.1em; margin-bottom: 25px;">
                    Buku cerita terbaru untuk anak-anak!
                </p>

                <div class="book-grid">
                    @foreach($books->sortByDesc('created_at')->take(4) as $book)
                        <div class="book-card" onclick="goToBook('{{ $book->slug }}')">
                            @if($book->cover_image)
                                <img src="{{ asset('storage/covers/' . $book->cover_image) }}"
                                     alt="{{ $book->title }}"
                                     class="book-cover">
                            @else
                                <div class="cover-placeholder" style="background: linear-gradient(135deg, #00b894, #00a085);">
                                    <span style="font-size: 5em; z-index: 1;">{{ $book->category->icon ?? '📚' }}</span>
                                    <span style="position: absolute; top: 10px; right: 10px; background: #00b894; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.8em; font-weight: bold;">BARU!</span>
                                </div>
                            @endif

                            <div class="book-content">
                                <div>
                                    <span class="badge badge-category">{{ $book->category->icon ?? '' }} {{ $book->category->name ?? 'Umum' }}</span>
                                </div>
                                <h3 class="book-title">{{ $book->title }}</h3>
                                <p class="book-author">✍️ {{ $book->author }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Stats Section --}}
        <div class="section-card" style="margin-top: 30px;">
            <h2 class="section-title">🎉🎉 Perpustakaan Kami 🎉🎉</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $books->count() }}+</div>
                    <div class="stat-label">Buku Cerita</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1.2K</div>
                    <div class="stat-label">Anak Membaca</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Halaman Dibaca</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">⭐⭐⭐⭐⭐</div>
                    <div class="stat-label">Rating Terbaik</div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>🚀 Dibuat dengan cinta untuk anak-anak Indonesia 🇮🇩</p>
        <p>© 2026 Perpustakaan Ebook Anak TK</p>
    </footer>

    <script>
        // Section navigation
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));

            // Show selected section
            document.getElementById('section-' + section).classList.add('active');

            // Update nav buttons
            document.querySelectorAll('.nav-button').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // Category filter (placeholder - can be enhanced with AJAX)
        function filterCategory(slug) {
            document.querySelectorAll('.category-pill').forEach(pill => pill.classList.remove('active'));
            event.target.classList.add('active');
        }

        // Go to book detail
        function goToBook(slug) {
            window.location.href = '/ebooks/' + slug;
        }
    </script>
</body>
</html>
