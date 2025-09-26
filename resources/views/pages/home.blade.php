@extends('layouts.app')

@section('tittle', 'Home Page')

@section('content')
    <section class="hero-section relative">
        <div class="slideshow-container">
            <div class="slide fade">
                <img src="/images/slide1.jpg" alt="Mie Lezat" class="w-full h-96 object-cover">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <h2 class="text-4xl font-bold text-white">Nikmati Mie Lezat di Mie Mapan Ponti</h2>
                </div>
            </div>
            <div class="slide fade">
                <img src="/miemapanponti.jpeg" alt="Penyet Favorit" class="w-full h-96 object-cover">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <h2 class="text-4xl font-bold text-white">Coba Penyet Favorit Kami</h2>
                </div>
            </div>
            <div class="slide fade">
                <img src="/images/slide3.jpg" alt="Minuman Segar" class="w-full h-96 object-cover">
                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <h2 class="text-4xl font-bold text-white">Segarkan Hari Anda dengan Minuman Kami</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Ulasan Pelanggan</h2>
            <div id="reviewPreview" class="space-y-4"></div>
            <div class="mt-4 text-center">
                <p class="text-lg font-semibold">Rata-rata Rating: <span id="averageRatingPreview">0</span>/5</p>
                <a href="/reviews" class="cta-button mt-4 inline-block">Beri Ulasan</a>
            </div>
        </div>
    </section>
@endsection
