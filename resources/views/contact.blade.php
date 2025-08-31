<!-- File: resources/views/contact.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Mie Mapan Ponti</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
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
                        <li><a href="/about" class="nav-link text-gray-600 hover:text-red-600">Tentang Kami</a></li>
                        <li><a href="/contact" class="nav-link text-red-600 font-medium">Kontak</a></li>
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
                    <li><a href="/about" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Tentang Kami</a></li>
                    <li><a href="/contact" class="block px-2 py-1 text-red-600 font-medium">Kontak</a></li>
                    <li><a href="/reviews" class="block px-2 py-1 text-gray-600 hover:bg-gray-100">Beri Ulasan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="py-12">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-2xl font-bold mb-4 text-gray-800">Hubungi Kami</h1>
                <form id="contactForm" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                            placeholder="Masukkan nama Anda">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                            placeholder="Masukkan email Anda">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea id="message" name="message" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                            placeholder="Tulis pesan Anda"></textarea>
                    </div>
                    <button type="submit" id="submitContactButton" class="cta-button">
                        <span id="contactButtonText">Kirim Pesan</span>
                        <span id="contactLoadingSpinner" class="hidden animate-spin h-5 w-5 mr-2 inline-block">
                            <svg class="text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 12a8 8 0 0116 0" />
                            </svg>
                        </span>
                    </button>
                </form>
                <div id="contactSuccessPopup"
                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white rounded-lg p-6 max-w-sm w-full text-center shadow-lg">
                        <div class="text-4xl mb-4">📧</div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Pesan Terkirim!</h2>
                        <p class="text-gray-600 mb-6">Terima kasih telah menghubungi Mie Mapan Ponti!</p>
                        <button id="closeContactPopup" class="cta-button bg-red-600 text-white">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
