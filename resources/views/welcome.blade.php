@extends('layouts.landing')

@section('title', 'Rental Mobil - Home')

@section('content')
{{-- Hero Section --}}
	<section class="bg-white">
		<div class="max-w-7xl mx-auto px-4 py-20 sm:px-6 lg:px-8 text-center">
			<h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900">Sewa Mobil Mudah dan Cepat</h1>
			<p class="mt-4 text-lg text-gray-600">Pilihan mobil lengkap, harga bersaing, dan layanan pengantaran.</p>
			<div class="mt-8 flex justify-center gap-4">
				<a href="{{ route('register') }}" class="px-6 py-3 bg-blue-600 text-white rounded-md font-medium hover:bg-blue-700">Daftar Sekarang</a>
				<a href="#fleet" class="px-6 py-3 border border-gray-200 rounded-md text-gray-700 hover:bg-gray-50">Lihat Armada</a>
			</div>
		</div>
	</section>

	{{-- Features Section --}}
	<section id="features" class="bg-gray-50">
		<div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
			<h2 class="text-2xl font-semibold text-gray-900">Kenapa Memilih Kami</h2>
			<div class="mt-8 grid gap-8 grid-cols-1 md:grid-cols-3">
				<div class="p-6 bg-white rounded-lg shadow">
					<h3 class="font-semibold">Armada Terawat</h3>
					<p class="mt-2 text-sm text-gray-600">Mobil terawat dan siap pakai untuk perjalanan Anda.</p>
				</div>
				<div class="p-6 bg-white rounded-lg shadow">
					<h3 class="font-semibold">Harga Transparan</h3>
					<p class="mt-2 text-sm text-gray-600">Biaya jelas tanpa biaya tersembunyi.</p>
				</div>
				<div class="p-6 bg-white rounded-lg shadow">
					<h3 class="font-semibold">Proses Cepat</h3>
					<p class="mt-2 text-sm text-gray-600">Booking mudah dan konfirmasi cepat.</p>
				</div>
			</div>
		</div>
	</section>

	{{-- Fleet Section --}}
	<section id="fleet" class="bg-white">
		<div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
			<h2 class="text-2xl font-semibold text-gray-900">Armada Kami</h2>
			<p class="mt-2 text-sm text-gray-600">Contoh armada yang sering disewa pelanggan.</p>
			<div class="mt-8 grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
				<div class="bg-gray-50 p-6 rounded-lg">
					<div class="h-40 bg-gray-200 rounded-md"></div>
					<h3 class="mt-4 font-semibold">Toyota Avanza</h3>
					<p class="text-sm text-gray-600">5 seats — cocok untuk keluarga.</p>
				</div>
				<div class="bg-gray-50 p-6 rounded-lg">
					<div class="h-40 bg-gray-200 rounded-md"></div>
					<h3 class="mt-4 font-semibold">Honda BR-V</h3>
					<p class="text-sm text-gray-600">7 seats — nyaman dan luas.</p>
				</div>
				<div class="bg-gray-50 p-6 rounded-lg">
					<div class="h-40 bg-gray-200 rounded-md"></div>
					<h3 class="mt-4 font-semibold">Toyota Innova</h3>
					<p class="text-sm text-gray-600">Executive class for business trips.</p>
				</div>
			</div>
		</div>
	</section>

	{{-- Pricing Section --}}
	<section id="pricing" class="bg-gray-50">
		<div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 text-center">
			<h2 class="text-2xl font-semibold text-gray-900">Paket Harga</h2>
			<p class="mt-2 text-sm text-gray-600">Pilih paket sesuai kebutuhan perjalanan Anda.</p>
			<div class="mt-8 grid gap-6 grid-cols-1 md:grid-cols-3">
				<div class="p-6 bg-white rounded-lg shadow">
					<h3 class="font-semibold">Harian</h3>
					<p class="mt-2 text-3xl font-bold">Rp 300.000</p>
				</div>
				<div class="p-6 bg-white rounded-lg shadow">
					<h3 class="font-semibold">Mingguan</h3>
					<p class="mt-2 text-3xl font-bold">Rp 1.800.000</p>
				</div>
				<div class="p-6 bg-white rounded-lg shadow">
					<h3 class="font-semibold">Bulanan</h3>
					<p class="mt-2 text-3xl font-bold">Kontak kami</p>
				</div>
			</div>
		</div>
	</section>

@endsection

