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
            font-family: 'Comic Neue', cursive;
        }

        h1, h2, h3 {
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
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: translateX(-5px);
        }

        /* Container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Main card */
        .main-card {
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            border: 8px solid #fff;
        }

        /* Book display */
        .book-display {
            display: flex;
            gap: 40px;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        /* Cover */
        .cover-wrapper {
            flex: 0 0 280px;
        }

        .book-cover {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            border: 8px solid white;
        }

        .cover-placeholder {
            width: 100%;
            height: 380px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            border: 8px solid white;
            font-size: 8em;
            position: relative;
            overflow: hidden;
        }

        .cover-placeholder::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.4);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.3); }
        }

        /* Book info */
        .book-info {
            flex: 1;
            min-width: 280px;
        }

        .badges {
            display: flex;
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
            font-size: 2.5em;
            color: #333;
            margin: 10px 0;
            line-height: 1.2;
        }

        .book-author {
            font-size: 1.3em;
            color: #888;
            margin-bottom: 20px;
        }

        .book-desc {
            font-size: 1.15em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        /* Stats */
        .stats-row {
            display: flex;
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
            font-size: 1.8em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        .stat-label {
            font-size: 0.9em;
            opacity: 0.9;
        }

        /* Read button */
        .read-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            color: white;
            border: none;
            padding: 20px 50px;
            font-size: 1.5em;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            box-shadow: 0 10px 30px rgba(255,107,107,0.4);
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .read-btn:hover {
            transform: scale(1.08);
            box-shadow: 0 15px 40px rgba(255,107,107,0.5);
        }

        /* Chapters section */
        .chapters-card {
            background: white;
            border-radius: 30px;
            padding: 35px;
            margin-top: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border: 8px solid #fff;
        }

        .chapters-title {
            text-align: center;
            color: #ff6b6b;
            font-size: 2em;
            margin-bottom: 25px;
        }

        .chapter-list {
            display: grid;
            gap: 15px;
        }

        .chapter-item {
            background: linear-gradient(135deg, #a29bfe, #6c5ce7);
            color: white;
            padding: 20px 25px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .chapter-item:hover {
            transform: translateX(10px) scale(1.02);
            box-shadow: 0 10px 30px rgba(108, 92, 231, 0.4);
        }

        .chapter-number {
            width: 50px;
            height: 50px;
            background: white;
            color: #6c5ce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        .chapter-info {
            flex: 1;
        }

        .chapter-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .chapter-page {
            font-size: 0.95em;
            opacity: 0.85;
        }

        .chapter-play {
            font-size: 2em;
        }

        /* Empty chapters */
        .empty-chapters {
            text-align: center;
            padding: 50px 20px;
        }

        .empty-chapters .emoji {
            font-size: 5em;
            margin-bottom: 15px;
        }

        .empty-chapters h3 {
            color: #888;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .empty-chapters p {
            color: #aaa;
            font-size: 1.1em;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 30px;
            color: #555;
            font-size: 1.1em;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .book-display {
                flex-direction: column;
                align-items: center;
            }

            .cover-wrapper {
                flex: none;
                width: 100%;
                max-width: 300px;
            }

            .book-info {
                text-align: center;
            }

            .badges, .stats-row {
                justify-content: center;
            }

            .book-title {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <a href="{{ route('ebooks.index') }}" class="back-btn">
                ← Kembali ke Perpustakaan
            </a>
        </div>
    </header>

    <div class="container">
        {{-- Main book card --}}
        <div class="main-card">
            <div class="book-display">
                {{-- Cover --}}
                <div class="cover-wrapper">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/covers/' . $book->cover_image) }}"
                             alt="{{ $book->title }}"
                             class="book-cover">
                    @else
                        <div class="cover-placeholder" style="background: linear-gradient(135deg, {{ $book->category->gradient_start ?? '#a29bfe' }}, {{ $book->category->gradient_end ?? '#6c5ce7' }});">
                            {{ $book->category->icon ?? '📚' }}
                        </div>
                    @endif
                </div>

                {{-- Book info --}}
                <div class="book-info">
                    <div class="badges">
                        <span class="badge badge-category">
                            {{ $book->category->icon ?? '📚' }} {{ $book->category->name ?? 'Umum' }}
                        </span>
                        <span class="badge badge-age">
                            👶 {{ $book->age_range }}
                        </span>
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

                    <button class="read-btn" onclick="startReading()">
                        🔊 MULAI MEMBACA
                    </button>
                </div>
            </div>
        </div>

        {{-- Chapters section --}}
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
    </div>

    <footer>
        <p>🚀 Dibuat dengan cinta untuk anak-anak Indonesia 🇮🇩</p>
    </footer>

    <script>
        function startReading() {
            alert('🎉 Siap untuk membaca! Halaman pertama akan dibuka soon!');
        }

        function readChapter(order) {
            alert('📖 Membuka halaman ' + order + '...');
        }
    </script>
</body>
</html>
