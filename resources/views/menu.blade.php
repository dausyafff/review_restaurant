<!-- File: resources/views/menu.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Mie Mapan Ponti</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <span class="text-red-600 font-bold text-2xl">MIE MAPAN</span>
                    <span class="text-gray-600">Ponti</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <ul class="flex space-x-8">
                        <li><a href="/" class="nav-link text-gray-600 hover:text-red-600">Beranda</a></li>
                        <li class="dropdown relative">
                            <a href="/menu" class="nav-link text-red-600 font-medium">Menu <i
                                    class="fas fa-chevron-down ml-1"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="/menu#mie" class="dropdown-item">Mie</a></li>
                                <li><a href="/menu#penyet" class="dropdown-item">Penyet</a></li>
                                <li><a href="/menu#minuman" class="dropdown-item">Minuman</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="nav-link text-gray-600 hover:text-red-600">Tentang Kami</a></li>
                        <li><a href="/about" class="nav-link text-gray-600 hover:text-red-600">Kontak</a></li>
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
                    <li><a href="/" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Beranda</a></li>
                    <li>
                        <a href="/menu" class="block px-2 py-1 text-red-600 font-medium">Menu</a>
                        <ul class="pl-4 space-y-1">
                            <li><a href="/menu#mie" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Mie</a></li>
                            <li><a href="/menu#penyet"
                                    class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Penyet</a></li>
                            <li><a href="/menu#minuman"
                                    class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Minuman</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Tentang Kami</a></li>
                    <li><a href="#" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Kontak</a></li>
                    <li><a href="/reviews" class="block px-2 py-1 text-red-600 font-medium">Beri Ulasan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Daftar Menu -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-8 text-center">Menu Mie Mapan Ponti</h1>
            <div id="mie" class="mb-12">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Mie</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="menu-card">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Mie Ayam</h3>
                        <p class="text-gray-600 mb-4">Mie kenyal dengan topping ayam kecap dan kuah kaldu lezat.</p>
                        <p class="text-red-600 font-bold">Rp 25.000</p>
                    </div>
                    <div class="menu-card">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Mie Pangsit</h3>
                        <p class="text-gray-600 mb-4">Mie dengan pangsit goreng renyah dan kuah hangat.</p>
                        <p class="text-red-600 font-bold">Rp 28.000</p>
                    </div>
                </div>
            </div>
            <div id="penyet" class="mb-12">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Penyet</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="menu-card">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Ayam Penyet</h3>
                        <p class="text-gray-600 mb-4">Ayam goreng crispy dengan sambal pedas khas.</p>
                        <p class="text-red-600 font-bold">Rp 30.000</p>
                    </div>
                    <div class="menu-card">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Ikan Penyet</h3>
                        <p class="text-gray-600 mb-4">Ikan goreng dengan sambal terasi yang menggugah selera.</p>
                        <p class="text-red-600 font-bold">Rp 35.000</p>
                    </div>
                </div>
            </div>
            <div id="minuman">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Minuman</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="menu-card">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Es Teh Manis</h3>
                        <p class="text-gray-600 mb-4">Teh manis dingin yang menyegarkan.</p>
                        <p class="text-red-600 font-bold">Rp 10.000</p>
                    </div>
                    <div class="menu-card">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Jus Jeruk</h3>
                        <p class="text-gray-600 mb-4">Jus jeruk segar tanpa gula tambahan.</p>
                        <p class="text-red-600 font-bold">Rp 15.000</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="/reviews" class="cta-button">Beri Ulasan</a>
            </div>
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
