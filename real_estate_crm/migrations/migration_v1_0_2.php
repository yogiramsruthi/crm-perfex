<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Migration: Enhance Real Estate Projects and Add Invoice Integration
 * Version: 1.0.2
 */

// Enhance Projects Table with more fields
if ($CI->db->field_exists('location', db_prefix() . 'real_estate_projects')) {
    $CI->db->query('ALTER TABLE `' . db_prefix() . 'real_estate_projects` 
        ADD COLUMN `project_type` VARCHAR(50) NULL AFTER `status`,
        ADD COLUMN `developer_name` VARCHAR(255) NULL AFTER `project_type`,
        ADD COLUMN `approval_number` VARCHAR(100) NULL AFTER `developer_name`,
        ADD COLUMN `total_area` VARCHAR(100) NULL AFTER `approval_number`,
        ADD COLUMN `amenities` TEXT NULL AFTER `total_area`,
        ADD COLUMN `payment_terms` TEXT NULL AFTER `amenities`,
        ADD COLUMN `bank_loan_available` TINYINT(1) DEFAULT 0 AFTER `payment_terms`,
        ADD COLUMN `possession_date` DATE NULL AFTER `bank_loan_available`,
        ADD COLUMN `legal_status` VARCHAR(100) NULL AFTER `possession_date`,
        ADD COLUMN `contact_person` VARCHAR(255) NULL AFTER `legal_status`,
        ADD COLUMN `contact_phone` VARCHAR(50) NULL AFTER `contact_person`,
        ADD COLUMN `contact_email` VARCHAR(255) NULL AFTER `contact_phone`
    ');
}

// Add invoice_id to bookings table
if (!$CI->db->field_exists('invoice_id', db_prefix() . 'real_estate_bookings')) {
    $CI->db->query('ALTER TABLE `' . db_prefix() . 'real_estate_bookings` 
        ADD COLUMN `invoice_id` INT UNSIGNED NULL AFTER `agent_id`,
        ADD KEY `invoice_id` (`invoice_id`)
    ');
}

// Add invoice_id to EMI table
if (!$CI->db->field_exists('invoice_id', db_prefix() . 'real_estate_emi')) {
    $CI->db->query('ALTER TABLE `' . db_prefix() . 'real_estate_emi` 
        ADD COLUMN `invoice_id` INT UNSIGNED NULL AFTER `booking_id`,
        ADD KEY `invoice_id` (`invoice_id`)
    ');
}
