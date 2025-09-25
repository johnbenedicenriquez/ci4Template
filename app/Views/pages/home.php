<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4"><?= esc($hero_title) ?></h1>
                <p class="lead mb-4"><?= esc($hero_subtitle) ?></p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= base_url('services') ?>" class="btn btn-light btn-lg">
                        <i class="fas fa-tools me-2"></i>Our Services
                    </a>
                    <a href="<?= base_url('contact') ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Get Quote
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-image mt-5 mt-lg-0">
                    <i class="fas fa-bolt" style="font-size: 200px; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary">Our Services</h2>
            <p class="lead text-muted">Professional electrical solutions for every need</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($services_preview as $service): ?>
                <div class="col-md-4">
                    <div class="card service-card h-100 text-center p-4">
                        <div class="card-body">
                            <div class="service-icon mb-3">
                                <?php
                                $iconClass = match($service['icon']) {
                                    'home' => 'fas fa-home',
                                    'building' => 'fas fa-building',
                                    'phone' => 'fas fa-phone-alt',
                                    default => 'fas fa-bolt'
                                };
                                ?>
                                <i class="<?= $iconClass ?> text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title"><?= esc($service['title']) ?></h5>
                            <p class="card-text text-muted"><?= esc($service['description']) ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="<?= base_url('services') ?>" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold text-primary mb-4">Why Choose ElectriCorp?</h2>
                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-certificate text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="fw-bold">Licensed & Certified</h6>
                                <small class="text-muted">Fully licensed and insured professionals</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-clock text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="fw-bold">24/7 Emergency</h6>
                                <small class="text-muted">Round-the-clock emergency service</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-star text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="fw-bold">Quality Work</h6>
                                <small class="text-muted">Guaranteed satisfaction on all projects</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-dollar-sign text-primary me-3 mt-1" style="font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="fw-bold">Fair Pricing</h6>
                                <small class="text-muted">Competitive rates with no hidden fees</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="bg-white p-3 rounded shadow-sm">
                                <h3 class="text-primary fw-bold mb-0">25+</h3>
                                <small class="text-muted">Years Experience</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white p-3 rounded shadow-sm">
                                <h3 class="text-primary fw-bold mb-0">1000+</h3>
                                <small class="text-muted">Projects Completed</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white p-3 rounded shadow-sm">
                                <h3 class="text-primary fw-bold mb-0">24/7</h3>
                                <small class="text-muted">Emergency Service</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white p-3 rounded shadow-sm">
                                <h3 class="text-primary fw-bold mb-0">100%</h3>
                                <small class="text-muted">Satisfaction</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-primary">What Our Customers Say</h2>
            <p class="lead text-muted">Don't just take our word for it</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php endfor; ?>
                            </div>
                            <blockquote class="mb-3">
                                <p class="mb-0">"<?= esc($testimonial['text']) ?>"</p>
                            </blockquote>
                            <div class="d-flex align-items-center">
                                <div class="avatar me-3">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="mb-0"><?= esc($testimonial['name']) ?></h6>
                                    <small class="text-muted"><?= esc($testimonial['company']) ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-6 fw-bold mb-4">Ready to Get Started?</h2>
                <p class="lead mb-4">Contact us today for a free consultation and quote on your electrical project.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="<?= base_url('contact') ?>" class="btn btn-light btn-lg">
                        <i class="fas fa-envelope me-2"></i>Get Free Quote
                    </a>
                    <a href="tel:555-123-3532" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Call Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

