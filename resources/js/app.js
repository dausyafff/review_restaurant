import './bootstrap';

// File: resources/js/app.js
document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    const commentInput = document.getElementById('comment');
    const commentError = document.getElementById('comment-error');
    const reviewForm = document.getElementById('reviewForm');
    const reviewList = document.getElementById('reviewList');
    const averageRating = document.getElementById('averageRating');

    // Interaksi bintang
    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingInput.value = value;
            stars.forEach(s => {
                s.classList.remove('active');
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('active');
                }
            });
            commentError.classList.toggle('hidden', value >= 3);
        });
    });

    // Submit ulasan
    reviewForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(reviewForm);
        const data = {
            name: formData.get('name'),
            rating: parseInt(formData.get('rating')),
            comment: formData.get('comment'),
        };

        if (data.rating < 3 && !data.comment.trim()) {
            commentError.classList.remove('hidden');
            return;
        }

        try {
            const response = await fetch('/api/reviews', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data),
            });

            if (response.ok) {
                reviewForm.reset();
                stars.forEach(s => s.classList.remove('active'));
                loadReviews();
            } else {
                const errors = await response.json();
                alert('Error: ' + JSON.stringify(errors));
            }
        } catch (error) {
            alert('Terjadi kesalahan. Coba lagi nanti.');
        }
    });

    // Muat ulasan
    async function loadReviews() {
        try {
            const response = await fetch('/api/reviews');
            const reviews = await response.json();
            reviewList.innerHTML = '';
            let totalRating = 0;

            reviews.data.forEach(review => {
                totalRating += review.rating;
                const reviewElement = document.createElement('div');
                reviewElement.className = 'border-b pb-4';
                reviewElement.innerHTML = `
                    <p class="font-semibold">${review.name}</p>
                    <p class="text-yellow-400">${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</p>
                    <p class="text-gray-600">${review.comment}</p>
                    <p class="text-sm text-gray-400">${review.created_at}</p>
                `;
                reviewList.appendChild(reviewElement);
            });

            const avg = reviews.data.length ? (totalRating / reviews.data.length).toFixed(1) : 0;
            averageRating.textContent = avg;
        } catch (error) {
            console.error('Error loading reviews:', error);
        }
    }

    loadReviews();
});