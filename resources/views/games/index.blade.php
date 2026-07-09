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
            font-family: 'Comic Neue', cursive;
        }

        h1, h2, h3 {
            font-family: 'Fredoka One', cursive;
        }

        body {
            background: linear-gradient(135deg, #a8e6cf 0%, #d0f0c0 50%, #ffeaa7 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            animation: bgMove 25s infinite alternate;
        }

        @keyframes bgMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        /* Header */
        header {
            background: linear-gradient(90deg, #6c5ce7, #a29bfe);
            color: white;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
        }

        header::before {
            content: '🎮 ⭐ 🌟 🎯 🎨';
            position: absolute;
            top: -15px;
            left: 0;
            width: 100%;
            font-size: 1.8em;
            opacity: 0.3;
            animation: float 4s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .logo {
            font-size: 2.5em;
            margin: 0;
            text-shadow: 4px 4px 0 rgba(0,0,0,0.2);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* Container */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Games Grid */
        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        /* Game Card */
        .game-card {
            background: white;
            border-radius: 30px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            cursor: pointer;
            border: 8px solid #fff;
        }

        .game-card:hover {
            transform: translateY(-15px) scale(1.05) rotate(2deg);
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
        }

        .game-icon {
            font-size: 6em;
            margin-bottom: 15px;
            display: block;
            animation: wiggle 3s infinite;
        }

        @keyframes wiggle {
            0%, 100% { transform: rotate(-5deg); }
            50% { transform: rotate(5deg); }
        }

        .game-card:nth-child(2) .game-icon { animation-delay: 0.5s; }
        .game-card:nth-child(3) .game-icon { animation-delay: 1s; }
        .game-card:nth-child(4) .game-icon { animation-delay: 1.5s; }
        .game-card:nth-child(5) .game-icon { animation-delay: 2s; }
        .game-card:nth-child(6) .game-icon { animation-delay: 2.5s; }

        .game-title {
            font-size: 1.6em;
            color: #333;
            margin-bottom: 10px;
        }

        .game-desc {
            color: #777;
            font-size: 1.05em;
            margin-bottom: 20px;
        }

        .play-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            color: white;
            border: none;
            padding: 15px 35px;
            font-size: 1.2em;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            box-shadow: 0 8px 25px rgba(255,107,107,0.4);
            transition: all 0.3s;
        }

        .play-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,107,107,0.5);
        }

        /* Section Title */
        .section-title {
            text-align: center;
            color: #6c5ce7;
            font-size: 2.2em;
            margin-bottom: 10px;
        }

        .section-subtitle {
            text-align: center;
            color: #888;
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        /* Back to home */
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
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 30px;
            color: #555;
            font-size: 1.1em;
        }

        /* Difficulty badges */
        .difficulty {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .easy { background: #a8e6cf; color: #27ae60; }
        .medium { background: #ffeaa7; color: #d63031; }
        .hard { background: #ffcccc; color: #c0392b; }
    </style>
</head>
<body>
    <header>
        <h1 class="logo">🎮🎮 GAMES EDUKASI ANAK TK 🎮🎮</h1>
        <p style="font-size:1.2em;margin:8px 0 0;">Belajar Sambil Bermain dan Bersenang-senang! 🌟✨</p>
    </header>

    <div class="container">
        {{-- Back link --}}
        <a href="{{ route('ebooks.index') }}" class="back-link">
            ← Kembali ke Perpustakaan
        </a>

        {{-- Section Title --}}
        <h2 class="section-title">🎯 PILIH GAME YANG SERU! 🎯</h2>
        <p class="section-subtitle">Klik game yang kamu mau main!</p>

        {{-- Games Grid --}}
        <div class="games-grid">
            {{-- Game 1: Matching Hewan --}}
            <div class="game-card" onclick="startGame('matching-hewan')">
                <span class="game-icon">🐱</span>
                <span class="difficulty easy">MUDAH</span>
                <h3 class="game-title">Cocokkan Hewan</h3>
                <p class="game-desc">Tarik garis atau klik pasangan hewan yang cocok!</p>
                <button class="play-btn">🎮 MAIN SEKARANG!</button>
            </div>

            {{-- Game 2: Susun Buah --}}
            <div class="game-card" onclick="startGame('susunan-buah')">
                <span class="game-icon">🍎</span>
                <span class="difficulty easy">MUDAH</span>
                <h3 class="game-title">Susun Buah</h3>
                <p class="game-desc">Cocokkan gambar buah dengan nama yang benar!</p>
                <button class="play-btn">🎮 MAIN SEKARANG!</button>
            </div>

            {{-- Game 3: Memory Game --}}
            <div class="game-card" onclick="startGame('memory')">
                <span class="game-icon">🧠</span>
                <span class="difficulty medium">SEDANG</span>
                <h3 class="game-title">Kartu Memory</h3>
                <p class="game-desc">Balik kartu dan cari pasangan yang sama!</p>
                <button class="play-btn">🎮 MAIN SEKARANG!</button>
            </div>

            {{-- Game 4: Warna --}}
            <div class="game-card" onclick="startGame('warna')">
                <span class="game-icon">🌈</span>
                <span class="difficulty easy">MUDAH</span>
                <h3 class="game-title">Cocokkan Warna</h3>
                <p class="game-desc">Cocokkan warna dengan bendanya!</p>
                <button class="play-btn">🎮 MAIN SEKARANG!</button>
            </div>

            {{-- Game 5: Susun Huruf --}}
            <div class="game-card" onclick="startGame('huruf')">
                <span class="game-icon">🔤</span>
                <span class="difficulty medium">SEDANG</span>
                <h3 class="game-title">Susun Huruf</h3>
                <p class="game-desc">Klik huruf untuk menyusun kata yang benar!</p>
                <button class="play-btn">🎮 MAIN SEKARANG!</button>
            </div>

            {{-- Game 6: Angka --}}
            <div class="game-card" onclick="startGame('angka')">
                <span class="game-icon">🔢</span>
                <span class="difficulty hard">AGAK SULIT</span>
                <h3 class="game-title">Belajar Angka</h3>
                <p class="game-desc">Klik angka sesuai jumlah benda!</p>
                <button class="play-btn">🎮 MAIN SEKARANG!</button>
            </div>
        </div>
    </div>

    {{-- Game Modal --}}
    <div id="game-modal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000; overflow:auto;">
        <div style="max-width:800px; margin:50px auto; background:white; border-radius:30px; padding:30px; position:relative;">
            <button onclick="closeGame()" style="position:absolute; top:15px; right:20px; background:#ff6b6b; color:white; border:none; width:45px; height:45px; border-radius:50%; font-size:1.5em; cursor:pointer;">×</button>

            <div id="game-container">
                <h2 id="game-title" style="text-align:center; color:#6c5ce7; font-size:2em; margin-bottom:20px;"></h2>
                <div id="game-content" style="min-height:400px;"></div>
                <div id="game-result" style="text-align:center; margin-top:20px; font-size:1.5em;"></div>
            </div>
        </div>
    </div>

    <footer>
        <p>🚀 Dibuat dengan cinta untuk anak-anak Indonesia 🇮🇩</p>
        <p>© 2026 Games Edukasi Anak TK</p>
    </footer>

    <script>
        // Game data
        const gameData = {
            'matching-hewan': {
                title: '🐱 Cocokkan Hewan',
                animals: [
                    { emoji: '🐱', name: 'Kucing' },
                    { emoji: '🐶', name: 'Anjing' },
                    { emoji: '🐦', name: 'Burung' },
                    { emoji: '🐰', name: 'Kelinci' },
                    { emoji: '🐸', name: 'Katak' },
                    { emoji: '🦊', name: 'Rubah' }
                ]
            },
            'susunan-buah': {
                title: '🍎 Susun Buah',
                fruits: [
                    { emoji: '🍎', name: 'Apel' },
                    { emoji: '🍌', name: 'Pisang' },
                    { emoji: '🍊', name: 'Jeruk' },
                    { emoji: '🍇', name: 'Anggur' },
                    { emoji: '🍓', name: 'Stroberi' },
                    { emoji: '🍉', name: 'Semangka' }
                ]
            },
            'warna': {
                title: '🌈 Cocokkan Warna',
                colors: [
                    { color: '#ef4444', name: 'Merah', emoji: '🍎' },
                    { color: '#3b82f6', name: 'Biru', emoji: '🐟' },
                    { color: '#eab308', name: 'Kuning', emoji: '☀️' },
                    { color: '#22c55e', name: 'Hijau', emoji: '🌲' },
                    { color: '#a855f7', name: 'Ungu', emoji: '🍇' },
                    { color: '#f97316', name: 'Oranye', emoji: '🍊' }
                ]
            },
            'huruf': {
                title: '🔤 Susun Huruf',
                words: [
                    { word: 'APEL', emoji: '🍎' },
                    { word: 'BUKU', emoji: '📚' },
                    { word: 'RUMAH', emoji: '🏠' },
                    { word: 'KUCING', emoji: '🐱' },
                    { word: 'BINTANG', emoji: '⭐' }
                ]
            },
            'angka': {
                title: '🔢 Belajar Angka',
                numbers: [
                    { count: 1, emoji: '🍎' },
                    { count: 2, emoji: '🍌🍌' },
                    { count: 3, emoji: '🍊🍊🍊' },
                    { count: 4, emoji: '🍇🍇🍇🍇' },
                    { count: 5, emoji: '🍓🍓🍓🍓🍓' },
                    { count: 6, emoji: '🥝🥝🥝🥝🥝🥝' }
                ]
            }
        };

        let currentGame = null;
        let selectedItem = null;
        let matchedPairs = 0;
        let totalPairs = 0;
        let memoryCards = [];
        let flippedCards = [];
        let currentWord = null;
        let scrambledLetters = [];
        let userAnswer = [];

        function startGame(gameType) {
            currentGame = gameType;
            selectedItem = null;
            matchedPairs = 0;
            document.getElementById('game-result').innerHTML = '';

            const modal = document.getElementById('game-modal');
            const title = document.getElementById('game-title');
            const content = document.getElementById('game-content');

            title.innerHTML = gameData[gameType].title;
            modal.style.display = 'block';

            switch(gameType) {
                case 'matching-hewan':
                case 'susunan-buah':
                    loadMatchingGame(gameType);
                    break;
                case 'warna':
                    loadColorGame();
                    break;
                case 'memory':
                    loadMemoryGame();
                    break;
                case 'huruf':
                    loadLetterGame();
                    break;
                case 'angka':
                    loadNumberGame();
                    break;
            }
        }

        function loadMatchingGame(type) {
            const data = type === 'matching-hewan' ? gameData['matching-hewan'].animals : gameData['susunan-buah'].fruits;
            totalPairs = data.length;
            matchedPairs = 0;

            const items = data.map(item => ({...item, type: 'emoji'}));
            const names = data.map(item => ({...item, type: 'name'}));

            // Shuffle arrays
            items.sort(() => Math.random() - 0.5);
            names.sort(() => Math.random() - 0.5);

            const content = document.getElementById('game-content');
            content.innerHTML = `
                <div style="display:flex; justify-content:center; gap:60px; flex-wrap:wrap;">
                    <div style="display:flex; flex-direction:column; gap:15px;">
                        ${items.map((item, i) => `
                            <div onclick="selectMatch(this, '${type}', '${item.name}')"
                                 class="match-card"
                                 data-type="${type}"
                                 data-name="${item.name}"
                                 style="width:120px; height:120px; background:white; border-radius:20px; display:flex; align-items:center; justify-content:center; font-size:4em; cursor:pointer; box-shadow:0 5px 15px rgba(0,0,0,0.1); transition:all 0.3s; border:4px solid #eee;">
                                ${item.emoji}
                            </div>
                        `).join('')}
                    </div>
                    <div style="display:flex; flex-direction:column; gap:15px;">
                        ${names.map((item, i) => `
                            <div onclick="selectMatch(this, '${type}', '${item.name}')"
                                 class="match-card"
                                 data-type="${type}"
                                 data-name="${item.name}"
                                 style="width:120px; height:120px; background:white; border-radius:20px; display:flex; align-items:center; justify-content:center; font-size:1.5em; cursor:pointer; box-shadow:0 5px 15px rgba(0,0,0,0.1); transition:all 0.3s; border:4px solid #eee; font-weight:bold;">
                                ${item.name}
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
        }

        function selectMatch(el, type, name) {
            if (el.classList.contains('matched')) return;

            el.style.border = '4px solid #22c55e';

            if (!selectedItem) {
                selectedItem = { el, name };
            } else {
                if (selectedItem.name === name) {
                    // Correct match
                    document.querySelectorAll(`[data-name="${name}"]`).forEach(card => {
                        card.classList.add('matched');
                        card.style.background = '#a8e6cf';
                        card.style.border = '4px solid #22c55e';
                    });
                    matchedPairs++;

                    if (matchedPairs === totalPairs) {
                        document.getElementById('game-result').innerHTML = '🎉🎉 BENAR! HEBAT SEKALI! 🎉🎉';
                        launchConfetti();
                    }
                } else {
                    // Wrong match
                    setTimeout(() => {
                        selectedItem.el.style.border = '4px solid #eee';
                        el.style.border = '4px solid #eee';
                    }, 500);
                }
                selectedItem = null;
            }
        }

        function loadColorGame() {
            const colors = gameData.warna.colors;
            totalPairs = colors.length;
            matchedPairs = 0;

            const colorItems = colors.map(c => ({...c, type: 'color'}));
            const emojiItems = colors.map(c => ({...c, type: 'emoji'}));

            colorItems.sort(() => Math.random() - 0.5);
            emojiItems.sort(() => Math.random() - 0.5);

            const content = document.getElementById('game-content');
            content.innerHTML = `
                <div style="display:flex; justify-content:center; gap:60px; flex-wrap:wrap;">
                    <div style="display:flex; flex-direction:column; gap:15px;">
                        ${colorItems.map((item, i) => `
                            <div onclick="selectMatch(this, 'warna', '${item.name}')"
                                 class="match-card"
                                 data-name="${item.name}"
                                 style="width:100px; height:100px; border-radius:20px; cursor:pointer; box-shadow:0 5px 15px rgba(0,0,0,0.2); transition:all 0.3s; border:4px solid #eee;"
                                 data-color="${item.color}">
                            </div>
                        `).join('')}
                    </div>
                    <div style="display:flex; flex-direction:column; gap:15px;">
                        ${emojiItems.map((item, i) => `
                            <div onclick="selectMatch(this, 'warna', '${item.name}')"
                                 class="match-card"
                                 data-name="${item.name}"
                                 style="width:100px; height:100px; background:white; border-radius:20px; display:flex; align-items:center; justify-content:center; font-size:3em; cursor:pointer; box-shadow:0 5px 15px rgba(0,0,0,0.1); transition:all 0.3s; border:4px solid #eee;">
                                ${item.emoji}
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;

            // Apply colors
            document.querySelectorAll('[data-color]').forEach(el => {
                el.style.backgroundColor = el.dataset.color;
            });
        }

        function loadMemoryGame() {
            const emojis = ['🍎', '🍌', '🍊', '🍇', '🐱', '🐶'];
            memoryCards = [...emojis, ...emojis];
            memoryCards.sort(() => Math.random() - 0.5);
            flippedCards = [];
            matchedPairs = 0;
            totalPairs = 6;

            const content = document.getElementById('game-content');
            content.innerHTML = `
                <div style="display:flex; justify-content:center;">
                    <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:15px; max-width:450px;">
                        ${memoryCards.map((emoji, i) => `
                            <div onclick="flipCard(this, ${i})"
                                 class="memory-card"
                                 data-index="${i}"
                                 style="width:90px; height:90px; background:linear-gradient(135deg, #6c5ce7, #a29bfe); border-radius:15px; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:2.5em; transition:all 0.3s; box-shadow:0 5px 15px rgba(0,0,0,0.2);">
                                ❓
                            </div>
                        `).join('')}
                    </div>
                </div>
                <div style="text-align:center; margin-top:20px;">
                    <button onclick="resetMemory()" style="background:#00b894; color:white; border:none; padding:12px 30px; font-size:1.2em; border-radius:50px; cursor:pointer; font-weight:bold;">🔄 Main Lagi</button>
                </div>
            `;
        }

        function flipCard(el, index) {
            if (el.classList.contains('flipped') || el.classList.contains('matched')) return;
            if (flippedCards.length >= 2) return;

            el.classList.add('flipped');
            el.innerHTML = memoryCards[index];
            flippedCards.push({ el, index, emoji: memoryCards[index] });

            if (flippedCards.length === 2) {
                checkMemoryMatch();
            }
        }

        function checkMemoryMatch() {
            const [first, second] = flippedCards;

            if (first.emoji === second.emoji) {
                first.el.classList.add('matched');
                second.el.classList.add('matched');
                first.el.style.background = 'linear-gradient(135deg, #00b894, #00cec9)';
                second.el.style.background = 'linear-gradient(135deg, #00b894, #00cec9)';
                matchedPairs++;

                if (matchedPairs === totalPairs) {
                    document.getElementById('game-result').innerHTML = '🎉🎉 HEBAT! SEMUA PASANGAN DITEMUKAN! 🎉🎉';
                    launchConfetti();
                }
                flippedCards = [];
            } else {
                setTimeout(() => {
                    first.el.classList.remove('flipped');
                    second.el.classList.remove('flipped');
                    first.el.innerHTML = '❓';
                    second.el.innerHTML = '❓';
                    flippedCards = [];
                }, 800);
            }
        }

        function resetMemory() {
            loadMemoryGame();
        }

        function loadLetterGame() {
            const words = gameData.huruf.words;
            currentWord = words[Math.floor(Math.random() * words.length)];
            scrambledLetters = currentWord.word.split('').sort(() => Math.random() - 0.5);
            userAnswer = [];

            const content = document.getElementById('game-content');
            content.innerHTML = `
                <div style="text-align:center;">
                    <div style="font-size:6em; margin-bottom:10px;">${currentWord.emoji}</div>
                    <p style="font-size:1.5em; color:#666; margin-bottom:30px;">Apa nama ini?</p>

                    <div id="answer-box" style="min-height:80px; border:4px dashed #a29bfe; border-radius:20px; margin-bottom:25px; display:flex; align-items:center; justify-content:center; font-size:3em; font-weight:bold; color:#6c5ce7;">
                    </div>

                    <div style="display:flex; justify-content:center; gap:15px; flex-wrap:wrap; margin-bottom:25px;" id="letter-buttons">
                        ${scrambledLetters.map((letter, i) => `
                            <button onclick="selectLetter('${letter}', this)"
                                    style="width:60px; height:60px; background:white; border:4px solid #6c5ce7; border-radius:15px; font-size:2em; font-weight:bold; cursor:pointer; color:#6c5ce7; transition:all 0.2s;">
                                ${letter}
                            </button>
                        `).join('')}
                    </div>

                    <div style="display:flex; justify-content:center; gap:15px;">
                        <button onclick="checkLetterAnswer()" style="background:#22c55e; color:white; border:none; padding:15px 35px; font-size:1.3em; border-radius:50px; cursor:pointer; font-weight:bold;">✅ Cek Jawaban</button>
                        <button onclick="resetLetters()" style="background:#fdcb6e; color:#d63031; border:none; padding:15px 35px; font-size:1.3em; border-radius:50px; cursor:pointer; font-weight:bold;">🔄 Ulangi</button>
                    </div>
                </div>
            `;
        }

        function selectLetter(letter, el) {
            if (el.disabled) return;
            userAnswer.push(letter);
            el.disabled = true;
            el.style.opacity = '0.3';
            updateLetterAnswer();
        }

        function updateLetterAnswer() {
            const box = document.getElementById('answer-box');
            box.innerHTML = userAnswer.join(' ');
        }

        function checkLetterAnswer() {
            const answer = userAnswer.join('');
            const result = document.getElementById('game-result');

            if (answer === currentWord.word) {
                result.innerHTML = `🎉🎉 BENAR! KAMU HEBAT! 🎉🎉`;
                result.style.color = '#22c55e';
                launchConfetti();
            } else {
                result.innerHTML = `❌ Belum tepat... Coba lagi ya!`;
                result.style.color = '#e74c3c';
            }
        }

        function resetLetters() {
            userAnswer = [];
            document.getElementById('game-result').innerHTML = '';
            document.querySelectorAll('#letter-buttons button').forEach(btn => {
                btn.disabled = false;
                btn.style.opacity = '1';
            });
            updateLetterAnswer();
        }

        function loadNumberGame() {
            const numbers = gameData.angka.numbers;
            currentWord = numbers[Math.floor(Math.random() * numbers.length)];

            const otherNumbers = numbers.filter(n => n.count !== currentWord.count).sort(() => Math.random() - 0.5).slice(0, 3);
            const options = [currentWord, ...otherNumbers].sort(() => Math.random() - 0.5);

            const content = document.getElementById('game-content');
            content.innerHTML = `
                <div style="text-align:center;">
                    <p style="font-size:1.8em; color:#6c5ce7; margin-bottom:20px;">Hitung benda ini!</p>

                    <div style="font-size:4em; margin-bottom:30px; background:white; padding:30px 50px; border-radius:25px; display:inline-block; box-shadow:0 10px 30px rgba(0,0,0,0.1);">
                        ${currentWord.emoji}
                    </div>

                    <p style="font-size:1.5em; color:#666; margin-bottom:20px;">Berapa jumlahnya?</p>

                    <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
                        ${options.map(opt => `
                            <button onclick="checkNumberAnswer(${opt.count})"
                                    style="width:100px; height:100px; background:linear-gradient(135deg, #fd79a8, #e84393); color:white; border:none; border-radius:20px; font-size:2.5em; font-weight:bold; cursor:pointer; box-shadow:0 8px 25px rgba(0,0,0,0.2); transition:all 0.3s;">
                                ${opt.count}
                            </button>
                        `).join('')}
                    </div>

                    <div style="margin-top:30px;">
                        <button onclick="loadNumberGame()" style="background:#6c5ce7; color:white; border:none; padding:15px 30px; font-size:1.2em; border-radius:50px; cursor:pointer; font-weight:bold;">🔄 Ganti Soal</button>
                    </div>
                </div>
            `;
        }

        function checkNumberAnswer(count) {
            const result = document.getElementById('game-result');
            if (count === currentWord.count) {
                result.innerHTML = '🎉🎉 BENAR! KAMU HEBAT! 🎉🎉';
                result.style.color = '#22c55e';
                launchConfetti();
            } else {
                result.innerHTML = `❌ Belum tepat... Jawabannya adalah ${currentWord.count}!`;
                result.style.color = '#e74c3c';
            }
        }

        function closeGame() {
            document.getElementById('game-modal').style.display = 'none';
        }

        // Confetti animation
        function launchConfetti() {
            const canvas = document.createElement('canvas');
            canvas.style.position = 'fixed';
            canvas.style.top = '0';
            canvas.style.left = '0';
            canvas.style.width = '100%';
            canvas.style.height = '100%';
            canvas.style.pointerEvents = 'none';
            canvas.style.zIndex = '2000';
            document.body.appendChild(canvas);

            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            const particles = [];
            for (let i = 0; i < 100; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height - canvas.height,
                    r: Math.random() * 8 + 4,
                    color: ['#ff6b6b', '#ffd93d', '#a8e6cf', '#6c5ce7', '#fd79a8'][Math.floor(Math.random() * 5)],
                    d: Math.random() * 4 + 2
                });
            }

            let animation = setInterval(() => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                let alive = false;

                particles.forEach(p => {
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    ctx.fillStyle = p.color;
                    ctx.fill();

                    p.y += p.d;
                    if (p.y < canvas.height) alive = true;
                });

                if (!alive) {
                    clearInterval(animation);
                    canvas.remove();
                }
            }, 25);
        }

        // Close modal on outside click
        document.getElementById('game-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeGame();
            }
        });
    </script>
</body>
</html>
