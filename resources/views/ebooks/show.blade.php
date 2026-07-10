<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} - Ebook Anak</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Neue', cursive;
        }

        h1, h2, h3 {
            font-family: 'Fredoka One', cursive;
        }

        body {
            background: linear-gradient(135deg, #ffeaa7 0%, #a8e6cf 50%, #dcedc1 100%);
            min-height: 100vh;
            animation: bgMove 30s infinite alternate;
        }

        @keyframes bgMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        .main-content {
            margin-left: 280px;
            padding: 30px;
            transition: margin-left 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            min-height: 100vh;
        }

        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: white;
            color: #6c5ce7;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .back-link:hover {
            transform: translateX(-5px);
        }

        .main-card {
            background: white;
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
            margin-bottom: 25px;
        }

        .book-display {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            flex-wrap: wrap;
            justify-content: center;
        }

        .flip-book {
            perspective: 1200px;
            width: 280px;
            height: 400px;
            flex-shrink: 0;
        }

        .flip-book-inner {
            width: 100%;
            height: 100%;
            position: relative;
            transition: transform 1s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .flip-book:hover .flip-book-inner,
        .flip-book.flipped .flip-book-inner {
            transform: rotateY(180deg);
        }

        .flip-book-front,
        .flip-book-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        .flip-book-front {
            background: white;
            border: 6px solid #fff;
        }

        .flip-book-front img,
        .flip-book-front .cover-placeholder {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .flip-book-back {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            color: white;
            border: 6px solid #fff;
        }

        .back-icon {
            font-size: 5em;
            margin-bottom: 15px;
            animation: wiggle 2s infinite;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(-10deg); }
            50% { transform: rotate(10deg); }
        }

        .back-title {
            font-size: 1.3em;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
            font-family: 'Fredoka One', cursive;
        }

        .back-desc {
            font-size: 0.95em;
            text-align: center;
            line-height: 1.5;
            opacity: 0.95;
        }

        .flip-hint {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(108, 92, 231, 0.9);
            color: white;
            padding: 8px 18px;
            border-radius: 25px;
            font-size: 0.85em;
            font-weight: bold;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translateX(-50%) scale(1); }
            50% { transform: translateX(-50%) scale(1.05); }
        }

        .book-info {
            flex: 1;
            min-width: 280px;
            text-align: center;
        }

        .badges {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .badge {
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.95em;
            font-weight: bold;
        }

        .badge-category {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
        }

        .badge-age {
            background: #ffeaa7;
            color: #d63031;
        }

        .book-title {
            font-size: 2.2em;
            color: #333;
            margin: 10px 0;
            line-height: 1.2;
        }

        .book-author {
            font-size: 1.2em;
            color: #888;
            margin-bottom: 20px;
        }

        .book-desc {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 25px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .stats-row {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .stat-box {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
            padding: 15px 25px;
            border-radius: 20px;
            text-align: center;
            min-width: 100px;
        }

        .stat-box:nth-child(2) {
            background: linear-gradient(135deg, #00b894, #00a085);
        }

        .stat-box:nth-child(3) {
            background: linear-gradient(135deg, #0984e3, #0652dd);
        }

        .stat-box:nth-child(4) {
            background: linear-gradient(135deg, #fdcb6e, #f39c12);
        }

        .stat-number {
            font-size: 1.6em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        .stat-label {
            font-size: 0.9em;
            opacity: 0.9;
        }

        .read-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            color: white;
            border: none;
            padding: 18px 45px;
            font-size: 1.3em;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            box-shadow: 0 10px 30px rgba(255,107,107,0.4);
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .read-btn:hover {
            transform: scale(1.08);
            box-shadow: 0 15px 40px rgba(255,107,107,0.5);
        }

        .chapters-card {
            background: white;
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        .chapters-title {
            text-align: center;
            color: #ff6b6b;
            font-size: 1.8em;
            margin-bottom: 25px;
        }

        .chapter-list {
            display: grid;
            gap: 15px;
        }

        .chapter-item {
            background: linear-gradient(135deg, #a29bfe, #6c5ce7);
            color: white;
            padding: 18px 25px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            gap: 18px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .chapter-item:hover {
            transform: translateX(10px) scale(1.02);
            box-shadow: 0 10px 30px rgba(108, 92, 231, 0.4);
        }

        .chapter-number {
            width: 45px;
            height: 45px;
            background: white;
            color: #6c5ce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        .chapter-info {
            flex: 1;
        }

        .chapter-title {
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .chapter-page {
            font-size: 0.9em;
            opacity: 0.85;
        }

        .chapter-play {
            font-size: 1.8em;
        }

        .empty-chapters {
            text-align: center;
            padding: 50px 20px;
        }

        .empty-chapters .emoji {
            font-size: 4em;
            margin-bottom: 15px;
        }

        .empty-chapters h3 {
            color: #888;
            font-size: 1.3em;
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        @media (max-width: 900px) {
            .main-content {
                margin-left: 0 !important;
                padding-top: 80px;
            }

            .flip-book {
                width: 250px;
                height: 350px;
            }

            .book-title {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    @include('components.sidebar')

    <main class="main-content">
        <a href="{{ route('ebooks.index') }}" class="back-link">
            ← Kembali ke Perpustakaan
        </a>

        <div class="main-card">
            <div class="book-display">
                <div class="flip-book" onclick="toggleBookFlip(this)">
                    <div class="flip-book-inner">
                        <div class="flip-book-front">
                            @if($book->cover_image)
                                <img src="{{ asset('storage/covers/' . $book->cover_image) }}" alt="{{ $book->title }}">
                            @else
                                <div class="cover-placeholder" style="background: linear-gradient(135deg, {{ $book->category->gradient_start ?? '#a29bfe' }}, {{ $book->category->gradient_end ?? '#6c5ce7' }}); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
                                    <span style="font-size: 7em;">{{ $book->category->icon ?? '📚' }}</span>
                                </div>
                            @endif
                            <span class="flip-hint">👆 Hover untuk info!</span>
                        </div>

                        <div class="flip-book-back">
                            <span class="back-icon">{{ $book->category->icon ?? '📚' }}</span>
                            <h2 class="back-title">{{ $book->title }}</h2>
                            <p class="back-desc">{{ $book->description ?? 'Cerita seru untuk anak-anak!' }}</p>
                            <div style="margin-top:15px;">
                                <span style="background:white; color:#6c5ce7; padding:6px 14px; border-radius:20px; font-weight:bold; font-size:0.9em;">
                                    {{ $book->category->name ?? 'Umum' }}
                                </span>
                                <span style="background:#ffeaa7; color:#d63031; padding:6px 14px; border-radius:20px; font-weight:bold; font-size:0.9em; margin-left:8px;">
                                    👶 {{ $book->age_range }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="book-info">
                    <div class="badges">
                        <span class="badge badge-category">{{ $book->category->icon ?? '📚' }} {{ $book->category->name ?? 'Umum' }}</span>
                        <span class="badge badge-age">👶 {{ $book->age_range }}</span>
                    </div>

                    <h1 class="book-title">{{ $book->title }}</h1>
                    <p class="book-author">✍️ {{ $book->author }}</p>

                    @if($book->description)
                        <p class="book-desc">{{ $book->description }}</p>
                    @endif

                    <div class="stats-row">
                        <div class="stat-box">
                            <div class="stat-number">{{ $book->chapters->count() }}</div>
                            <div class="stat-label">Halaman</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number">⭐⭐⭐⭐⭐</div>
                            <div class="stat-label">Rating</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-number">1.2K</div>
                            <div class="stat-label">x Dibaca</div>
                        </div>
                    </div>

                    <a href="{{ route('ebooks.read', $book->slug) }}" class="read-btn">
                        🔊 MULAI MEMBACA
                    </a>
                </div>
            </div>
        </div>

        <div class="chapters-card">
            <h2 class="chapters-title">📖📖 Daftar Halaman 📖📖</h2>

            @if($book->chapters->count() > 0)
                <div class="chapter-list">
                    @foreach($book->chapters->sortBy('order') as $chapter)
                        <div class="chapter-item" onclick="readChapter({{ $chapter->order }})">
                            <div class="chapter-number">{{ $chapter->order }}</div>
                            <div class="chapter-info">
                                <div class="chapter-title">{{ $chapter->title }}</div>
                                <div class="chapter-page">Halaman {{ $chapter->page_number }}</div>
                            </div>
                            <div class="chapter-play">▶️</div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-chapters">
                    <div class="emoji">📝</div>
                    <h3>Belum Ada Halaman</h3>
                    <p>Cerita sedang dalam proses pembuatan. Stay tuned!</p>
                </div>
            @endif
        </div>

        <footer>
            <p>🚀 Dibuat dengan cinta untuk anak-anak Indonesia 🇮🇩</p>
        </footer>
    </main>

    <script>
        function toggleBookFlip(book) {
            book.classList.toggle('flipped');
        }

        function readChapter(order) {
            alert('📖 Membuka halaman ' + order + '...');
        }
    </script>
</body>
</html>
