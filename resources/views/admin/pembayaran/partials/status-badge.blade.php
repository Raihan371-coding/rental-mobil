@if ($status == 'belum_bayar')
    <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Belum Bayar
    </span>
@elseif($status == 'menunggu_verifikasi')
    <span
        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Menunggu Verifikasi
    </span>
@elseif($status == 'lunas')
    <span
        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Lunas
    </span>
@elseif($status == 'ditolak')
    <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Ditolak
    </span>
@endif
