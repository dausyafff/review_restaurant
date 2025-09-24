<!-- File: resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mie Mapan Ponti</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <span class="text-red-600 font-bold text-2xl">MIE MAPAN</span>
                    <span class="text-gray-600">Ponti</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <ul class="flex space-x-8">
                        <li><a href="/" class="nav-link text-red-600 font-medium">Beranda</a></li>
                        <li class="dropdown relative">
                            <a href="/menu" class="nav-link text-gray-600 hover:text-red-600">Menu <i
                                    class="fas fa-chevron-down ml-1"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="/menu#mie" class="dropdown-item">Mie</a></li>
                                <li><a href="/menu#penyet" class="dropdown-item">Penyet</a></li>
                                <li><a href="/menu#minuman" class="dropdown-item">Minuman</a></li>
                            </ul>
                        </li>
                        <li><a href="/about" class="nav-link text-gray-600 hover:text-red-600">Tentang Kami</a></li>
                        <li><a href="/contact" class="nav-link text-gray-600 hover:text-red-600">Kontak</a></li>
                    </ul>
                    <a href="/reviews" class="cta-button">Beri Ulasan</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button outline-none">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mobile-menu hidden md:hidden">
                <ul class="flex flex-col mt-4 space-y-2">
                    <li><a href="/" class="block px-2 py-1 text-red-600 font-medium">Beranda</a></li>
                    <li>
                        <a href="/menu" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Menu</a>
                        <ul class="pl-4 space-y-1">
                            <li><a href="/menu#mie" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Mie</a></li>
                            <li><a href="/menu#penyet"
                                    class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Penyet</a></li>
                            <li><a href="/menu#minuman"
                                    class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Minuman</a></li>
                        </ul>
                    </li>
                    <li><a href="/about" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Tentang Kami</a></li>
                    <li><a href="/contact" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Kontak</a></li>
                    <li><a href="/reviews" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Beri Ulasan</a></li>
                </ul>
            </div>
        </div>
    </nav>

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
</body>

</html>
