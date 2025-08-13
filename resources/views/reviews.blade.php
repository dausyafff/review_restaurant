<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Restoran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <!-- Formulir Ulasan -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Beri Ulasan</h1>
            <form id="reviewForm" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama (opsional)</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
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
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    <p id="comment-error" class="text-red-500 text-sm mt-1 hidden">Komentar wajib diisi untuk rating di
                        bawah 3 bintang.</p>
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Kirim
                    Ulasan</button>
            </form>
        </div>

        <!-- Daftar Ulasan -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Ulasan Pelanggan</h2>
            <div id="reviewList" class="space-y-4"></div>
            <div class="mt-4">
                <p class="text-lg font-semibold">Rata-rata Rating: <span id="averageRating">0</span>/5</p>
            </div>
        </div>
    </div>
</body>

</html>
