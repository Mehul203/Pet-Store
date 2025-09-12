<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Pet Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add these Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Russo+One&display=swap" rel="stylesheet">
    <style>
		/* Add these styles in the <style> section */
.img-fluid {
    transition: transform 0.3s ease;
}

.img-fluid:hover {
    transform: scale(1.05);
}

.accordion-button:not(.collapsed) {
    background-color: #e67e22;
    color: white;
}

.accordion-button:focus {
    border-color: #e67e22;
    box-shadow: 0 0 0 0.25rem rgba(230, 126, 34, 0.25);
}
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        /* Update the hero-section style in your <style> tag */
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('img/bg_1.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    padding: 150px 0;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
}

/* Add these new styles for enhanced hero section */
.hero-section::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100px;
    background: linear-gradient(to top, #fff, transparent);
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-title {
    font-family: 'Russo One', sans-serif;
    font-size: 4.5rem;
    margin-bottom: 1.5rem;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    animation: float 6s ease-in-out infinite;
    transform-style: preserve-3d;
    perspective: 1000px;
}

.hero-subtitle {
    font-family: 'Righteous', cursive;
    font-size: 2rem;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
    animation: floatReverse 6s ease-in-out infinite;
    transform-style: preserve-3d;
}

.floating-paws {
    position: absolute;
    opacity: 0.1;
    z-index: 1;
}

.paw1 { top: 10%; left: 5%; transform: rotate(45deg); }
.paw2 { top: 30%; right: 10%; transform: rotate(-30deg); }
.paw3 { bottom: 20%; left: 15%; transform: rotate(15deg); }
.paw4 { bottom: 40%; right: 20%; transform: rotate(-45deg); }

        .service-card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .faq-item {
            cursor: pointer;
        }

        .contact-section {
            background-color: #2c3e50;
            color: white;
            border-radius: 10px;
            padding: 30px;
            margin-top: 40px;
        }

        .stats-counter {
            font-size: 2.5rem;
            font-weight: bold;
            color: #e67e22;
        }
	
		
    </style>
</head>
<body>
<?php require_once('inc/topBarNav.php') ?>
	<!-- Update your hero section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title" data-text="About Our Pet Store">About Our Pet Store</h1>
            <p class="hero-subtitle" data-text="Caring for your pets since 2010">Caring for your pets since 2025</p>
            <div class="mt-4" data-aos="fade-up" data-aos-delay="200">
                <a href="Our Services.php" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-paw me-2"></i>Our Services
                </a>
                <a href="http://localhost/pet_shop/?p=about" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
    <!-- Decorative Paw Prints -->
    <i class="fas fa-paw fa-3x floating-paws paw1"></i>
    <i class="fas fa-paw fa-4x floating-paws paw2"></i>
    <i class="fas fa-paw fa-3x floating-paws paw3"></i>
    <i class="fas fa-paw fa-4x floating-paws paw4"></i>
</div>
    <!-- Main Content -->
    <div class="container">
        <!-- Mission Section -->
        <div class="row mb-5">
            <div class="col-md-6">
                <h2 class="mb-4">Our Mission</h2>
                <p class="lead">To enhance the lives of pets and their owners through quality products and exceptional service.</p>
            </div>
            <div class="col-md-6">
                <!-- Stats Counter -->
                <div class="row text-center">
                    <div class="col-6 mb-4">
                        <div class="stats-counter" id="customerCounter">0</div>
                        <p>Happy Customers</p>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="stats-counter" id="experienceCounter">0</div>
                        <p>Years Experience</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Section -->
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card service-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-bone fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Pet Food & Supplies</h5>
                        <p class="card-text">Premium quality food and essential supplies for all pets</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card service-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-cut fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Grooming Services</h5>
                        <p class="card-text">Professional grooming by certified experts</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card service-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-heart fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Pet Care Advice</h5>
                        <p class="card-text">Expert guidance for pet health and wellness</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card service-card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-toy fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Accessories</h5>
                        <p class="card-text">Wide range of pet accessories and toys</p>
                    </div>
                </div>
            </div>
        </div>
<!-- FAQ Section -->
<div class="mt-5">
    <h2 class="text-center mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    What are your store hours?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We are open Monday through Saturday from 9:00 AM to 8:00 PM, and Sundays from 10:00 AM to 6:00 PM.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Do you offer pet grooming services?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we offer full-service grooming by certified professionals. Please call to schedule an appointment.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Do you provide veterinary services?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    While we don't provide direct veterinary services, we have partnerships with local veterinarians and can provide recommendations. We also offer basic pet health products and advice.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Do you have a return policy?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we offer a 30-day return policy on unused items with original packaging and receipt. Food items must be unopened and in original condition.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                    Do you offer pet adoption services?
                </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We regularly host adoption events in partnership with local shelters. Follow our social media for upcoming adoption day announcements.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                    Do you offer delivery services?
                </button>
            </h2>
            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes! We offer free delivery for orders over $50 within a 10-mile radius. We also ship nationwide for online orders.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                    Do you have a loyalty program?
                </button>
            </h2>
            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes! Our PawPoints program gives you 1 point for every dollar spent. Points can be redeemed for discounts on future purchases.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Gallery Section (Add this before the Contact Section) -->
<div class="mt-5">
    <h2 class="text-center mb-4">Our Store Gallery</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <img src="img/Store Front.jpg" class="img-fluid rounded shadow" alt="Store Front">
        </div>
        <div class="col-md-4">
            <img src="img/Grooming Service.jpg" class="img-fluid rounded shadow" alt="Grooming Service">
        </div>
        <div class="col-md-4">
            <img src="img/Pet Supplies.jpg" class="img-fluid rounded shadow" alt="Pet Supplies">
        </div>
        <div class="col-md-4">
            <img src="img/Pet Food Section.jpg" class="img-fluid rounded shadow" alt="Pet Food Section">
        </div>
        <div class="col-md-4">
            <img src="img/Our Staff.jpg" class="img-fluid rounded shadow" alt="Our Staff">
        </div>
        <div class="col-md-4">
            <img src="img/Pet Play Area.jpg" class="img-fluid rounded shadow" alt="Pet Play Area">
        </div>
    </div>
</div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Counter Animation
        function animateCounter(elementId, target) {
            let current = 0;
            const element = document.getElementById(elementId);
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                element.textContent = Math.floor(current);
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                }
            }, 40);
        }

        // Trigger counter animation when element is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter('customerCounter', 5000);
                    animateCounter('experienceCounter', 13);
                }
            });
        });

        observer.observe(document.getElementById('customerCounter'));

        // Service card hover effect
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.classList.add('shadow-lg');
            });
            card.addEventListener('mouseleave', () => {
                card.classList.remove('shadow-lg');
            });
        });
		// Add this to your existing JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Animate floating paws
    const paws = document.querySelectorAll('.floating-paws');
    paws.forEach(paw => {
        setInterval(() => {
            paw.style.transform = `rotate(${Math.random() * 360}deg)`;
        }, 3000);
    });
});
    </script>
</body>
</html>

