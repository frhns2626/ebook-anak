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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Neue', cursive;
        }

        h1, h2, h3, .title {
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

        /* Floating emojis in background */
        .bg-emoji {
            position: fixed;
            font-size: 2.5em;
            opacity: 0.2;
            z-index: 0;
            pointer-events: none;
            animation: floatEmoji 8s ease-in-out infinite;
        }

        @keyframes floatEmoji {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        .bg-e1 { top: 10%; left: 3%; animation-delay: 0s; }
        .bg-e2 { top: 20%; right: 5%; animation-delay: 1s; }
        .bg-e3 { bottom: 15%; left: 8%; animation-delay: 2s; }
        .bg-e4 { bottom: 25%; right: 3%; animation-delay: 0.5s; }
        .bg-e5 { top: 50%; left: 2%; animation-delay: 1.5s; }
        .bg-e6 { top: 40%; right: 8%; animation-delay: 2.5s; }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 30px;
            transition: margin-left 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            min-height: 100vh;
            position: relative;
            z-index: 1;
        }

        body.sidebar-collapsed .main-content {
            margin-left: 80px;
        }

        /* Header */
        .header {
            background: white;
            border-radius: 25px;
            padding: 25px 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-emoji {
            font-size: 3em;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .header-title {
            font-size: 2em;
            color: #333;
        }

        .header-subtitle {
            color: #888;
            font-size: 1.1em;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            gap: 10px;
            background: #f8f9fa;
            padding: 8px;
            border-radius: 50px;
            flex: 1;
            max-width: 400px;
        }

        .search-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 10px 20px;
            font-size: 1em;
            outline: none;
        }

        .search-btn {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .search-btn:hover {
            transform: scale(1.05);
        }

        /* Quick Stats */
        .quick-stats {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .quick-stat {
            background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
            padding: 12px 20px;
            border-radius: 15px;
            text-align: center;
            min-width: 100px;
        }

        .quick-stat:nth-child(2) {
            background: linear-gradient(135deg, #a8e6cf, #00b894);
        }

        .quick-stat:nth-child(3) {
            background: linear-gradient(135deg, #fd79a8, #e84393);
        }

        .quick-stat-number {
            font-size: 1.5em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        .quick-stat-label {
            font-size: 0.8em;
            color: #555;
        }

        /* Section Card */
        .section-card {
            background: white;
            border-radius: 25px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .section-title {
            color: #ff6b6b;
            font-size: 1.8em;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title .emoji {
            font-size: 1.2em;
        }

        /* Book Grid */
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
        }

        /* FLIP CARD */
        .flip-card {
            background-color: transparent;
            perspective: 1000px;
            height: 350px;
            cursor: pointer;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-card-inner,
        .flip-card.flipped .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 20px;
            overflow: hidden;
        }

        .flip-card-front {
            background: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
            border: 4px solid #fff;
            display: flex;
            flex-direction: column;
        }

        .cover-image {
            height: 160px;
            overflow: hidden;
            position: relative;
        }

        .cover-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cover-placeholder {
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Animated emoji in cover */
        .cover-emoji-animated {
            font-size: 5em;
            animation: wiggleEmoji 3s ease-in-out infinite;
            position: relative;
            z-index: 2;
        }

        @keyframes wiggleEmoji {
            0%, 100% { transform: rotate(-10deg) scale(1); }
            25% { transform: rotate(10deg) scale(1.1); }
            50% { transform: rotate(-5deg) scale(1); }
            75% { transform: rotate(15deg) scale(1.1); }
        }

        .cover-placeholder::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            width: 25px;
            height: 25px;
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
            animation: pulse 1.5s infinite 0.5s;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.5); opacity: 0.8; }
        }

        /* Category emoji badge */
        .category-emoji-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 2em;
            z-index: 3;
            animation: bounce 2s ease-in-out infinite;
            filter: drop-shadow(0 3px 5px rgba(0,0,0,0.2));
        }

        /* New badge */
        .new-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(135deg, #00b894, #00a085);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75em;
            font-weight: bold;
            z-index: 3;
            animation: bounce 1.5s ease-in-out infinite;
        }

        /* Book info */
        .book-info {
            padding: 15px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .book-title {
            font-size: 1.05em;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.3;
        }

        .book-author {
            font-size: 0.9em;
            color: #888;
            margin-bottom: 8px;
        }

        .book-badges {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .book-badge {
            font-size: 0.75em;
            padding: 3px 8px;
            border-radius: 10px;
            font-weight: bold;
        }

        .badge-age {
            background: #ffeaa7;
            color: #d63031;
        }

        .badge-category {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
        }

        .flip-hint {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(108, 92, 231, 0.9);
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.7em;
            font-weight: bold;
        }

        /* BACK SIDE */
        .flip-card-back {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 25px;
            color: white;
            border: 4px solid #fff;
        }

        .back-icon {
            font-size: 4em;
            margin-bottom: 15px;
            animation: wiggleEmoji 2s ease-in-out infinite;
        }

        .back-title {
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: 'Fredoka One', cursive;
            text-align: center;
        }

        .back-badges {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .back-badge {
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75em;
            font-weight: bold;
        }

        .back-badge-category {
            background: white;
            color: #6c5ce7;
        }

        .back-badge-age {
            background: #ffeaa7;
            color: #d63031;
        }

        .back-desc {
            font-size: 0.85em;
            line-height: 1.4;
            margin-bottom: 15px;
            opacity: 0.95;
            text-align: center;
        }

        .back-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 0.95em;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
            text-decoration: none;
        }

        .back-btn:hover {
            transform: scale(1.1);
        }

        /* Games Promo */
        .games-promo {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
            text-align: center;
            border-radius: 25px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .games-promo-icon {
            font-size: 4em;
            animation: bounce 1.5s ease-in-out infinite;
        }

        .games-promo-content h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .games-promo-content p {
            opacity: 0.95;
            margin-bottom: 15px;
        }

        .games-promo-btn {
            background: white;
            color: #e84393;
            padding: 15px 35px;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            font-family: 'Fredoka One', cursive;
        }

        .games-promo-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        /* Mobile Responsive */
        @media (max-width: 900px) {
            .main-content {
                margin-left: 0 !important;
                padding-top: 80px;
            }

            .header {
                flex-direction: column;
                text-align: center;
            }

            .search-bar {
                max-width: 100%;
                width: 100%;
            }

            .quick-stats {
                justify-content: center;
            }

            .bg-emoji {
                display: none;
            }
        }
    </style>
</head>
<body>
    {{-- Background floating emojis --}}
    <div class="bg-emoji bg-e1">🦋</div>
    <div class="bg-emoji bg-e2">🌸</div>
    <div class="bg-emoji bg-e3">🌈</div>
    <div class="bg-emoji bg-e4">⭐</div>
    <div class="bg-emoji bg-e5">🎀</div>
    <div class="bg-emoji bg-e6">✨</div>

    {{-- Include Sidebar --}}
    @include('components.sidebar')

    {{-- Main Content --}}
    <main class="main-content">
        {{-- Header --}}
        <div class="header">
            <div class="header-left">
                <span class="header-emoji">📚</span>
                <div>
                    <h1 class="header-title"> Perpustakaan Ebook</h1>
                    <p class="header-subtitle">Pilih cerita seru untuk anak TK! 🎉✨</p>
                </div>
            </div>

            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Cari buku cerita...">
                <button class="search-btn">🔍</button>
            </div>

            <div class="quick-stats">
                <div class="quick-stat">
                    <div class="quick-stat-number">{{ $books->count() }}</div>
                    <div class="quick-stat-label">📚 Buku</div>
                </div>
                <div class="quick-stat">
                    <div class="quick-stat-number">🎮</div>
                    <div class="quick-stat-label">Games</div>
                </div>
                <div class="quick-stat">
                    <div class="quick-stat-number">❤️</div>
                    <div class="quick-stat-label">Favorit</div>
                </div>
            </div>
        </div>

        {{-- Games Promo --}}
        <div class="games-promo">
            <span class="games-promo-icon">🎮</span>
            <div class="games-promo-content">
                <h2>Mau Main Games Edukasi? 🎯</h2>
                <p>Ayo belajar sambil bermain games seru! 🧠✨</p>
                <a href="{{ route('games.index') }}" class="games-promo-btn">
                    🎮 MAIN GAMES SEKARANG!
                </a>
            </div>
        </div>

        {{-- Books Section --}}
        <div class="section-card">
            <h2 class="section-title">
                <span class="emoji">📚📚</span>
                Koleksi Buku Cerita
                <span class="emoji">📚📚</span>
            </h2>

            @if($books->count() > 0)
                <div class="book-grid">
                    @foreach($books as $index => $book)
                        <div class="flip-card" onclick="toggleFlip(this)">
                            <div class="flip-card-inner">
                                {{-- FRONT --}}
                                <div class="flip-card-front">
                                    @if($book->cover_image)
                                        <div class="cover-image">
                                            <img src="{{ asset('storage/covers/' . $book->cover_image) }}" alt="{{ $book->title }}">
                                        </div>
                                    @else
                                        <div class="cover-placeholder" style="background: linear-gradient(135deg, {{ $book->category->gradient_start ?? '#a29bfe' }}, {{ $book->category->gradient_end ?? '#6c5ce7' }});">
                                            <span class="category-emoji-badge">{{ $book->category->icon ?? '📚' }}</span>
                                            <span class="cover-emoji-animated">{{ $book->category->icon ?? '📚' }}</span>
                                            @if($index < 3)
                                                <span class="new-badge">✨ BARU!</span>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="book-info">
                                        <h3 class="book-title">{{ $book->title }}</h3>
                                        <p class="book-author">✍️ {{ $book->author }}</p>
                                        <div class="book-badges">
                                            <span class="book-badge badge-age">👶 {{ $book->age_range_min }}-{{ $book->age_range_max }} th</span>
                                            <span class="book-badge badge-category">{{ $book->category->name ?? 'Umum' }}</span>
                                        </div>
                                    </div>

                                    <span class="flip-hint">👆 Ketuk! ✨</span>
                                </div>

                                {{-- BACK --}}
                                <div class="flip-card-back">
                                    <span class="back-icon">{{ $book->category->icon ?? '📚' }}</span>
                                    <h3 class="back-title">{{ $book->title }}</h3>

                                    <div class="back-badges">
                                        <span class="back-badge back-badge-category">{{ $book->category->name ?? 'Umum' }}</span>
                                        <span class="back-badge back-badge-age">👶 {{ $book->age_range }}</span>
                                    </div>

                                    <p class="back-desc">{{ Str::limit($book->description, 70) ?? 'Cerita seru untuk anak-anak! 🚀' }}</p>

                                    <a href="{{ route('ebooks.show', $book->slug) }}" class="back-btn" onclick="event.stopPropagation();">
                                        🔊 BACA SEKARANG! 🎉
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align:center; padding:60px 20px;">
                    <div style="font-size:5em; margin-bottom:15px;">📚😢</div>
                    <h3 style="color:#888;">Belum Ada Buku</h3>
                    <p style="color:#aaa;">Coming soon ya! 🌟</p>
                </div>
            @endif
        </div>

        {{-- More sections with emojis --}}
        <div class="section-card">
            <h2 class="section-title">
                <span class="emoji">🏆⭐</span>
                Buku Terpopuler
                <span class="emoji">⭐🏆</span>
            </h2>
            <p style="text-align:center; color:#888; font-size:1.1em;">
                Buku favorit anak-anak TK! 👍❤️
            </p>

            @if($books->count() > 0)
                <div class="book-grid" style="margin-top:20px;">
                    @foreach($books->take(4) as $book)
                        <div class="flip-card" onclick="toggleFlip(this)">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="cover-placeholder" style="background: linear-gradient(135deg, #fd79a8, #e84393);">
                                        <span class="category-emoji-badge">⭐</span>
                                        <span class="cover-emoji-animated">{{ $book->category->icon ?? '📚' }}</span>
                                    </div>

                                    <div class="book-info">
                                        <h3 class="book-title">{{ $book->title }}</h3>
                                        <p class="book-author">✍️ {{ $book->author }}</p>
                                        <div style="color: #fdcb6e; font-size: 1.1em;">⭐⭐⭐⭐⭐</div>
                                    </div>

                                    <span class="flip-hint">👆 Ketuk! ✨</span>
                                </div>

                                <div class="flip-card-back">
                                    <span class="back-icon">🏆</span>
                                    <h3 class="back-title">{{ $book->title }}</h3>
                                    <p class="back-desc">Buku paling disukai! 👍❤️</p>
                                    <a href="{{ route('ebooks.show', $book->slug) }}" class="back-btn" onclick="event.stopPropagation();">
                                        🔊 BACA! 🎉
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Kategori Section --}}
        <div class="section-card">
            <h2 class="section-title">
                <span class="emoji">🏷️🎯</span>
                Jelajahi Kategori
                <span class="emoji">🎯🏷️</span>
            </h2>

            <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
                <a href="{{ route('ebooks.index') }}?category=hewan" style="text-decoration:none;">
                    <div style="background: linear-gradient(135deg, #f472b6, #ec4899); color: white; padding: 20px 30px; border-radius: 20px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: all 0.3s; cursor: pointer;" onmouseover="this.transform='translateY(-5px) scale(1.05)'" onmouseout="this.transform='none'">
                        <div style="font-size: 3em; margin-bottom: 8px;">🐰</div>
                        <div style="font-weight: bold; font-size: 1.1em;">Hewan</div>
                    </div>
                </a>

                <a href="{{ route('ebooks.index') }}?category=petualangan" style="text-decoration:none;">
                    <div style="background: linear-gradient(135deg, #4ade80, #22c55e); color: white; padding: 20px 30px; border-radius: 20px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: all 0.3s; cursor: pointer;">
                        <div style="font-size: 3em; margin-bottom: 8px;">🚀</div>
                        <div style="font-weight: bold; font-size: 1.1em;">Petualangan</div>
                    </div>
                </a>

                <a href="{{ route('ebooks.index') }}?category=pengalaman" style="text-decoration:none;">
                    <div style="background: linear-gradient(135deg, #60a5fa, #3b82f6); color: white; padding: 20px 30px; border-radius: 20px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: all 0.3s; cursor: pointer;">
                        <div style="font-size: 3em; margin-bottom: 8px;">🌈</div>
                        <div style="font-weight: bold; font-size: 1.1em;">Pengalaman</div>
                    </div>
                </a>

                <a href="{{ route('ebooks.index') }}?category=keluarga" style="text-decoration:none;">
                    <div style="background: linear-gradient(135deg, #a78bfa, #8b5cf6); color: white; padding: 20px 30px; border-radius: 20px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: all 0.3s; cursor: pointer;">
                        <div style="font-size: 3em; margin-bottom: 8px;">👨‍👩‍👧</div>
                        <div style="font-weight: bold; font-size: 1.1em;">Keluarga</div>
                    </div>
                </a>

                <a href="{{ route('ebooks.index') }}?category=lagu" style="text-decoration:none;">
                    <div style="background: linear-gradient(135deg, #fbbf24, #f59e0b); color: white; padding: 20px 30px; border-radius: 20px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: all 0.3s; cursor: pointer;">
                        <div style="font-size: 3em; margin-bottom: 8px;">🎵</div>
                        <div style="font-weight: bold; font-size: 1.1em;">Lagu</div>
                    </div>
                </a>

                <a href="{{ route('ebooks.index') }}?category=dongeng" style="text-decoration:none;">
                    <div style="background: linear-gradient(135deg, #fb7185, #e11d48); color: white; padding: 20px 30px; border-radius: 20px; text-align: center; box-shadow: 0 8px 20px rgba(0,0,0,0.15); transition: all 0.3s; cursor: pointer;">
                        <div style="font-size: 3em; margin-bottom: 8px;">🎭</div>
                        <div style="font-weight: bold; font-size: 1.1em;">Dongeng</div>
                    </div>
                </a>
            </div>
        </div>

        <footer>
            <p>Dibuat dengan ❤️ untuk anak-anak Indonesia 🇮🇩</p>
            <p>© 2026 Perpustakaan Ebook Anak TK ✨</p>
        </footer>
    </main>

    <script>
        function toggleFlip(card) {
            card.classList.toggle('flipped');
        }
    </script>
</body>
</html>
