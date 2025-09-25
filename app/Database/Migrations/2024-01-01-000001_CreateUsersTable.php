<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Users Table Migration
 * 
 * Creates the users table for the electric company CMS
 * Demonstrates CodeIgniter 4 database migration concepts
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migration - Create users table
     */
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'comment' => 'Primary key'
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'User first name'
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'User last name'
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
                'comment' => 'User email address (unique)'
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'comment' => 'User phone number'
            ],
            'company' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'comment' => 'Company name (optional)'
            ],
            'service_interest' => [
                'type' => 'ENUM',
                'constraint' => ['residential', 'commercial', 'industrial', 'emergency', 'consultation'],
                'default' => 'residential',
                'comment' => 'Primary service interest'
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'comment' => 'Hashed password'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive', 'suspended'],
                'default' => 'active',
                'comment' => 'User account status'
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['customer', 'admin', 'manager', 'technician'],
                'default' => 'customer',
                'comment' => 'User role in the system'
            ],
            'email_verified' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'comment' => 'Email verification status (0=not verified, 1=verified)'
            ],
            'email_verified_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Email verification timestamp'
            ],
            'last_login' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Last login timestamp'
            ],
            'profile_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'comment' => 'Profile image file path'
            ],
            'preferences' => [
                'type' => 'JSON',
                'null' => true,
                'comment' => 'User preferences in JSON format'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Record creation timestamp'
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Record last update timestamp'
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'comment' => 'Soft delete timestamp'
            ]
        ]);

        // Set primary key
        $this->forge->addPrimaryKey('id');

        // Add indexes for better performance
        $this->forge->addUniqueKey('email', 'unique_email');
        $this->forge->addKey('status', false, false, 'idx_status');
        $this->forge->addKey('role', false, false, 'idx_role');
        $this->forge->addKey('service_interest', false, false, 'idx_service_interest');
        $this->forge->addKey('created_at', false, false, 'idx_created_at');
        $this->forge->addKey('deleted_at', false, false, 'idx_deleted_at');

        // Create the table
        $this->forge->createTable('users', true, [
            'ENGINE' => 'InnoDB',
            'CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_unicode_ci',
            'COMMENT' => 'Users table for electric company CMS'
        ]);

        echo "Users table created successfully.\n";
    }

    /**
     * Reverse the migration - Drop users table
     */
    public function down()
    {
        $this->forge->dropTable('users', true);
        echo "Users table dropped successfully.\n";
    }
}

