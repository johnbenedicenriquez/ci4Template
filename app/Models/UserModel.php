<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * User Model
 * 
 * Handles database operations for users table
 * Demonstrates CodeIgniter 4 Model concepts and database interactions
 */
class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    // Allowed fields for mass assignment
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company',
        'service_interest',
        'password',
        'status',
        'role',
        'email_verified',
        'email_verified_at',
        'last_login',
        'profile_image',
        'preferences'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation rules
    protected $validationRules = [
        'first_name' => 'required|min_length[2]|max_length[50]|alpha_space',
        'last_name' => 'required|min_length[2]|max_length[50]|alpha_space',
        'email' => 'required|valid_email|max_length[100]|is_unique[users.email,id,{id}]',
        'phone' => 'permit_empty|min_length[10]|max_length[20]',
        'company' => 'permit_empty|max_length[100]',
        'service_interest' => 'required|in_list[residential,commercial,industrial,emergency,consultation]',
        'password' => 'required|min_length[8]|max_length[255]',
        'status' => 'required|in_list[active,inactive,suspended]',
        'role' => 'required|in_list[customer,admin,manager,technician]'
    ];

    protected $validationMessages = [
        'first_name' => [
            'required' => 'First name is required.',
            'min_length' => 'First name must be at least 2 characters.',
            'max_length' => 'First name cannot exceed 50 characters.',
            'alpha_space' => 'First name can only contain letters and spaces.'
        ],
        'last_name' => [
            'required' => 'Last name is required.',
            'min_length' => 'Last name must be at least 2 characters.',
            'max_length' => 'Last name cannot exceed 50 characters.',
            'alpha_space' => 'Last name can only contain letters and spaces.'
        ],
        'email' => [
            'required' => 'Email address is required.',
            'valid_email' => 'Please enter a valid email address.',
            'max_length' => 'Email address cannot exceed 100 characters.',
            'is_unique' => 'This email address is already registered.'
        ]
    ];

    // Skip validation for certain operations
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hash password before saving to database
     * 
     * @param array $data
     * @return array
     */
    protected function hashPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    /**
     * Get user by email
     * 
     * @param string $email
     * @return array|null
     */
    public function getUserByEmail(string $email): ?array
    {
        return $this->where('email', $email)
                   ->where('deleted_at', null)
                   ->first();
    }

    /**
     * Get user with full name
     * 
     * @param int $id
     * @return array|null
     */
    public function getUserWithFullName(int $id): ?array
    {
        $user = $this->find($id);
        if ($user) {
            $user['full_name'] = $user['first_name'] . ' ' . $user['last_name'];
        }
        return $user;
    }

    /**
     * Get active users
     * 
     * @return array
     */
    public function getActiveUsers(): array
    {
        return $this->where('status', 'active')
                   ->where('deleted_at', null)
                   ->findAll();
    }

    /**
     * Get users by role
     * 
     * @param string $role
     * @return array
     */
    public function getUsersByRole(string $role): array
    {
        return $this->where('role', $role)
                   ->where('deleted_at', null)
                   ->findAll();
    }

    /**
     * Get users by service interest
     * 
     * @param string $service
     * @return array
     */
    public function getUsersByServiceInterest(string $service): array
    {
        return $this->where('service_interest', $service)
                   ->where('deleted_at', null)
                   ->findAll();
    }

    /**
     * Update last login timestamp
     * 
     * @param int $userId
     * @return bool
     */
    public function updateLastLogin(int $userId): bool
    {
        return $this->update($userId, [
            'last_login' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Verify user email
     * 
     * @param int $userId
     * @return bool
     */
    public function verifyEmail(int $userId): bool
    {
        return $this->update($userId, [
            'email_verified' => 1,
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Change user status
     * 
     * @param int $userId
     * @param string $status
     * @return bool
     */
    public function changeStatus(int $userId, string $status): bool
    {
        if (!in_array($status, ['active', 'inactive', 'suspended'])) {
            return false;
        }

        return $this->update($userId, ['status' => $status]);
    }

    /**
     * Get user statistics
     * 
     * @return array
     */
    public function getUserStats(): array
    {
        $stats = [
            'total_users' => $this->where('deleted_at', null)->countAllResults(),
            'active_users' => $this->where('status', 'active')->where('deleted_at', null)->countAllResults(),
            'verified_users' => $this->where('email_verified', 1)->where('deleted_at', null)->countAllResults(),
            'recent_registrations' => $this->where('created_at >=', date('Y-m-d', strtotime('-30 days')))
                                          ->where('deleted_at', null)
                                          ->countAllResults()
        ];

        // Get users by role
        $roles = ['customer', 'admin', 'manager', 'technician'];
        foreach ($roles as $role) {
            $stats['users_by_role'][$role] = $this->where('role', $role)
                                                 ->where('deleted_at', null)
                                                 ->countAllResults();
        }

        // Get users by service interest
        $services = ['residential', 'commercial', 'industrial', 'emergency', 'consultation'];
        foreach ($services as $service) {
            $stats['users_by_service'][$service] = $this->where('service_interest', $service)
                                                       ->where('deleted_at', null)
                                                       ->countAllResults();
        }

        return $stats;
    }

    /**
     * Search users
     * 
     * @param string $query
     * @param int $limit
     * @return array
     */
    public function searchUsers(string $query, int $limit = 20): array
    {
        return $this->groupStart()
                   ->like('first_name', $query)
                   ->orLike('last_name', $query)
                   ->orLike('email', $query)
                   ->orLike('company', $query)
                   ->groupEnd()
                   ->where('deleted_at', null)
                   ->limit($limit)
                   ->findAll();
    }
}

