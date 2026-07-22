<x-layout-game>
    {{-- Floating elements --}}
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:5%;left:3%">
        <svg width="35" height="35" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#FBBF24"/>
        </svg>
    </div>
    <div class="fixed z-10 pointer-events-none animate-twinkle" style="top:8%;right:5%;animation-delay:0.5s">
        <svg width="28" height="28" viewBox="0 0 45 45" fill="none">
            <path d="M22.5 0L27.7 17.3H45L30.8 28L36 45L22.5 34.5L9 45L14.2 28L0 17.3H17.3L22.5 0Z" fill="#F472B6"/>
        </svg>
    </div>
    <main class="relative z-10 p-6 max-w-4xl mx-auto">
        {{-- Header --}}
        <div class="bg-white rounded-3xl p-6 mb-6 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-2"
                 style="background: linear-gradient(90deg, #FF6B6B, #FF9F43, #FFE66D, #4ECDC4, #6C5CE7, #FF6B6B); background-size: 200% 100%; animation: rainbow 3s linear infinite;"></div>
            <a href="{{ route('belajar.index') }}" class="absolute left-4 top-1/2 -translate-y-1/2 bg-red-100 text-red-500 px-4 py-2 rounded-full font-bold hover:bg-red-200 transition-all text-sm">←
                Kembali</a>
            <span class="text-[3rem] mb-2 block animate-bounce-subtle">🔤</span>
            <h1 class="text-[1.8rem] md:text-[2.2rem] text-gray-800 font-black mb-1">{{ $judul }}</h1>
            <p class="text-gray-500 text-[1rem]">{{ $deskripsi }}</p>
        </div>
        {{-- Game Area --}}
        <div id="gameContainer" class="space-y-8"></div>
        <div class="text-center mt-8">
            <button onclick="nextQuestion()"
                    class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-10 py-4 rounded-2xl text-xl font-bold shadow-lg hover:scale-105 transition-all">
                Soal Berikutnya →
            </button>
        </div>
    </main>
    @push('scripts')
        <script>
            const questions = @json($hurufHilang);
            const hurufs = @json($hurufs);
            let currentIndex = 0;
            let score = 0;
            let draggedEl = null;

            // Build a quick lookup: letter -> audio url
            const audioMap = {};
            hurufs.forEach(h => {
                audioMap[h.huruf] = h.audio;
            });
            console.log('[Init] audioMap built:', audioMap);

            console.log('[Init] Questions loaded:', questions.length, questions);

            function createWordDisplay(kata, hurufHilang) {
                console.log('[createWordDisplay] called with kata:', kata, 'hurufHilang:', hurufHilang);
                try {
                    const result = kata.split('').map((char, i) => {
                        if (hurufHilang.includes(i)) {
                            return `
                <span class="drop-zone inline-flex w-16 h-20 border-4 border-dashed border-orange-400 rounded-2xl mx-2 text-5xl font-black items-center justify-center text-center align-middle bg-white shadow-inner"
                      data-index="${i}"
                      ondrop="drop(event)"
                      ondragover="allowDrop(event)">
                    _
                </span>`;
                        }
                        return `<span class="inline-flex w-16 h-20 border-4 border-green-300 rounded-2xl mx-2 text-5xl font-black items-center justify-center text-center align-middle bg-green-50">${char}</span>`;
                    }).join('');
                    console.log('[createWordDisplay] success, generated HTML length:', result.length);
                    return result;
                } catch (err) {
                    console.error('[createWordDisplay] ERROR:', err);
                    return '';
                }
            }

            function generateOptions(q) {
                console.log('[generateOptions] called with question:', q);
                try {
                    const correctLetters = q.huruf_hilang.map(i => q.kata[i]);
                    console.log('[generateOptions] correctLetters:', correctLetters);

                    let options = [...new Set(correctLetters)];

                    while (options.length < 8) {
                        const random = String.fromCharCode(65 + Math.floor(Math.random() * 26));
                        if (!options.includes(random)) options.push(random);
                    }

                    options = options.sort(() => Math.random() - 0.5);
                    console.log('[generateOptions] final options (shuffled):', options);

                    let html = '';
                    options.forEach(letter => {
                        html += `
                    <div class="drag-item w-16 h-16 text-5xl font-black rounded-2xl shadow-md flex items-center justify-center cursor-grab active:cursor-grabbing bg-gradient-to-br from-pink-400 to-rose-500 text-white"
                         draggable="true"
                         ondragstart="drag(event)"
                         ondragend="dragEnd(event)">
                        ${letter}
                    </div>`;
                    });
                    console.log('[generateOptions] success, tiles generated:', options.length);
                    return html;
                } catch (err) {
                    console.error('[generateOptions] ERROR:', err);
                    return '';
                }
            }

            function renderQuestion() {
                console.log('[renderQuestion] called, currentIndex:', currentIndex);
                try {
                    const q = questions[currentIndex];
                    if (!q) {
                        console.error('[renderQuestion] ERROR: no question found at index', currentIndex);
                        return;
                    }
                    const container = document.getElementById('gameContainer');
                    if (!container) {
                        console.error('[renderQuestion] ERROR: #gameContainer not found in DOM');
                        return;
                    }

                    const html = `
                <div class="bg-white rounded-3xl p-8 shadow-xl">
                    <div class="flex justify-between mb-6">
                        <div class="px-6 py-3 bg-gradient-to-r from-blue-100 to-cyan-100 rounded-2xl font-bold text-xl flex items-center gap-3">
                            ${q.emoji} ${q.kategori.toUpperCase()}
                        </div>
                        <div class="text-right">
                            Skor: <span id="scoreDisplay" class="font-black text-4xl text-yellow-500">${score}</span>
                        </div>
                    </div>

                    <p class="text-2xl font-bold text-center mb-8 text-gray-700">${q.hint}</p>

                    <div id="wordDisplay" class="flex justify-center flex-wrap mb-12">
                        ${createWordDisplay(q.kata, q.huruf_hilang)}
                    </div>

                    <div class="text-center">
                        <p class="text-lg text-gray-600 mb-6">Seret huruf ke kotak yang kosong:</p>
                        <div id="options" class="grid grid-cols-6 gap-4 max-w-lg mx-auto">
                            ${generateOptions(q)}
                        </div>
                    </div>
                </div>
            `;

                    container.innerHTML = html;
                    console.log('[renderQuestion] success, rendered question for word:', q.kata);
                } catch (err) {
                    console.error('[renderQuestion] ERROR:', err);
                }
            }

            // Drag & Drop Functions
            function allowDrop(ev) {
                ev.preventDefault();
                // Called continuously on dragover; skip noisy logging here.
            }

            function drag(ev) {
                try {
                    draggedEl = ev.target;
                    const letter = ev.target.textContent.trim();
                    ev.dataTransfer.setData("text", letter);
                    ev.target.style.opacity = "0.5";
                    console.log('[drag] started dragging letter:', letter);

                    // Play pronunciation audio for this letter
                    const audioSrc = audioMap[letter];
                    if (audioSrc) {
                        const audio = new Audio(audioSrc);
                        audio.play()
                            .then(() => console.log('[drag] audio playing for letter:', letter, audioSrc))
                            .catch(err => console.error('[drag] audio play FAILED for letter:', letter, err));
                    } else {
                        console.warn('[drag] no audio found for letter:', letter);
                    }
                } catch (err) {
                    console.error('[drag] ERROR:', err);
                }
            }

            function dragEnd(ev) {
                try {
                    ev.target.style.opacity = "1";
                    console.log('[dragEnd] drag ended for letter:', ev.target.textContent.trim());
                } catch (err) {
                    console.error('[dragEnd] ERROR:', err);
                }
            }

            function drop(ev) {
                ev.preventDefault();
                console.log('[drop] drop event triggered');
                try {
                    const data = ev.dataTransfer.getData("text").trim();
                    const dropZone = ev.target.closest('.drop-zone');

                    if (!dropZone) {
                        console.error('[drop] ERROR: no valid .drop-zone found for this drop target');
                        return;
                    }

                    const q = questions[currentIndex];
                    const index = parseInt(dropZone.dataset.index);
                    const correctLetter = q.kata[index];

                    console.log('[drop] dropped letter:', data, '| expected letter:', correctLetter, '| index:', index);

                    if (data === correctLetter) {
                        dropZone.textContent = data;
                        dropZone.style.borderColor = "#22c55e";
                        dropZone.style.backgroundColor = "#f0fdf4";
                        dropZone.style.color = "#166534";
                        dropZone.classList.remove('border-dashed');

                        score += 20;
                        document.getElementById('scoreDisplay').textContent = score;

                        if (draggedEl) draggedEl.style.opacity = "1";

                        console.log('[drop] SUCCESS: correct letter placed, score now:', score);

                        // FIX: trim() before comparing, since unfilled zones contain
                        // whitespace/newlines around the "_" from the template literal
                        const zones = Array.from(document.querySelectorAll('.drop-zone'));
                        const allFilled = zones.every(zone => zone.textContent.trim() !== '_');
                        console.log('[drop] all blanks filled?', allFilled, '| zones:', zones.map(z => z.textContent.trim()));

                        if (allFilled) {
                            setTimeout(() => {
                                if (currentIndex < questions.length - 1) {
                                    currentIndex++;
                                    console.log('[drop] advancing to next question, index:', currentIndex);
                                    renderQuestion();
                                } else {
                                    console.log('[drop] SUCCESS: all questions completed, final score:', score);
                                    alert(`🎉 SELAMAT! Kamu menyelesaikan semua soal dengan skor ${score} poin!`);
                                }
                            }, 800);
                        }
                    } else {
                        dropZone.style.borderColor = "#ef4444";
                        if (draggedEl) draggedEl.style.opacity = "1";
                        console.warn('[drop] WRONG letter dropped:', data, 'expected:', correctLetter);
                        setTimeout(() => {
                            dropZone.style.borderColor = "#fb923c";
                        }, 400);
                    }
                } catch (err) {
                    console.error('[drop] ERROR:', err);
                }
            }

            function nextQuestion() {
                console.log('[nextQuestion] called, currentIndex:', currentIndex);
                try {
                    if (currentIndex < questions.length - 1) {
                        currentIndex++;
                        console.log('[nextQuestion] success, moving to index:', currentIndex);
                        renderQuestion();
                    } else {
                        console.log('[nextQuestion] SUCCESS: reached end of questions, resetting. Final score was:', score);
                        alert(`🎉 Game Selesai! Skor akhir: ${score}`);
                        currentIndex = 0;
                        score = 0;
                        renderQuestion();
                    }
                } catch (err) {
                    console.error('[nextQuestion] ERROR:', err);
                }
            }

            // Start the game
            console.log('[Init] Starting game...');
            renderQuestion();
        </script>
    @endpush
</x-layout-game>
