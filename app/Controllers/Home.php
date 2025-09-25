<?php

namespace App\Controllers;

/**
 * Home Controller
 * 
 * Handles the main pages of the electric company website
 * Demonstrates CodeIgniter 4 routing and controller concepts
 */
class Home extends BaseController
{
    /**
     * Homepage - Main landing page
     * 
     * Route: GET /
     * Route: GET /home
     * 
     * @return string
     */
    public function index(): string
    {
        // Data specific to homepage
        $data = [
            'hero_title' => 'Professional Electric Services',
            'hero_subtitle' => 'Reliable power solutions for your home and business',
            'services_preview' => [
                [
                    'title' => 'Residential Electrical',
                    'description' => 'Complete electrical services for homes',
                    'icon' => 'home'
                ],
                [
                    'title' => 'Commercial Solutions',
                    'description' => 'Professional electrical systems for businesses',
                    'icon' => 'building'
                ],
                [
                    'title' => '24/7 Emergency Service',
                    'description' => 'Round-the-clock electrical emergency support',
                    'icon' => 'phone'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'John Smith',
                    'company' => 'Smith Manufacturing',
                    'text' => 'ElectriCorp provided excellent service for our factory electrical upgrade.'
                ],
                [
                    'name' => 'Sarah Johnson',
                    'company' => 'Homeowner',
                    'text' => 'Professional, reliable, and affordable. Highly recommended!'
                ]
            ]
        ];

        return $this->renderPage('pages/home', $data, 'Home');
    }

    /**
     * About page - Company information
     * 
     * Route: GET /about
     * 
     * @return string
     */
    public function about(): string
    {
        $data = [
            'company_history' => 'Founded in 1995, ElectriCorp has been serving the community with reliable electrical services for over 25 years.',
            'mission' => 'To provide safe, reliable, and efficient electrical solutions that power our community\'s growth and success.',
            'team_members' => [
                [
                    'name' => 'Mike Rodriguez',
                    'position' => 'Master Electrician',
                    'experience' => '20+ years',
                    'specialization' => 'Industrial Systems'
                ],
                [
                    'name' => 'Lisa Chen',
                    'position' => 'Project Manager',
                    'experience' => '15+ years',
                    'specialization' => 'Commercial Projects'
                ],
                [
                    'name' => 'David Wilson',
                    'position' => 'Residential Specialist',
                    'experience' => '12+ years',
                    'specialization' => 'Smart Home Systems'
                ]
            ],
            'certifications' => [
                'Licensed Electrical Contractor',
                'NECA Member',
                'OSHA Certified',
                'Bonded & Insured'
            ]
        ];

        return $this->renderPage('pages/about', $data, 'About Us');
    }

    /**
     * Services page - List of services offered
     * 
     * Route: GET /services
     * 
     * @return string
     */
    public function services(): string
    {
        $data = [
            'service_categories' => [
                [
                    'category' => 'Residential Services',
                    'services' => [
                        'Electrical Panel Upgrades',
                        'Outlet & Switch Installation',
                        'Ceiling Fan Installation',
                        'Home Rewiring',
                        'Smart Home Integration',
                        'Electrical Safety Inspections'
                    ]
                ],
                [
                    'category' => 'Commercial Services',
                    'services' => [
                        'Office Building Electrical',
                        'Retail Store Lighting',
                        'Industrial Motor Controls',
                        'Emergency Power Systems',
                        'Data Center Electrical',
                        'Parking Lot Lighting'
                    ]
                ],
                [
                    'category' => 'Specialized Services',
                    'services' => [
                        'Solar Panel Installation',
                        'Electric Vehicle Charging Stations',
                        'Generator Installation',
                        'Electrical Troubleshooting',
                        'Code Compliance Updates',
                        'Energy Efficiency Audits'
                    ]
                ]
            ],
            'service_areas' => [
                'Downtown Metro Area',
                'Suburban Communities',
                'Industrial Districts',
                'Surrounding Counties'
            ]
        ];

        return $this->renderPage('pages/services', $data, 'Our Services');
    }

    /**
     * Contact page - Contact information and form
     * 
     * Route: GET /contact
     * 
     * @return string
     */
    public function contact(): string
    {
        $data = [
            'contact_info' => [
                'phone' => '(555) 123-ELEC',
                'email' => 'info@electricorp.com',
                'address' => '123 Electric Avenue, Power City, PC 12345',
                'hours' => [
                    'Monday - Friday: 7:00 AM - 6:00 PM',
                    'Saturday: 8:00 AM - 4:00 PM',
                    'Sunday: Emergency Service Only',
                    '24/7 Emergency Hotline: (555) 911-ELEC'
                ]
            ],
            'service_areas_map' => [
                'primary' => 'Metro Area (15 mile radius)',
                'extended' => 'Surrounding counties (up to 50 miles)',
                'emergency' => 'Statewide emergency service available'
            ],
            'contact_form_fields' => [
                'name' => ['type' => 'text', 'required' => true],
                'email' => ['type' => 'email', 'required' => true],
                'phone' => ['type' => 'tel', 'required' => false],
                'service_type' => ['type' => 'select', 'required' => true],
                'message' => ['type' => 'textarea', 'required' => true]
            ]
        ];

        return $this->renderPage('pages/contact', $data, 'Contact Us');
    }

    /**
     * Handle contact form submission
     * 
     * Route: POST /contact
     * 
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function submitContact()
    {
        // Validate CSRF token
        if (!$this->validateCSRF()) {
            $this->setFlashMessage('error', 'Security token validation failed.');
            return redirect()->back()->withInput();
        }

        // Validation rules
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email',
            'phone' => 'permit_empty|regex_match[/^[\d\s\-\(\)\+]+$/]',
            'service_type' => 'required|in_list[residential,commercial,emergency,consultation]',
            'message' => 'required|min_length[10]|max_length[1000]'
        ];

        if (!$this->validate($rules)) {
            $this->setFlashMessage('error', 'Please correct the errors below.');
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // In a real application, you would:
        // 1. Save to database
        // 2. Send email notification
        // 3. Log the inquiry
        
        // For demonstration, we'll just set a success message
        $this->setFlashMessage('success', 'Thank you for your inquiry! We will contact you within 24 hours.');
        
        return redirect()->to('contact');
    }
}

