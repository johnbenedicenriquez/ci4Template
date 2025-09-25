<?php

namespace App\Controllers;

use App\Models\UserModel;

/**
 * Registration Controller
 * 
 * Handles user registration functionality
 * Demonstrates CodeIgniter 4 form handling, validation, and database operations
 */
class Registration extends BaseController
{
    protected $userModel;

    /**
     * Constructor - Initialize user model
     */
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Display registration form
     * 
     * Route: GET /register
     * 
     * @return string
     */
    public function index(): string
    {
        // Check if user is already logged in
        if (session()->get('user_id')) {
            return redirect()->to('dashboard');
        }

        $data = [
            'form_fields' => [
                'first_name' => [
                    'type' => 'text',
                    'label' => 'First Name',
                    'placeholder' => 'Enter your first name',
                    'required' => true,
                    'icon' => 'fas fa-user'
                ],
                'last_name' => [
                    'type' => 'text',
                    'label' => 'Last Name',
                    'placeholder' => 'Enter your last name',
                    'required' => true,
                    'icon' => 'fas fa-user'
                ],
                'email' => [
                    'type' => 'email',
                    'label' => 'Email Address',
                    'placeholder' => 'Enter your email address',
                    'required' => true,
                    'icon' => 'fas fa-envelope'
                ],
                'phone' => [
                    'type' => 'tel',
                    'label' => 'Phone Number',
                    'placeholder' => '(555) 123-4567',
                    'required' => false,
                    'icon' => 'fas fa-phone'
                ],
                'company' => [
                    'type' => 'text',
                    'label' => 'Company Name',
                    'placeholder' => 'Enter company name (optional)',
                    'required' => false,
                    'icon' => 'fas fa-building'
                ],
                'service_interest' => [
                    'type' => 'select',
                    'label' => 'Primary Service Interest',
                    'required' => true,
                    'icon' => 'fas fa-tools',
                    'options' => [
                        '' => 'Select a service...',
                        'residential' => 'Residential Electrical',
                        'commercial' => 'Commercial Solutions',
                        'industrial' => 'Industrial Services',
                        'emergency' => 'Emergency Services',
                        'consultation' => 'Consultation Only'
                    ]
                ],
                'password' => [
                    'type' => 'password',
                    'label' => 'Password',
                    'placeholder' => 'Create a strong password',
                    'required' => true,
                    'icon' => 'fas fa-lock'
                ],
                'password_confirm' => [
                    'type' => 'password',
                    'label' => 'Confirm Password',
                    'placeholder' => 'Confirm your password',
                    'required' => true,
                    'icon' => 'fas fa-lock'
                ]
            ],
            'terms_and_conditions' => [
                'By registering, you agree to our Terms of Service and Privacy Policy.',
                'We will use your information to provide electrical services and send relevant updates.',
                'You can unsubscribe from communications at any time.'
            ]
        ];

        return $this->renderPage('auth/register', $data, 'Register');
    }

    /**
     * Process registration form submission
     * 
     * Route: POST /register
     * 
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function create()
    {
        // Validate CSRF token
        if (!$this->validateCSRF()) {
            $this->setFlashMessage('error', 'Security token validation failed.');
            return redirect()->back()->withInput();
        }

        // Define validation rules
        $rules = [
            'first_name' => [
                'rules' => 'required|min_length[2]|max_length[50]|alpha_space',
                'errors' => [
                    'required' => 'First name is required.',
                    'min_length' => 'First name must be at least 2 characters.',
                    'max_length' => 'First name cannot exceed 50 characters.',
                    'alpha_space' => 'First name can only contain letters and spaces.'
                ]
            ],
            'last_name' => [
                'rules' => 'required|min_length[2]|max_length[50]|alpha_space',
                'errors' => [
                    'required' => 'Last name is required.',
                    'min_length' => 'Last name must be at least 2 characters.',
                    'max_length' => 'Last name cannot exceed 50 characters.',
                    'alpha_space' => 'Last name can only contain letters and spaces.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[100]|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email address is required.',
                    'valid_email' => 'Please enter a valid email address.',
                    'max_length' => 'Email address cannot exceed 100 characters.',
                    'is_unique' => 'This email address is already registered.'
                ]
            ],
            'phone' => [
                'rules' => 'permit_empty|min_length[10]|max_length[20]|regex_match[/^[\d\s\-\(\)\+]+$/]',
                'errors' => [
                    'min_length' => 'Phone number must be at least 10 digits.',
                    'max_length' => 'Phone number cannot exceed 20 characters.',
                    'regex_match' => 'Please enter a valid phone number.'
                ]
            ],
            'company' => [
                'rules' => 'permit_empty|max_length[100]',
                'errors' => [
                    'max_length' => 'Company name cannot exceed 100 characters.'
                ]
            ],
            'service_interest' => [
                'rules' => 'required|in_list[residential,commercial,industrial,emergency,consultation]',
                'errors' => [
                    'required' => 'Please select a service interest.',
                    'in_list' => 'Please select a valid service option.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[255]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must be at least 8 characters long.',
                    'max_length' => 'Password cannot exceed 255 characters.'
                ]
            ],
            'password_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password confirmation is required.',
                    'matches' => 'Password confirmation does not match.'
                ]
            ],
            'terms_accepted' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'You must accept the terms and conditions.'
                ]
            ]
        ];

        // Validate form data
        if (!$this->validate($rules)) {
            $this->setFlashMessage('error', 'Please correct the errors below.');
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Prepare user data
        $userData = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone') ?: null,
            'company' => $this->request->getPost('company') ?: null,
            'service_interest' => $this->request->getPost('service_interest'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'status' => 'active',
            'role' => 'customer',
            'email_verified' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            // Insert user into database
            $userId = $this->userModel->insert($userData);
            
            if ($userId) {
                // Log the registration
                log_message('info', 'New user registered: ' . $userData['email']);
                
                // In a real application, you would:
                // 1. Send welcome email
                // 2. Send email verification
                // 3. Log user in automatically or redirect to login
                
                $this->setFlashMessage('success', 'Registration successful! Welcome to ElectriCorp.');
                return redirect()->to('register/success');
            } else {
                $this->setFlashMessage('error', 'Registration failed. Please try again.');
                return redirect()->back()->withInput();
            }
            
        } catch (\Exception $e) {
            log_message('error', 'Registration error: ' . $e->getMessage());
            $this->setFlashMessage('error', 'An error occurred during registration. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Registration success page
     * 
     * Route: GET /register/success
     * 
     * @return string
     */
    public function success(): string
    {
        $data = [
            'success_message' => 'Your registration has been completed successfully!',
            'next_steps' => [
                'Check your email for a verification link',
                'Complete your profile information',
                'Browse our services and request quotes',
                'Contact us for any immediate electrical needs'
            ],
            'quick_actions' => [
                [
                    'title' => 'Browse Services',
                    'description' => 'Explore our electrical services',
                    'url' => base_url('services'),
                    'icon' => 'fas fa-tools',
                    'class' => 'btn-primary'
                ],
                [
                    'title' => 'Contact Us',
                    'description' => 'Get in touch for immediate needs',
                    'url' => base_url('contact'),
                    'icon' => 'fas fa-phone',
                    'class' => 'btn-outline-primary'
                ],
                [
                    'title' => 'Login',
                    'description' => 'Access your account',
                    'url' => base_url('login'),
                    'icon' => 'fas fa-sign-in-alt',
                    'class' => 'btn-secondary'
                ]
            ]
        ];

        return $this->renderPage('auth/success', $data, 'Registration Successful');
    }

    /**
     * Check if email is available (AJAX endpoint)
     * 
     * Route: POST /register/check-email
     * 
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function checkEmail()
    {
        $email = $this->request->getPost('email');
        
        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->response->setJSON([
                'available' => false,
                'message' => 'Invalid email format'
            ]);
        }

        $exists = $this->userModel->where('email', $email)->first();
        
        return $this->response->setJSON([
            'available' => !$exists,
            'message' => $exists ? 'Email already registered' : 'Email available'
        ]);
    }
}

