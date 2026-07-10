<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔢 Belajar Angka - Games Anak TK</title>

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
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 50%, #6366f1 100%);
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
            color: #1d4ed8;
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
            color: #1d4ed8;
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

        .question {
            font-size: 1.4em;
            color: #1d4ed8;
            margin-bottom: 20px;
            font-family: 'Fredoka One', cursive;
        }

        .emoji-display {
            background: #f0f9ff;
            padding: 30px 50px;
            border-radius: 25px;
            display: inline-block;
            margin-bottom: 25px;
            font-size: 3em;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            line-height: 1.4;
        }

        .count-hint {
            font-size: 1.3em;
            color: #666;
            margin-bottom: 25px;
        }

        .options {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .option-btn {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f472b6, #ec4899);
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 2.5em;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            transition: all 0.3s;
            font-family: 'Fredoka One', cursive;
        }

        .option-btn:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .option-btn.correct {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            animation: pop 0.5s ease;
        }

        .option-btn.wrong {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            animation: shake 0.5s ease;
        }

        @keyframes pop {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        .result {
            margin-top: 25px;
            font-size: 1.8em;
            font-family: 'Fredoka One', cursive;
            animation: popIn 0.5s ease;
            min-height: 50px;
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

        .btn-next {
            margin-top: 20px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            border: none;
            padding: 15px 35px;
            font-size: 1.2em;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            font-family: 'Fredoka One', cursive;
            box-shadow: 0 8px 25px rgba(59,130,246,0.4);
            transition: all 0.3s;
        }

        .btn-next:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(59,130,246,0.5);
        }

        @media (max-width: 500px) {
            .option-btn {
                width: 65px;
                height: 65px;
                font-size: 2em;
            }

            .game-area {
                padding: 25px;
            }

            .emoji-display {
                font-size: 2em;
                padding: 20px 30px;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('games.index') }}" class="back-link">← Kembali 🎮</a>

    <div class="header">
        <h1>🔢 Belajar Angka 🧮</h1>
        <p>Hitung benda ini dan klik angka yang benar!</p>
    </div>

    <div class="game-area">
        <p class="question">Hitung benda ini! 🧮</p>

        <div class="emoji-display" id="emoji-display">🍎🍎🍎</div>

        <p class="count-hint">Berapa jumlahnya? 🤔</p>

        <div class="options" id="options"></div>

        <div class="result" id="result"></div>

        <button class="btn-next" onclick="nextQuestion()">➡️ Soal Lain</button>
    </div>

    <script>
        const numberData = [
            { count: 1, emoji: '🍎' },
            { count: 2, emoji: '🍌🍌' },
            { count: 3, emoji: '🍊🍊🍊' },
            { count: 4, emoji: '🍇🍇🍇🍇' },
            { count: 5, emoji: '🍓🍓🍓🍓🍓' },
            { count: 6, emoji: '🥝🥝🥝🥝🥝🥝' },
            { count: 7, emoji: '🍒🍒🍒🍒🍒🍒🍒' },
            { count: 8, emoji: '🍑🍑🍑🍑🍑🍑🍑🍑' }
        ];

        let currentQuestion = null;

        function initGame() {
            currentQuestion = numberData[Math.floor(Math.random() * numberData.length)];

            document.getElementById('emoji-display').textContent = currentQuestion.emoji;
            document.getElementById('result').textContent = '';
            document.getElementById('result').className = 'result';

            // Create options: correct answer + 3 wrong answers
            const wrongAnswers = numberData
                .filter(n => n.count !== currentQuestion.count)
                .sort(() => Math.random() - 0.5)
                .slice(0, 3);

            const options = [currentQuestion, ...wrongAnswers].sort(() => Math.random() - 0.5);

            document.getElementById('options').innerHTML = options.map(opt => `
                <button class="option-btn" onclick="checkAnswer(${opt.count}, this)">
                    ${opt.count}
                </button>
            `).join('');
        }

        function checkAnswer(count, btn) {
            const result = document.getElementById('result');

            if (count === currentQuestion.count) {
                result.textContent = '🎉🎉 BENAR! KAMU HEBAT! ⭐🎉🎉';
                result.className = 'result correct';
                btn.classList.add('correct');

                // Disable all buttons
                document.querySelectorAll('.option-btn').forEach(b => b.disabled = true);
                btn.disabled = false;
            } else {
                result.textContent = `❌ Belum tepat... Jawabannya adalah ${currentQuestion.count}! 💪`;
                result.className = 'result wrong';
                btn.classList.add('wrong');

                // Show correct answer
                document.querySelectorAll('.option-btn').forEach(b => {
                    if (parseInt(b.textContent) === currentQuestion.count) {
                        b.classList.add('correct');
                    }
                    b.disabled = true;
                });
            }
        }

        function nextQuestion() {
            initGame();
        }

        initGame();
    </script>
</body>
</html>