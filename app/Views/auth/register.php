<!-- Registration Page -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0">
                            <i class="fas fa-user-plus me-2"></i>Create Your Account
                        </h2>
                        <p class="mb-0 mt-2">Join ElectriCorp for professional electrical services</p>
                    </div>
                    
                    <div class="card-body p-5">
                        <!-- Registration Form -->
                        <?= form_open('register', ['class' => 'needs-validation', 'novalidate' => true, 'id' => 'registrationForm']) ?>
                        
                        <div class="row g-4">
                            <!-- Personal Information Section -->
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-user me-2"></i>Personal Information
                                </h5>
                            </div>
                            
                            <!-- First Name -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['first_name']['icon'] ?>"></i>
                                        </span>
                                        <?= form_input([
                                            'name' => 'first_name',
                                            'id' => 'first_name',
                                            'class' => 'form-control' . (session('validation') && session('validation')->hasError('first_name') ? ' is-invalid' : ''),
                                            'placeholder' => $form_fields['first_name']['placeholder'],
                                            'value' => old('first_name'),
                                            'required' => $form_fields['first_name']['required']
                                        ]) ?>
                                        <label for="first_name"><?= $form_fields['first_name']['label'] ?></label>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('first_name')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('first_name') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Last Name -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['last_name']['icon'] ?>"></i>
                                        </span>
                                        <?= form_input([
                                            'name' => 'last_name',
                                            'id' => 'last_name',
                                            'class' => 'form-control' . (session('validation') && session('validation')->hasError('last_name') ? ' is-invalid' : ''),
                                            'placeholder' => $form_fields['last_name']['placeholder'],
                                            'value' => old('last_name'),
                                            'required' => $form_fields['last_name']['required']
                                        ]) ?>
                                        <label for="last_name"><?= $form_fields['last_name']['label'] ?></label>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('last_name')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('last_name') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['email']['icon'] ?>"></i>
                                        </span>
                                        <?= form_input([
                                            'name' => 'email',
                                            'id' => 'email',
                                            'type' => 'email',
                                            'class' => 'form-control' . (session('validation') && session('validation')->hasError('email') ? ' is-invalid' : ''),
                                            'placeholder' => $form_fields['email']['placeholder'],
                                            'value' => old('email'),
                                            'required' => $form_fields['email']['required']
                                        ]) ?>
                                        <label for="email"><?= $form_fields['email']['label'] ?></label>
                                        <div id="email-feedback" class="form-text"></div>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('email')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('email') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['phone']['icon'] ?>"></i>
                                        </span>
                                        <?= form_input([
                                            'name' => 'phone',
                                            'id' => 'phone',
                                            'type' => 'tel',
                                            'class' => 'form-control' . (session('validation') && session('validation')->hasError('phone') ? ' is-invalid' : ''),
                                            'placeholder' => $form_fields['phone']['placeholder'],
                                            'value' => old('phone')
                                        ]) ?>
                                        <label for="phone"><?= $form_fields['phone']['label'] ?></label>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('phone')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('phone') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Company -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['company']['icon'] ?>"></i>
                                        </span>
                                        <?= form_input([
                                            'name' => 'company',
                                            'id' => 'company',
                                            'class' => 'form-control' . (session('validation') && session('validation')->hasError('company') ? ' is-invalid' : ''),
                                            'placeholder' => $form_fields['company']['placeholder'],
                                            'value' => old('company')
                                        ]) ?>
                                        <label for="company"><?= $form_fields['company']['label'] ?></label>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('company')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('company') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Service Interest Section -->
                            <div class="col-12">
                                <h5 class="text-primary mb-3 mt-4">
                                    <i class="fas fa-tools me-2"></i>Service Information
                                </h5>
                            </div>
                            
                            <!-- Service Interest -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['service_interest']['icon'] ?>"></i>
                                        </span>
                                        <?= form_dropdown(
                                            'service_interest',
                                            $form_fields['service_interest']['options'],
                                            old('service_interest'),
                                            [
                                                'id' => 'service_interest',
                                                'class' => 'form-select' . (session('validation') && session('validation')->hasError('service_interest') ? ' is-invalid' : ''),
                                                'required' => $form_fields['service_interest']['required']
                                            ]
                                        ) ?>
                                        <label for="service_interest"><?= $form_fields['service_interest']['label'] ?></label>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('service_interest')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('service_interest') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Security Section -->
                            <div class="col-12">
                                <h5 class="text-primary mb-3 mt-4">
                                    <i class="fas fa-lock me-2"></i>Security Information
                                </h5>
                            </div>
                            
                            <!-- Password -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['password']['icon'] ?>"></i>
                                        </span>
                                        <?= form_password([
                                            'name' => 'password',
                                            'id' => 'password',
                                            'class' => 'form-control' . (session('validation') && session('validation')->hasError('password') ? ' is-invalid' : ''),
                                            'placeholder' => $form_fields['password']['placeholder'],
                                            'required' => $form_fields['password']['required']
                                        ]) ?>
                                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <label for="password"><?= $form_fields['password']['label'] ?></label>
                                    </div>
                                    <div class="form-text">
                                        <small>Password must be at least 8 characters long</small>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('password')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('password') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="<?= $form_fields['password_confirm']['icon'] ?>"></i>
                                        </span>
                                        <?= form_password([
                                            'name' => 'password_confirm',
                                            'id' => 'password_confirm',
                                            'class' => 'form-control' . (session('validation') && session('validation')->hasError('password_confirm') ? ' is-invalid' : ''),
                                            'placeholder' => $form_fields['password_confirm']['placeholder'],
                                            'required' => $form_fields['password_confirm']['required']
                                        ]) ?>
                                        <label for="password_confirm"><?= $form_fields['password_confirm']['label'] ?></label>
                                    </div>
                                    <?php if (session('validation') && session('validation')->hasError('password_confirm')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('password_confirm') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Terms and Conditions -->
                            <div class="col-12">
                                <div class="form-check">
                                    <?= form_checkbox([
                                        'name' => 'terms_accepted',
                                        'id' => 'terms_accepted',
                                        'value' => '1',
                                        'class' => 'form-check-input' . (session('validation') && session('validation')->hasError('terms_accepted') ? ' is-invalid' : ''),
                                        'checked' => old('terms_accepted')
                                    ]) ?>
                                    <label class="form-check-label" for="terms_accepted">
                                        I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                                    </label>
                                    <?php if (session('validation') && session('validation')->hasError('terms_accepted')): ?>
                                        <div class="invalid-feedback d-block">
                                            <?= session('validation')->getError('terms_accepted') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="col-12">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                        <i class="fas fa-user-plus me-2"></i>Create Account
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <?= form_close() ?>
                        
                        <!-- Login Link -->
                        <div class="text-center mt-4">
                            <p class="mb-0">Already have an account? 
                                <a href="<?= base_url('login') ?>" class="text-primary text-decoration-none">
                                    <i class="fas fa-sign-in-alt me-1"></i>Sign In
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6>1. Service Agreement</h6>
                <p>By registering with ElectriCorp, you agree to our electrical service terms and conditions.</p>
                
                <h6>2. Account Responsibility</h6>
                <p>You are responsible for maintaining the security of your account credentials.</p>
                
                <h6>3. Service Usage</h6>
                <p>Our services are provided subject to availability and professional scheduling.</p>
                
                <?php foreach ($terms_and_conditions as $term): ?>
                    <p><?= esc($term) ?></p>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Privacy Modal -->
<div class="modal fade" id="privacyModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Privacy Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6>Information Collection</h6>
                <p>We collect information necessary to provide electrical services and maintain customer relationships.</p>
                
                <h6>Information Usage</h6>
                <p>Your information is used to schedule services, send updates, and improve our offerings.</p>
                
                <h6>Information Protection</h6>
                <p>We implement security measures to protect your personal information.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Custom JavaScript for Registration Form -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirm');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const submitBtn = document.getElementById('submitBtn');
    
    // Toggle password visibility
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        confirmPasswordInput.setAttribute('type', type);
        
        const icon = this.querySelector('i');
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });
    
    // Email availability check
    let emailTimeout;
    emailInput.addEventListener('input', function() {
        clearTimeout(emailTimeout);
        const email = this.value.trim();
        const feedback = document.getElementById('email-feedback');
        
        if (email && email.includes('@')) {
            emailTimeout = setTimeout(() => {
                fetch('<?= base_url("register/check-email") ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: 'email=' + encodeURIComponent(email)
                })
                .then(response => response.json())
                .then(data => {
                    feedback.textContent = data.message;
                    feedback.className = data.available ? 'form-text text-success' : 'form-text text-danger';
                    emailInput.classList.toggle('is-valid', data.available);
                    emailInput.classList.toggle('is-invalid', !data.available);
                })
                .catch(error => {
                    console.error('Email check error:', error);
                });
            }, 500);
        } else {
            feedback.textContent = '';
            emailInput.classList.remove('is-valid', 'is-invalid');
        }
    });
    
    // Password confirmation validation
    function validatePasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        
        if (confirmPassword && password !== confirmPassword) {
            confirmPasswordInput.setCustomValidity('Passwords do not match');
            confirmPasswordInput.classList.add('is-invalid');
        } else {
            confirmPasswordInput.setCustomValidity('');
            confirmPasswordInput.classList.remove('is-invalid');
            if (confirmPassword) {
                confirmPasswordInput.classList.add('is-valid');
            }
        }
    }
    
    passwordInput.addEventListener('input', validatePasswordMatch);
    confirmPasswordInput.addEventListener('input', validatePasswordMatch);
    
    // Form submission
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        } else {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
            submitBtn.disabled = true;
        }
        
        form.classList.add('was-validated');
    });
    
    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        if (value.length >= 6) {
            value = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
        } else if (value.length >= 3) {
            value = value.replace(/(\d{3})(\d{0,3})/, '($1) $2');
        }
        this.value = value;
    });
});
</script>

