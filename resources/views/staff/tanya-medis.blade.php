<x-app-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 sm:p-8 text-gray-900">
                    
                    <div class="flex items-center gap-4 border-b pb-5 mb-5">
                        <div class="bg-gradient-to-tr from-blue-600 to-indigo-600 p-3.5 rounded-2xl shadow-md text-white">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-extrabold text-gray-800">🤖 Asisten Tanya Medis 4 (AI)</h2>
                            <p class="text-xs text-gray-500 mt-0.5">Asisten virtual pendamping kesehatan yang ramah dan profesional.</p>
                        </div>
                    </div>

                    <div id="chat-box" class="h-[450px] overflow-y-auto border border-gray-100 p-5 rounded-xl bg-gray-50/50 mb-6 space-y-4">
                        <div class="flex justify-start">
                            <div class="flex gap-3 max-w-[85%]">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shrink-0 font-bold text-xs">AI</div>
                                <div class="bg-white text-gray-800 p-4 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 text-sm leading-relaxed">
                                    Halo! Ada keluhan kesehatan atau pertanyaan seputar obat apa yang ingin kamu konsultasikan hari ini?
                                </div>
                            </div>
                        </div>
                    </div>

                    <form id="form-chat" class="flex gap-3 relative">
                        @csrf
                        <input type="text" id="message-input" required placeholder="Ketik pertanyaan medis Anda di sini..." class="w-full border-gray-200 border bg-gray-50 rounded-xl px-5 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent focus:bg-white transition duration-200 shadow-inner">
                        <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-7 rounded-xl hover:opacity-95 transition font-bold text-sm shadow flex items-center justify-center gap-2">
                            <span>Kirim</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </form>
                    
                    <p class="text-xs text-gray-400 mt-4 text-center flex items-center justify-center gap-1.5">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Konsultasi AI ini hanya untuk informasi awal dan bukan diagnosis medis final.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('form-chat').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const msgInput = document.getElementById('message-input');
            const chatBox = document.getElementById('chat-box');
            const messageText = msgInput.value.trim();

            if (messageText === '') return;

            // Tampilkan pesan user ke layar (Gaya Bubble Chat Kanan)
            let userBubble = `
                <div class="flex justify-end">
                    <div class="bg-indigo-600 text-white p-4 rounded-2xl rounded-tr-none max-w-[85%] shadow-sm text-sm leading-relaxed">
                        ${escapeHtml(messageText)}
                    </div>
                </div>`;
            chatBox.innerHTML += userBubble;
            chatBox.scrollTop = chatBox.scrollHeight;

            msgInput.value = '';

            // Tampilkan indikator loading mengetik...
            let loadingBubble = `
                <div id="loading" class="flex justify-start">
                    <div class="flex gap-3 max-w-[85%]">
                        <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shrink-0 font-bold text-xs">AI</div>
                        <div class="bg-white text-gray-600 p-4 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4 animate-spin text-indigo-500" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Asisten sedang menganalisis...
                        </div>
                    </div>
                </div>`;
            chatBox.innerHTML += loadingBubble;
            chatBox.scrollTop = chatBox.scrollHeight;

            // Kirim data ke Controller Laravel (Fetch API)
            fetch("{{ route('tanya-medis.ask') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ message: messageText })
            })
            .then(response => response.json())
            .then(data => {
                // Hapus indikator loading
                document.getElementById('loading').remove();

                if (data.success) {
                    let aiBubble = `
                        <div class="flex justify-start">
                            <div class="flex gap-3 max-w-[85%]">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shrink-0 font-bold text-xs">AI</div>
                                <div class="bg-white text-gray-800 p-4 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 text-sm leading-relaxed">
                                    ${parseAiReply(data.reply)}
                                </div>
                            </div>
                        </div>`;
                    chatBox.innerHTML += aiBubble;
                } else {
                    let errBubble = `
                        <div class="flex justify-start">
                            <div class="flex gap-3 max-w-[85%]">
                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600 shrink-0 font-bold text-xs">!</div>
                                <div class="bg-red-50 text-red-800 p-4 rounded-2xl rounded-tl-none shadow-sm border border-red-100 text-sm leading-relaxed">
                                    ${data.reply}
                                </div>
                            </div>
                        </div>`;
                    chatBox.innerHTML += errBubble;
                }
                chatBox.scrollTop = chatBox.scrollHeight;
            })
            .catch(error => {
                document.getElementById('loading').remove();
                console.error("Error:", error);
                let errBubble = `
                    <div class="flex justify-start">
                        <div class="flex gap-3 max-w-[85%]">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600 shrink-0 font-bold text-xs">!</div>
                            <div class="bg-red-50 text-red-800 p-4 rounded-2xl rounded-tl-none shadow-sm border border-red-100 text-sm leading-relaxed">
                                Terjadi kendala koneksi sistem. Mohon coba beberapa saat lagi.
                            </div>
                        </div>
                    </div>`;
                chatBox.innerHTML += errBubble;
                chatBox.scrollTop = chatBox.scrollHeight;
            });
        });

        // Fungsi keamanan sederhana agar inputan tag HTML tidak merusak layout
        function escapeHtml(string) {
            return String(string).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        // Fungsi untuk mengubah enter otomatis `\n` dari AI menjadi `<br>` di HTML
        function parseAiReply(reply) {
            return reply.replace(/\n/g, '<br>');
        }
    </script>
</x-app-layout>