    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Royal Pet Shop FAQ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        /* Custom styles for FAQ */
        .faq-section {
            padding: 50px 0;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
        }

        .faq-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #2c3e50;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .accordion-item {
            border: none;
            margin-bottom: 15px;
            border-radius: 10px !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .accordion-button {
            border-radius: 10px;
            font-weight: 600;
            padding: 20px;
            background-color: white;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background-color: #f8f9fa;
            color: #0d6efd;
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(13, 110, 253, 0.25);
        }

        .accordion-body {
            padding: 20px;
            line-height: 1.6;
            color: #495057;
        }

        .accordion-body.faq-answer {
            display: block;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .accordion-collapse.show .accordion-body.faq-answer {
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- Home Link -->
    <div class="container mt-4">
        <a href="index.php" class="btn btn-outline-primary">
            <i class="bi bi-house-door"></i> Back to Home
        </a>
    </div>

    <!-- FAQ Section -->
    <section class="faq-section bg-light">
        <div class="container">
            <div class="faq-title text-center">Pet Store - FAQ</div>
            <!-- FAQ Accordion -->
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What types of pets can I buy at The Royal Pet Shop?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-answer">
                            At The Royal Pet Shop, you can find a variety of pets including dogs, cats, rabbits, birds, and exotic pets like reptiles.
                        </div>
                    </div>
                </div>

                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How do I take care of my new pet?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-answer">
                            We provide detailed care instructions with every pet purchase. You can also find care guides and videos on our website.
                        </div>
                    </div>
                </div>

                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Do you offer any pet accessories?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-answer">
                            Yes, we offer a wide range of pet accessories such as toys, food, bedding, leashes, and more.
                        </div>
                    </div>
                </div>

                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Do you offer delivery for pets?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-answer">
                            Yes, we offer delivery services for pets and pet accessories to your doorstep. Please check our delivery options.
                        </div>
                    </div>
                </div>

                <!-- Add new FAQ item -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Do you provide veterinary services or pet insurance?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body faq-answer">
                            Yes, we have partnered with local veterinary clinics and pet insurance providers. We offer basic health check-ups in-store and can assist you in selecting the right pet insurance plan for your furry friend.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS to handle active class (optional) -->
    <script>
        // Initialize all accordions with smooth animations
        const accordionButtons = document.querySelectorAll('.accordion-button');
        accordionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const target = document.querySelector(this.dataset.bsTarget);
                if (target) {
                    target.addEventListener('shown.bs.collapse', function() {
                        this.querySelector('.faq-answer').style.opacity = '1';
                    });
                    target.addEventListener('hide.bs.collapse', function() {
                        this.querySelector('.faq-answer').style.opacity = '0';
                    });
                }
            });
        });
    </script>
</body>

</html>
