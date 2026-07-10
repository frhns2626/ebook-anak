<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📚 Ebook Anak TK - Belajar & Bermain!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(180deg, #ffeaa7 0%, #a8e6cf 50%, #d0f0c0 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ========== FLOATING ANIMATIONS ========== */
        .floating {
            position: absolute;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        .floating-slow { animation-duration: 6s; }
        .floating-fast { animation-duration: 3s; }
        .floating-delay { animation-delay: 1s; }

        @keyframes float-side {
            0%, 100% { transform: translateX(0px); }
            50% { transform: translateX(20px); }
        }

        .floating-left { animation: float-side 5s ease-in-out infinite; }
        .floating-right { animation: float-side 5s ease-in-out infinite reverse; }

        @keyframes bounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-15px) scale(1.05); }
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(-10deg); }
            50% { transform: rotate(10deg); }
        }

        @keyframes sparkle {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slideUp {
            animation: slideUp 1s ease forwards;
        }

        /* ========== HERO SECTION ========== */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 80px 20px 40px;
            overflow: hidden;
        }

        /* Background decorations */
        .bg-decoration {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
            z-index: 0;
        }

        .bg-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #ff6b6b, transparent);
            top: -100px;
            left: -150px;
            animation: float 8s ease-in-out infinite;
        }

        .bg-2 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #a29bfe, transparent);
            top: 50%;
            right: -100px;
            animation: float 10s ease-in-out infinite reverse;
        }

        .bg-3 {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, #ffd93d, transparent);
            bottom: 10%;
            left: 10%;
            animation: float 7s ease-in-out infinite;
        }

        /* Floating elements */
        .floater {
            position: absolute;
            font-size: 3em;
            z-index: 1;
        }

        .floater-1 { top: 15%; left: 10%; animation: float 4s ease-in-out infinite; }
        .floater-2 { top: 20%; right: 15%; animation: float 5s ease-in-out infinite 0.5s; }
        .floater-3 { bottom: 25%; left: 8%; animation: float 4.5s ease-in-out infinite 1s; }
        .floater-4 { bottom: 20%; right: 10%; animation: float 5.5s ease-in-out infinite 0.3s; }
        .floater-5 { top: 35%; left: 5%; animation: float 6s ease-in-out infinite 1.5s; }
        .floater-6 { top: 40%; right: 8%; animation: float 4s ease-in-out infinite 2s; }

        /* ========== 3D OPEN BOOK ========== */
        .book-container {
            position: relative;
            width: 450px;
            height: 350px;
            margin: 0 auto 40px;
            z-index: 10;
            perspective: 1500px;
        }

        .book-3d {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transform: rotateX(10deg) rotateY(-5deg);
            animation: bookFloat 5s ease-in-out infinite;
        }

        @keyframes bookFloat {
            0%, 100% { transform: rotateX(10deg) rotateY(-5deg) translateY(0); }
            50% { transform: rotateX(10deg) rotateY(-5deg) translateY(-15px); }
        }

        /* Book base */
        .book-base {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            border-radius: 10px 30px 30px 10px;
            box-shadow:
                0 30px 60px rgba(0,0,0,0.3),
                inset 0 0 30px rgba(255,255,255,0.1);
        }

        /* Book spine */
        .book-spine {
            position: absolute;
            left: 0;
            top: 0;
            width: 50px;
            height: 100%;
            background: linear-gradient(90deg,
                #5a4fcf 0%,
                #6c5ce7 30%,
                #7c6cdf 50%,
                #6c5ce7 70%,
                #5a4fcf 100%
            );
            border-radius: 10px 0 0 10px;
            transform: rotateY(-90deg) translateX(-25px);
            transform-origin: right center;
            box-shadow: inset -5px 0 15px rgba(0,0,0,0.2);
        }

        /* Pages */
        .pages-stack {
            position: absolute;
            right: 10px;
            top: 15px;
            bottom: 15px;
            width: calc(100% - 60px);
            background: linear-gradient(90deg, #f5f5f0, #fffef8);
            border-radius: 5px 15px 15px 5px;
            box-shadow:
                0 0 10px rgba(0,0,0,0.1),
                inset 2px 0 5px rgba(0,0,0,0.05);
        }

        /* Left page */
        .page-left-3d {
            position: absolute;
            right: 50%;
            top: 15px;
            bottom: 15px;
            width: calc(50% - 15px);
            background: linear-gradient(90deg, #fffef8, #f8f6f0);
            border-radius: 5px 0 0 5px;
            transform-origin: right center;
            transform: rotateY(20deg);
            box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Right page */
        .page-right-3d {
            position: absolute;
            right: 10px;
            top: 15px;
            bottom: 15px;
            width: calc(50% - 15px);
            background: linear-gradient(270deg, #fffef8, #f8f6f0);
            border-radius: 0 15px 15px 0;
            transform-origin: left center;
            transform: rotateY(-20deg);
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .page-icon {
            font-size: 4em;
            margin-bottom: 15px;
        }

        .page-text {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
        }

        .page-title {
            font-size: 1.3em;
            font-weight: 800;
            color: #6c5ce7;
            margin-bottom: 10px;
        }

        /* Book glow effect */
        .book-glow {
            position: absolute;
            width: 120%;
            height: 120%;
            top: -10%;
            left: -10%;
            background: radial-gradient(ellipse at center, rgba(162, 155, 254, 0.4) 0%, transparent 70%);
            z-index: -1;
            animation: pulse-glow 3s ease-in-out infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        /* ========== CHARACTERS ========== */
        .character {
            position: absolute;
            font-size: 4em;
            z-index: 5;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2));
        }

        .char-1 {
            bottom: 15%;
            left: 5%;
            animation: wiggle 3s ease-in-out infinite;
        }

        .char-2 {
            bottom: 20%;
            right: 8%;
            animation: wiggle 3s ease-in-out infinite 0.5s;
        }

        .char-3 {
            top: 25%;
            left: 8%;
            animation: bounce 2s ease-in-out infinite;
        }

        .char-4 {
            top: 30%;
            right: 10%;
            animation: bounce 2s ease-in-out infinite 1s;
        }

        /* ========== TEXT CONTENT ========== */
        .hero-content {
            text-align: center;
            z-index: 10;
            max-width: 600px;
        }

        .hero-title {
            font-size: 3.5em;
            font-weight: 900;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.2;
            text-shadow: 3px 3px 0 rgba(255,255,255,0.5);
        }

        .hero-title span {
            color: #6c5ce7;
            display: block;
        }

        .hero-subtitle {
            font-size: 1.5em;
            color: #666;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* CTA Buttons */
        .cta-group {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 18px 40px;
            font-size: 1.2em;
            font-weight: 800;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(255,107,107,0.5);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(108,92,231,0.5);
        }

        /* ========== FEATURED SECTION ========== */
        .featured {
            padding: 80px 20px;
            background: white;
            position: relative;
        }

        .featured-title {
            text-align: center;
            font-size: 2.5em;
            font-weight: 900;
            color: #333;
            margin-bottom: 40px;
        }

        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .featured-card {
            background: linear-gradient(135deg, #f8f6f0, #fff);
            border-radius: 25px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 4px solid #fff;
        }

        .featured-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.15);
            border-color: #a29bfe;
        }

        .featured-icon {
            font-size: 4em;
            margin-bottom: 15px;
        }

        .featured-card h3 {
            font-size: 1.3em;
            font-weight: 800;
            color: #333;
            margin-bottom: 10px;
        }

        .featured-card p {
            color: #777;
            font-size: 1em;
        }

        /* ========== STATS ========== */
        .stats {
            padding: 60px 20px;
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            text-align: center;
        }

        .stats-grid {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
            max-width: 800px;
            margin: 0 auto;
        }

        .stat-item {
            color: white;
        }

        .stat-number {
            font-size: 3em;
            font-weight: 900;
            display: block;
        }

        .stat-label {
            font-size: 1.1em;
            opacity: 0.9;
        }

        /* ========== FOOTER ========== */
        footer {
            background: #2c1810;
            color: #ccc;
            text-align: center;
            padding: 30px;
            font-size: 1em;
        }

        footer span {
            color: #ff6b6b;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5em;
            }

            .hero-subtitle {
                font-size: 1.2em;
            }

            .book-container {
                width: 320px;
                height: 250px;
            }

            .page-icon {
                font-size: 2.5em;
            }

            .page-text {
                font-size: 0.85em;
            }

            .page-title {
                font-size: 1em;
            }

            .character {
                font-size: 2.5em;
            }

            .char-1 { left: 2%; bottom: 10%; }
            .char-2 { right: 2%; bottom: 12%; }
            .char-3 { display: none; }
            .char-4 { display: none; }

            .floater {
                font-size: 1.8em;
            }

            .cta-group {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }
        }

        /* Scroll indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: #888;
            animation: bounce 2s ease-in-out infinite;
        }

        .scroll-indicator span {
            display: block;
            font-size: 2em;
        }

        .scroll-indicator p {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    {{-- Floating decorations --}}
    <div class="floater floater-1">⭐</div>
    <div class="floater floater-2">✨</div>
    <div class="floater floater-3">🌟</div>
    <div class="floater floater-4">💫</div>
    <div class="floater floater-5">🎈</div>
    <div class="floater floater-6">🎀</div>

    {{-- Background decorations --}}
    <div class="bg-decoration bg-1"></div>
    <div class="bg-decoration bg-2"></div>
    <div class="bg-decoration bg-3"></div>

    {{-- Characters --}}
    <div class="character char-1">🐰</div>
    <div class="character char-2">🦊</div>
    <div class="character char-3">🐱</div>
    <div class="character char-4">🐻</div>

    {{-- Hero Section --}}
    <section class="hero">
        <div class="hero-content animate-slideUp">
            <h1 class="hero-title">
                Selamat Datang di
                <span>📚 Perpustakaan Ebook Anak! 🎉</span>
            </h1>
            <p class="hero-subtitle">
                ✨ Belajar Membaca & Bermain dengan Cerita Seru! ✨
            </p>

            {{-- 3D Open Book --}}
            <div class="book-container">
                <div class="book-glow"></div>
                <div class="book-3d">
                    {{-- Book base --}}
                    <div class="book-base">
                        <div class="book-spine"></div>
                        <div class="pages-stack"></div>

                        {{-- Left Page --}}
                        <div class="page-left-3d">
                            <div class="page-icon">📖</div>
                            <p class="page-text">
                                "Halaman pertama dari petualangan seru menunggumu..."
                            </p>
                        </div>

                        {{-- Right Page --}}
                        <div class="page-right-3d">
                            <h3 class="page-title">Ayo Membaca!</h3>
                            <p class="page-text">
                                Klik tombol di bawah untuk mulai membaca cerita lucu!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CTA Buttons --}}
            <div class="cta-group">
                <a href="{{ route('ebooks.index') }}" class="btn btn-primary">
                    📚 Mulai Membaca
                </a>
                <a href="{{ route('games.index') }}" class="btn btn-secondary">
                    🎮 Main Games
                </a>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="scroll-indicator">
            <span>👇</span>
            <p>Scroll ke bawah</p>
        </div>
    </section>

    {{-- Featured Section --}}
    <section class="featured">
        <h2 class="featured-title">🎯 Apa yang Kamu Dapatkan? 🎯</h2>

        <div class="featured-grid">
            <div class="featured-card">
                <div class="featured-icon">📚</div>
                <h3>Koleksi Buku</h3>
                <p>Banyak cerita seru dan lucu untuk anak-anak TK</p>
            </div>

            <div class="featured-card">
                <div class="featured-icon">🎮</div>
                <h3>Games Edukasi</h3>
                <p>Belajar huruf, angka, dan banyak lagi dengan bermain!</p>
            </div>

            <div class="featured-card">
                <div class="featured-icon">🎨</div>
                <h3>Ilustrasi Lucu</h3>
                <p>Gambar-gambar menarik yang membuat anak suka membaca</p>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="stats">
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">{{ $books->count() }}+</span>
                <span class="stat-label">Buku Cerita</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">🎮</span>
                <span class="stat-label">6 Games Seru</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">👶</span>
                <span class="stat-label">Buat Anak TK</span>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer>
        <p>Dibuat dengan <span>❤️</span> untuk anak-anak Indonesia 🇮🇩</p>
        <p style="margin-top: 10px; font-size: 0.9em;">© 2026 Perpustakaan Ebook Anak TK</p>
    </footer>
</body>
</html>
