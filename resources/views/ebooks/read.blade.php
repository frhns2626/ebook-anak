<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📖 {{ $book->title }} - Ebook Anak</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #2c1810 0%, #4a3228 50%, #2c1810 100%);
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Header */
        .header {
            width: 100%;
            max-width: 900px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px 25px;
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(255,107,107,0.3);
        }

        .back-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: translateX(-5px);
        }

        .book-title {
            color: white;
            font-size: 1.2em;
            font-weight: bold;
        }

        .header-btns {
            display: flex;
            gap: 10px;
        }

        .nav-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 1.2em;
            cursor: pointer;
            transition: all 0.3s;
        }

        .nav-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1);
        }

        /* ========== REALISTIC 3D BOOK ========== */
        .book-scene {
            perspective: 2000px;
            width: 100%;
            max-width: 800px;
            height: 550px;
        }

        .book {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.5s;
        }

        /* Book base - like a real book lying flat */
        .book-base {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f5f5f0 0%, #e8e8e0 100%);
            border-radius: 5px 15px 15px 5px;
            box-shadow:
                0 0 30px rgba(0,0,0,0.3),
                inset 0 0 50px rgba(0,0,0,0.05);
            transform-style: preserve-3d;
        }

        /* Book spine */
        .book-spine {
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 100%;
            background: linear-gradient(90deg,
                #d4a574 0%,
                #c49a6c 20%,
                #b8956a 40%,
                #a8895e 60%,
                #c49a6c 80%,
                #d4a574 100%
            );
            border-radius: 5px 0 0 5px;
            transform: rotateY(-90deg) translateX(-20px);
            transform-origin: right center;
            box-shadow: inset -5px 0 15px rgba(0,0,0,0.2);
        }

        /* Pages container */
        .pages-container {
            position: absolute;
            right: 0;
            top: 5px;
            width: calc(100% - 30px);
            height: calc(100% - 10px);
            transform-style: preserve-3d;
        }

        /* Individual page */
        .page {
            position: absolute;
            right: 0;
            top: 0;
            width: calc(50% - 10px);
            height: 100%;
            background: linear-gradient(90deg, #fdfbf7 0%, #f8f6f0 100%);
            border-radius: 2px 8px 8px 2px;
            box-shadow: -2px 0 10px rgba(0,0,0,0.1);
            transform-origin: left center;
            transition: transform 0.6s ease;
            transform-style: preserve-3d;
            cursor: pointer;
            overflow: hidden;
        }

        .page.flipped {
            transform: rotateY(-180deg);
        }

        /* Page front (what we see normally) */
        .page-front {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            padding: 25px;
            display: flex;
            flex-direction: column;
            background: linear-gradient(90deg, #fdfbf7 0%, #fffef9 100%);
        }

        /* Page back (what we see when flipped) */
        .page-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            transform: rotateY(180deg);
            padding: 25px;
            background: linear-gradient(270deg, #fdfbf7 0%, #f8f6f0 100%);
        }

        /* Page content */
        .page-header {
            background: linear-gradient(135deg, {{ $book->category->gradient_start ?? '#6c5ce7' }}, {{ $book->category->gradient_end ?? '#a29bfe' }});
            margin: -25px -25px 15px -25px;
            padding: 15px 20px;
            text-align: center;
            border-radius: 2px 8px 0 0;
        }

        .page-header h2 {
            color: white;
            font-size: 1.1em;
            font-weight: 900;
        }

        .page-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }

        .page-emoji {
            font-size: 5em;
            margin-bottom: 15px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .page-text {
            font-size: 1.1em;
            line-height: 1.8;
            color: #444;
            max-height: 250px;
            overflow-y: auto;
        }

        .page-footer {
            margin-top: 15px;
            text-align: center;
        }

        .page-number {
            display: inline-block;
            background: rgba(108, 92, 231, 0.1);
            padding: 8px 20px;
            border-radius: 20px;
            color: #6c5ce7;
            font-weight: bold;
            font-size: 0.9em;
        }

        /* Left side pages (back of each page) */
        .page-left {
            left: 0;
            right: auto;
            transform-origin: right center;
            border-radius: 8px 2px 2px 8px;
        }

        .page-left.flipped {
            transform: rotateY(180deg);
        }

        /* Cover styling */
        .cover {
            background: linear-gradient(135deg, {{ $book->category->gradient_start ?? '#6c5ce7' }}, {{ $book->category->gradient_end ?? '#a29bfe' }});
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px 15px 15px 5px;
        }

        .cover-icon {
            font-size: 6em;
            margin-bottom: 20px;
        }

        .cover-title {
            color: white;
            font-size: 1.8em;
            font-weight: 900;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            margin-bottom: 10px;
        }

        .cover-author {
            color: rgba(255,255,255,0.9);
            font-size: 1.1em;
        }

        .cover-badge {
            background: #ffd93d;
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 15px;
        }

        /* Back cover */
        .back-cover {
            background: linear-gradient(135deg, #e8e8e0, #d4d4cc);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 15px 5px 5px 15px;
        }

        .back-cover-content {
            text-align: center;
            color: #666;
        }

        .back-cover-title {
            font-size: 1.5em;
            font-weight: 900;
            color: #333;
            margin-bottom: 15px;
        }

        .back-cover-text {
            font-size: 1em;
            line-height: 1.6;
        }

        /* Book edge (bottom pages) */
        .book-edge {
            position: absolute;
            bottom: 0;
            left: 30px;
            right: 0;
            height: 15px;
            background: repeating-linear-gradient(
                90deg,
                #f5f5f0 0px,
                #f5f5f0 2px,
                #e8e8e0 2px,
                #e8e8e0 4px
            );
            transform: rotateX(90deg);
            transform-origin: bottom center;
        }

        /* Instructions */
        .instructions {
            margin-top: 20px;
            text-align: center;
            color: #ccc;
            font-size: 1em;
        }

        .instructions span {
            background: rgba(255,255,255,0.1);
            padding: 10px 25px;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        /* Progress */
        .progress-container {
            max-width: 900px;
            width: 100%;
            margin-bottom: 15px;
        }

        .progress-bar {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            height: 8px;
            overflow: hidden;
        }

        .progress-fill {
            background: linear-gradient(90deg, #ff6b6b, #ffd93d);
            height: 100%;
            border-radius: 10px;
            transition: width 0.3s;
        }

        .progress-text {
            text-align: center;
            color: #ccc;
            font-size: 0.9em;
            margin-top: 8px;
        }

        /* Empty state */
        .empty-book {
            background: white;
            border-radius: 15px;
            padding: 80px 50px;
            text-align: center;
            max-width: 800px;
        }

        .empty-book .emoji {
            font-size: 5em;
            margin-bottom: 20px;
        }

        .empty-book h2 {
            color: #888;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .empty-book p {
            color: #aaa;
            font-size: 1.1em;
        }

        /* Audio button */
        .audio-btn {
            background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-size: 1em;
            font-weight: bold;
            margin-top: 15px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(255,107,107,0.3);
            transition: all 0.3s;
        }

        .audio-btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    {{-- Header --}}
    <div class="header">
        <a href="{{ route('ebooks.show', $book->slug) }}" class="back-btn">
            ← Kembali
        </a>
        <span class="book-title">📖 {{ $book->title }}</span>
        <div class="header-btns">
            <button class="nav-btn" onclick="prevPage()" title="Halaman Sebelumnya">◀</button>
            <button class="nav-btn" onclick="nextPage()" title="Halaman Selanjutnya">▶</button>
        </div>
    </div>

    {{-- Progress --}}
    <div class="progress-container">
        <div class="progress-bar">
            <div class="progress-fill" id="progressFill"></div>
        </div>
        <p class="progress-text" id="progressText">Halaman 1</p>
    </div>

    @if($book->chapters->count() > 0)
        {{-- Book --}}
        <div class="book-scene">
            <div class="book" id="book">
                {{-- Spine --}}
                <div class="book-spine"></div>

                {{-- Pages --}}
                <div class="pages-container" id="pagesContainer">
                    @foreach($book->chapters->sortBy('order') as $index => $chapter)
                        <div class="page @if($index % 2 == 0) page-left @endif"
                             id="page-{{ $index }}"
                             onclick="flipPage({{ $index }})"
                             data-index="{{ $index }}">
                            <div class="page-front">
                                <div class="page-header">
                                    <h2>{{ $chapter->title }}</h2>
                                </div>
                                <div class="page-content">
                                    <div class="page-emoji">{{ $book->category->icon ?? '📖' }}</div>
                                    <p class="page-text">{!! nl2br(e($chapter->content)) !!}</p>
                                </div>
                                <div class="page-footer">
                                    <span class="page-number">Halaman {{ $chapter->page_number }}</span>
                                </div>
                            </div>
                            <div class="page-back">
                                @if($index == 0)
                                    <div class="back-cover">
                                        <div class="back-cover-content">
                                            <div class="back-cover-title">📚 Perpustakaan Ebook Anak TK</div>
                                            <p class="back-cover-text">
                                                Dibuat dengan cinta untuk anak-anak Indonesia 🇮🇩
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="page-header" style="background: linear-gradient(135deg, #6c5ce7, #a29bfe);">
                                        <h2>{{ $book->chapters->sortBy('order')->values()[$index - 1]->title ?? 'Halaman Sebelumnya' }}</h2>
                                    </div>
                                    <div class="page-content">
                                        <p class="page-text">
                                            {!! nl2br(e($book->chapters->sortBy('order')->values()[$index - 1]->content ?? '')) !!}
                                        </p>
                                    </div>
                                    <div class="page-footer">
                                        <span class="page-number">Halaman {{ $book->chapters->sortBy('order')->values()[$index - 1]->page_number ?? '' }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    {{-- Last page (connects to back cover) --}}
                    <div class="page page-left" id="page-{{ $book->chapters->count() }}">
                        <div class="page-front">
                            <div class="page-header" style="background: linear-gradient(135deg, #00b894, #00a085);">
                                <h2>🎉 SELESAI!</h2>
                            </div>
                            <div class="page-content">
                                <div class="page-emoji">🌟</div>
                                <p class="page-text">
                                    Kamu sudah selesai membaca cerita ini!<br><br>
                                    Cerita seru lainnya menunggumu di perpustakaan!
                                </p>
                                <a href="{{ route('ebooks.index') }}" class="audio-btn" style="text-decoration: none;">
                                    📚 Lihat Buku Lainnya
                                </a>
                            </div>
                        </div>
                        <div class="page-back">
                            <div class="cover">
                                <div class="cover-icon">{{ $book->category->icon ?? '📖' }}</div>
                                <div class="cover-title">{{ $book->title }}</div>
                                <div class="cover-author">{{ $book->author }}</div>
                                <div class="cover-badge">✨ Ebook Anak TK</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Book edge --}}
                <div class="book-edge"></div>
            </div>
        </div>
    @else
        <div class="empty-book">
            <div class="emoji">📝</div>
            <h2>Belum Ada Halaman</h2>
            <p>Cerita sedang dalam proses pembuatan</p>
        </div>
    @endif

    <div class="instructions">
        <span>
            👆 Klik halaman untuk flip atau gunakan tombol panah
        </span>
    </div>

    <script>
        let currentPage = -1; // -1 = showing cover
        const totalPages = {{ $book->chapters->count() + 1 }}; // chapters + last page

        function updateProgress() {
            const percentage = currentPage === -1 ? 0 : ((currentPage + 1) / totalPages) * 100;
            document.getElementById('progressFill').style.width = percentage + '%';

            if (currentPage === -1) {
                document.getElementById('progressText').textContent = 'Cover';
            } else if (currentPage >= {{ $book->chapters->count() }}) {
                document.getElementById('progressText').textContent = 'Selesai! 🎉';
            } else {
                document.getElementById('progressText').textContent = 'Halaman ' + (currentPage + 1) + ' dari ' + totalPages;
            }
        }

        function flipPage(index) {
            const page = document.getElementById('page-' + index);
            if (!page) return;

            page.classList.toggle('flipped');

            if (page.classList.contains('flipped')) {
                currentPage = index;
            } else {
                currentPage = index - 1;
            }

            updateProgress();
        }

        function nextPage() {
            const nextIndex = currentPage + 1;
            if (nextIndex < totalPages) {
                const page = document.getElementById('page-' + nextIndex);
                if (page && !page.classList.contains('flipped')) {
                    page.classList.add('flipped');
                    currentPage = nextIndex;
                    updateProgress();
                }
            }
        }

        function prevPage() {
            const prevIndex = currentPage - 1;
            if (prevIndex >= -1) {
                if (currentPage >= 0) {
                    const page = document.getElementById('page-' + currentPage);
                    if (page) {
                        page.classList.remove('flipped');
                    }
                }
                currentPage = prevIndex;
                updateProgress();
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowRight' || e.key === ' ') {
                nextPage();
            } else if (e.key === 'ArrowLeft') {
                prevPage();
            }
        });

        // Initialize
        updateProgress();
    </script>
</body>
</html>
