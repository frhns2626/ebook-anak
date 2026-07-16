<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎨 Belajar Warna - Ebook Anak TK</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @endif

    <style>
        body { font-family: 'Comic Neue', cursive; }
        @keyframes rainbow-float { 0%, 100% { transform: translateX(-25%) translateY(0); } 50% { transform: translateX(-25%) translateY(-20px); } }
        @keyframes float1 { 0%, 100% { transform: translateY(0) rotate(0deg); } 25% { transform: translateY(-25px) rotate(10deg); } 50% { transform: translateY(-15px) rotate(-5deg); } 75% { transform: translateY(-30px) rotate(5deg); } }
        @keyframes float2 { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-20px) scale(1.1); } }
        @keyframes pulse-correct { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.15); } }
        @keyframes shake-wrong { 0%, 100% { transform: translateX(0); } 20%, 60% { transform: translateX(-10px); } 40%, 80% { transform: translateX(10px); } }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes confetti-fall { 0% { transform: translateY(-100px) rotate(0deg); opacity: 1; } 100% { transform: translateY(100vh) rotate(720deg); opacity: 0; } }
        @keyframes pop-in { 0% { transform: translate(-50%, -50%) scale(0); } 100% { transform: translate(-50%, -50%) scale(1); } }
        .animate-rainbow-float { animation: rainbow-float 6s ease-in-out infinite; }
        .animate-float1 { animation: float1 6s ease-in-out infinite; }
        .animate-float2 { animation: float2 7s ease-in-out infinite 1s; }
        .animate-pulse-correct { animation: pulse-correct 0.6s ease; }
        .animate-shake-wrong { animation: shake-wrong 0.5s ease; }
        .animate-fadeIn { animation: fadeIn 0.3s ease; }
        .animate-pop-in { animation: pop-in 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55); }
    </style>
</head>
<body class="bg-gradient-to-b from-red-400 via-yellow-200 via-teal-400 to-sky-500 min-h-screen overflow-x-hidden">
    {{-- Background Effects --}}
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div class="absolute w-[200%] h-[60px] rounded-full opacity-15 animate-rainbow-float" style="top:5%;background:#FF6B6B;animation-delay:0s"></div>
        <div class="absolute w-[200%] h-[60px] rounded-full opacity-15 animate-rainbow-float" style="top:12%;background:#FF9F43;animation-delay:0.5s"></div>
        <div class="absolute w-[200%] h-[60px] rounded-full opacity-15 animate-rainbow-float" style="top:19%;background:#FFE66D;animation-delay:1s"></div>
        <div class="absolute w-[200%] h-[60px] rounded-full opacity-15 animate-rainbow-float" style="top:26%;background:#4ECDC4;animation-delay:1.5s"></div>
        <div class="absolute w-[200%] h-[60px] rounded-full opacity-15 animate-rainbow-float" style="top:33%;background:#45B7D1;animation-delay:2s"></div>
        <div class="absolute w-[200%] h-[60px] rounded-full opacity-15 animate-rainbow-float" style="top:40%;background:#6C5CE7;animation-delay:0.8s"></div>

        {{-- Floating objects --}}
        <span class="absolute text-[3rem] opacity-30 animate-float1" style="top:10%;left:5%">🎨</span>
        <span class="absolute text-[2.5rem] opacity-30 animate-float2" style="top:15%;right:8%">🌈</span>
        <span class="absolute text-[3rem] opacity-30 animate-float1" style="top:35%;left:3%;animation-delay:0.5s">🎨</span>
        <span class="absolute text-[2.5rem] opacity-30 animate-float2" style="top:45%;right:5%">🌈</span>
        <span class="absolute text-[2.5rem] opacity-30 animate-float1" style="bottom:25%;left:8%;animation-delay:2s">🎨</span>
        <span class="absolute text-[3rem] opacity-30 animate-float2" style="bottom:20%;right:10%">🌈</span>
    </div>

    {{-- Confetti container --}}
    <div class="confetti" id="confetti"></div>

    {{-- Celebration popup --}}
    <div class="celebration" id="celebration">
        <h2 class="text-[2rem] md:text-[2.5rem] font-bold text-white drop-shadow-lg mb-2" style="font-family: 'Fredoka One', cursive;">🎉 HEBAT! 🎉</h2>
        <p class="text-white text-[1.1rem] md:text-[1.3rem]" id="celebration-text">Kamu hebat!</p>
        <button onclick="restartGame()" class="bg-gradient-to-r from-violet-500 to-purple-500 text-white px-6 md:px-8 py-3 md:py-4 rounded-full font-bold text-[1rem] md:text-[1.2rem] cursor-pointer mt-4 shadow-xl hover:scale-105 transition-all" style="font-family: 'Fredoka One', cursive;">🔄 Main Lagi!</button>
    </div>

    {{-- Header --}}
    <header class="relative z-10 text-center p-6">
        <a href="{{ route('home') }}" class="absolute left-5 top-1/2 -translate-y-1/2 bg-white/20 text-white px-5 py-2.5 rounded-full font-bold hover:bg-white/30 transition-all text-sm">← Kembali</a>
        <h1 class="text-white text-[2rem] md:text-[2.5rem] drop-shadow-lg font-bold mb-3" style="font-family: 'Fredoka One', cursive;">🎨🎨 Belajar Warna 🏳️🌈🎨</h1>
        <p class="text-white/95 text-[1rem] md:text-[1.3rem]">Klik warna yang benar! Ayo lihat dan sebutkan! 👀✨</p>
    </header>

    <div class="relative z-10 max-w-4xl mx-auto px-5 pb-8">
        {{-- Color Display --}}
        <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl mb-6">
            <div class="w-36 h-36 md:w-44 md:h-44 rounded-full mx-auto mb-4 flex items-center justify-center text-[4rem] md:text-[5rem] shadow-xl transition-all duration-300 border-8 border-white" id="colorCircle">🍎</div>
            <div class="text-center">
                <div class="text-[1.8rem] md:text-[2.5rem] font-bold text-gray-800 mb-2" id="colorName" style="font-family: 'Fredoka One', cursive;">MERAH</div>
                <p class="text-gray-600 text-[1rem] md:text-[1.2rem]">Warna apakah ini? Klik tombol di bawah! 👇</p>
            </div>

            {{-- Color Options --}}
            <div class="grid grid-cols-2 gap-3 md:gap-4 mt-6" id="colorOptions"></div>

            {{-- Feedback --}}
            <div id="feedback" class="hidden mt-5 p-4 rounded-2xl text-center text-[1.1rem] md:text-[1.3rem] font-bold animate-fadeIn"></div>

            {{-- Navigation --}}
            <div class="flex justify-center gap-3 md:gap-5 mt-6 flex-wrap">
                <button onclick="prevColor()" class="bg-gradient-to-r from-red-400 to-red-300 text-white px-5 md:px-8 py-3 md:py-4 rounded-full font-bold text-[1rem] md:text-[1.2rem] cursor-pointer shadow-lg hover:-translate-y-1 hover:scale-105 transition-all flex items-center gap-2" style="font-family: 'Fredoka One', cursive;">◀️ Sebelumnya</button>
                <button onclick="nextColor()" class="bg-gradient-to-r from-teal-400 to-cyan-300 text-white px-5 md:px-8 py-3 md:py-4 rounded-full font-bold text-[1rem] md:text-[1.2rem] cursor-pointer shadow-lg hover:-translate-y-1 hover:scale-105 transition-all flex items-center gap-2" style="font-family: 'Fredoka One', cursive;">Selanjutnya ▶️</button>
            </div>

            {{-- Progress --}}
            <div class="bg-white/30 rounded-full h-4 mt-5 overflow-hidden">
                <div class="h-full bg-gradient-to-r from-yellow-300 to-teal-400 rounded-full transition-all duration-500 flex items-center justify-end pr-3 text-xs font-bold text-gray-800" id="progressFill" style="width: 0%">
                    <span id="progressText">0/8</span>
                </div>
            </div>

            {{-- Score --}}
            <div class="inline-flex items-center gap-3 bg-gradient-to-r from-yellow-300 to-orange-400 rounded-2xl px-5 md:px-6 py-3 mt-5 shadow-lg">
                <span class="text-[1.3rem] md:text-[1.5rem]">⭐</span>
                <span class="text-[1.3rem] md:text-[1.5rem] font-bold text-white" id="score" style="font-family: 'Fredoka One', cursive;">0</span>
                <span class="text-white">Poin</span>
            </div>

            {{-- Sound Button --}}
            <button onclick="speakColor()" class="block mx-auto mt-4 bg-gradient-to-r from-violet-500 to-purple-400 text-white px-5 md:px-8 py-3 md:py-4 rounded-full font-bold text-[1rem] md:text-[1.2rem] cursor-pointer shadow-lg hover:-translate-y-1 hover:scale-105 transition-all" style="font-family: 'Fredoka One', cursive;">🔊 Dengarkan Warna</button>
        </div>
    </div>

    <style>
        .celebration {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(135deg, #FFE66D, #FF9F43);
            padding: 30px 40px;
            border-radius: 30px;
            text-align: center;
            z-index: 200;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            display: none;
        }
        .celebration.show { display: block; }
    </style>

    <script>
        const colors = [
            { name: 'MERAH', emoji: '🍎', color: '#FF6B6B', object: 'Apel' },
            { name: 'KUNING', emoji: '🍌', color: '#FFE66D', object: 'Pisang' },
            { name: 'HIJAU', emoji: '🥦', color: '#4ECDC4', object: 'Brokoli' },
            { name: 'BIRU', emoji: '🫐', color: '#45B7D1', object: 'Blueberry' },
            { name: 'UNGU', emoji: '🍇', color: '#6C5CE7', object: 'Anggur' },
            { name: 'ORANYE', emoji: '🍊', color: '#FF9F43', object: 'Jeruk' },
            { name: 'PINK', emoji: '🍓', color: '#FF9FF3', object: 'Stroberi' },
            { name: 'COKLAT', emoji: '🍫', color: '#8B5A2B', object: 'Coklat' }
        ];

        let currentIndex = 0;
        let score = 0;
        let answered = false;

        function shuffle(array) {
            const arr = [...array];
            for (let i = arr.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [arr[i], arr[j]] = [arr[j], arr[i]];
            }
            return arr;
        }

        function initGame() {
            currentIndex = 0;
            score = 0;
            updateDisplay();
            document.getElementById('score').textContent = score;
        }

        function updateDisplay() {
            const current = colors[currentIndex];
            const circle = document.getElementById('colorCircle');
            const nameEl = document.getElementById('colorName');

            circle.style.backgroundColor = current.color;
            circle.classList.add('scale-110');
            circle.textContent = current.emoji;
            nameEl.textContent = current.name;

            setTimeout(() => circle.classList.remove('scale-110'), 200);

            const otherColors = colors.filter((_, i) => i !== currentIndex);
            const wrongOptions = shuffle(otherColors).slice(0, 3);
            const options = shuffle([current, ...wrongOptions]);

            const optionsContainer = document.getElementById('colorOptions');
            optionsContainer.innerHTML = options.map(c => `
                <button class="p-4 md:p-5 rounded-2xl font-bold text-[1.1rem] md:text-[1.4rem] cursor-pointer text-white shadow-lg transition-all hover:-translate-y-1 hover:scale-105"
                    style="background: ${c.color}; text-shadow: 2px 2px 0 rgba(0,0,0,0.2); font-family: 'Fredoka One', cursive;"
                    onclick="checkAnswer('${c.name}', '${current.name}')">
                    ${c.name}
                </button>
            `).join('');

            document.getElementById('feedback').classList.add('hidden');
            answered = false;

            const progress = ((currentIndex + 1) / colors.length) * 100;
            document.getElementById('progressFill').style.width = progress + '%';
            document.getElementById('progressText').textContent = `${currentIndex + 1}/${colors.length}`;
        }

        function checkAnswer(selected, correct) {
            if (answered) return;
            answered = true;

            const feedback = document.getElementById('feedback');
            const buttons = document.querySelectorAll('#colorOptions button');

            if (selected === correct) {
                score += 10;
                document.getElementById('score').textContent = score;
                feedback.textContent = '🎉 Benar! ' + colors[currentIndex].object + ' warnanya ' + correct + '!';
                feedback.className = 'mt-5 p-4 rounded-2xl text-center text-[1.1rem] md:text-[1.3rem] font-bold animate-fadeIn bg-gradient-to-r from-teal-400 to-cyan-400 text-white';
                feedback.classList.remove('hidden');

                buttons.forEach(btn => {
                    if (btn.textContent.trim() === correct) {
                        btn.classList.add('animate-pulse-correct');
                    }
                });

                showConfetti();
                speakText(correct + '! Benar!');
            } else {
                feedback.textContent = '❌ Wah bukan! Coba lagi ya! 😊';
                feedback.className = 'mt-5 p-4 rounded-2xl text-center text-[1.1rem] md:text-[1.3rem] font-bold animate-fadeIn bg-gradient-to-r from-red-400 to-pink-300 text-white';
                feedback.classList.remove('hidden');

                buttons.forEach(btn => {
                    if (btn.textContent.trim() === selected) {
                        btn.classList.add('animate-shake-wrong');
                    }
                    if (btn.textContent.trim() === correct) {
                        btn.classList.add('animate-pulse-correct');
                    }
                });
            }
        }

        function nextColor() {
            if (currentIndex < colors.length - 1) {
                currentIndex++;
                updateDisplay();
            } else {
                showCelebration();
            }
        }

        function prevColor() {
            if (currentIndex > 0) {
                currentIndex--;
                updateDisplay();
            }
        }

        function speakColor() {
            const utterance = new SpeechSynthesisUtterance(colors[currentIndex].name);
            utterance.lang = 'id-ID';
            speechSynthesis.speak(utterance);
        }

        function speakText(text) {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'id-ID';
            speechSynthesis.speak(utterance);
        }

        function showConfetti() {
            const confetti = document.getElementById('confetti');
            const confettiColors = ['#FF6B6B', '#FFE66D', '#4ECDC4', '#45B7D1', '#6C5CE7', '#FF9F43', '#FF9FF3'];

            for (let i = 0; i < 50; i++) {
                const piece = document.createElement('div');
                piece.className = 'absolute';
                piece.style.cssText = `
                    left: ${Math.random() * 100}%;
                    width: 15px;
                    height: 15px;
                    background: ${confettiColors[Math.floor(Math.random() * confettiColors.length)]};
                    border-radius: 3px;
                    animation: confetti-fall ${2 + Math.random()}s ease-out forwards;
                    animation-delay: ${Math.random() * 0.5}s;
                `;
                confetti.appendChild(piece);
            }

            setTimeout(() => confetti.innerHTML = '', 3000);
        }

        function showCelebration() {
            document.getElementById('celebration').classList.add('show');
            speakText('Hebat! Kamu menyelesaikan semua warna!');
        }

        function restartGame() {
            document.getElementById('celebration').classList.remove('show');
            initGame();
        }

        initGame();
    </script>
</body>
</html>
