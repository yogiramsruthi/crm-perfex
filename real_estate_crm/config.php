<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Real Estate CRM
Description: Comprehensive Real Estate Management System for Perfex CRM with Projects, Plots, Bookings, EMI, Agents, and Team Management
Version: 1.0.0
Author: Real Estate CRM Team
*/

define('REAL_ESTATE_CRM_MODULE', 'real_estate_crm');
define('REAL_ESTATE_CRM_VERSION', '1.0.0');

// Register module activation hook
hooks_add_action('admin_init', 'real_estate_crm_init_menu_items');
hooks_add_action('admin_init', 'real_estate_crm_permissions');
hooks_add_action('clients_init', 'real_estate_crm_init_client_menu_items');
hooks_add_filter('module_' . REAL_ESTATE_CRM_MODULE . '_action_links', 'real_estate_crm_action_links');
hooks_add_action('after_invoice_updated', 'real_estate_crm_invoice_updated');
hooks_add_action('after_invoice_added', 'real_estate_crm_invoice_added');

/**
 * Register module information
 */
register_activation_hook(REAL_ESTATE_CRM_MODULE, 'real_estate_crm_module_activation_hook');

function real_estate_crm_module_activation_hook()
{
    $CI = &get_instance();
    require_once(__DIR__ . '/install.php');
}

/**
 * Register module deactivation hook
 */
register_deactivation_hook(REAL_ESTATE_CRM_MODULE, 'real_estate_crm_module_deactivation_hook');

function real_estate_crm_module_deactivation_hook()
{
    // Nothing to do on deactivation
}

/**
 * Initialize menu items
 */
function real_estate_crm_init_menu_items()
{
    $CI = &get_instance();
    
    if (has_permission('real_estate_crm', '', 'view')) {
        // Main menu item
        $CI->app_menu->add_sidebar_menu_item('real_estate_crm', [
            'name'     => _l('real_estate_crm'),
            'icon'     => 'fa fa-building',
            'position' => 30,
        ]);
        
        // Dashboard
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_dashboard',
            'name'     => _l('dashboard'),
            'icon'     => 'fa fa-dashboard',
            'href'     => admin_url('real_estate_crm/dashboard'),
            'position' => 1,
        ]);
        
        // Projects
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_projects',
            'name'     => _l('re_projects'),
            'icon'     => 'fa fa-project-diagram',
            'href'     => admin_url('real_estate_crm/projects'),
            'position' => 2,
        ]);
        
        // Plots
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_plots',
            'name'     => _l('re_plots'),
            'icon'     => 'fa fa-map-marker',
            'href'     => admin_url('real_estate_crm/plots'),
            'position' => 3,
        ]);
        
        // Bookings
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_bookings',
            'name'     => _l('re_bookings'),
            'icon'     => 'fa fa-calendar-check-o',
            'href'     => admin_url('real_estate_crm/bookings'),
            'position' => 4,
        ]);
        
        // EMI
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_emi',
            'name'     => _l('re_emi'),
            'icon'     => 'fa fa-credit-card',
            'href'     => admin_url('real_estate_crm/emi'),
            'position' => 5,
        ]);
        
        // Accounts
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_accounts',
            'name'     => _l('re_accounts'),
            'icon'     => 'fa fa-money',
            'href'     => admin_url('real_estate_crm/accounts'),
            'position' => 6,
        ]);
        
        // Agents
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_agents',
            'name'     => _l('re_agents'),
            'icon'     => 'fa fa-users',
            'href'     => admin_url('real_estate_crm/agents'),
            'position' => 7,
        ]);
        
        // Team
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_team',
            'name'     => _l('re_team'),
            'icon'     => 'fa fa-user-circle',
            'href'     => admin_url('real_estate_crm/team'),
            'position' => 8,
        ]);
        
        // Settings
        $CI->app_menu->add_sidebar_children_item('real_estate_crm', [
            'slug'     => 'real_estate_crm_settings',
            'name'     => _l('settings'),
            'icon'     => 'fa fa-cog',
            'href'     => admin_url('real_estate_crm/settings'),
            'position' => 9,
        ]);
    }
}

/**
 * Register permissions
 */
function real_estate_crm_permissions()
{
    $capabilities = [];
    
    $capabilities['capabilities'] = [
        'view'   => _l('permission_view') . '(' . _l('permission_global') . ')',
        'create' => _l('permission_create'),
        'edit'   => _l('permission_edit'),
        'delete' => _l('permission_delete'),
    ];
    
    register_staff_capabilities('real_estate_crm', $capabilities, _l('real_estate_crm'));
}

/**
 * Add module action links
 */
function real_estate_crm_action_links($actions)
{
    $actions[] = '<a href="' . admin_url('real_estate_crm/settings') . '">' . _l('settings') . '</a>';
    return $actions;
}

/**
 * Initialize client portal menu items
 */
function real_estate_crm_init_client_menu_items()
{
    if (is_client_logged_in()) {
        $CI = &get_instance();
        
        // Add main menu item for client portal
        $CI->app_menu->add_sidebar_menu_item('real_estate_portal', [
            'name'     => _l('real_estate_crm'),
            'href'     => site_url('real_estate_crm/my_real_estate/dashboard'),
            'icon'     => 'fa fa-building',
            'position' => 30,
        ]);
        
        // Add submenu items
        $CI->app_menu->add_sidebar_children_item('real_estate_portal', [
            'slug'     => 'real_estate_portal_dashboard',
            'name'     => _l('dashboard'),
            'href'     => site_url('real_estate_crm/my_real_estate/dashboard'),
            'icon'     => 'fa fa-dashboard',
            'position' => 1,
        ]);
        
        $CI->app_menu->add_sidebar_children_item('real_estate_portal', [
            'slug'     => 'real_estate_portal_bookings',
            'name'     => _l('re_my_bookings'),
            'href'     => site_url('real_estate_crm/my_real_estate/bookings'),
            'icon'     => 'fa fa-calendar-check-o',
            'position' => 2,
        ]);
        
        $CI->app_menu->add_sidebar_children_item('real_estate_portal', [
            'slug'     => 'real_estate_portal_plots',
            'name'     => _l('re_my_plots'),
            'href'     => site_url('real_estate_crm/my_real_estate/plots'),
            'icon'     => 'fa fa-map-marker',
            'position' => 3,
        ]);
        
        $CI->app_menu->add_sidebar_children_item('real_estate_portal', [
            'slug'     => 'real_estate_portal_browse',
            'name'     => _l('re_browse_plots'),
            'href'     => site_url('real_estate_crm/my_real_estate/browse_plots'),
            'icon'     => 'fa fa-search',
            'position' => 4,
        ]);
        
        $CI->app_menu->add_sidebar_children_item('real_estate_portal', [
            'slug'     => 'real_estate_portal_emi',
            'name'     => _l('re_emi_schedule'),
            'href'     => site_url('real_estate_crm/my_real_estate/emi_schedule'),
            'icon'     => 'fa fa-credit-card',
            'position' => 5,
        ]);
        
        $CI->app_menu->add_sidebar_children_item('real_estate_portal', [
            'slug'     => 'real_estate_portal_payments',
            'name'     => _l('re_payment_history'),
            'href'     => site_url('real_estate_crm/my_real_estate/payment_history'),
            'icon'     => 'fa fa-money',
            'position' => 6,
        ]);
    }
}


/**
 * Handle invoice updates - sync with bookings/EMI
 */
function real_estate_crm_invoice_updated($invoice_id)
{
    $CI = &get_instance();
    $CI->load->model('real_estate_crm/real_estate_crm_model');
    $CI->real_estate_crm_model->sync_invoice_payment($invoice_id);
}

/**
 * Handle new invoices - sync with bookings/EMI
 */
function real_estate_crm_invoice_added($invoice_id)
{
    $CI = &get_instance();
    $CI->load->model('real_estate_crm/real_estate_crm_model');
    $CI->real_estate_crm_model->sync_invoice_payment($invoice_id);
}
