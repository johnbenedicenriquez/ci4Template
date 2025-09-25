<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url', 'form', 'html'];

    /**
     * Common data for all views
     *
     * @var array
     */
    protected $data = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        
        // Set common data for all views
        $this->setCommonData();
    }

    /**
     * Set common data that will be available in all views
     */
    protected function setCommonData()
    {
        $this->data = [
            'site_name' => 'ElectriCorp CMS',
            'company_name' => 'CareSkyFree Electric Company',
            'site_description' => 'Professional Electric Services & Solutions',
            'current_year' => date('Y'),
            'base_url' => base_url(),
            'current_uri' => uri_string(),
            'navigation' => [
                'Home' => base_url(),
                'About' => base_url('about'),
                'Services' => base_url('services'),
                'Contact' => base_url('contact'),
                'Register' => base_url('register')
            ]
        ];
    }

    /**
     * Load view with common data
     *
     * @param string $view
     * @param array $data
     * @param array $options
     * @return string
     */
    protected function loadView(string $view, array $data = [], array $options = []): string
    {
        // Merge common data with view-specific data
        $viewData = array_merge($this->data, $data);
        
        return view($view, $viewData, $options);
    }

    /**
     * Render complete page with header, content, and footer
     *
     * @param string $content_view
     * @param array $data
     * @param string $title
     * @return string
     */
    protected function renderPage(string $content_view, array $data = [], string $title = ''): string
    {
        $viewData = array_merge($this->data, $data);
        
        if (!empty($title)) {
            $viewData['page_title'] = $title . ' - ' . $viewData['site_name'];
        } else {
            $viewData['page_title'] = $viewData['site_name'];
        }

        $viewData['content'] = $this->loadView($content_view, $viewData);
        
        return $this->loadView('layouts/main', $viewData);
    }

    /**
     * Set flash message
     *
     * @param string $type
     * @param string $message
     */
    protected function setFlashMessage(string $type, string $message)
    {
        session()->setFlashdata('message_type', $type);
        session()->setFlashdata('message', $message);
    }

    /**
     * Validate CSRF token for POST requests
     *
     * @return bool
     */
    protected function validateCSRF(): bool
    {
        if ($this->request->getMethod() === 'POST') {
            return $this->validate(['csrf_token' => 'required']);
        }
        return true;
    }
}

