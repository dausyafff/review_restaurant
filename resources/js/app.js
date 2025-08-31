
// File: resources/js/app.js
document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Toggle
    const btn = document.querySelector(".mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");
    if (btn && menu) {
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    }

    // Fade Animation for Elements
    const fadeElements = document.querySelectorAll('.hero-section, .feature-card, .review-card, .menu-card');
    fadeElements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });

    // Slideshow Hero Section
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;
    if (slides.length) {
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none';
            });
        }
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        showSlide(currentSlide);
        setInterval(nextSlide, 5000); // Ganti slide setiap 5 detik
    }

    // Form Ulasan
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    const commentInput =Aircraft document.getElementById('comment');
    const commentError = document.getElementById('comment-error');
    const reviewForm = document.getElementById('reviewForm');
    const reviewList = document.getElementById('reviewList');
    const averageRating = document.getElementById('averageRating');
    const successPopup = document.getElementById('successPopup');
    const closePopup = document.getElementById('closePopup');
    const submitButton = document.getElementById('submitButton');
    const buttonText = document.getElementById('buttonText');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const discountCodeElement = document.getElementById('discountCode');

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
            if (submitButton && buttonText && loadingSpinner) {
                submitButton.disabled = true;
                buttonText.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');
            }

            const formData = new FormData(reviewForm);
            const data = {
                name: formData.get('name') || 'Pelanggan',
                rating: parseInt(formData.get('rating')),
                comment: formData.get('comment'),
            };

            if (data.rating < 3 && !data.comment.trim()) {
                commentError.classList.remove('hidden');
                if (submitButton && buttonText && loadingSpinner) {
                    submitButton.disabled = false;
                    buttonText.classList.remove('hidden');
                    loadingSpinner.classList.add('hidden');
                }
                return;
            }

            try {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 5000);
                const response = await fetch('/api/reviews', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                    signal: controller.signal,
                });
                clearTimeout(timeoutId);

                if (response.ok) {
                    const result = await response.json();
                    reviewForm.reset();
                    stars.forEach(s => s.classList.remove('active'));
                    commentError.classList.add('hidden');
                    loadReviews();
                    loadRatingChart();
                    if (successPopup) {
                        successPopup.classList.remove('hidden');
                        successPopup.classList.add('show');
                        if (discountCodeElement) {
                            discountCodeElement.textContent = result.discount_code;
                        }
                    }
                } else {
                    const errors = await response.json();
                    alert(`Error: ${errors.errors ? Object.values(errors.errors).join(', ') : 'Terjadi kesalahan'}`);
                }
            } catch (error) {
                alert('Koneksi lambat atau gagal. Coba lagi nanti.');
            } finally {
                if (submitButton && buttonText && loadingSpinner) {
                    submitButton.disabled = false;
                    buttonText.classList.remove('hidden');
                    loadingSpinner.classList.add('hidden');
                }
            }
        });

        if (closePopup && successPopup) {
            closePopup.addEventListener('click', () => {
                successPopup.classList.remove('show');
                setTimeout(() => successPopup.classList.add('hidden'), 300);
            });
        }

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

    // Form Kontak
    const contactForm = document.getElementById('contactForm');
    const submitContactButton = document.getElementById('submitContactButton');
    const contactButtonText = document.getElementById('contactButtonText');
    const contactLoadingSpinner = document.getElementById('contactLoadingSpinner');
    const contactSuccessPopup = document.getElementById('contactSuccessPopup');
    const closeContactPopup = document.getElementById('closeContactPopup');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (submitContactButton && contactButtonText && contactLoadingSpinner) {
                submitContactButton.disabled = true;
                contactButtonText.classList.add('hidden');
                contactLoadingSpinner.classList.remove('hidden');
            }

            const formData = new FormData(contactForm);
            const data = {
                name: formData.get('name'),
                email: formData.get('email'),
                message: formData.get('message'),
            };

            try {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 5000);
                const response = await fetch('/contact', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data),
                    signal: controller.signal,
                });
                clearTimeout(timeoutId);

                if (response.ok) {
                    contactForm.reset();
                    if (contactSuccessPopup) {
                        contactSuccessPopup.classList.remove('hidden');
                        contactSuccessPopup.classList.add('show');
                    }
                } else {
                    const errors = await response.json();
                    alert(`Error: ${errors.errors ? Object.values(errors.errors).join(', ') : 'Terjadi kesalahan'}`);
                }
            } catch (error) {
                alert('Koneksi lambat atau gagal. Coba lagi nanti.');
            } finally {
                if (submitContactButton && contactButtonText && contactLoadingSpinner) {
                    submitContactButton.disabled = false;
                    contactButtonText.classList.remove('hidden');
                    contactLoadingSpinner.classList.add('hidden');
                }
            }
        });

        if (closeContactPopup && contactSuccessPopup) {
            closeContactPopup.addEventListener('click', () => {
                contactSuccessPopup.classList.remove('show');
                setTimeout(() => contactSuccessPopup.classList.add('hidden'), 300);
            });
        }
    }

    // Review Preview
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