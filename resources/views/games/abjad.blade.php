<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔤 Belajar Huruf Abjad A-Z - Ebook Anak TK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comic Neue', cursive;
            background: linear-gradient(180deg, #87CEEB 0%, #98FB98 30%, #FFE4B5 60%, #FFA07A 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Floating animals background */
        .bg-animals {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .animal {
            position: absolute;
            font-size: 4em;
            opacity: 0.25;
            filter: blur(1px);
        }

        @keyframes float1 {
            0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
            25% { transform: translateY(-30px) translateX(10px) rotate(5deg); }
            50% { transform: translateY(-10px) translateX(-10px) rotate(-3deg); }
            75% { transform: translateY(-40px) translateX(5px) rotate(3deg); }
        }

        @keyframes float2 {
            0%, 100% { transform: translateY(0) translateX(0) rotate(0deg) scale(1); }
            33% { transform: translateY(-25px) translateX(-15px) rotate(-5deg) scale(1.1); }
            66% { transform: translateY(-35px) translateX(10px) rotate(5deg) scale(0.95); }
        }

        @keyframes float3 {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        @keyframes float4 {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.1); }
        }

        .a1 { top: 5%; left: 2%; animation: float1 8s ease-in-out infinite; }
        .a2 { top: 8%; right: 3%; animation: float2 10s ease-in-out infinite 1s; font-size: 3em; }
        .a3 { top: 20%; left: 8%; animation: float3 7s ease-in-out infinite 0.5s; }
        .a4 { top: 25%; right: 10%; animation: float4 9s ease-in-out infinite 2s; }
        .a5 { top: 40%; left: 3%; animation: float1 11s ease-in-out infinite 1.5s; font-size: 3.5em; }
        .a6 { top: 45%; right: 5%; animation: float2 8s ease-in-out infinite 0.8s; }
        .a7 { bottom: 30%; left: 5%; animation: float3 9s ease-in-out infinite 1.2s; font-size: 3.5em; }
        .a8 { bottom: 25%; right: 8%; animation: float4 10s ease-in-out infinite 0.3s; }
        .a9 { bottom: 15%; left: 10%; animation: float1 7s ease-in-out infinite 2s; font-size: 3em; }
        .a10 { bottom: 10%; right: 3%; animation: float2 8s ease-in-out infinite 1.8s; font-size: 4em; }
        .a11 { top: 60%; left: 15%; animation: float3 9s ease-in-out infinite 0.3s; font-size: 3em; }
        .a12 { top: 65%; right: 12%; animation: float4 11s ease-in-out infinite 1.5s; }
        .a13 { bottom: 40%; left: 25%; animation: float1 8s ease-in-out infinite 2s; font-size: 3em; }
        .a14 { bottom: 45%; right: 20%; animation: float2 10s ease-in-out infinite 0.7s; }

        /* Cloud shapes */
        .cloud {
            position: absolute;
            background: rgba(255,255,255,0.4);
            border-radius: 50%;
            filter: blur(2px);
        }

        @keyframes cloudFloat {
            0%, 100% { transform: translateX(0) translateY(0); }
            50% { transform: translateX(20px) translateY(-10px); }
        }

        .cloud1 { top: 15%; left: 20%; width: 150px; height: 60px; animation: cloudFloat 12s ease-in-out infinite; }
        .cloud2 { top: 35%; right: 15%; width: 120px; height: 50px; animation: cloudFloat 10s ease-in-out infinite 2s; }
        .cloud3 { bottom: 35%; left: 30%; width: 100px; height: 40px; animation: cloudFloat 14s ease-in-out infinite 1s; }

        /* Sun rays */
        .sun {
            position: fixed;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, #FFD700 0%, transparent 70%);
            border-radius: 50%;
            opacity: 0.3;
            z-index: 0;
            pointer-events: none;
        }

        /* Grass at bottom */
        .grass {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 80px;
            background: linear-gradient(180deg, transparent 0%, rgba(34,139,34,0.3) 100%);
            pointer-events: none;
            z-index: 0;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            position: relative;
            z-index: 20;
        }

        .header::before {
            content: '🔤 ✨ 🌟 🎉 📚';
            position: absolute;
            top: -15px;
            left: 0;
            width: 100%;
            font-size: 1.5em;
            opacity: 0.3;
        }

        .back-link {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }

        .back-link:hover {
            background: rgba(255,255,255,0.3);
        }

        .header h1 {
            font-family: 'Fredoka One', cursive;
            color: white;
            font-size: 2.5em;
            text-shadow: 3px 3px 0 rgba(0,0,0,0.2);
            margin-bottom: 5px;
        }

        .header p {
            color: rgba(255,255,255,0.9);
            font-size: 1.2em;
        }

        /* Main container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
            position: relative;
            z-index: 10;
        }

        /* Alphabet navigation arrows */
        .alphabet-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            margin-bottom: 25px;
        }

        .nav-arrow {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: none;
            font-size: 2.5em;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .nav-arrow.prev {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
        }

        .nav-arrow.next {
            background: linear-gradient(135deg, #f472b6, #ec4899);
            color: white;
        }

        .nav-arrow:hover {
            transform: scale(1.1);
        }

        .nav-arrow:active {
            transform: scale(0.95);
        }

        .nav-arrow:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* Letter indicator dots */
        .letter-dots {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 400px;
        }

        .letter-dot {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #e5e7eb;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9em;
            font-weight: bold;
        }

        .letter-dot:hover {
            background: #c4b5fd;
            transform: scale(1.2);
        }

        .letter-dot.current {
            background: linear-gradient(135deg, #ff6b6b, #f59e0b);
            color: white;
            transform: scale(1.2);
        }

        .letter-card {
            height: 100px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3em;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transition: all 0.3s;
            color: white;
            border: 4px solid rgba(255,255,255,0.5);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .letter-card:nth-child(1) { background: linear-gradient(135deg, #ff6b6b, #ff9f1c); }
        .letter-card:nth-child(2) { background: linear-gradient(135deg, #f472b6, #ec4899); }
        .letter-card:nth-child(3) { background: linear-gradient(135deg, #fb923c, #f97316); }
        .letter-card:nth-child(4) { background: linear-gradient(135deg, #facc15, #eab308); }
        .letter-card:nth-child(5) { background: linear-gradient(135deg, #4ade80, #22c55e); }
        .letter-card:nth-child(6) { background: linear-gradient(135deg, #2dd4bf, #14b8a6); }
        .letter-card:nth-child(7) { background: linear-gradient(135deg, #38bdf8, #0ea5e9); }
        .letter-card:nth-child(8) { background: linear-gradient(135deg, #818cf8, #6366f1); }
        .letter-card:nth-child(9) { background: linear-gradient(135deg, #a78bfa, #8b5cf6); }
        .letter-card:nth-child(10) { background: linear-gradient(135deg, #f472b6, #db2777); }
        .letter-card:nth-child(11) { background: linear-gradient(135deg, #fb7185, #e11d48); }
        .letter-card:nth-child(12) { background: linear-gradient(135deg, #fb923c, #ea580c); }
        .letter-card:nth-child(14) { background: linear-gradient(135deg, #a3e635, #65a30d); }
        .letter-card:nth-child(15) { background: linear-gradient(135deg, #22d3ee, #0891b1); }
        .letter-card:nth-child(16) { background: linear-gradient(135deg, #c084fc, #a855f7); }
        .letter-card:nth-child(17) { background: linear-gradient(135deg, #f0abfc, #d946ef); }
        .letter-card:nth-child(18) { background: linear-gradient(135deg, #fb7185, #f43f5e); }
        .letter-card:nth-child(19) { background: linear-gradient(135deg, #fbbf24, #d97706); }
        .letter-card:nth-child(20) { background: linear-gradient(135deg, #2dd4bf, #0d948c); }
        .letter-card:nth-child(21) { background: linear-gradient(135deg, #60a5fa, #2563eb); }
        .letter-card:nth-child(22) { background: linear-gradient(135deg, #a78bfa, #7c3aed); }
        .letter-card:nth-child(23) { background: linear-gradient(135deg, #4ade80, #16a34a); }
        .letter-card:nth-child(24) { background: linear-gradient(135deg, #f472b6, #be185d); }
        .letter-card:nth-child(25) { background: linear-gradient(135deg, #fb923c, #f97316); }
        .letter-card:nth-child(26) { background: linear-gradient(135deg, #facc15, #ca8a04); }
        /* Z for letter Z */
        .letter-card:last-child { background: linear-gradient(135deg, #a3e635, #84cc16); }

        .letter-card:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 12px 30px rgba(0,0,0,0.25);
        }

        .letter-card.active {
            transform: scale(1.15);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            border: 5px solid #ffe66d;
        }

        /* Main Display */
        .main-display {
            background: white;
            border-radius: 30px;
            padding: 50px 30px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            margin-bottom: 25px;
        }

        .big-letter {
            font-size: 15em;
            font-weight: bold;
            line-height: 1;
            margin: 20px 0;
            text-shadow: 6px 6px 0 rgba(0,0,0,0.2);
            animation: bounce 2s ease-in-out infinite;
            background: linear-gradient(180deg, #ff6b6b 0%, #ff9f1c 50%, #ffd93d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Controls */
        .controls {
            margin: 30px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 18px 35px;
            font-size: 1.3em;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            font-family: 'Fredoka One', cursive;
        }

        .btn-listen {
            background: linear-gradient(135deg, #4ecdc4, #26a69a);
            color: white;
            box-shadow: 0 8px 25px rgba(78, 205, 196, 0.4);
        }

        .btn-listen:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(78, 205, 196, 0.5);
        }

        .btn-speak {
            background: linear-gradient(135deg, #ff9f1c, #f39c12);
            color: white;
            box-shadow: 0 8px 25px rgba(255, 159, 28, 0.4);
        }

        .btn-speak:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 159, 28, 0.5);
        }

        .btn-speak.listening {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Feedback */
        .feedback {
            min-height: 80px;
            font-size: 1.6em;
            padding: 20px;
            border-radius: 20px;
            margin: 20px auto;
            max-width: 600px;
            font-weight: bold;
            display: none;
        }

        .feedback.show {
            display: block;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .feedback.correct {
            background: linear-gradient(135deg, #a8e6cf, #22c55e);
            color: #065f46;
        }

        .feedback.incorrect {
            background: linear-gradient(135deg, #fca5a5, #ef4444);
            color: #7f1d1d;
        }

        /* Progress */
        .progress-section {
            background: white;
            border-radius: 25px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        .progress-bar {
            background: #e5e7eb;
            border-radius: 20px;
            height: 20px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .progress-fill {
            background: linear-gradient(90deg, #6c5ce7, #a29bfe);
            height: 100%;
            border-radius: 20px;
            transition: width 0.3s ease;
            width: 0%;
        }

        .progress-text {
            color: #6c5ce7;
            font-size: 1.2em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
        }

        /* Score */
        .score-section {
            background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
            border-radius: 25px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .score-title {
            font-size: 1.3em;
            color: #92400e;
            margin-bottom: 15px;
            font-family: 'Fredoka One', cursive;
        }

        .score-display {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .score-item {
            text-align: center;
        }

        .score-number {
            font-size: 3em;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            color: #6c5ce7;
        }

        .score-label {
            font-size: 1em;
            color: #92400e;
        }

        .score-item.correct .score-number {
            color: #22c55e;
        }

        .score-item.wrong .score-number {
            color: #ef4444;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            color: #888;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .big-letter {
                font-size: 10em;
            }

            .letter-card {
                height: 80px;
                font-size: 2.5em;
            }

            .btn {
                padding: 15px 25px;
                font-size: 1.1em;
            }

            .back-link {
                position: static;
                transform: none;
                display: inline-block;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    {{-- Background decorations --}}
    <div class="bg-animals">
        {{-- Animals floating around --}}
        <span class="animal a1">🐰</span>
        <span class="animal a2">🦊</span>
        <span class="animal a3">🐻</span>
        <span class="animal a4">🐱</span>
        <span class="animal a5">🐶</span>
        <span class="animal a6">🦋</span>
        <span class="animal a7">🐸</span>
        <span class="animal a8">🐰</span>
        <span class="animal a9">🐼</span>
        <span class="animal a10">🐨</span>
        <span class="animal a11">🦁</span>
        <span class="animal a12">🐯</span>
        <span class="animal a13">🐻‍❄️</span>
        <span class="animal a14">🦄</span>

        {{-- Clouds --}}
        <div class="cloud cloud1"></div>
        <div class="cloud cloud2"></div>
        <div class="cloud cloud3"></div>
    </div>

    {{-- Sun --}}
    <div class="sun"></div>

    {{-- Grass at bottom --}}
    <div class="grass"></div>

    {{-- Header --}}
    <header class="header">
        <a href="{{ route('games.index') }}" class="back-link">
            ← Kembali
        </a>
        <h1>🔤🔤 Belajar Huruf Abjad A-Z 🔤🔤</h1>
        <p>Klik huruf, dengar, lalu ucapkan sendiri! 🎤✨</p>
    </header>

    <div class="container">
        {{-- Main Display with Navigation --}}
        <div class="main-display">
            {{-- Navigation arrows --}}
            <div class="alphabet-nav">
                <button class="nav-arrow prev" id="prev-btn" onclick="prevLetter()">
                    ◀️
                </button>

                <div style="text-align: center;">
                    <div id="big-letter" class="big-letter">A</div>

                    {{-- Letter dots --}}
                    <div class="letter-dots" id="letter-dots"></div>
                </div>

                <button class="nav-arrow next" id="next-btn" onclick="nextLetter()">
                    ▶️
                </button>
            </div>

            <div class="controls">
                <button class="btn btn-listen" onclick="speakLetter()">
                    🔊 Dengarkan Huruf
                </button>
                <button id="speak-btn" class="btn btn-speak" onclick="startRecognition()">
                    🎤 Ucapkan Sendiri
                </button>
            </div>

            <div id="feedback" class="feedback"></div>
        </div>

        {{-- Progress --}}
        <div class="progress-section">
            <div class="progress-bar">
                <div class="progress-fill" id="progress-fill"></div>
            </div>
            <div class="progress-text" id="progress-text">Progress: 0/26 huruf</div>
        </div>
    </div>

    <footer>
        Belajar Huruf Abjad • Cocok untuk anak-anak 🔤✨ • Gunakan Chrome untuk fitur suara terbaik
    </footer>

    <script>
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
        let currentLetter = 'A';
        let recognition = null;

        // Select letter
        function selectLetter(letter) {
            currentLetter = letter;
            document.getElementById('big-letter').textContent = letter;

            // Update active state
            document.querySelectorAll('.letter-card').forEach(card => {
                card.classList.toggle('active', card.textContent === letter);
            });

            // Hide feedback
            document.getElementById('feedback').classList.remove('show');

            // Update nav buttons
            updateNavButtons();
        }

        // Speak letter using Web Speech API
        function speakLetter() {
            if ('speechSynthesis' in window) {
                const utterance = new SpeechSynthesisUtterance(currentLetter);
                utterance.lang = 'id-ID';
                utterance.rate = 0.85;
                utterance.pitch = 1.1;
                speechSynthesis.speak(utterance);
            } else {
                alert('Browser tidak mendukung suara. Gunakan Chrome untuk fitur suara terbaik!');
            }
        }

        // Speech recognition
        function initRecognition() {
            if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
                const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                recognition = new SpeechRecognition();
                recognition.continuous = false;
                recognition.interimResults = false;
            }
        }

        function startRecognition() {
            if (!recognition) {
                alert('Fitur pengenalan suara tidak didukung di browser ini. Gunakan Google Chrome!');
                return;
            }

            const btn = document.getElementById('speak-btn');
            btn.classList.add('listening');

            recognition.lang = 'id-ID';

            recognition.onresult = function(event) {
                btn.classList.remove('listening');
                const transcript = event.results[0][0].transcript.toUpperCase().trim();
                checkAnswer(transcript);
            };

            recognition.onerror = function() {
                btn.classList.remove('listening');
                showFeedback(false, 'Tidak mendengar dengan jelas. Coba lagi! 🤔');
            };

            recognition.onend = function() {
                btn.classList.remove('listening');
            };

            try {
                recognition.start();
            } catch(e) {
                btn.classList.remove('listening');
            }
        }

        // Show feedback message
        function showFeedback(isCorrect, message) {
            const feedback = document.getElementById('feedback');
            feedback.textContent = message;
            feedback.className = 'feedback show ' + (isCorrect ? 'correct' : 'incorrect');

            setTimeout(() => {
                feedback.classList.remove('show');
            }, 3000);
        }

        // Check speech recognition answer
        function checkAnswer(transcript) {
            if (transcript.includes(currentLetter)) {
                showFeedback(true, `🎉 Benar! Huruf ${currentLetter} sangat bagus!`);
            } else {
                showFeedback(false, `😊 Coba lagi! Kamu mengucapkan: "${transcript}".`);
            }
        }

        // Navigate to previous letter
        function prevLetter() {
            const currentIndex = alphabet.indexOf(currentLetter);
            if (currentIndex > 0) {
                const prev = alphabet[currentIndex - 1];
                selectLetter(prev);
                speakLetter();
            }
        }

        // Navigate to next letter
        function nextLetter() {
            const currentIndex = alphabet.indexOf(currentLetter);
            if (currentIndex < alphabet.length - 1) {
                const next = alphabet[currentIndex + 1];
                selectLetter(next);
                speakLetter();
            }
        }

        // Update navigation buttons state
        function updateNavButtons() {
            const currentIndex = alphabet.indexOf(currentLetter);
            document.getElementById('prev-btn').disabled = currentIndex === 0;
            document.getElementById('next-btn').disabled = currentIndex === alphabet.length - 1;
        }

        // Keyboard support
        document.addEventListener('keydown', (e) => {
            const letter = e.key.toUpperCase();
            if (alphabet.includes(letter)) {
                selectLetter(letter);
                updateNavButtons();
            }
            if (e.key === ' ' || e.key === 'Enter') {
                e.preventDefault();
                speakLetter();
            }
            if (e.key === 'ArrowLeft') {
                prevLetter();
            }
            if (e.key === 'ArrowRight') {
                nextLetter();
            }
        });

        // Initialize
        window.onload = function() {
            selectLetter('A');
            updateNavButtons();
            initRecognition();
        };
    </script>
</body>
</html>
