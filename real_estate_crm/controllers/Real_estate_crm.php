<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Real Estate CRM Dashboard Controller
 */
class Real_estate_crm extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('real_estate_crm_model');
        $this->load->library('real_estate_crm/real_estate_crm_lib');
    }

    /**
     * Default redirect to dashboard
     */
    public function index()
    {
        redirect(admin_url('real_estate_crm/dashboard'));
    }

    /**
     * Dashboard view
     */
    public function dashboard()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        $data['title'] = _l('re_dashboard');
        
        // Get dashboard statistics
        $data['stats'] = [
            'total_projects' => $this->real_estate_crm_model->count_projects(),
            'total_plots' => $this->real_estate_crm_model->count_plots(),
            'available_plots' => $this->real_estate_crm_model->count_plots(['status' => 'available']),
            'booked_plots' => $this->real_estate_crm_model->count_plots(['status' => 'booked']),
            'total_bookings' => $this->real_estate_crm_model->count_bookings(),
            'pending_bookings' => $this->real_estate_crm_model->count_bookings(['status' => 'pending']),
            'total_revenue' => $this->real_estate_crm_model->get_total_revenue(),
            'pending_payments' => $this->real_estate_crm_model->get_pending_payments(),
        ];
        
        // Get recent bookings
        $data['recent_bookings'] = $this->real_estate_crm_model->get_recent_bookings(5);
        
        // Get upcoming EMI payments
        $data['upcoming_emi'] = $this->real_estate_crm_model->get_upcoming_emi(10);
        
        // Get charts data
        $data['monthly_revenue'] = $this->real_estate_crm_model->get_monthly_revenue();
        $data['project_stats'] = $this->real_estate_crm_model->get_project_statistics();
        
        $this->load->view('admin/dashboard', $data);
    }

    /**
     * Projects listing
     */
    public function projects()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(REAL_ESTATE_CRM_MODULE, 'admin/tables/projects'));
        }

        $data['title'] = _l('re_projects');
        $this->load->view('admin/projects/manage', $data);
    }

    /**
     * Add/Edit project
     */
    public function project($id = '')
    {
        if ($this->input->post()) {
            if (!has_permission('real_estate_crm', '', 'create') && !has_permission('real_estate_crm', '', 'edit')) {
                access_denied('real_estate_crm');
            }

            $data = $this->input->post();
            
            if ($id == '') {
                $id = $this->real_estate_crm_model->add_project($data);
                if ($id) {
                    set_alert('success', _l('re_project_added'));
                }
            } else {
                $success = $this->real_estate_crm_model->update_project($id, $data);
                if ($success) {
                    set_alert('success', _l('re_project_updated'));
                }
            }
            redirect(admin_url('real_estate_crm/projects'));
        }

        if ($id != '') {
            $data['project'] = $this->real_estate_crm_model->get_project($id);
        }

        $data['title'] = $id != '' ? _l('re_edit_project') : _l('re_add_project');
        $this->load->view('admin/projects/project', $data);
    }

    /**
     * Delete project
     */
    public function delete_project($id)
    {
        if (!has_permission('real_estate_crm', '', 'delete')) {
            access_denied('real_estate_crm');
        }

        $response = $this->real_estate_crm_model->delete_project($id);
        if ($response) {
            set_alert('success', _l('re_project_deleted'));
        }
        redirect(admin_url('real_estate_crm/projects'));
    }

    /**
     * Plots listing
     */
    public function plots()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(REAL_ESTATE_CRM_MODULE, 'admin/tables/plots'));
        }

        $data['title'] = _l('re_plots');
        $data['projects'] = $this->real_estate_crm_model->get_projects();
        $this->load->view('admin/plots/manage', $data);
    }

    /**
     * Add/Edit plot
     */
    public function plot($id = '')
    {
        if ($this->input->post()) {
            if (!has_permission('real_estate_crm', '', 'create') && !has_permission('real_estate_crm', '', 'edit')) {
                access_denied('real_estate_crm');
            }

            $data = $this->input->post();
            
            if ($id == '') {
                $id = $this->real_estate_crm_model->add_plot($data);
                if ($id) {
                    set_alert('success', _l('re_plot_added'));
                }
            } else {
                $success = $this->real_estate_crm_model->update_plot($id, $data);
                if ($success) {
                    set_alert('success', _l('re_plot_updated'));
                }
            }
            redirect(admin_url('real_estate_crm/plots'));
        }

        if ($id != '') {
            $data['plot'] = $this->real_estate_crm_model->get_plot($id);
        }

        $data['title'] = $id != '' ? _l('re_edit_plot') : _l('re_add_plot');
        $data['projects'] = $this->real_estate_crm_model->get_projects();
        $this->load->view('admin/plots/plot', $data);
    }

    /**
     * Delete plot
     */
    public function delete_plot($id)
    {
        if (!has_permission('real_estate_crm', '', 'delete')) {
            access_denied('real_estate_crm');
        }

        $response = $this->real_estate_crm_model->delete_plot($id);
        if ($response) {
            set_alert('success', _l('re_plot_deleted'));
        }
        redirect(admin_url('real_estate_crm/plots'));
    }

    /**
     * Bookings listing
     */
    public function bookings()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(REAL_ESTATE_CRM_MODULE, 'admin/tables/bookings'));
        }

        $data['title'] = _l('re_bookings');
        $data['bookings'] = $this->real_estate_crm_model->get_bookings();
        $this->load->view('admin/bookings/manage', $data);
    }

    /**
     * Add/Edit booking
     */
    public function booking($id = '')
    {
        if ($this->input->post()) {
            if (!has_permission('real_estate_crm', '', 'create') && !has_permission('real_estate_crm', '', 'edit')) {
                access_denied('real_estate_crm');
            }

            $data = $this->input->post();
            
            if ($id == '') {
                $id = $this->real_estate_crm_model->add_booking($data);
                if ($id) {
                    set_alert('success', _l('re_booking_added'));
                }
            } else {
                $success = $this->real_estate_crm_model->update_booking($id, $data);
                if ($success) {
                    set_alert('success', _l('re_booking_updated'));
                }
            }
            redirect(admin_url('real_estate_crm/bookings'));
        }

        if ($id != '') {
            $data['booking'] = $this->real_estate_crm_model->get_booking($id);
        }

        $data['title'] = $id != '' ? _l('re_edit_booking') : _l('re_add_booking');
        $data['plots'] = $this->real_estate_crm_model->get_available_plots();
        $data['agents'] = $this->real_estate_crm_model->get_agents(['status' => 'active']);
        
        // Load Perfex customers
        $this->load->model('clients_model');
        $data['customers'] = $this->clients_model->get();
        
        $this->load->view('admin/bookings/booking', $data);
    }

    /**
     * Delete booking
     */
    public function delete_booking($id)
    {
        if (!has_permission('real_estate_crm', '', 'delete')) {
            access_denied('real_estate_crm');
        }

        $response = $this->real_estate_crm_model->delete_booking($id);
        if ($response) {
            set_alert('success', _l('re_booking_deleted'));
        }
        redirect(admin_url('real_estate_crm/bookings'));
    }

    /**
     * Generate invoice for booking
     */
    public function generate_booking_invoice($booking_id)
    {
        if (!has_permission('real_estate_crm', '', 'create')) {
            access_denied('real_estate_crm');
        }

        $invoice_id = $this->real_estate_crm_model->generate_booking_invoice($booking_id);
        
        if ($invoice_id) {
            set_alert('success', _l('re_invoice_generated'));
            redirect(admin_url('invoices/invoice/' . $invoice_id));
        } else {
            set_alert('danger', 'Failed to generate invoice');
            redirect(admin_url('real_estate_crm/bookings'));
        }
    }

    /**
     * Generate invoice for EMI
     */
    public function generate_emi_invoice($emi_id)
    {
        if (!has_permission('real_estate_crm', '', 'create')) {
            access_denied('real_estate_crm');
        }

        $invoice_id = $this->real_estate_crm_model->generate_emi_invoice($emi_id);
        
        if ($invoice_id) {
            set_alert('success', _l('re_invoice_generated'));
            redirect(admin_url('invoices/invoice/' . $invoice_id));
        } else {
            set_alert('danger', 'Failed to generate invoice');
            redirect(admin_url('real_estate_crm/emi'));
        }
    }

    /**
     * EMI Management
     */
    public function emi()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(REAL_ESTATE_CRM_MODULE, 'admin/tables/emi'));
        }

        $data['title'] = _l('re_emi');
        $this->load->view('admin/emi/manage', $data);
    }

    /**
     * Generate EMI schedule
     */
    public function generate_emi_schedule($booking_id)
    {
        if (!has_permission('real_estate_crm', '', 'create')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->post()) {
            $data = $this->input->post();
            $result = $this->real_estate_crm_model->generate_emi_schedule($booking_id, $data);
            
            if ($result) {
                set_alert('success', _l('re_emi_added'));
            }
        }

        redirect(admin_url('real_estate_crm/emi'));
    }

    /**
     * Record EMI payment
     */
    public function record_emi_payment($id)
    {
        if (!has_permission('real_estate_crm', '', 'edit')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->post()) {
            $data = $this->input->post();
            $result = $this->real_estate_crm_model->record_emi_payment($id, $data);
            
            if ($result) {
                set_alert('success', _l('re_emi_updated'));
            }
        }

        redirect(admin_url('real_estate_crm/emi'));
    }

    /**
     * Accounts and Transactions
     */
    public function accounts()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(REAL_ESTATE_CRM_MODULE, 'admin/tables/transactions'));
        }

        $data['title'] = _l('re_accounts');
        $data['total_revenue'] = $this->real_estate_crm_model->get_total_revenue();
        $data['pending_payments'] = $this->real_estate_crm_model->get_pending_payments();
        $this->load->view('admin/accounts/manage', $data);
    }

    /**
     * Agents listing
     */
    public function agents()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(REAL_ESTATE_CRM_MODULE, 'admin/tables/agents'));
        }

        $data['title'] = _l('re_agents');
        $this->load->view('admin/agents/manage', $data);
    }

    /**
     * Add/Edit agent
     */
    public function agent($id = '')
    {
        if ($this->input->post()) {
            if (!has_permission('real_estate_crm', '', 'create') && !has_permission('real_estate_crm', '', 'edit')) {
                access_denied('real_estate_crm');
            }

            $data = $this->input->post();
            
            if ($id == '') {
                $id = $this->real_estate_crm_model->add_agent($data);
                if ($id) {
                    set_alert('success', _l('re_agent_added'));
                }
            } else {
                $success = $this->real_estate_crm_model->update_agent($id, $data);
                if ($success) {
                    set_alert('success', _l('re_agent_updated'));
                }
            }
            redirect(admin_url('real_estate_crm/agents'));
        }

        if ($id != '') {
            $data['agent'] = $this->real_estate_crm_model->get_agent($id);
        }

        $data['title'] = $id != '' ? _l('re_edit_agent') : _l('re_add_agent');
        $data['staff_members'] = $this->staff_model->get();
        $this->load->view('admin/agents/agent', $data);
    }

    /**
     * Delete agent
     */
    public function delete_agent($id)
    {
        if (!has_permission('real_estate_crm', '', 'delete')) {
            access_denied('real_estate_crm');
        }

        $response = $this->real_estate_crm_model->delete_agent($id);
        if ($response) {
            set_alert('success', _l('re_agent_deleted'));
        }
        redirect(admin_url('real_estate_crm/agents'));
    }

    /**
     * Team Management
     */
    public function team()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->is_ajax_request()) {
            $this->app->get_table_data(module_views_path(REAL_ESTATE_CRM_MODULE, 'admin/tables/team'));
        }

        $data['title'] = _l('re_team');
        $this->load->view('admin/team/manage', $data);
    }

    /**
     * Add/Edit team member
     */
    public function team_member($id = '')
    {
        if ($this->input->post()) {
            if (!has_permission('real_estate_crm', '', 'create') && !has_permission('real_estate_crm', '', 'edit')) {
                access_denied('real_estate_crm');
            }

            $data = $this->input->post();
            
            if ($id == '') {
                $id = $this->real_estate_crm_model->add_team_member($data);
                if ($id) {
                    set_alert('success', _l('re_team_added'));
                }
            } else {
                $success = $this->real_estate_crm_model->update_team_member($id, $data);
                if ($success) {
                    set_alert('success', _l('re_team_updated'));
                }
            }
            redirect(admin_url('real_estate_crm/team'));
        }

        if ($id != '') {
            $data['team_member'] = $this->real_estate_crm_model->get_team_member($id);
        }

        $data['title'] = $id != '' ? _l('re_edit_team_member') : _l('re_add_team_member');
        $data['staff_members'] = $this->staff_model->get();
        $data['projects'] = $this->real_estate_crm_model->get_projects();
        $this->load->view('admin/team/team_member', $data);
    }

    /**
     * Delete team member
     */
    public function delete_team_member($id)
    {
        if (!has_permission('real_estate_crm', '', 'delete')) {
            access_denied('real_estate_crm');
        }

        $response = $this->real_estate_crm_model->delete_team_member($id);
        if ($response) {
            set_alert('success', _l('re_team_deleted'));
        }
        redirect(admin_url('real_estate_crm/team'));
    }

    /**
     * Settings
     */
    public function settings()
    {
        if (!has_permission('real_estate_crm', '', 'view')) {
            access_denied('real_estate_crm');
        }

        if ($this->input->post()) {
            $data = $this->input->post();
            $success = $this->real_estate_crm_model->update_settings($data);
            
            if ($success) {
                set_alert('success', _l('re_settings_updated'));
            }
            redirect(admin_url('real_estate_crm/settings'));
        }

        $data['title'] = _l('re_settings');
        $data['settings'] = $this->real_estate_crm_model->get_settings();
        $this->load->view('admin/settings', $data);
    }
}
