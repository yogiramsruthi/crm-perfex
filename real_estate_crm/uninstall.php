<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Real Estate CRM Module Uninstallation
 * Note: This will remove all data. Use with caution.
 */

// Optionally drop tables (commented out for safety)
/*
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_settings`');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_team`');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_agents`');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_transactions`');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_emi`');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_bookings`');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_plots`');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'real_estate_projects`');
*/

// Remove custom permissions
$CI->db->where('shortname', 'real_estate_crm');
$CI->db->delete(db_prefix() . 'permissions');
