@php
$items = [
    ['id' => 'bebek', 'name' => 'Bebek', 'emoji' => '🦆', 'hint' => 'Bebek adalah burung air yang suka berenang di kolam!', 'color' => 'hover:border-yellow-200', 'bg' => 'bg-yellow-100 text-yellow-600'],
    ['id' => 'kucing', 'name' => 'Kucing', 'emoji' => '🐱', 'hint' => 'Kucing adalah hewan peliharaan yang lucu dan suka mengeong!', 'color' => 'hover:border-orange-200', 'bg' => 'bg-orange-100 text-orange-600'],
    ['id' => 'gurita', 'name' => 'Gurita', 'emoji' => '🐙', 'hint' => 'Gurita adalah hewan laut dengan 8 lengan yang panjang!', 'color' => 'hover:border-purple-200', 'bg' => 'bg-purple-100 text-purple-600'],
    ['id' => 'hiu', 'name' => 'Hiu', 'emoji' => '🦈', 'hint' => 'Hiu adalah ikan predator besar yang tinggal di laut!', 'color' => 'hover:border-blue-200', 'bg' => 'bg-blue-100 text-blue-600'],
];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 8 - Ebook Anak TK</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @endif
    <style>
        body { font-family: 'Comic Neue', cursive; background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%); min-height: 100vh; }
        @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.7; transform: scale(0.9); } }
        @keyframes float-gentle { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-15px) rotate(5deg); } }
        @keyframes bounce-subtle { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-10px) scale(1.05); } }
        @keyframes pop { 0% { transform: scale(1); } 50% { transform: scale(1.1); } 100% { transform: scale(1); } }
        @keyframes floatUp { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
        @keyframes rainbow { 0% { background-position: 0% 50%; } 100% { background-position: 200% 50%; } }
        .animate-twinkle { animation: twinkle 3s ease-in-out infinite; }
        .animate-float-gentle { animation: float-gentle 4s ease-in-out infinite; }
        .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
        .animate-pop { animation: pop 0.5s ease; }
        .animate-float-up { animation: floatUp 3s ease-in-out infinite; }
    </style>
</head>
<body class="min-h-screen overflow-x-hidden">
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" style="background: linear-gradient(180deg, #FFF9E6 0%, #E8F5E9 50%, #F0FFF4 100%);"></div>
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:5%;left:3%"><svg width="35" height="35" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24"/></svg></div>
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:8%;right:5%;animation-delay:0.5s"><svg width="28" height="28" viewBox="0 0 45 45" fill="none"><path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#F472B6"/></svg></div>
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2" style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">← Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🦆</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">Halaman 8 - Bebek & Kucing 🦆</h1>
            <p class="text-gray-500 text-[1rem]">Mengenal macam-macam hewan!</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 mb-6">
            @foreach($items as $index => $item)
            <div class="bg-white rounded-3xl p-6 shadow-xl text-center cursor-pointer hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group border-4 border-transparent {{ $item['color'] }}" onclick="selectItem('{{ $item['id'] }}')">
                <div class="text-[4rem] md:text-[5rem] mb-3 animate-float-up" style="animation-delay: {{ ($index % 5) * 0.3 }}s">{{ $item['emoji'] }}</div>
                <h3 class="text-[1.2rem] md:text-[1.4rem] font-black text-gray-800 mb-1">{{ $item['name'] }}</h3>
                <p class="text-gray-500 text-xs">{{ $item['name'] }}</p>
            </div>
            @endforeach
        </div>
        <div id="itemDisplay" class="bg-white rounded-3xl p-8 shadow-2xl text-center mb-6 hidden">
            <div class="text-[8rem] md:text-[10rem] mb-4 animate-pop" id="itemEmoji">🦆</div>
            <h2 class="text-[2.5rem] md:text-[3rem] font-black text-gray-800 mb-2" id="itemName">Bebek</h2>
            <p class="text-gray-500 text-[1.2rem] mb-6" id="itemHint">Bebek adalah burung air yang suka berenang di kolam!</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <button onclick="playAudio()" class="bg-gradient-to-r from-blue-400 to-blue-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:scale-105 transition-all">🔊 Dengarkan</button>
                <button onclick="nextItem()" class="bg-gradient-to-r from-green-400 to-green-500 text-white px-6 py-3 rounded-full font-bold shadow-lg hover:scale-105 transition-all">➡️ Lanjut</button>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-4 shadow-lg">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600 font-bold text-sm">Progress</span>
                <span id="progressText" class="text-green-500 font-bold text-sm">0 / {{ count($items) }}</span>
            </div>
            <div class="bg-gray-200 rounded-full h-4 overflow-hidden">
                <div id="progressBar" class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full transition-all duration-500" style="width: 0%"></div>
            </div>
        </div>
    </main>
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
    <script>
        const items = @json($items);
        let currentIndex = 0;
        let viewed = new Set();
        function selectItem(id) {
            currentIndex = items.findIndex(item => item.id === id);
            showItem();
            viewed.add(id);
            updateProgress();
            document.getElementById('itemDisplay').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        function showItem() {
            const item = items[currentIndex];
            document.getElementById('itemDisplay').classList.remove('hidden');
            document.getElementById('itemEmoji').textContent = item.emoji;
            document.getElementById('itemName').textContent = item.name;
            document.getElementById('itemHint').textContent = item.hint;
        }
        function updateProgress() {
            const count = viewed.size;
            document.getElementById('progressText').textContent = count + ' / ' + items.length;
            document.getElementById('progressBar').style.width = (count / items.length) * 100 + '%';
        }
        function playAudio() {
            const item = items[currentIndex];
            const utterance = new SpeechSynthesisUtterance(item.name);
            utterance.lang = 'id-ID';
            utterance.rate = 0.8;
            speechSynthesis.speak(utterance);
        }
        function nextItem() {
            currentIndex = (currentIndex + 1) % items.length;
            showItem();
        }
        showItem();
    </script>
</body>
</html>
