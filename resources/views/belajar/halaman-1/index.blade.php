<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔤 Belajar Huruf A-Z - Ebook Anak TK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&display=swap" rel="stylesheet">

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @endif

    <style>
        body {
            font-family: 'Fredoka', 'Comic Neue', sans-serif;
            background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%);
            min-height: 100vh;
        }
        @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.7; transform: scale(0.9); } }
        @keyframes float-cloud { 0%, 100% { transform: translateX(0) translateY(0); } 50% { transform: translateX(25px) translateY(-5px); } }
        @keyframes float-gentle { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-15px) rotate(5deg); } }
        @keyframes float-side { 0%, 100% { transform: translateX(0) translateY(0); } 50% { transform: translateX(15px) translateY(-10px); } }
        @keyframes bounce-subtle { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-10px) scale(1.05); } }
        @keyframes pop { 0% { transform: scale(1); } 50% { transform: scale(1.2); } 100% { transform: scale(1); } }
        @keyframes wiggle { 0%, 100% { transform: rotate(-5deg); } 50% { transform: rotate(5deg); } }
        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .animate-twinkle { animation: twinkle 3s ease-in-out infinite; }
        .animate-float-cloud { animation: float-cloud 8s ease-in-out infinite; }
        .animate-float-gentle { animation: float-gentle 4s ease-in-out infinite; }
        .animate-float-side { animation: float-side 6s ease-in-out infinite; }
        .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
        .animate-pop { animation: pop 0.5s ease; }
        .animate-wiggle { animation: wiggle 3s ease-in-out infinite; }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">
    {{-- Background decorations --}}
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" style="background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%);"></div>

    {{-- Floating stars --}}
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:5%;left:3%">
        <svg width="35" height="35" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24"/></svg>
    </div>
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:8%;right:5%;animation-delay:0.5s">
        <svg width="28" height="28" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#F472B6"/></svg>
    </div>
    <div class="fixed z-10 pointer-events-none animate-twinkle hidden md:block" style="top:25%;left:2%;animation-delay:1s">
        <svg width="25" height="25" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#A78BFA"/></svg>
    </div>
    <div class="fixed z-10 pointer-events-none animate-twinkle hidden md:block" style="top:30%;right:3%;animation-delay:1.5s">
        <svg width="32" height="32" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#34D399"/></svg>
    </div>

    {{-- Floating clouds --}}
    <div class="fixed z-10 pointer-events-none animate-float-cloud hidden md:block" style="top:6%;left:8%">
        <svg width="100" height="60" viewBox="0 0 120 70" fill="none"><ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.8"/><ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.85"/></svg>
    </div>
    <div class="fixed z-10 pointer-events-none animate-float-cloud hidden md:block" style="top:12%;right:12%;animation-delay:2s">
        <svg width="80" height="50" viewBox="0 0 120 70" fill="none"><ellipse cx="30" cy="45" rx="28" ry="20" fill="white" fill-opacity="0.75"/><ellipse cx="60" cy="40" rx="35" ry="25" fill="white" fill-opacity="0.8"/></svg>
    </div>

    {{-- Floating animals --}}
    <div class="fixed z-10 pointer-events-none animate-float-gentle hidden md:block" style="bottom:18%;left:3%;animation-duration:5s">🐰</div>
    <div class="fixed z-10 pointer-events-none animate-float-gentle" style="bottom:22%;right:4%">🦊</div>
    <div class="fixed z-10 pointer-events-none animate-float-gentle hidden md:block" style="top:20%;left:5%">🐻</div>
    <div class="fixed z-10 pointer-events-none animate-float-gentle" style="top:22%;right:6%">🐱</div>

    {{-- Butterflies --}}
    <div class="fixed z-10 pointer-events-none animate-float-side hidden md:block" style="top:35%;left:4%">🦋</div>
    <div class="fixed z-10 pointer-events-none animate-float-side hidden md:block" style="top:40%;right:5%">🦋</div>

    {{-- Main content --}}
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        {{-- Header --}}
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2" style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">← Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🔤</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1" style="font-family: 'Fredoka One', cursive;">Belajar Huruf A-Z 🌟</h1>
            <p class="text-gray-500 text-[1rem]">Klik huruf untuk mendengar bunyinya! 📚✨</p>
        </div>

        {{-- Main Display --}}
        <div class="bg-white rounded-3xl p-8 mb-6 shadow-xl text-center">
            <div class="text-[12rem] md:text-[16rem] font-black leading-none mb-4 bg-gradient-to-b from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-transparent" id="bigLetter" style="font-family: 'Fredoka', sans-serif;">Aa</div>
            <p class="text-gray-600 text-[1.5rem] mb-6 font-bold" id="letterHint">Huruf A Besar & a Kecil</p>

            {{-- Audio buttons --}}
            <div class="flex justify-center gap-4 flex-wrap mb-4">
                <button onclick="playLetter()" class="bg-gradient-to-r from-blue-400 to-blue-500 text-white px-8 py-4 rounded-full text-lg font-bold shadow-lg hover:scale-105 hover:shadow-xl transition-all flex items-center gap-2" style="font-family: 'Fredoka', sans-serif;">
                    🔊 Dengarkan Suara
                </button>
            </div>

            {{-- Feedback --}}
            <div id="feedback" class="hidden text-[1.3rem] font-bold p-4 rounded-2xl mb-4"></div>
        </div>

        {{-- Letter Grid --}}
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl">
            <h3 class="text-center text-gray-700 text-[1.1rem] font-bold mb-4">📝 Pilih Huruf:</h3>
            <div id="letterGrid" class="grid grid-cols-7 md:grid-cols-9 gap-2 md:gap-3"></div>
        </div>

    </main>

    {{-- Bottom wave --}}
    <svg class="fixed bottom-0 left-0 w-full h-24 z-0 pointer-events-none" viewBox="0 0 1440 120" fill="none" preserveAspectRatio="none">
        <path d="M0 120L48 110C96 100 192 80 288 70C384 60 480 60 576 65C672 70 768 80 864 85C960 90 1056 90 1152 82.5C1248 75 1344 60 1392 52.5L1440 45V120H1392C1344 120 1248 120 1152 120C1056 120 960 120 864 120C768 120 672 120 576 120C480 120 384 120 288 120C192 120 96 120 48 120H0Z" fill="url(#wave-gradient)" fill-opacity="0.15"/>
        <defs>
            <linearGradient id="wave-gradient" x1="0" y1="0" x2="1440" y2="0" gradientUnits="userSpaceOnUse">
                <stop stop-color="#10B981"/>
                <stop offset="0.5" stop-color="#8B5CF6"/>
                <stop offset="1" stop-color="#F97316"/>
            </linearGradient>
        </defs>
    </svg>

    <style>
        @keyframes rainbow { 0% { background-position: 0% 50%; } 100% { background-position: 200% 50%; } }
    </style>

    <script>
        const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
      

        let currentLetter = 'A';

        const spellingSounds = {
            A: 'A', B: 'Be', C: 'Ce', D: 'De', E: 'E', F: 'Ef', G: 'Ge', H: 'Ha',
            I: 'I', J: 'Je', K: 'Ka', L: 'El', M: 'Em', N: 'En', O: 'O', P: 'Pe',
            Q: 'Ki', R: 'Er', S: 'Es', T: 'Te', U: 'U', V: 'Ve', W: 'We', X: 'Eks',
            Y: 'Ye', Z: 'Zet'
        };

        function initLetterGrid() {
            const grid = document.getElementById('letterGrid');
            alphabet.forEach(letter => {
                const btn = document.createElement('button');
                btn.className = `w-12 h-12 md:w-14 md:h-14 rounded-xl font-bold text-base md:text-lg shadow-md hover:scale-110 hover:shadow-lg transition-all cursor-pointer border-4 border-transparent hover:border-yellow-300`;
                btn.style.background = `linear-gradient(135deg, ${getLetterColor(letter)}, ${getLetterColorDark(letter)})`;
                btn.style.color = 'white';
                btn.style.fontFamily = "'Fredoka', sans-serif";
                btn.textContent = letter + letter.toLowerCase();
                btn.onclick = () => selectLetter(letter);
                grid.appendChild(btn);
            });
        }

        function getLetterColor(letter) {
            const colors = ['#FF6B6B', '#4ECDC4', '#FFE66D', '#A29BFE', '#FD79A8', '#74B9FF', '#55EFC4', '#FDCB6E', '#E17055', '#00CEC9', '#6C5CE7', '#FF7675', '#FAB1A0', '#81ECEC', '#FECA57', '#A29BFE', '#FD79A8', '#74B9FF', '#55EFC4', '#FDCB6E', '#E17055', '#00CEC9', '#6C5CE7', '#FF7675', '#FAB1A0', '#81ECEC'];
            return colors[alphabet.indexOf(letter) % colors.length];
        }

        function getLetterColorDark(letter) {
            const colors = ['#EE5A5A', '#3DBDB5', '#F5D76E', '#8B7BFE', '#FC5C8D', '#5AA9FF', '#45DBA4', '#ECB84E', '#D16040', '#00B5B0', '#5C4BCE', '#F56565', '#EA9A8F', '#71D9D9', '#E8BC47', '#8B7BFE', '#FC5C8D', '#5AA9FF', '#45DBA4', '#ECB84E', '#D16040', '#00B5B0', '#5C4BCE', '#F56565', '#EA9A8F', '#71D9D9'];
            return colors[alphabet.indexOf(letter) % colors.length];
        }

        function selectLetter(letter) {
            currentLetter = letter;
            const data = letterData[letter];

            document.getElementById('bigLetter').textContent = letter + letter.toLowerCase();
            document.getElementById('letterHint').textContent = `Huruf ${letter} Besar & ${letter.toLowerCase()} Kecil`;

            // Highlight selected letter in grid
            document.querySelectorAll('#letterGrid button').forEach((btn, i) => {
                btn.classList.toggle('ring-4', btn.textContent === letter + letter.toLowerCase());
                btn.classList.toggle('ring-yellow-400', btn.textContent === letter + letter.toLowerCase());
                btn.classList.toggle('scale-125', btn.textContent === letter + letter.toLowerCase());
                btn.classList.toggle('shadow-xl', btn.textContent === letter + letter.toLowerCase());
            });

            // Hide feedback
            document.getElementById('feedback').classList.add('hidden');
        }

        function playLetter() {
            const soundText = spellingSounds[currentLetter] || currentLetter;
            const utterance = new SpeechSynthesisUtterance(soundText);
            utterance.lang = 'id-ID';
            utterance.rate = 0.8;
            speechSynthesis.speak(utterance);
        }

        // Init
        initLetterGrid();
        selectLetter('A');
    </script>
</body>
</html>
