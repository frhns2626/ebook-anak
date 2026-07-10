{{-- Sidebar Component - Colorful & Playful for Kindergarten --}}
{{-- Include: @include('components.sidebar') --}}

<style>
    /* Sidebar Base Styles */
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 280px;
        height: 100vh;
        background: linear-gradient(180deg, #6c5ce7 0%, #a29bfe 100%);
        z-index: 100;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        overflow: hidden;
        box-shadow: 5px 0 30px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: column;
    }

    .sidebar.collapsed {
        width: 80px;
    }

    .sidebar.mobile-open {
        transform: translateX(0) !important;
    }

    /* Sidebar Header */
    .sidebar-header {
        padding: 25px 20px;
        background: rgba(255,255,255,0.1);
        border-bottom: 2px solid rgba(255,255,255,0.1);
        display: flex;
        align-items: center;
        gap: 15px;
        flex-shrink: 0;
    }

    .sidebar-logo {
        font-size: 2.5em;
        flex-shrink: 0;
    }

    .sidebar-title {
        color: white;
        font-size: 1.3em;
        white-space: nowrap;
        overflow: hidden;
        opacity: 1;
        transition: opacity 0.3s;
        font-family: 'Fredoka One', cursive;
    }

    .sidebar.collapsed .sidebar-title,
    .sidebar.collapsed .sidebar-categories-title,
    .sidebar.collapsed .menu-text,
    .sidebar.collapsed .category-name,
    .sidebar.collapsed .user-details {
        opacity: 0;
        width: 0;
    }

    /* Sidebar Menu */
    .sidebar-menu {
        padding: 20px 0;
        flex-shrink: 0;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 18px 25px;
        color: white;
        text-decoration: none;
        transition: all 0.3s;
        cursor: pointer;
        gap: 15px;
        border-left: 5px solid transparent;
        font-weight: bold;
    }

    .menu-item:hover {
        background: rgba(255,255,255,0.15);
        border-left-color: #ffd93d;
    }

    .menu-item.active {
        background: rgba(255,255,255,0.2);
        border-left-color: #ff6b6b;
    }

    .menu-icon {
        font-size: 1.5em;
        flex-shrink: 0;
        width: 30px;
        text-align: center;
    }

    .menu-text {
        white-space: nowrap;
        overflow: hidden;
        opacity: 1;
        transition: opacity 0.3s;
    }

    /* Sidebar Categories */
    .sidebar-categories {
        padding: 20px 15px;
        border-top: 2px solid rgba(255,255,255,0.1);
        flex-shrink: 0;
        overflow-y: auto;
        flex: 1;
    }

    .sidebar-categories-title {
        color: rgba(255,255,255,0.6);
        font-size: 0.85em;
        font-weight: bold;
        padding: 0 10px;
        margin-bottom: 10px;
        white-space: nowrap;
        overflow: hidden;
        transition: opacity 0.3s;
    }

    .category-item {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        color: white;
        text-decoration: none;
        transition: all 0.3s;
        cursor: pointer;
        gap: 12px;
        border-radius: 12px;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .category-item:hover {
        background: rgba(255,255,255,0.15);
    }

    .category-item.active {
        background: rgba(255,255,255,0.25);
    }

    .category-icon {
        font-size: 1.2em;
        flex-shrink: 0;
    }

    .category-name {
        white-space: nowrap;
        overflow: hidden;
        opacity: 1;
        transition: opacity 0.3s;
    }

    /* Sidebar Footer / User */
    .sidebar-footer {
        padding: 20px;
        background: rgba(0,0,0,0.1);
        border-top: 2px solid rgba(255,255,255,0.1);
        flex-shrink: 0;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
    }

    .user-avatar {
        width: 45px;
        height: 45px;
        background: #ffd93d;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        flex-shrink: 0;
    }

    .user-details {
        overflow: hidden;
        opacity: 1;
        transition: opacity 0.3s;
    }

    .user-name {
        font-weight: bold;
        font-size: 1em;
    }

    .user-status {
        font-size: 0.85em;
        opacity: 0.8;
    }

    /* Sidebar Toggle Button */
    .sidebar-toggle {
        position: fixed;
        left: 280px;
        top: 25px;
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 1.5em;
        cursor: pointer;
        z-index: 101;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        box-shadow: 0 5px 20px rgba(255,107,107,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sidebar-toggle:hover {
        transform: scale(1.1);
    }

    .sidebar.collapsed ~ .sidebar-toggle,
    body.sidebar-collapsed .sidebar-toggle {
        left: 80px;
    }

    .sidebar-toggle-icon {
        transition: transform 0.3s;
    }

    body.sidebar-collapsed .sidebar-toggle-icon {
        transform: rotate(180deg);
    }

    /* Mobile Toggle */
    .mobile-toggle {
        display: none;
        position: fixed;
        top: 20px;
        left: 20px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ff6b6b, #ff9f1c);
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 1.5em;
        cursor: pointer;
        z-index: 200;
        box-shadow: 0 5px 20px rgba(255,107,107,0.4);
    }

    /* Sidebar Overlay */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 99;
    }

    .sidebar-overlay.active {
        display: block;
    }

    /* Main Content Adjuster */
    .main-with-sidebar {
        margin-left: 280px;
        transition: margin-left 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        min-height: 100vh;
    }

    body.sidebar-collapsed .main-with-sidebar {
        margin-left: 80px;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .sidebar {
            transform: translateX(-100%);
            width: 280px;
        }

        .sidebar.mobile-open {
            transform: translateX(0) !important;
        }

        .sidebar.collapsed {
            width: 280px;
        }

        .sidebar-toggle {
            display: none !important;
        }

        .mobile-toggle {
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .main-with-sidebar {
            margin-left: 0 !important;
        }

        body.sidebar-collapsed .main-with-sidebar {
            margin-left: 0;
        }
    }
</style>

{{-- Sidebar Overlay (for mobile) --}}
<div class="sidebar-overlay" onclick="closeMobileSidebar()"></div>

{{-- Sidebar --}}
<nav class="sidebar" id="mainSidebar">
    {{-- Header --}}
    <div class="sidebar-header">
        <span class="sidebar-logo">📚</span>
        <span class="sidebar-title">Ebook Anak</span>
    </div>

    {{-- Menu --}}
    <div class="sidebar-menu">
        <a href="{{ route('home') }}" class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <span class="menu-icon">🏠</span>
            <span class="menu-text">Beranda</span>
        </a>
        <a href="{{ route('ebooks.index') }}" class="menu-item {{ request()->routeIs('ebooks.index') ? 'active' : '' }}">
            <span class="menu-icon">📚</span>
            <span class="menu-text">Perpustakaan</span>
        </a>
        <a href="{{ route('games.index') }}" class="menu-item {{ request()->routeIs('games.index') ? 'active' : '' }}">
            <span class="menu-icon">🎮</span>
            <span class="menu-text">Games Edukasi</span>
        </a>
        <div class="menu-item" onclick="showToast('Fitur sedang dibangun! 🚀')">
            <span class="menu-icon">⭐</span>
            <span class="menu-text">Favorit Saya</span>
        </div>
        <div class="menu-item" onclick="showToast('Fitur sedang dibangun! 🚀')">
            <span class="menu-icon">📖</span>
            <span class="menu-text">Sedang Baca</span>
        </div>
        <div class="menu-item" onclick="showToast('Fitur sedang dibangun! 🚀')">
            <span class="menu-icon">🏆</span>
            <span class="menu-text">Pencapaian</span>
        </div>
    </div>

    {{-- Categories --}}
    <div class="sidebar-categories">
        <div class="sidebar-categories-title">🏷️ KATEGORI</div>

        <a href="{{ route('ebooks.index') }}" class="category-item">
            <span class="category-icon">📚</span>
            <span class="category-name">Semua</span>
        </a>
        <a href="{{ route('ebooks.index') }}?category=hewan" class="category-item">
            <span class="category-icon">🐰</span>
            <span class="category-name">Hewan</span>
        </a>
        <a href="{{ route('ebooks.index') }}?category=petualangan" class="category-item">
            <span class="category-icon">🚀</span>
            <span class="category-name">Petualangan</span>
        </a>
        <a href="{{ route('ebooks.index') }}?category=pengalaman" class="category-item">
            <span class="category-icon">🌈</span>
            <span class="category-name">Pengalaman</span>
        </a>
        <a href="{{ route('ebooks.index') }}?category=keluarga" class="category-item">
            <span class="category-icon">👨‍👩‍👧</span>
            <span class="category-name">Keluarga</span>
        </a>
        <a href="{{ route('ebooks.index') }}?category=lagu" class="category-item">
            <span class="category-icon">🎵</span>
            <span class="category-name">Lagu</span>
        </a>
        <a href="{{ route('ebooks.index') }}?category=dongeng" class="category-item">
            <span class="category-icon">🎭</span>
            <span class="category-name">Dongeng</span>
        </a>
    </div>

    {{-- Footer / User --}}
    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">👶</div>
            <div class="user-details">
                <div class="user-name">Anak TK</div>
                <div class="user-status">🎯 Sedang belajar!</div>
            </div>
        </div>
    </div>
</nav>

{{-- Sidebar Toggle (Desktop) --}}
<button class="sidebar-toggle" onclick="toggleSidebar()" title="Toggle Sidebar">
    <span class="sidebar-toggle-icon">◀</span>
</button>

{{-- Mobile Toggle --}}
<button class="mobile-toggle" onclick="openMobileSidebar()" title="Menu">
    ☰
</button>

<script>
    // Sidebar Toggle (Desktop)
    function toggleSidebar() {
        document.body.classList.toggle('sidebar-collapsed');
        document.getElementById('mainSidebar').classList.toggle('collapsed');
    }

    // Mobile Sidebar
    function openMobileSidebar() {
        document.getElementById('mainSidebar').classList.add('mobile-open');
        document.querySelector('.sidebar-overlay').classList.add('active');
    }

    function closeMobileSidebar() {
        document.getElementById('mainSidebar').classList.remove('mobile-open');
        document.querySelector('.sidebar-overlay').classList.remove('active');
    }

    // Simple toast notification
    function showToast(message) {
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: bold;
            box-shadow: 0 5px 20px rgba(108, 92, 231, 0.5);
            z-index: 9999;
            animation: slideUp 0.3s ease;
        `;
        toast.innerHTML = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = 'slideDown 0.3s ease forwards';
            setTimeout(() => toast.remove(), 300);
        }, 2000);
    }

    // Add animation keyframes if not exists
    if (!document.querySelector('#sidebar-animations')) {
        const style = document.createElement('style');
        style.id = 'sidebar-animations';
        style.textContent = `
            @keyframes slideUp {
                from { bottom: -50px; opacity: 0; }
                to { bottom: 30px; opacity: 1; }
            }
            @keyframes slideDown {
                from { bottom: 30px; opacity: 1; }
                to { bottom: -50px; opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    }
</script>
