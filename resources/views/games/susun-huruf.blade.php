<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔤 Susun Huruf ABC - Games Anak TK</title>

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
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a78bfa 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .header {
            background: white;
            border-radius: 25px;
            padding: 20px 40px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            margin-bottom: 30px;
        }

        .header h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 2.5em;
            color: #6366f1;
            margin-bottom: 10px;
        }

        .header p {
            color: #888;
            font-size: 1.1em;
        }

        .back-link {
            position: fixed;
            top: 20px;
            left: 20px;
            background: white;
            color: #6366f1;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
            z-index: 100;
        }

        .back-link:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        }

        .game-area {
            background: white;
            border-radius: 30px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
        }

        .emoji-display {
            font-size: 6em;
            margin-bottom: 10px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .question {
            font-size: 1.4em;
            color: #666;
            margin-bottom: 25px;
        }

        .answer-box {
            min-height: 70px;
            border: 4px dashed #6366f1;
            border-radius: 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5em;
            font-weight: bold;
            color: #6366f1;
            font-family: 'Fredoka One', cursive;
            background: #f8f7ff;
        }

        .answer-box.correct {
            border-color: #22c55e;
            background: #a8e6cf;
            color: #065f46;
        }

        .answer-box.wrong {
            border-color: #ef4444;
            background: #fca5a5;
            color: #7f1d1d;
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        .letters-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .letter-btn {
            width: 55px;
            height: 55px;
            background: white;
            border: 4px solid #6366f1;
            border-radius: 12px;
            font-size: 1.8em;
            font-weight: bold;
            cursor: pointer;
            color: #6366f1;
            transition: all 0.2s;
            font-family: 'Fredoka One', cursive;
        }

        .letter-btn:hover:not(:disabled) {
            background: #6366f1;
            color: white;
            transform: scale(1.1);
        }

        .letter-btn:disabled {
            opacity: 0.3;
            cursor: default;
        }

        .letter-btn.selected {
            background: #a78bfa;
            color: white;
            border-color: #a78bfa;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 30px;
            font-size: 1.2em;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            transition: all 0.3s;
        }

        .btn-check {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            box-shadow: 0 8px 25px rgba(34,197,94,0.4);
        }

        .btn-check:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(34,197,94,0.5);
        }

        .btn-reset {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 8px 25px rgba(245,158,11,0.4);
        }

        .btn-reset:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(245,158,11,0.5);
        }

        .btn-next {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            box-shadow: 0 8px 25px rgba(99,102,241,0.4);
        }

        .btn-next:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(99,102,241,0.5);
        }

        .result {
            margin-top: 20px;
            font-size: 1.5em;
            font-family: 'Fredoka One', cursive;
            animation: popIn 0.5s ease;
        }

        .result.correct {
            color: #22c55e;
        }

        .result.wrong {
            color: #ef4444;
        }

        @keyframes popIn {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); opacity: 1; }
        }

        @media (max-width: 500px) {
            .letter-btn {
                width: 45px;
                height: 45px;
                font-size: 1.5em;
            }

            .game-area {
                padding: 25px;
            }

            .emoji-display {
                font-size: 4.5em;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('games.index') }}" class="back-link">← Kembali 🎮</a>

    <div class="header">
        <h1>🔤 Susun Huruf ABC 📝</h1>
        <p>Klik huruf untuk menyusun kata yang benar!</p>
    </div>

    <div class="game-area">
        <div class="emoji-display" id="emoji-display">🍎</div>
        <p class="question">Apa nama ini? 🤔</p>

        <div class="answer-box" id="answer-box"></div>

        <div class="letters-container" id="letters-container"></div>

        <div class="btn-group">
            <button class="btn btn-check" onclick="checkAnswer()">✅ Cek Jawaban</button>
            <button class="btn btn-reset" onclick="resetLetters()">🔄 Ulangi</button>
            <button class="btn btn-next" onclick="nextWord()">➡️ Kata Lain</button>
        </div>

        <div class="result" id="result"></div>
    </div>

    <script>
        const words = [
            { word: 'APEL', emoji: '🍎' },
            { word: 'BUKU', emoji: '📚' },
            { word: 'RUMAH', emoji: '🏠' },
            { word: 'KUCING', emoji: '🐱' },
            { word: 'BINTANG', emoji: '⭐' },
            { word: 'SEMANGKA', emoji: '🍉' },
            { word: 'KELINCI', emoji: '🐰' },
            { word: 'BURUNG', emoji: '🐦' }
        ];

        let currentWord = null;
        let userAnswer = [];
        let selectedButtons = [];

        function initGame() {
            currentWord = words[Math.floor(Math.random() * words.length)];
            userAnswer = [];
            selectedButtons = [];

            document.getElementById('emoji-display').textContent = currentWord.emoji;
            document.getElementById('answer-box').textContent = '';
            document.getElementById('answer-box').className = 'answer-box';
            document.getElementById('result').textContent = '';
            document.getElementById('result').className = 'result';

            const letters = currentWord.word.split('').sort(() => Math.random() - 0.5);

            document.getElementById('letters-container').innerHTML = letters.map((letter, i) => `
                <button class="letter-btn" data-letter="${letter}" data-index="${i}" onclick="selectLetter('${letter}', this)">
                    ${letter}
                </button>
            `).join('');
        }

        function selectLetter(letter, btn) {
            if (btn.disabled) return;

            userAnswer.push(letter);
            selectedButtons.push(btn);
            btn.disabled = true;
            btn.classList.add('selected');

            document.getElementById('answer-box').textContent = userAnswer.join(' ');
        }

        function checkAnswer() {
            const answer = userAnswer.join('');
            const result = document.getElementById('result');
            const answerBox = document.getElementById('answer-box');

            if (answer === currentWord.word) {
                result.textContent = '🎉🎉 BENAR! KAMU HEBAT! ⭐🎉🎉';
                result.className = 'result correct';
                answerBox.className = 'answer-box correct';
            } else {
                result.textContent = '❌ Bleum tepat... Coba lagi ya! 💪';
                result.className = 'result wrong';
                answerBox.className = 'answer-box wrong';
            }
        }

        function resetLetters() {
            userAnswer = [];
            selectedButtons = [];

            document.getElementById('answer-box').textContent = '';
            document.getElementById('answer-box').className = 'answer-box';
            document.getElementById('result').textContent = '';
            document.getElementById('result').className = 'result';

            document.querySelectorAll('.letter-btn').forEach(btn => {
                btn.disabled = false;
                btn.classList.remove('selected');
            });
        }

        function nextWord() {
            initGame();
        }

        initGame();
    </script>
</body>
</html>
