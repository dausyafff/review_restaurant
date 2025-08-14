<!-- File: resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mie Mapan Ponti - Mie dan Penyet sejak 1992</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-4">
                    <span class="text-red-600 font-bold text-2xl">MIE MAPAN</span>
                    <span class="text-gray-600">Pontianak</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <ul class="flex space-x-8">
                        <li><a href="/" class="text-red-600 font-medium">Beranda</a></li>
                        <li><a href="/menu" class="text-gray-600 hover:text-red-600">Menu</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-red-600">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-red-600">Kontak</a></li>
                    </ul>
                    <a href="/reviews" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Beri
                        Ulasan</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button outline-none">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="mobile-menu hidden md:hidden">
                <ul class="flex flex-col mt-4 space-y-2">
                    <li><a href="/" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Beranda</a></li>
                    <li><a href="/menu" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Menu</a></li>
                    <li><a href="#" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Tentang Kami</a></li>
                    <li><a href="#" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Kontak</a></li>
                    <li><a href="/reviews" class="block px-2 py-1 text-red-600 font-medium">Beri Ulasan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section bg-gradient-to-r from-white to-gray-50 py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Selamat Datang di Mie Mapan Ponti</h1>
            <p class="text-lg md:text-xl mb-8 text-gray-600">Mie dan Penyet Selera Keluarga Sejak 1992</p>
            <div class="flex justify-center">
                <img src="{{ asset('img/miemapanponti.jpeg') }}" alt="Mie Mapan"
                    class="w-full max-w-md md:max-w-lg rounded-lg shadow-lg mb-8">
            </div>
            <a href="/reviews"
                class="cta-button bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg inline-block transition duration-300">
                Beri Ulasan <i class="fas fa-chevron-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Preview Ulasan -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Apa Kata Pelanggan Kami</h2>
            <div id="reviewPreview" class="grid grid-cols-1 md:grid-cols-3 gap-6"></div>
            <div class="text-center mt-8">
                <p class="text-lg font-semibold text-gray-800">Rata-rata Rating: <span
                        id="averageRatingPreview">0</span>/5</p>
                <a href="/reviews" class="text-red-600 font-medium hover:underline">Lihat Semua Ulasan</a>
            </div>
        </div>
    </section>

    <!-- Fitur Restoran -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Mengapa Memilih Kami?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="feature-card p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-red-600 mb-4 text-3xl">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Makanan Lezat</h3>
                    <p class="text-gray-600">Hidangan dibuat dengan bahan segar dan resep terbaik untuk memanjakan lidah
                        Anda.</p>
                </div>
                <div class="feature-card p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-red-600 mb-4 text-3xl">
                        <i class="fas fa-smile"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pelayanan Ramah</h3>
                    <p class="text-gray-600">Tim kami siap memberikan pengalaman makan yang tak terlupakan.</p>
                </div>
                <div class="feature-card p-6 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-red-600 mb-4 text-3xl">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Suasana Nyaman</h3>
                    <p class="text-gray-600">Nikmati suasana santai dan hangat, cocok untuk keluarga dan teman.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA untuk Ulasan -->
    <section class="bg-red-600 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold mb-4">Bagikan Pengalaman Anda</h2>
            <p class="mb-6 text-red-100">Kami ingin mendengar pendapat Anda untuk terus meningkatkan layanan.</p>
            <a href="/reviews"
                class="cta-button bg-white text-red-600 hover:bg-gray-100 px-6 py-3 rounded-lg inline-block font-medium transition duration-300">
                Tulis Ulasan Sekarang <i class="fas fa-pencil-alt ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">MIE MAPAN PONTI</h3>
                    <p class="text-gray-400">Mie dan Penyet Selera Keluarga Sejak 1992</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Jam Buka</h3>
                    <p class="text-gray-400">Setiap Hari</p>
                    <p class="text-gray-400">09:00 - 21:00 WIB</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <p class="text-gray-400 mb-2"><i class="fas fa-map-marker-alt mr-2"></i> Pontianak, Kalimantan
                        Barat</p>
                    <p class="text-gray-400"><i class="fas fa-phone mr-2"></i> +62 812-3456-7890</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2025 Mie Mapan Ponti. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>
</body>

</html>
