<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎮 Games Edukasi Anak TK</title>

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
            background: linear-gradient(135deg, #a8e6cf 0%, #d0f0c0 50%, #ffeaa7 100%);
            min-height: 100vh;
            animation: bgMove 25s infinite alternate;
        }

        @keyframes bgMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Floating emojis background */
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
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #ff6b6b, #ffd93d, #a8e6cf, #6c5ce7, #ff6b6b);
            background-size: 200% 100%;
            animation: rainbow 3s linear infinite;
        }

        @keyframes rainbow {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        .header-icon {
            font-size: 3.5em;
            margin-bottom: 10px;
            animation: bounce 2s ease-in-out infinite;
            display: block;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .header-title {
            font-size: 2.2em;
            color: #333;
            margin-bottom: 5px;
        }

        .header-subtitle {
            color: #888;
            font-size: 1.1em;
        }

        /* Games Grid */
        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        /* Game Card */
        .game-card {
            background: white;
            border-radius: 25px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            cursor: pointer;
            border: 5px solid #fff;
            position: relative;
            overflow: hidden;
        }

        .game-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }

        .game-card:hover::before {
            transform: translateX(100%);
        }

        .game-card:hover {
            transform: translateY(-15px) scale(1.05) rotate(2deg);
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            border-color: #ffd93d;
        }

        .game-icon {
            font-size: 5em;
            margin-bottom: 15px;
            display: block;
            animation: wiggle 3s ease-in-out infinite;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(-10deg); }
            50% { transform: rotate(10deg); }
        }

        .game-card:nth-child(1) .game-icon { animation-delay: 0s; color: #f472b6; }
        .game-card:nth-child(2) .game-icon { animation-delay: 0.3s; color: #fbbf24; }
        .game-card:nth-child(3) .game-icon { animation-delay: 0.6s; color: #a78bfa; }
        .game-card:nth-child(4) .game-icon { animation-delay: 0.9s; color: #6ee7b7; }
        .game-card:nth-child(5) .game-icon { animation-delay: 1.2s; color: #60a5fa; }
        .game-card:nth-child(6) .game-icon { animation-delay: 1.5s; color: #f97316; }

        .difficulty {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .easy {
            background: linear-gradient(135deg, #a8e6cf, #22c55e);
            color: white;
        }

        .medium {
            background: linear-gradient(135deg, #ffeaa7, #f59e0b);
            color: white;
        }

        .hard {
            background: linear-gradient(135deg, #fca5a5, #ef4444);
            color: white;
        }

        .game-title {
            font-size: 1.4em;
            color: #333;
            margin-bottom: 10px;
            font-family: 'Fredoka One', cursive;
        }

        .game-desc {
            color: #777;
            font-size: 1em;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .play-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.1em;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            box-shadow: 0 8px 25px rgba(255,107,107,0.4);
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .play-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,107,107,0.5);
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
            color: #6c5ce7;
            font-size: 1.6em;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* How to Play */
        .how-to-play {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .how-to-play h3 {
            text-align: center;
            color: #92400e;
            font-size: 1.3em;
            margin-bottom: 15px;
        }

        .how-to-play-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .how-to-play-item {
            background: white;
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .how-to-play-icon {
            font-size: 2.5em;
            margin-bottom: 8px;
        }

        .how-to-play-text {
            color: #92400e;
            font-size: 0.95em;
            font-weight: bold;
        }

        /* Stats */
        .stats-row {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .stat-box {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            padding: 20px 30px;
            border-radius: 20px;
            text-align: center;
            min-width: 140px;
        }

        .stat-box:nth-child(2) {
            background: linear-gradient(135deg, #f472b6, #ec4899);
        }

        .stat-box:nth-child(3) {
            background: linear-gradient(135deg, #34d399, #10b981);
        }

        .stat-emoji {
            font-size: 2em;
            margin-bottom: 5px;
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

        /* Back link */
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

        footer {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .main-content {
                margin-left: 0 !important;
                padding-top: 80px;
            }

            .bg-emoji {
                display: none;
            }
        }
    </style>
</head>
<body>
    {{-- Background floating emojis --}}
    <div class="bg-emoji bg-e1">🎮</div>
    <div class="bg-emoji bg-e2">🧩</div>
    <div class="bg-emoji bg-e3">🎯</div>
    <div class="bg-emoji bg-e4">🎨</div>
    <div class="bg-emoji bg-e5">🧠</div>
    <div class="bg-emoji bg-e6">⭐</div>

    @include('components.sidebar')

    <main class="main-content">
        {{-- Back Link --}}
        <a href="{{ route('home') }}" class="back-link">
            ← Kembali ke Beranda 🏠
        </a>

        {{-- Header --}}
        <div class="header">
            <span class="header-icon">🎮🎮🎮</span>
            <h1 class="header-title">GAMES EDUKASI 🎉</h1>
            <p class="header-subtitle">Belajar Sambil Bermain dan Bersenang-senang! ✨🧠</p>
        </div>

        {{-- Games Grid --}}
        <div class="games-grid">
            {{-- Game 1: Susun Huruf --}}
            <div class="game-card" onclick="window.location.href='{{ route('games.susun-huruf') }}'">
                <span class="game-icon">🔤</span>
                <span class="difficulty medium">🔥 SEDANG</span>
                <h3 class="game-title">Susun Huruf ABC 📝</h3>
                <p class="game-desc">Klik huruf untuk menyusun kata yang benar! A-P-E-L = ...? 🤔💡</p>
                <button class="play-btn">🎮 BUKA HALAMAN!</button>
            </div>

            {{-- Game 2: Angka --}}
            <div class="game-card" onclick="window.location.href='{{ route('games.angka') }}'">
                <span class="game-icon">🔢</span>
                <span class="difficulty hard">💪 AGAK SULIT</span>
                <h3 class="game-title">Belajar Angka 🔢</h3>
                <p class="game-desc">Klik angka sesuai jumlah benda! Berapa瓢🍌🍌🍌? Hitung yuk! 🧮</p>
                <button class="play-btn">🎮 BUKA HALAMAN!</button>
            </div>

            {{-- Game 3: Huruf Abjad --}}
            <div class="game-card" onclick="window.location.href='{{ route('games.abjad') }}'">
                <span class="game-icon">🔤</span>
                <span class="difficulty easy">✨ MUDAH</span>
                <h3 class="game-title">Huruf A-Z 🌟</h3>
                <p class="game-desc">Klik huruf yang benar! A-B-C... Yuk belajar abjad! 📖</p>
                <button class="play-btn">🎮 BUKA HALAMAN!</button>
            </div>
        </div>

        <footer>
            <p>Dibuat dengan ❤️ untuk anak-anak Indonesia 🇮🇩</p>
            <p style="margin-top: 5px;">© 2026 Games Edukasi Anak TK 🎮✨</p>
        </footer>
    </main>
</body>
</html>
