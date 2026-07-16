@if (session('show_tutorial'))
    <div x-data="{ open: true }" x-show="open" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
        <div @keydown.escape.window="open = false" x-show="open" x-transition.opacity
            class="w-full max-w-3xl overflow-hidden rounded-[2rem] bg-white p-6 shadow-2xl ring-1 ring-slate-900/10 dark:bg-slate-950 dark:ring-slate-800">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-sky-600">Tur Baru</p>
                    <h2 class="mt-3 text-2xl font-bold text-slate-900 dark:text-slate-100">Selamat datang di portal
                        customer</h2>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600 dark:text-slate-300">
                        Ini panduan singkat untuk membantu kamu menggunakan dashboard customer pertama kali.
                    </p>
                </div>
                <button type="button" @click="open = false"
                    class="rounded-full border border-slate-200 bg-white text-slate-700 transition hover:bg-slate-50 px-4 py-2 text-sm font-medium dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-800">
                    Lewati
                </button>
            </div>

            <div class="mt-6 space-y-5">
                <div
                    class="rounded-3xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-900">
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">1. Menu Layanan</p>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Gunakan kotak menu di bawah untuk
                        langsung menuju bagian penting seperti Katalog Mobil, Booking, Rental, Pembayaran, dan Denda.
                    </p>
                </div>

                <div
                    class="rounded-3xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-900">
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">2. Lihat status pesanan</p>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Klik Booking Saya untuk melihat
                        permintaan bookingmu. Di Rental dan Pengembalian, kamu bisa melacak status kendaraan yang sedang
                        disewa atau dikembalikan.</p>
                </div>

                <div
                    class="rounded-3xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-900">
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">3. Kelola pembayaran</p>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Halaman Pembayaran menampilkan tagihan
                        dan status bukti pembayaran. Upload bukti pembayaran langsung dari sana.</p>
                </div>

                <div
                    class="rounded-3xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-700 dark:bg-slate-900">
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">4. Profil & info kontak</p>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Jangan lupa lengkapi profilmu di Profil
                        Saya agar data penyewaan selalu up to date.</p>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="button" @click="open = false"
                    class="inline-flex items-center justify-center rounded-full bg-sky-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-sky-500/20 transition hover:bg-sky-700">
                    Mulai
                </button>
            </div>
        </div>
    </div>
@endif
