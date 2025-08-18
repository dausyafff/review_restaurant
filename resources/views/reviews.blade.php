<!-- File: resources/views/reviews.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Restoran - Mie Mapan Ponti</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <span class="text-red-600 font-bold text-2xl">MIE MAPAN</span>
                    <span class="text-gray-600">Pontianak</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <ul class="flex space-x-8">
                        <li><a href="/" class="nav-link text-gray-600 hover:text-red-600">Beranda</a></li>
                        <li class="dropdown relative">
                            <a href="/menu" class="nav-link text-gray-600 hover:text-red-600">Menu <i
                                    class="fas fa-chevron-down ml-1"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="/menu#mie" class="dropdown-item">Mie</a></li>
                                <li><a href="/menu#penyet" class="dropdown-item">Penyet</a></li>
                                <li><a href="/menu#minuman" class="dropdown-item">Minuman</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="nav-link text-gray-600 hover:text-red-600">Tentang Kami</a></li>
                        <li><a href="#" class="nav-link text-gray-600 hover:text-red-600">Kontak</a></li>
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
                        <a href="/menu" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Menu</a>
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

    <!-- Formulir Ulasan -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h1 class="text-2xl font-bold mb-4 text-gray-800">Beri Ulasan</h1>
                <form id="reviewForm" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama (opsional)</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Rating</label>
                        <div class="star-rating flex space-x-1 mt-1">
                            <span class="star text-2xl" data-value="1">★</span>
                            <span class="star text-2xl" data-value="2">★</span>
                            <span class="star text-2xl" data-value="3">★</span>
                            <span class="star text-2xl" data-value="4">★</span>
                            <span class="star text-2xl" data-value="5">★</span>
                        </div>
                        <input type="hidden" id="rating" name="rating">
                    </div>
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Komentar</label>
                        <textarea id="comment" name="comment" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
                        <p id="comment-error" class="text-red-500 text-sm mt-1 hidden">Komentar wajib diisi untuk rating
                            di bawah 3 bintang.</p>
                    </div>
                    <button type="submit" class="cta-button">Kirim Ulasan</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Grafik Distribusi Rating -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Distribusi Rating</h2>
            <div class="bg-white rounded-lg shadow-lg p-6">
                <canvas id="ratingChart" class="max-w-lg mx-auto"></canvas>
            </div>
        </div>
    </section>

    <!-- Daftar Ulasan -->
    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-800">Ulasan Pelanggan</h2>
                <div id="reviewList" class="space-y-4"></div>
                <div class="mt-4">
                    <p class="text-lg font-semibold">Rata-rata Rating: <span id="averageRating">0</span>/5</p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
