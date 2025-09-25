<!-- Registration Success Page -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Success Message -->
                <div class="text-center mb-5">
                    <div class="success-icon mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                    </div>
                    <h1 class="display-5 fw-bold text-primary mb-3">Registration Successful!</h1>
                    <p class="lead text-muted"><?= esc($success_message) ?></p>
                </div>

                <!-- Welcome Card -->
                <div class="card border-0 shadow-lg mb-5">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h3 class="mb-0">
                            <i class="fas fa-bolt me-2"></i>Welcome to ElectriCorp!
                        </h3>
                    </div>
                    
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-list-check me-2"></i>Next Steps
                                </h5>
                                <ul class="list-unstyled">
                                    <?php foreach ($next_steps as $step): ?>
                                        <li class="mb-2">
                                            <i class="fas fa-arrow-right text-primary me-2"></i>
                                            <?= esc($step) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            
                            <div class="col-lg-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-info-circle me-2"></i>What's Included
                                </h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Access to service quotes
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Priority customer support
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Service history tracking
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Exclusive member offers
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row g-4 mb-5">
                    <?php foreach ($quick_actions as $action): ?>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm action-card">
                                <div class="card-body text-center p-4">
                                    <div class="action-icon mb-3">
                                        <i class="<?= esc($action['icon']) ?> text-primary" style="font-size: 3rem;"></i>
                                    </div>
                                    <h5 class="card-title"><?= esc($action['title']) ?></h5>
                                    <p class="card-text text-muted mb-4"><?= esc($action['description']) ?></p>
                                    <a href="<?= esc($action['url']) ?>" class="btn <?= esc($action['class']) ?> btn-lg">
                                        <?= esc($action['title']) ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Contact Information -->
                <div class="card border-0 bg-light">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="mb-2">Need Immediate Assistance?</h5>
                                <p class="mb-0 text-muted">
                                    Our customer service team is ready to help you get started or answer any questions.
                                </p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:555-123-3532" class="btn btn-outline-primary">
                                        <i class="fas fa-phone me-2"></i>Call Us
                                    </a>
                                    <a href="mailto:support@electricorp.com" class="btn btn-outline-secondary">
                                        <i class="fas fa-envelope me-2"></i>Email Support
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-primary">Why You Made the Right Choice</h2>
            <p class="lead text-muted">Join thousands of satisfied customers who trust ElectriCorp</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="feature-item">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-award text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">Licensed Professionals</h6>
                    <small class="text-muted">Certified electricians with years of experience</small>
                </div>
            </div>
            
            <div class="col-md-3 text-center">
                <div class="feature-item">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-clock text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">24/7 Emergency Service</h6>
                    <small class="text-muted">Round-the-clock support when you need it most</small>
                </div>
            </div>
            
            <div class="col-md-3 text-center">
                <div class="feature-item">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-shield-alt text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">Fully Insured</h6>
                    <small class="text-muted">Complete protection for your peace of mind</small>
                </div>
            </div>
            
            <div class="col-md-3 text-center">
                <div class="feature-item">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-thumbs-up text-primary" style="font-size: 2.5rem;"></i>
                    </div>
                    <h6 class="fw-bold">Satisfaction Guaranteed</h6>
                    <small class="text-muted">100% satisfaction guarantee on all work</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for Success Page -->
<style>
.action-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.action-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.success-icon {
    animation: successPulse 2s ease-in-out infinite;
}

@keyframes successPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.feature-item {
    padding: 20px;
    transition: transform 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-3px);
}

.feature-icon {
    transition: color 0.3s ease;
}

.feature-item:hover .feature-icon i {
    color: var(--secondary-color) !important;
}
</style>

<!-- Custom JavaScript for Success Page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add entrance animations
    const cards = document.querySelectorAll('.card, .action-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Auto-redirect after 30 seconds (optional)
    // setTimeout(() => {
    //     window.location.href = '<?= base_url("services") ?>';
    // }, 30000);
});
</script>

