
// File: resources/js/app.js
document.addEventListener('DOMContentLoaded', () => {
    // Toggle menu mobile
    const btn = document.querySelector(".mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");
    if (btn && menu) {
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    }

    // Animasi fade-in untuk elemen dengan kelas tertentu
    const fadeElements = document.querySelectorAll('.hero-section, .feature-card, .review-card, .menu-card');
    fadeElements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });

    // Fungsi untuk halaman ulasan
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    const commentInput = document.getElementById('comment');
    const commentError = document.getElementById('comment-error');
    const reviewForm = document.getElementById('reviewForm');
    const reviewList = document.getElementById('reviewList');
    const averageRating = document.getElementById('averageRating');

    if (stars.length && reviewForm) {
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
                    loadRatingChart();
                } else {
                    const errors = await response.json();
                    alert('Error: ' + JSON.stringify(errors));
                }
            } catch (error) {
                alert('Terjadi kesalahan. Coba lagi nanti.');
            }
        });

        async function loadReviews() {
            try {
                const response = await fetch('/api/reviews');
                const reviews = await response.json();
                reviewList.innerHTML = '';
                let totalRating = 0;

                reviews.data.forEach(review => {
                    totalRating += review.rating;
                    const reviewElement = document.createElement('div');
                    reviewElement.className = 'review-card';
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

        async function loadRatingChart() {
            try {
                const response = await fetch('/api/reviews');
                const reviews = await response.json();
                const ratingCounts = [0, 0, 0, 0, 0];
                reviews.data.forEach(review => {
                    ratingCounts[review.rating - 1]++;
                });

                const ctx = document.getElementById('ratingChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['1★', '2★', '3★', '4★', '5★'],
                        datasets: [{
                            label: 'Jumlah Ulasan',
                            data: ratingCounts,
                            backgroundColor: '#facc15',
                            borderColor: '#eab308',
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            y: { beginAtZero: true, title: { display: true, text: 'Jumlah Ulasan' } },
                            x: { title: { display: true, text: 'Rating' } }
                        },
                        plugins: { legend: { display: false } }
                    }
                });
            } catch (error) {
                console.error('Error loading chart:', error);
            }
        }

        loadReviews();
        if (document.getElementById('ratingChart')) {
            loadRatingChart();
        }
    }

    // Fungsi untuk preview ulasan di landing page
    const reviewPreview = document.getElementById('reviewPreview');
    const averageRatingPreview = document.getElementById('averageRatingPreview');
    if (reviewPreview && averageRatingPreview) {
        async function loadReviewPreview() {
            try {
                const response = await fetch('/api/reviews');
                const reviews = await response.json();
                reviewPreview.innerHTML = '';
                let totalRating = 0;
                const maxReviews = 3;

                reviews.data.slice(0, maxReviews).forEach(review => {
                    totalRating += review.rating;
                    const reviewElement = document.createElement('div');
                    reviewElement.className = 'review-card';
                    reviewElement.innerHTML = `
                        <p class="font-semibold">${review.name}</p>
                        <p class="text-yellow-400">${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</p>
                        <p class="text-gray-600">${review.comment}</p>
                        <p class="text-sm text-gray-400">${review.created_at}</p>
                    `;
                    reviewPreview.appendChild(reviewElement);
                });

                const avg = reviews.data.length ? (totalRating / reviews.data.length).toFixed(1) : 0;
                averageRatingPreview.textContent = avg;
            } catch (error) {
                console.error('Error loading review preview:', error);
            }
        }

        loadReviewPreview();
    }
});