<html>
    <style>
        html,
        body {
            overflow-x: hidden;
        }

        #book {
            overflow: hidden;
        }

        .book-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
            padding: 2px;
            width: 100%;
            box-sizing: border-box;
        }

        #book {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
            width: 100%;
            max-width: 900px;
            /* cap how wide it gets on huge screens */
        }

        .page {
            background: #fffdf7;
            border: 1px solid #e8d9b5;
            box-sizing: border-box;
            overflow: hidden;
            position: relative;
            padding: 20px;
        }

        .page iframe {
            width: 100%;
            height: 100%;
            border: none;
            pointer-events: none;
        }

        .book-nav {
            display: flex;
            gap: 12px;
        }

        .book-nav button {
            background: #90be6d;
            border: none;
            color: white;
            font-size: 20px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 3px 0 #6a9c4b;
        }

        .book-nav button:active {
            transform: translateY(2px);
            box-shadow: none;
        }
    </style>
    <body>
        <div class="book-wrap overflow-hidden">
            <div id="book">
                <div class="page" style="padding: 10px">
                    <iframe
                        data-src="{{ route('pertama.cover') }}"
                        data-loaded="0"
                    ></iframe>
                </div>
                <div class="page" style="padding: 10px">
                    <iframe
                        data-src="{{ route('pertama.kata-pengantar') }}"
                        data-loaded="0"
                    ></iframe>
                </div>
                <div class="page" style="padding: 10px">
                    <iframe
                        data-src="{{ route('pertama.petujuk-penggunaan') }}"
                        data-loaded="0"
                    ></iframe>
                </div>
                @for ($i = 1; $i <= 33; $i++)
                    <div class="page" style="padding: 10px">
                        <iframe
                            data-src="{{ route('belajar.halaman-' . $i) }}"
                            data-loaded="0"
                        ></iframe>
                    </div>
                @endfor
                <div class="page" style="padding: 10px">
                    <iframe
                        data-src="{{ route('belajar.penutupan') }}"
                        data-loaded="0"
                    ></iframe>
                </div>
                <div class="page" style="padding: 10px">
                    <iframe
                        data-src="{{ route('belajar.penutupan-blank') }}"
                        data-loaded="0"
                    ></iframe>
                </div>
            </div>
            <div class="book-nav">
                <button id="prevBtn">‹</button>
                <button id="nextBtn">›</button>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.min.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/src/Style/stPageFlip.min.css"
            rel="stylesheet"
        />
        <script>
            // --- size presets ---
            // Desktop (original): width 400, height 550
            // Tablet (current, smaller height so it fits without excess scroll): width 400, height 420
            // To go back to desktop size: change `height: 420` below to `height: 550`
            // To make it even shorter (e.g. small tablets in landscape): try `height: 360`

            const pageFlip = new St.PageFlip(document.getElementById("book"), {
                size: "stretch",

                width: 500,
                height: 650,

                minWidth: 280,
                maxWidth: 500,

                minHeight: 364,
                maxHeight: 650,

                showCover: false,
                maxShadowOpacity: 0.5,
                mobileScrollSupport: true,
            })
            pageFlip.loadFromHTML(document.querySelectorAll(".page"))

            // window.addEventListener('resize', () => {
            //     pageFlip.update();
            // });
            function loadPage(index) {
                const pages = document.querySelectorAll("#book .page iframe")
                const iframe = pages[index]
                if (iframe && iframe.dataset.loaded === "0") {
                    iframe.src = iframe.dataset.src
                    iframe.dataset.loaded = "1"
                }
            }

            function loadSpread(spreadIndex) {
                const first = spreadIndex * 2
                loadPage(first)
                loadPage(first + 1)
            }

            function loadAroundSpread(spreadIndex) {
                loadSpread(spreadIndex - 1)
                loadSpread(spreadIndex)
                loadSpread(spreadIndex + 1)
            }

            loadAroundSpread(0)

            pageFlip.on("flip", (e) => {
                const spreadIndex = Math.floor(e.data / 2)
                loadAroundSpread(spreadIndex)
            })

            pageFlip.on("changeState", (e) => {
                const iframes = document.querySelectorAll("#book .page iframe")
                if (e.data === "flipping" || e.data === "user_fold") {
                    iframes.forEach((f) => (f.style.pointerEvents = "none"))
                } else if (e.data === "read") {
                    iframes.forEach((f) => (f.style.pointerEvents = "auto"))
                }
            })

            document
                .getElementById("prevBtn")
                .addEventListener("click", () => pageFlip.flipPrev())
            document
                .getElementById("nextBtn")
                .addEventListener("click", () => pageFlip.flipNext())
        </script>
    </body>
</html>
