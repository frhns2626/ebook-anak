@props([
    'title' => 'Default Title',
    'halaman' => 0,
    'lang' => 'id',
    'lang_on' => false,
])
{{-- resources/views/components/layout-game.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Ebook Anak TK' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600;700&display=swap"
        rel="stylesheet"
    />
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
        />
    @endif
    <style>
        body {
            font-family: "Fredoka", cursive, sans-serif;
        }

        /* Pattern background grid biru */
        .bg-grid-pattern {
            background-color: #f4f8ff;
            background-image:
                linear-gradient(to right, #b8ccf3 1px, transparent 1px),
                linear-gradient(to bottom, #b8ccf3 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Kartu putih bergelombang / rounded */
        .card-box {
            background-color: #ffffff;
            border-radius: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
{{-- md:p-8 --}}

<body class="bg-grid-pattern flex min-h-screen items-start justify-center p-4">
    {{-- border-8  rounded-xl shadow-2xl p-6 aspect-[1/1.41] sm:p-8 --}}
    <div
        class="relative flex w-full max-w-xl flex-col justify-between gap-10 overflow-auto"
    >
        {{ $slot }}
        @if ($halaman === '0')
        @else
            <div
                class="fixed bottom-4 left-1/2 z-20 flex -translate-x-1/2 gap-2"
            >
                <div
                    class="rounded-xl border-2 border-black bg-[#facc15] px-5 py-0.5 shadow-[2px_2px_0px_rgba(0,0,0,1)]"
                >
                    <span
                        class="text-xs font-extrabold tracking-wide text-nowrap text-black sm:text-sm"
                    >
                        Halaman {{ $halaman }}
                    </span>
                </div>
                @if ($lang_on)
                    <div
                        class="rounded-xl border-2 border-black bg-white px-5 py-0.5 shadow-[2px_2px_0px_rgba(0,0,0,1)]"
                    >
                        <select
                            id="langSelect"
                            class="border-0 bg-transparent text-xs font-extrabold tracking-wide text-black outline-none sm:text-sm"
                            style="
                                font-family:
                                    &quot;Fredoka&quot;, cursive, sans-serif;
                            "
                            onchange="
                                window.location.href = '?lang=' + this.value
                            "
                        >
                            <option
                                value="id"
                                {{ $lang === 'id' ? 'selected' : '' }}
                            >
                                Indonesia
                            </option>
                            <option
                                value="en"
                                {{ $lang === 'en' ? 'selected' : '' }}
                            >
                                English
                            </option>
                        </select>
                    </div>
                @endif
            </div>
        @endif
        {{-- Flash Message Overlay --}}
        <div
            id="flashOverlay"
            class="pointer-events-none fixed inset-x-0 top-4 z-50 flex -translate-y-4 justify-center px-4 opacity-0 transition-all duration-300"
        >
            <div
                id="flashBox"
                class="flex max-w-[90vw] min-w-45 items-center justify-center gap-3 rounded-2xl border-4 border-black px-6 py-3 shadow-[4px_4px_0px_rgba(0,0,0,1)]"
            >
                <span id="flashIcon" class="shrink-0 text-3xl leading-none">
                    ✅
                </span>

                <span
                    id="flashText"
                    class="text-center text-base leading-tight font-black text-white sm:text-lg"
                >
                    Benar!
                </span>
            </div>
        </div>
    </div>
    <script>
        let flashTimeout

        function playFlashSound(type) {
            const sound =
                type === "success"
                    ? "{{ asset('audio/master/benar.wav') }}"
                    : "{{ asset('audio/master/coba-lagi.wav') }}"

            const audio = new Audio(sound)

            audio.play().catch((error) => {
                console.error("[FlashMessage] Sound error:", error)
            })
        }

        function showFlashMessage(type, message, sound = false, detik = 2) {
            const overlay = document.getElementById("flashOverlay")
            const box = document.getElementById("flashBox")
            const icon = document.getElementById("flashIcon")
            const text = document.getElementById("flashText")

            if (!overlay || !box || !icon || !text) {
                console.error(
                    "[FlashMessage] ERROR: elemen flash overlay tidak ditemukan",
                )
                return
            }

            clearTimeout(flashTimeout)

            box.classList.remove("bg-green-400", "bg-red-400")

            if (type === "success") {
                box.classList.add("bg-green-400")
                icon.textContent = "✅"
                text.textContent = message || "Benar!"
            } else if (type === "salah" || type === "error") {
                box.classList.add("bg-red-400")
                icon.textContent = "❌"
                text.textContent = message || "Salah!"
            }
            if (type === "salah" || type === "error") {
                console.log("test")
                playFlashSound(type)
            } else if (sound) {
                playFlashSound(type)
            }
            overlay.classList.remove("opacity-0", "-translate-y-4")
            overlay.classList.add("opacity-100", "translate-y-0")

            flashTimeout = setTimeout(() => {
                overlay.classList.remove("opacity-100", "translate-y-0")
                overlay.classList.add("opacity-0", "-translate-y-4")
            }, detik * 1000)
        }
    </script>
    @stack('scripts')
</body>
</html>
