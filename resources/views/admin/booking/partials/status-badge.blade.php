@php
    $s = strtolower($status);
@endphp

@if (str_contains($s, 'menunggu'))
    <span
        class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Menunggu
    </span>
@elseif(str_contains($s, 'terkonfirmasi') || str_contains($s, 'konfirmasi'))
    <span
        class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Terkonfirmasi
    </span>
@elseif(str_contains($s, 'tolak') || str_contains($s, 'ditolak'))
    <span class="inline-flex items-center gap-1 rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-700">
        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Ditolak
    </span>
@else
    <span
        class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">
        {{ ucfirst($status) }}
    </span>
@endif
