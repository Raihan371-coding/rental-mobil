@extends('layouts.landing')

@section('title', 'Rental Mobil - Home')

@section('content')

    {{-- Hero Section --}}
    @include('components.hero')


    {{-- Stats Section --}}
    @include('components.stats')

    {{-- How It Works Section --}}
    @include('components.how-it-works')

    {{-- Promo Section --}}
    @include('components.promo')

    {{-- Cars Section --}}
    @include('components.cars')

    {{-- Testimonials Section --}}
    @include('components.testimonials')

    {{-- Call to Action Section --}}
    @include('components.cta')
@endsection
