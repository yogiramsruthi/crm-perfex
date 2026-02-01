<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Real Estate CRM Model
 */
class Real_estate_crm_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // ==================== PROJECTS ====================
    
    public function get_projects($where = [])
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->get(db_prefix() . 'real_estate_projects')->result_array();
    }

    public function get_project($id)
    {
        return $this->db->get_where(db_prefix() . 'real_estate_projects', ['id' => $id])->row_array();
    }

    public function add_project($data)
    {
        $data['created_by'] = get_staff_user_id();
        $data['created_at'] = date('Y-m-d H:i:s');
        
        $this->db->insert(db_prefix() . 'real_estate_projects', $data);
        return $this->db->insert_id();
    }

    public function update_project($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $this->db->where('id', $id);
        return $this->db->update(db_prefix() . 'real_estate_projects', $data);
    }

    public function delete_project($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete(db_prefix() . 'real_estate_projects');
    }

    public function count_projects($where = [])
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->count_all_results(db_prefix() . 'real_estate_projects');
    }

    // ==================== PLOTS ====================
    
    public function get_plots($where = [])
    {
        $this->db->select(db_prefix() . 'real_estate_plots.*, ' . db_prefix() . 'real_estate_projects.name as project_name');
        $this->db->join(db_prefix() . 'real_estate_projects', db_prefix() . 'real_estate_projects.id = ' . db_prefix() . 'real_estate_plots.project_id', 'left');
        
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        return $this->db->get(db_prefix() . 'real_estate_plots')->result_array();
    }

    public function get_plot($id)
    {
        $this->db->select(db_prefix() . 'real_estate_plots.*, ' . db_prefix() . 'real_estate_projects.name as project_name');
        $this->db->join(db_prefix() . 'real_estate_projects', db_prefix() . 'real_estate_projects.id = ' . db_prefix() . 'real_estate_plots.project_id', 'left');
        $this->db->where(db_prefix() . 'real_estate_plots.id', $id);
        
        return $this->db->get(db_prefix() . 'real_estate_plots')->row_array();
    }

    public function get_available_plots()
    {
        return $this->get_plots(['status' => 'available']);
    }

    public function add_plot($data)
    {
        $data['created_by'] = get_staff_user_id();
        $data['created_at'] = date('Y-m-d H:i:s');
        
        $this->db->insert(db_prefix() . 'real_estate_plots', $data);
        return $this->db->insert_id();
    }

    public function update_plot($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $this->db->where('id', $id);
        return $this->db->update(db_prefix() . 'real_estate_plots', $data);
    }

    public function delete_plot($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete(db_prefix() . 'real_estate_plots');
    }

    public function count_plots($where = [])
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->count_all_results(db_prefix() . 'real_estate_plots');
    }

    // ==================== BOOKINGS ====================
    
    public function get_bookings($where = [])
    {
        $this->db->select(db_prefix() . 'real_estate_bookings.*, ' .
                         db_prefix() . 'real_estate_plots.plot_number, ' .
                         db_prefix() . 'real_estate_projects.name as project_name, ' .
                         db_prefix() . 'contacts.company as customer_name, ' .
                         db_prefix() . 'real_estate_agents.name as agent_name');
        $this->db->join(db_prefix() . 'real_estate_plots', db_prefix() . 'real_estate_plots.id = ' . db_prefix() . 'real_estate_bookings.plot_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_projects', db_prefix() . 'real_estate_projects.id = ' . db_prefix() . 'real_estate_plots.project_id', 'left');
        $this->db->join(db_prefix() . 'contacts', db_prefix() . 'contacts.userid = ' . db_prefix() . 'real_estate_bookings.customer_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_agents', db_prefix() . 'real_estate_agents.id = ' . db_prefix() . 'real_estate_bookings.agent_id', 'left');
        
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        return $this->db->get(db_prefix() . 'real_estate_bookings')->result_array();
    }

    public function get_booking($id)
    {
        $this->db->select(db_prefix() . 'real_estate_bookings.*, ' .
                         db_prefix() . 'real_estate_plots.plot_number, ' .
                         db_prefix() . 'real_estate_projects.name as project_name, ' .
                         db_prefix() . 'contacts.company as customer_name, ' .
                         db_prefix() . 'real_estate_agents.name as agent_name');
        $this->db->join(db_prefix() . 'real_estate_plots', db_prefix() . 'real_estate_plots.id = ' . db_prefix() . 'real_estate_bookings.plot_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_projects', db_prefix() . 'real_estate_projects.id = ' . db_prefix() . 'real_estate_plots.project_id', 'left');
        $this->db->join(db_prefix() . 'contacts', db_prefix() . 'contacts.userid = ' . db_prefix() . 'real_estate_bookings.customer_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_agents', db_prefix() . 'real_estate_agents.id = ' . db_prefix() . 'real_estate_bookings.agent_id', 'left');
        $this->db->where(db_prefix() . 'real_estate_bookings.id', $id);
        
        return $this->db->get(db_prefix() . 'real_estate_bookings')->row_array();
    }

    public function add_booking($data)
    {
        $data['created_by'] = get_staff_user_id();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['balance_amount'] = $data['total_amount'] - ($data['paid_amount'] ?? 0);
        
        $this->db->insert(db_prefix() . 'real_estate_bookings', $data);
        $booking_id = $this->db->insert_id();
        
        // Update plot status
        if ($booking_id && isset($data['plot_id'])) {
            $this->update_plot($data['plot_id'], ['status' => 'booked']);
        }
        
        return $booking_id;
    }

    public function update_booking($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        if (isset($data['total_amount']) && isset($data['paid_amount'])) {
            $data['balance_amount'] = $data['total_amount'] - $data['paid_amount'];
        }
        
        $this->db->where('id', $id);
        return $this->db->update(db_prefix() . 'real_estate_bookings', $data);
    }

    public function delete_booking($id)
    {
        // Get booking to release plot
        $booking = $this->get_booking($id);
        
        $this->db->where('id', $id);
        $result = $this->db->delete(db_prefix() . 'real_estate_bookings');
        
        // Release plot
        if ($result && $booking) {
            $this->update_plot($booking['plot_id'], ['status' => 'available']);
        }
        
        return $result;
    }

    public function count_bookings($where = [])
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->count_all_results(db_prefix() . 'real_estate_bookings');
    }

    public function get_recent_bookings($limit = 5)
    {
        $this->db->limit($limit);
        $this->db->order_by('created_at', 'DESC');
        return $this->get_bookings();
    }

    // ==================== EMI ====================
    
    public function get_emi_list($where = [])
    {
        $this->db->select(db_prefix() . 'real_estate_emi.*, ' .
                         db_prefix() . 'real_estate_bookings.id as booking_number, ' .
                         db_prefix() . 'real_estate_plots.plot_number, ' .
                         db_prefix() . 'contacts.company as customer_name');
        $this->db->join(db_prefix() . 'real_estate_bookings', db_prefix() . 'real_estate_bookings.id = ' . db_prefix() . 'real_estate_emi.booking_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_plots', db_prefix() . 'real_estate_plots.id = ' . db_prefix() . 'real_estate_bookings.plot_id', 'left');
        $this->db->join(db_prefix() . 'contacts', db_prefix() . 'contacts.userid = ' . db_prefix() . 'real_estate_bookings.customer_id', 'left');
        
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        return $this->db->get(db_prefix() . 'real_estate_emi')->result_array();
    }

    public function get_emi($id)
    {
        return $this->db->get_where(db_prefix() . 'real_estate_emi', ['id' => $id])->row_array();
    }

    public function generate_emi_schedule($booking_id, $data)
    {
        $booking = $this->get_booking($booking_id);
        if (!$booking) {
            return false;
        }
        
        $balance = $booking['balance_amount'];
        $num_emis = intval($data['num_emis']);
        $start_date = $data['start_date'];
        $emi_amount = $balance / $num_emis;
        
        for ($i = 1; $i <= $num_emis; $i++) {
            $due_date = date('Y-m-d', strtotime($start_date . " +$i months"));
            
            $emi_data = [
                'booking_id' => $booking_id,
                'emi_number' => $i,
                'due_date' => $due_date,
                'amount' => round($emi_amount, 2),
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
            ];
            
            $this->db->insert(db_prefix() . 'real_estate_emi', $emi_data);
        }
        
        return true;
    }

    public function record_emi_payment($id, $data)
    {
        $emi = $this->get_emi($id);
        if (!$emi) {
            return false;
        }
        
        $update_data = [
            'paid_amount' => $data['paid_amount'],
            'payment_date' => $data['payment_date'],
            'payment_mode' => $data['payment_mode'],
            'transaction_id' => $data['transaction_id'] ?? null,
            'status' => 'paid',
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        
        $this->db->where('id', $id);
        $result = $this->db->update(db_prefix() . 'real_estate_emi', $update_data);
        
        // Update booking paid amount
        if ($result) {
            $booking = $this->get_booking($emi['booking_id']);
            $new_paid_amount = $booking['paid_amount'] + $data['paid_amount'];
            $this->update_booking($emi['booking_id'], [
                'paid_amount' => $new_paid_amount,
            ]);
            
            // Record transaction
            $this->add_transaction([
                'booking_id' => $emi['booking_id'],
                'emi_id' => $id,
                'transaction_type' => 'emi_payment',
                'amount' => $data['paid_amount'],
                'payment_mode' => $data['payment_mode'],
                'transaction_date' => $data['payment_date'],
                'reference_number' => $data['transaction_id'] ?? null,
                'description' => 'EMI Payment - EMI #' . $emi['emi_number'],
            ]);
        }
        
        return $result;
    }

    public function get_upcoming_emi($limit = 10)
    {
        $this->db->where('status', 'pending');
        $this->db->where('due_date >=', date('Y-m-d'));
        $this->db->limit($limit);
        $this->db->order_by('due_date', 'ASC');
        return $this->get_emi_list();
    }

    // ==================== TRANSACTIONS ====================
    
    public function get_transactions($where = [])
    {
        $this->db->select(db_prefix() . 'real_estate_transactions.*, ' .
                         db_prefix() . 'real_estate_bookings.id as booking_number, ' .
                         db_prefix() . 'contacts.company as customer_name');
        $this->db->join(db_prefix() . 'real_estate_bookings', db_prefix() . 'real_estate_bookings.id = ' . db_prefix() . 'real_estate_transactions.booking_id', 'left');
        $this->db->join(db_prefix() . 'contacts', db_prefix() . 'contacts.userid = ' . db_prefix() . 'real_estate_bookings.customer_id', 'left');
        
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        $this->db->order_by('transaction_date', 'DESC');
        return $this->db->get(db_prefix() . 'real_estate_transactions')->result_array();
    }

    public function add_transaction($data)
    {
        $data['created_by'] = get_staff_user_id();
        $data['created_at'] = date('Y-m-d H:i:s');
        
        $this->db->insert(db_prefix() . 'real_estate_transactions', $data);
        return $this->db->insert_id();
    }

    public function get_total_revenue()
    {
        $this->db->select_sum('paid_amount');
        $result = $this->db->get(db_prefix() . 'real_estate_bookings')->row_array();
        return $result['paid_amount'] ?? 0;
    }

    public function get_pending_payments()
    {
        $this->db->select_sum('balance_amount');
        $result = $this->db->get(db_prefix() . 'real_estate_bookings')->row_array();
        return $result['balance_amount'] ?? 0;
    }

    public function get_monthly_revenue()
    {
        $this->db->select("DATE_FORMAT(transaction_date, '%Y-%m') as month, SUM(amount) as total");
        $this->db->where('transaction_date >=', date('Y-m-d', strtotime('-12 months')));
        $this->db->group_by('month');
        $this->db->order_by('month', 'ASC');
        return $this->db->get(db_prefix() . 'real_estate_transactions')->result_array();
    }

    // ==================== AGENTS ====================
    
    public function get_agents($where = [])
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->get(db_prefix() . 'real_estate_agents')->result_array();
    }

    public function get_agent($id)
    {
        return $this->db->get_where(db_prefix() . 'real_estate_agents', ['id' => $id])->row_array();
    }

    public function add_agent($data)
    {
        $data['created_by'] = get_staff_user_id();
        $data['created_at'] = date('Y-m-d H:i:s');
        
        $this->db->insert(db_prefix() . 'real_estate_agents', $data);
        return $this->db->insert_id();
    }

    public function update_agent($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $this->db->where('id', $id);
        return $this->db->update(db_prefix() . 'real_estate_agents', $data);
    }

    public function delete_agent($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete(db_prefix() . 'real_estate_agents');
    }

    // ==================== TEAM ====================
    
    public function get_team_members($where = [])
    {
        $this->db->select(db_prefix() . 'real_estate_team.*, ' .
                         db_prefix() . 'staff.firstname, ' .
                         db_prefix() . 'staff.lastname, ' .
                         db_prefix() . 'real_estate_projects.name as project_name');
        $this->db->join(db_prefix() . 'staff', db_prefix() . 'staff.staffid = ' . db_prefix() . 'real_estate_team.staff_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_projects', db_prefix() . 'real_estate_projects.id = ' . db_prefix() . 'real_estate_team.project_id', 'left');
        
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        return $this->db->get(db_prefix() . 'real_estate_team')->result_array();
    }

    public function get_team_member($id)
    {
        $this->db->select(db_prefix() . 'real_estate_team.*, ' .
                         db_prefix() . 'staff.firstname, ' .
                         db_prefix() . 'staff.lastname, ' .
                         db_prefix() . 'real_estate_projects.name as project_name');
        $this->db->join(db_prefix() . 'staff', db_prefix() . 'staff.staffid = ' . db_prefix() . 'real_estate_team.staff_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_projects', db_prefix() . 'real_estate_projects.id = ' . db_prefix() . 'real_estate_team.project_id', 'left');
        $this->db->where(db_prefix() . 'real_estate_team.id', $id);
        
        return $this->db->get(db_prefix() . 'real_estate_team')->row_array();
    }

    public function add_team_member($data)
    {
        $data['created_by'] = get_staff_user_id();
        $data['created_at'] = date('Y-m-d H:i:s');
        
        $this->db->insert(db_prefix() . 'real_estate_team', $data);
        return $this->db->insert_id();
    }

    public function update_team_member($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $this->db->where('id', $id);
        return $this->db->update(db_prefix() . 'real_estate_team', $data);
    }

    public function delete_team_member($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete(db_prefix() . 'real_estate_team');
    }

    // ==================== SETTINGS ====================
    
    public function get_settings()
    {
        $result = $this->db->get(db_prefix() . 'real_estate_settings')->result_array();
        $settings = [];
        foreach ($result as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        return $settings;
    }

    public function get_setting($key)
    {
        $result = $this->db->get_where(db_prefix() . 'real_estate_settings', ['setting_key' => $key])->row_array();
        return $result ? $result['setting_value'] : null;
    }

    public function update_settings($data)
    {
        foreach ($data as $key => $value) {
            $this->db->where('setting_key', $key);
            $exists = $this->db->get(db_prefix() . 'real_estate_settings')->row_array();
            
            if ($exists) {
                $this->db->where('setting_key', $key);
                $this->db->update(db_prefix() . 'real_estate_settings', [
                    'setting_value' => $value,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                $this->db->insert(db_prefix() . 'real_estate_settings', [
                    'setting_key' => $key,
                    'setting_value' => $value,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        return true;
    }

    // ==================== STATISTICS ====================
    
    public function get_project_statistics()
    {
        $stats = [];
        
        $projects = $this->get_projects();
        foreach ($projects as $project) {
            $total_plots = $this->count_plots(['project_id' => $project['id']]);
            $available_plots = $this->count_plots(['project_id' => $project['id'], 'status' => 'available']);
            $booked_plots = $this->count_plots(['project_id' => $project['id'], 'status' => 'booked']);
            
            $stats[] = [
                'name' => $project['name'],
                'total_plots' => $total_plots,
                'available_plots' => $available_plots,
                'booked_plots' => $booked_plots,
            ];
        }
        
        return $stats;
    }
    
    // ==================== PERFEX INVOICE INTEGRATION ====================
    
    /**
     * Generate Perfex invoice for booking (covers all EMIs)
     * This creates ONE invoice for the entire booking
     */
    public function generate_booking_invoice($booking_id)
    {
        $booking = $this->get_booking($booking_id);
        if (!$booking || $booking['invoice_id']) {
            return false; // Already has invoice or booking doesn't exist
        }
        
        // Load invoices model
        $this->load->model('invoices_model');
        
        // Get plot details
        $plot = $this->get_plot($booking['plot_id']);
        
        // Prepare invoice data
        $invoice_data = [
            'clientid' => $booking['customer_id'],
            'number' => $this->invoices_model->get_invoice_number(),
            'date' => date('Y-m-d'),
            'duedate' => date('Y-m-d', strtotime('+30 days')),
            'subtotal' => $booking['total_amount'],
            'total' => $booking['total_amount'],
            'currency' => get_base_currency()->id,
            'status' => 1, // Unpaid
            'adminnote' => 'Real Estate Booking - Plot: ' . $plot['plot_number'] . ', Project: ' . $plot['project_name'] . "\nThis invoice covers the complete booking amount including all EMI installments.",
        ];
        
        // Create invoice
        $invoice_id = $this->invoices_model->add($invoice_data);
        
        if ($invoice_id) {
            // Add main booking line item
            $item_data = [
                'description' => 'Plot Booking - ' . $plot['project_name'] . ' - Plot No: ' . $plot['plot_number'],
                'long_description' => 'Complete booking for plot ' . $plot['plot_number'] . ' in ' . $plot['project_name'] . ' project.<br/>Plot Size: ' . ($plot['plot_size'] ?? 'N/A') . '<br/>Plot Type: ' . ($plot['plot_type'] ?? 'N/A') . '<br/>Total Amount: ' . app_format_money($booking['total_amount'], get_base_currency()) . '<br/><br/><strong>Payment Schedule:</strong><br/>This amount will be paid through scheduled EMI installments.',
                'qty' => 1,
                'rate' => $booking['total_amount'],
                'rel_id' => $invoice_id,
                'rel_type' => 'invoice',
            ];
            
            $this->db->insert(db_prefix() . 'itemable', $item_data);
            
            // Update booking with invoice_id
            $this->update_booking($booking_id, ['invoice_id' => $invoice_id]);
            
            // Link all EMIs to this invoice (if EMI schedule already exists)
            $this->db->where('booking_id', $booking_id);
            $this->db->update(db_prefix() . 'real_estate_emi', ['invoice_id' => $invoice_id]);
            
            return $invoice_id;
        }
        
        return false;
    }
    
    /**
     * Generate EMI schedule for a booking
     * Also generates booking invoice if auto-generate is enabled
     */
    public function generate_emi_schedule($booking_id, $data)
    {
        $booking = $this->get_booking($booking_id);
        if (!$booking) {
            return false;
        }
        
        $num_installments = (int)$data['num_installments'];
        $start_date = $data['start_date'];
        $installment_amount = $booking['total_amount'] / $num_installments;
        
        // Generate EMI schedule
        $success = true;
        for ($i = 1; $i <= $num_installments; $i++) {
            $due_date = date('Y-m-d', strtotime($start_date . ' +' . ($i - 1) . ' months'));
            
            $emi_data = [
                'booking_id' => $booking_id,
                'emi_number' => $i,
                'due_date' => $due_date,
                'amount' => $installment_amount,
                'status' => 'pending',
            ];
            
            if (!$this->db->insert(db_prefix() . 'real_estate_emi', $emi_data)) {
                $success = false;
                break;
            }
        }
        
        // Auto-generate booking invoice if enabled and not already created
        if ($success && !$booking['invoice_id']) {
            $settings = $this->get_settings();
            if (isset($settings['auto_generate_invoice']) && $settings['auto_generate_invoice'] == '1') {
                $invoice_id = $this->generate_booking_invoice($booking_id);
                
                // Link all created EMIs to this invoice
                if ($invoice_id) {
                    $this->db->where('booking_id', $booking_id);
                    $this->db->update(db_prefix() . 'real_estate_emi', ['invoice_id' => $invoice_id]);
                }
            }
        }
        
        return $success;
    }
    
    /**
     * DEPRECATED: Individual EMI invoices no longer used
     * Now using single booking invoice for all EMIs
     * Keeping for backward compatibility
     */
    public function generate_emi_invoice($emi_id)
    {
        $emi = $this->get_emi($emi_id);
        if (!$emi) {
            return false;
        }
        
        $booking = $this->get_booking($emi['booking_id']);
        if (!$booking) {
            return false;
        }
        
        // If booking already has an invoice, link EMI to it instead of creating new one
        if ($booking['invoice_id']) {
            $this->db->where('id', $emi_id);
            $this->db->update(db_prefix() . 'real_estate_emi', ['invoice_id' => $booking['invoice_id']]);
            return $booking['invoice_id'];
        }
        
        // Otherwise, generate the booking invoice
        $invoice_id = $this->generate_booking_invoice($booking['id']);
        if ($invoice_id) {
            // Link all EMIs to this invoice
            $this->db->where('booking_id', $booking['id']);
            $this->db->update(db_prefix() . 'real_estate_emi', ['invoice_id' => $invoice_id]);
        }
        
        return $invoice_id;
    }
    
    /**
     * Update booking/EMI status from invoice payment
     */
    public function sync_invoice_payment($invoice_id)
    {
        // Load invoices model
        $this->load->model('invoices_model');
        
        $invoice = $this->invoices_model->get($invoice_id);
        if (!$invoice) {
            return false;
        }
        
        // Check if this invoice is for a booking
        $booking = $this->db->get_where(db_prefix() . 'real_estate_bookings', ['invoice_id' => $invoice_id])->row_array();
        if ($booking) {
            // Update booking paid amount based on invoice
            $paid_amount = $invoice->total - $invoice->total_left_to_pay;
            $this->update_booking($booking['id'], [
                'paid_amount' => $paid_amount,
                'status' => $invoice->status == 2 ? 'confirmed' : 'pending',
            ]);
            return true;
        }
        
        // Check if this invoice is for an EMI
        $emi = $this->db->get_where(db_prefix() . 'real_estate_emi', ['invoice_id' => $invoice_id])->row_array();
        if ($emi) {
            // Update EMI based on invoice payment
            $paid_amount = $invoice->total - $invoice->total_left_to_pay;
            $emi_data = [
                'paid_amount' => $paid_amount,
                'status' => $invoice->status == 2 ? 'paid' : 'pending',
            ];
            
            if ($invoice->status == 2) {
                $emi_data['payment_date'] = date('Y-m-d');
            }
            
            $this->db->where('id', $emi['id']);
            $this->db->update(db_prefix() . 'real_estate_emi', $emi_data);
            
            // Update booking paid amount
            if ($invoice->status == 2) {
                $booking = $this->get_booking($emi['booking_id']);
                $new_paid_amount = $booking['paid_amount'] + $paid_amount;
                $this->update_booking($emi['booking_id'], [
                    'paid_amount' => $new_paid_amount,
                ]);
            }
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Get Perfex customers for dropdown
     */
    public function get_perfex_customers()
    {
        $this->load->model('clients_model');
        return $this->clients_model->get();
    }
    
    /**
     * Get all EMI with complete details
     */
    public function get_all_emi_with_details()
    {
        $this->db->select('
            e.*,
            b.customer_id,
            b.plot_id,
            b.project_id,
            p.plot_number,
            pr.name as project_name,
            CONCAT(c.firstname, " ", c.lastname) as customer_name
        ');
        $this->db->from(db_prefix() . 'real_estate_emi e');
        $this->db->join(db_prefix() . 'real_estate_bookings b', 'b.id = e.booking_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_plots p', 'p.id = b.plot_id', 'left');
        $this->db->join(db_prefix() . 'real_estate_projects pr', 'pr.id = b.project_id', 'left');
        $this->db->join(db_prefix() . 'contacts c', 'c.userid = b.customer_id AND c.is_primary = 1', 'left');
        $this->db->order_by('e.due_date', 'ASC');
        
        return $this->db->get()->result_array();
    }
    
    /**
     * Mark EMI as paid manually
     */
    public function mark_emi_paid($emi_id, $payment_date = null)
    {
        if (!$payment_date) {
            $payment_date = date('Y-m-d');
        }
        
        $emi = $this->get_emi($emi_id);
        if (!$emi) {
            return false;
        }
        
        $update_data = [
            'status' => 'paid',
            'payment_date' => $payment_date,
            'paid_amount' => $emi['amount']
        ];
        
        $this->db->where('id', $emi_id);
        $result = $this->db->update(db_prefix() . 'real_estate_emi', $update_data);
        
        if ($result) {
            // Update booking paid amount
            $booking = $this->get_booking($emi['booking_id']);
            $new_paid_amount = $booking['paid_amount'] + $emi['amount'];
            $this->update_booking($emi['booking_id'], [
                'paid_amount' => $new_paid_amount,
            ]);
            
            // Record transaction
            $this->add_transaction([
                'booking_id' => $emi['booking_id'],
                'amount' => $emi['amount'],
                'transaction_type' => 'emi_payment',
                'payment_mode' => 'manual',
                'transaction_date' => $payment_date,
                'description' => 'EMI Payment #' . $emi['emi_number'],
            ]);
        }
        
        return $result;
    }
}
