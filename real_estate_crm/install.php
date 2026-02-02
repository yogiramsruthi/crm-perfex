<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Real Estate CRM Module Installation
 */

if (!$CI->db->table_exists(db_prefix() . 'real_estate_projects')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_projects` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL,
        `description` TEXT NULL,
        `location` VARCHAR(255) NULL,
        `total_plots` INT DEFAULT 0,
        `available_plots` INT DEFAULT 0,
        `start_date` DATE NULL,
        `end_date` DATE NULL,
        `status` VARCHAR(50) DEFAULT "active",
        `project_type` VARCHAR(50) NULL,
        `developer_name` VARCHAR(255) NULL,
        `approval_number` VARCHAR(100) NULL,
        `total_area` VARCHAR(100) NULL,
        `amenities` TEXT NULL,
        `payment_terms` TEXT NULL,
        `bank_loan_available` TINYINT(1) DEFAULT 0,
        `possession_date` DATE NULL,
        `legal_status` VARCHAR(100) NULL,
        `contact_person` VARCHAR(255) NULL,
        `contact_phone` VARCHAR(50) NULL,
        `contact_email` VARCHAR(255) NULL,
        `created_by` INT NOT NULL,
        `created_at` DATETIME NOT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
}

if (!$CI->db->table_exists(db_prefix() . 'real_estate_plots')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_plots` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `project_id` INT UNSIGNED NOT NULL,
        `plot_number` VARCHAR(100) NOT NULL,
        `plot_size` VARCHAR(100) NULL,
        `plot_type` VARCHAR(50) NULL,
        `price` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
        `status` VARCHAR(50) DEFAULT "available",
        `description` TEXT NULL,
        `created_by` INT NOT NULL,
        `created_at` DATETIME NOT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`),
        KEY `project_id` (`project_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
}

if (!$CI->db->table_exists(db_prefix() . 'real_estate_bookings')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_bookings` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `plot_id` INT UNSIGNED NOT NULL,
        `customer_id` INT UNSIGNED NOT NULL,
        `agent_id` INT UNSIGNED NULL,
        `invoice_id` INT UNSIGNED NULL,
        `booking_date` DATE NOT NULL,
        `total_amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
        `paid_amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
        `balance_amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
        `payment_type` VARCHAR(50) DEFAULT "emi",
        `status` VARCHAR(50) DEFAULT "pending",
        `notes` TEXT NULL,
        `created_by` INT NOT NULL,
        `created_at` DATETIME NOT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`),
        KEY `plot_id` (`plot_id`),
        KEY `customer_id` (`customer_id`),
        KEY `agent_id` (`agent_id`),
        KEY `invoice_id` (`invoice_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
}

if (!$CI->db->table_exists(db_prefix() . 'real_estate_emi')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_emi` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `booking_id` INT UNSIGNED NOT NULL,
        `invoice_id` INT UNSIGNED NULL,
        `emi_number` INT NOT NULL,
        `due_date` DATE NOT NULL,
        `amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
        `paid_amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
        `payment_date` DATE NULL,
        `status` VARCHAR(50) DEFAULT "pending",
        `payment_mode` VARCHAR(50) NULL,
        `transaction_id` VARCHAR(100) NULL,
        `notes` TEXT NULL,
        `created_at` DATETIME NOT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`),
        KEY `booking_id` (`booking_id`),
        KEY `invoice_id` (`invoice_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
}

if (!$CI->db->table_exists(db_prefix() . 'real_estate_transactions')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_transactions` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `booking_id` INT UNSIGNED NULL,
        `emi_id` INT UNSIGNED NULL,
        `transaction_type` VARCHAR(50) NOT NULL,
        `amount` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
        `payment_mode` VARCHAR(50) NULL,
        `transaction_date` DATE NOT NULL,
        `reference_number` VARCHAR(100) NULL,
        `description` TEXT NULL,
        `created_by` INT NOT NULL,
        `created_at` DATETIME NOT NULL,
        PRIMARY KEY (`id`),
        KEY `booking_id` (`booking_id`),
        KEY `emi_id` (`emi_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
}

if (!$CI->db->table_exists(db_prefix() . 'real_estate_agents')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_agents` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `staff_id` INT UNSIGNED NULL,
        `name` VARCHAR(255) NOT NULL,
        `email` VARCHAR(255) NULL,
        `phone` VARCHAR(50) NULL,
        `commission_rate` DECIMAL(5,2) DEFAULT 0.00,
        `total_sales` INT DEFAULT 0,
        `total_commission` DECIMAL(15,2) DEFAULT 0.00,
        `status` VARCHAR(50) DEFAULT "active",
        `joined_date` DATE NULL,
        `address` TEXT NULL,
        `created_by` INT NOT NULL,
        `created_at` DATETIME NOT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`),
        KEY `staff_id` (`staff_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
}

if (!$CI->db->table_exists(db_prefix() . 'real_estate_team')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_team` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `staff_id` INT UNSIGNED NOT NULL,
        `project_id` INT UNSIGNED NULL,
        `role` VARCHAR(100) NOT NULL,
        `assigned_date` DATE NOT NULL,
        `status` VARCHAR(50) DEFAULT "active",
        `notes` TEXT NULL,
        `created_by` INT NOT NULL,
        `created_at` DATETIME NOT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`),
        KEY `staff_id` (`staff_id`),
        KEY `project_id` (`project_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
}

if (!$CI->db->table_exists(db_prefix() . 'real_estate_settings')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_settings` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `setting_key` VARCHAR(100) NOT NULL UNIQUE,
        `setting_value` TEXT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
    
    // Insert default settings
    $CI->db->query("INSERT INTO `" . db_prefix() . "real_estate_settings` (`setting_key`, `setting_value`, `updated_at`) VALUES
        ('default_emi_interest_rate', '10', NOW()),
        ('default_booking_validity', '30', NOW()),
        ('enable_email_notifications', '1', NOW()),
        ('enable_sms_notifications', '0', NOW()),
        ('auto_generate_invoice', '1', NOW()),
        ('enable_customer_booking', '1', NOW())
    ");
}

// Create EMI Plans table (for predefined EMI templates)
if (!$CI->db->table_exists(db_prefix() . 'real_estate_emi_plans')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_emi_plans` (
        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
        `plan_name` VARCHAR(255) NOT NULL,
        `tenor_months` INT NOT NULL,
        `interest_rate` DECIMAL(5,2) NOT NULL DEFAULT 0.00,
        `down_payment_percent` DECIMAL(5,2) NOT NULL DEFAULT 0.00,
        `processing_fee` DECIMAL(15,2) DEFAULT 0.00,
        `min_amount` DECIMAL(15,2) DEFAULT 0.00,
        `max_amount` DECIMAL(15,2) DEFAULT 0.00,
        `description` TEXT NULL,
        `status` VARCHAR(50) DEFAULT "active",
        `created_by` INT NOT NULL,
        `created_at` DATETIME NOT NULL,
        `updated_at` DATETIME NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=' . $CI->db->char_set . ';');
    
    // Insert sample EMI plans
    $CI->db->query("INSERT INTO `" . db_prefix() . "real_estate_emi_plans` (`plan_name`, `tenor_months`, `interest_rate`, `down_payment_percent`, `processing_fee`, `description`, `status`, `created_by`, `created_at`) VALUES
        ('3 Months - 0% Interest', 3, 0.00, 30.00, 0.00, 'Short term payment plan with no interest', 'active', 1, NOW()),
        ('6 Months - 5% Interest', 6, 5.00, 25.00, 0.00, 'Half year plan with low interest', 'active', 1, NOW()),
        ('12 Months - 10% Interest', 12, 10.00, 20.00, 0.00, 'One year standard plan', 'active', 1, NOW()),
        ('24 Months - 12% Interest', 24, 12.00, 20.00, 0.00, 'Two year extended plan', 'active', 1, NOW()),
        ('36 Months - 15% Interest', 36, 15.00, 15.00, 0.00, 'Three year long term plan', 'active', 1, NOW())
    ");
}

// Add custom permissions
$CI->db->query("INSERT INTO `" . db_prefix() . "permissions` (`name`, `shortname`) VALUES 
    ('Real Estate CRM', 'real_estate_crm')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`)");
