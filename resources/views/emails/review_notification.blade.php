<!-- File: resources/views/emails/review_notification.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ulasan Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #dc2626;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            background: #f9fafb;
            padding: 20px;
        }

        .footer {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Ulasan Baru di Mie Mapan Ponti</h1>
        </div>
        <div class="content">
            <p><strong>Nama:</strong> {{ $name }}</p>
            <p><strong>Rating:</strong> {{ str_repeat('★', $rating) }}{{ str_repeat('☆', 5 - $rating) }}</p>
            <p><strong>Komentar:</strong> {{ $comment }}</p>
        </div>
        <div class="footer">
            <p>&copy; 2025 Mie Mapan Ponti. Semua hak dilindungi.</p>
        </div>
    </div>
</body>

</html>
