document.getElementById('review-form').addEventListener('submit', function(event) {
    console.log('Form submitted'); // Log untuk debugging
    event.preventDefault();
    
    const formData = new FormData(this);
    console.log('FormData:', formData); // Log data form
    
    fetch('/add-review', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.message) {
            alert(data.message);
            loadReviews(); 
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        alert('Terjadi kesalahan saat mengirim review. Silakan coba lagi.');
    });
});

function calculateAverageRating(reviews) {
    if (reviews.length === 0) return 0;
    let totalRating = reviews.reduce((sum, review) => sum + review.rating, 0);
    return (totalRating / reviews.length).toFixed(1);
}

function loadReviews() {
    fetch(`/reviews/${document.querySelector('input[name="id_kos"]').value}`)
        .then(response => response.json())
        .then(reviews => {
            const reviewsContainer = document.getElementById('reviews');
            const averageRatingElement = document.getElementById('average-rating');
            reviewsContainer.innerHTML = '';

            // Update average rating
            const averageRating = calculateAverageRating(reviews);
            averageRatingElement.textContent = averageRating;

            // Display only the first three reviews
            reviews.forEach(review => {
                reviewsContainer.innerHTML += `
                    <div class="review mb-2">
                        <p><strong>${review.user.nama_panjang}</strong>: ${review.rating} stars</p>
                        <p>${review.comment}</p>
                    </div>
                `;
            });

        });
}

// Load reviews when the page loads
document.addEventListener('DOMContentLoaded', loadReviews);
