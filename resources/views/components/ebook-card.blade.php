{{-- Ebook Card Component - Duolingo Style for Kindergarten Children --}}

@props([
    'title' => 'Judul Buku',
    'author' => 'Penulis',
    'cover' => null,
    'category' => null,
    'ageRange' => '3-8 tahun',
    'slug' => '#',
    'gradientStart' => '#a78bfa',
    'gradientEnd' => '#6c5ce7',
    'icon' => '📚'
])

<div class="book-card" onclick="goToBook('{{ $slug }}')">
    <a href="{{ route('ebooks.show', $slug) }}" class="block">
        {{-- Cover Image Container --}}
        @if($cover)
            <img src="{{ asset('storage/covers/' . $cover) }}"
                 alt="{{ $title }}"
                 class="book-cover">
        @else
            <div class="cover-placeholder" style="background: linear-gradient(135deg, {{ $gradientStart }}, {{ $gradientEnd }});">
                <span style="font-size: 4em; z-index: 1;">{{ $icon }}</span>
            </div>
        @endif

        {{-- Content --}}
        <div class="book-content">
            <div style="min-height: 45px;">
                <span class="badge badge-category">{{ $icon }} {{ $category }}</span>
                <span class="badge badge-age">👶 {{ $ageRange }}</span>
            </div>

            <h3 class="book-title">{{ $title }}</h3>
            <p class="book-author">✍️ {{ $author }}</p>

            <button class="read-btn" onclick="event.stopPropagation(); event.preventDefault(); window.location.href='{{ route('ebooks.show', $slug) }}'">
                🔊 Baca Sekarang!
            </button>
        </div>
    </a>
</div>

<style>
    .book-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        cursor: pointer;
        border: 6px solid #fff;
    }

    .book-card:hover {
        transform: translateY(-15px) scale(1.08) rotate(2deg);
        box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    }

    .book-cover {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .book-card:hover .book-cover {
        transform: scale(1.1);
    }

    .cover-placeholder {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .cover-placeholder::before {
        content: '';
        position: absolute;
        top: 10px;
        left: 10px;
        width: 30px;
        height: 30px;
        background: rgba(255,255,255,0.4);
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    .cover-placeholder::after {
        content: '';
        position: absolute;
        bottom: 15px;
        right: 15px;
        width: 20px;
        height: 20px;
        background: rgba(255,255,255,0.3);
        border-radius: 50%;
        animation: bounce 1.5s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.4; }
        50% { transform: scale(1.3); opacity: 0.8; }
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .book-content {
        padding: 18px;
        text-align: center;
        background: linear-gradient(to bottom, #fff, #f8f9fa);
    }

    .badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.85em;
        font-weight: bold;
    }

    .badge-category {
        background: linear-gradient(135deg, #6c5ce7, #a29bfe);
        color: white;
    }

    .badge-age {
        background: #ffeaa7;
        color: #d63031;
    }

    .book-title {
        font-size: 1.3em;
        font-weight: bold;
        margin: 10px 0;
        color: #333;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .book-author {
        font-size: 0.95em;
        color: #888;
        margin-bottom: 12px;
    }

    .read-btn {
        background: linear-gradient(#45b7d1, #2a8ba8);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        cursor: pointer;
        font-size: 1em;
        font-weight: bold;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: all 0.3s;
        margin-top: 10px;
    }

    .read-btn:hover {
        transform: scale(1.1);
    }

    .book-card a {
        text-decoration: none;
        color: inherit;
    }
</style>

<script>
    function goToBook(slug) {
        window.location.href = '/ebooks/' + slug;
    }
</script>
