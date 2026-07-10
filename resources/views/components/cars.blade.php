@php

$cars = [

[
'name'=>'Toyota Fortuner',
'image'=>'fortuner.jpg',
'type'=>'SUV',
'seat'=>'7 Seat',
'price'=>'1.200.000',
'transmission'=>'Automatic',
],

[
'name'=>'Honda Civic',
'image'=>'civic.jpg',
'type'=>'Sedan',
'seat'=>'5 Seat',
'price'=>'900.000',
'transmission'=>'Automatic',
],

[
'name'=>'Mitsubishi Pajero',
'image'=>'pajero.jpg',
'type'=>'SUV',
'seat'=>'7 Seat',
'price'=>'1.300.000',
'transmission'=>'Automatic',
],

];

@endphp

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold text-slate-800">

                Pilihan Terpopuler

            </h2>

            <p class="text-gray-500 mt-4">

                Kendaraan favorit pelanggan kami.

            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($cars as $car)

            <div
                class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-300">

                <div class="overflow-hidden">

                    <img
                        src="{{ asset('images/'.$car['image']) }}"
                        class="w-full h-56 object-cover hover:scale-105 transition duration-500">

                </div>

                <div class="p-6">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-bold text-xl">

                                {{ $car['name'] }}

                            </h3>

                            <p class="text-gray-500 mt-2">

                                {{ $car['type'] }}

                            </p>

                        </div>

                        <div class="text-right">

                            <h3
                                class="text-sky-800 text-2xl font-bold">

                                Rp {{ $car['price'] }}

                            </h3>

                            <span
                                class="text-gray-400 text-sm">

                                /hari

                            </span>

                        </div>

                    </div>

                    <div
                        class="flex gap-4 mt-6 text-sm text-gray-500">

                        <span>

                            🚗 {{ $car['transmission'] }}

                        </span>

                        <span>

                            👤 {{ $car['seat'] }}

                        </span>

                    </div>

                    <button
                        class="w-full mt-8 bg-sky-900 hover:bg-sky-950 text-white py-3 rounded-xl">

                        Booking Sekarang

                    </button>

                </div>

            </div>

            @endforeach

        </div>

        <div class="text-center mt-16">

            <button
                class="bg-orange-400 hover:bg-orange-500 text-white px-10 py-4 rounded-xl">

                Lihat Semua Mobil

            </button>

        </div>

    </div>

</section>
