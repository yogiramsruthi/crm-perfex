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
}
