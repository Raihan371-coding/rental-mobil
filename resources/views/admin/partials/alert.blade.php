{{-- ===================== ALERT PARTIAL ===================== --}}
{{-- Usage: @include('admin.partials.alert') --}}

@if(session('success'))
<div id="alert-success"
    class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 shadow-sm"
    role="alert">
    <div class="flex-shrink-0 mt-0.5">
        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center">
            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold text-emerald-900">Berhasil!</p>
        <p class="mt-0.5 text-sm text-emerald-700">{{ session('success') }}</p>
    </div>
    <button onclick="document.getElementById('alert-success').remove()"
        class="flex-shrink-0 text-emerald-400 hover:text-emerald-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
@endif

@if(session('error'))
<div id="alert-error"
    class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 shadow-sm"
    role="alert">
    <div class="flex-shrink-0 mt-0.5">
        <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold text-red-900">Gagal!</p>
        <p class="mt-0.5 text-sm text-red-700">{{ session('error') }}</p>
    </div>
    <button onclick="document.getElementById('alert-error').remove()"
        class="flex-shrink-0 text-red-400 hover:text-red-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
@endif

@if($errors->any())
<div id="alert-validation"
    class="mb-6 flex items-start gap-3 rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4 shadow-sm"
    role="alert">
    <div class="flex-shrink-0 mt-0.5">
        <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center">
            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
            </svg>
        </div>
    </div>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold text-amber-900">Periksa kembali inputan Anda</p>
        <ul class="mt-1 text-sm text-amber-700 list-disc list-inside space-y-0.5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button onclick="document.getElementById('alert-validation').remove()"
        class="flex-shrink-0 text-amber-400 hover:text-amber-600 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
@endif
