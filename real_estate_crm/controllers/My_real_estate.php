<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Real Estate CRM Client Portal Controller
 * Allows customers to view their bookings, plots, EMI schedules, and payment history
 */
class My_real_estate extends ClientsController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('real_estate_crm/real_estate_crm_model');
    }

    /**
     * Client Portal Dashboard
     */
    public function index()
    {
        // Redirect to dashboard
        redirect(site_url('real_estate_crm/my_real_estate/dashboard'));
    }

    /**
     * Customer Dashboard
     */
    public function dashboard()
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $customer_id = get_client_user_id();
        
        $data['title'] = _l('re_client_dashboard');
        
        // Get customer's bookings
        $data['bookings'] = $this->real_estate_crm_model->get_bookings(['customer_id' => $customer_id]);
        $data['total_bookings'] = count($data['bookings']);
        
        // Get total amounts
        $total_amount = 0;
        $paid_amount = 0;
        $balance_amount = 0;
        
        foreach ($data['bookings'] as $booking) {
            $total_amount += $booking['total_amount'];
            $paid_amount += $booking['paid_amount'];
            $balance_amount += $booking['balance_amount'];
        }
        
        $data['total_amount'] = $total_amount;
        $data['paid_amount'] = $paid_amount;
        $data['balance_amount'] = $balance_amount;
        
        // Get upcoming EMI payments
        $data['upcoming_emi'] = $this->get_customer_upcoming_emi($customer_id);
        
        // Get recent transactions
        $data['recent_transactions'] = $this->get_customer_transactions($customer_id, 5);
        
        $this->data($data);
        $this->view('real_estate_crm/client/dashboard');
        $this->layout();
    }

    /**
     * View all customer bookings
     */
    public function bookings()
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $customer_id = get_client_user_id();
        
        $data['title'] = _l('re_my_bookings');
        $data['bookings'] = $this->real_estate_crm_model->get_bookings(['customer_id' => $customer_id]);
        
        $this->data($data);
        $this->view('real_estate_crm/client/bookings');
        $this->layout();
    }

    /**
     * View specific booking details
     */
    public function booking($booking_id)
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $customer_id = get_client_user_id();
        $booking = $this->real_estate_crm_model->get_booking($booking_id);
        
        // Security check - ensure customer owns this booking
        if (!$booking || $booking['customer_id'] != $customer_id) {
            show_404();
        }
        
        $data['title'] = _l('re_booking_details');
        $data['booking'] = $booking;
        
        // Get EMI schedule for this booking
        $data['emi_schedule'] = $this->real_estate_crm_model->get_emi_list(['booking_id' => $booking_id]);
        
        $this->data($data);
        $this->view('real_estate_crm/client/booking_details');
        $this->layout();
    }

    /**
     * View customer's plots
     */
    public function plots()
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $customer_id = get_client_user_id();
        
        $data['title'] = _l('re_my_plots');
        
        // Get plots through bookings
        $bookings = $this->real_estate_crm_model->get_bookings(['customer_id' => $customer_id]);
        $plot_ids = array_column($bookings, 'plot_id');
        
        $data['plots'] = [];
        foreach ($plot_ids as $plot_id) {
            $plot = $this->real_estate_crm_model->get_plot($plot_id);
            if ($plot) {
                $data['plots'][] = $plot;
            }
        }
        
        $this->data($data);
        $this->view('real_estate_crm/client/plots');
        $this->layout();
    }

    /**
     * View EMI schedule
     */
    public function emi_schedule()
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $customer_id = get_client_user_id();
        
        $data['title'] = _l('re_emi_schedule');
        
        // Get all customer's EMIs
        $bookings = $this->real_estate_crm_model->get_bookings(['customer_id' => $customer_id]);
        $booking_ids = array_column($bookings, 'id');
        
        $data['emi_list'] = [];
        foreach ($booking_ids as $booking_id) {
            $emis = $this->real_estate_crm_model->get_emi_list(['booking_id' => $booking_id]);
            $data['emi_list'] = array_merge($data['emi_list'], $emis);
        }
        
        // Sort by due date
        usort($data['emi_list'], function($a, $b) {
            return strtotime($a['due_date']) - strtotime($b['due_date']);
        });
        
        $this->data($data);
        $this->view('real_estate_crm/client/emi_schedule');
        $this->layout();
    }

    /**
     * View payment history
     */
    public function payment_history()
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $customer_id = get_client_user_id();
        
        $data['title'] = _l('re_payment_history');
        $data['transactions'] = $this->get_customer_transactions($customer_id);
        
        $this->data($data);
        $this->view('real_estate_crm/client/payment_history');
        $this->layout();
    }

    /**
     * Browse available plots for booking
     */
    public function browse_plots()
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $data['title'] = _l('re_browse_plots');
        
        // Get all available plots with project details
        $data['available_plots'] = $this->real_estate_crm_model->get_available_plots_for_customer();
        
        // Get all active projects
        $data['projects'] = $this->real_estate_crm_model->get_projects(['status' => 'active']);
        
        $this->data($data);
        $this->view('real_estate_crm/client/browse_plots');
        $this->layout();
    }

    /**
     * View plot details before booking
     */
    public function plot_details($plot_id)
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        $plot = $this->real_estate_crm_model->get_plot($plot_id);
        
        if (!$plot || $plot['status'] != 'available') {
            set_alert('danger', _l('re_plot_not_available'));
            redirect(site_url('real_estate_crm/my_real_estate/browse_plots'));
        }
        
        $data['title'] = _l('re_plot_details');
        $data['plot'] = $plot;
        
        // Get EMI plans for calculator
        $data['emi_plans'] = $this->real_estate_crm_model->get_emi_plans(['status' => 'active']);
        
        $this->data($data);
        $this->view('real_estate_crm/client/plot_details');
        $this->layout();
    }

    /**
     * Submit booking request (customer side)
     */
    public function submit_booking()
    {
        if (!is_client_logged_in()) {
            redirect(site_url('authentication/login'));
        }

        if ($this->input->post()) {
            $customer_id = get_client_user_id();
            $plot_id = $this->input->post('plot_id');
            
            // Verify plot is still available
            $plot = $this->real_estate_crm_model->get_plot($plot_id);
            if (!$plot || $plot['status'] != 'available') {
                set_alert('danger', _l('re_plot_not_available'));
                redirect(site_url('real_estate_crm/my_real_estate/browse_plots'));
            }
            
            // Create booking data
            $booking_data = [
                'plot_id' => $plot_id,
                'customer_id' => $customer_id,
                'booking_date' => date('Y-m-d'),
                'total_amount' => $this->input->post('total_amount'),
                'paid_amount' => $this->input->post('down_payment', true) ?: 0,
                'balance_amount' => $this->input->post('total_amount') - ($this->input->post('down_payment', true) ?: 0),
                'payment_type' => $this->input->post('payment_type'),
                'status' => 'pending', // Customer bookings start as pending
                'notes' => $this->input->post('notes'),
                'created_by' => $customer_id,
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $booking_id = $this->real_estate_crm_model->add_booking($booking_data);
            
            if ($booking_id) {
                // If EMI payment type, create EMI schedule
                if ($this->input->post('payment_type') == 'emi') {
                    $emi_plan_id = $this->input->post('emi_plan_id');
                    $tenor = $this->input->post('tenor_months');
                    $interest_rate = $this->input->post('interest_rate');
                    
                    $emi_data = [
                        'number_of_emis' => $tenor,
                        'interest_rate' => $interest_rate,
                        'start_date' => $this->input->post('emi_start_date') ?: date('Y-m-d', strtotime('+1 month'))
                    ];
                    
                    $this->real_estate_crm_model->generate_emi_schedule($booking_id, $emi_data);
                }
                
                set_alert('success', _l('re_booking_request_submitted'));
                redirect(site_url('real_estate_crm/my_real_estate/booking/' . $booking_id));
            } else {
                set_alert('danger', _l('re_booking_failed'));
                redirect(site_url('real_estate_crm/my_real_estate/browse_plots'));
            }
        }
    }

    /**
     * Helper: Get customer's upcoming EMI payments
     */
    private function get_customer_upcoming_emi($customer_id, $limit = 5)
    {
        $bookings = $this->real_estate_crm_model->get_bookings(['customer_id' => $customer_id]);
        $booking_ids = array_column($bookings, 'id');
        
        $upcoming_emi = [];
        foreach ($booking_ids as $booking_id) {
            $emis = $this->real_estate_crm_model->get_emi_list([
                'booking_id' => $booking_id,
                'status' => 'pending'
            ]);
            $upcoming_emi = array_merge($upcoming_emi, $emis);
        }
        
        // Sort by due date
        usort($upcoming_emi, function($a, $b) {
            return strtotime($a['due_date']) - strtotime($b['due_date']);
        });
        
        return array_slice($upcoming_emi, 0, $limit);
    }

    /**
     * Helper: Get customer's transactions
     */
    private function get_customer_transactions($customer_id, $limit = null)
    {
        $bookings = $this->real_estate_crm_model->get_bookings(['customer_id' => $customer_id]);
        $booking_ids = array_column($bookings, 'id');
        
        $transactions = [];
        foreach ($booking_ids as $booking_id) {
            $trans = $this->real_estate_crm_model->get_transactions(['booking_id' => $booking_id]);
            $transactions = array_merge($transactions, $trans);
        }
        
        // Sort by date
        usort($transactions, function($a, $b) {
            return strtotime($b['transaction_date']) - strtotime($a['transaction_date']);
        });
        
        if ($limit) {
            return array_slice($transactions, 0, $limit);
        }
        
        return $transactions;
    }
}
