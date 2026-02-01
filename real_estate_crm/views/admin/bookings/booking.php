<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4 class="no-margin"><?php echo $title; ?></h4>
                        <hr class="hr-panel-heading" />
                        
                        <?php echo form_open(admin_url('real_estate_crm/booking/' . (isset($booking) ? $booking['id'] : ''))); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plot_id"><?php echo _l('re_plot_number'); ?> <span class="text-danger">*</span></label>
                                    <select class="form-control selectpicker" id="plot_id" name="plot_id" required data-live-search="true">
                                        <option value="">Select Plot</option>
                                        <?php foreach ($plots as $plot): ?>
                                            <option value="<?php echo $plot['id']; ?>" 
                                                    <?php echo (isset($booking) && $booking['plot_id'] == $plot['id']) ? 'selected' : ''; ?>>
                                                <?php echo $plot['project_name'] . ' - ' . $plot['plot_number'] . ' (' . app_format_money($plot['price'], get_base_currency()) . ')'; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="customer_id"><?php echo _l('re_customer'); ?> <span class="text-danger">*</span></label>
                                    <select class="form-control selectpicker" id="customer_id" name="customer_id" required data-live-search="true">
                                        <option value="">Select Customer</option>
                                        <?php foreach ($customers as $customer): ?>
                                            <option value="<?php echo $customer['userid']; ?>" 
                                                    <?php echo (isset($booking) && $booking['customer_id'] == $customer['userid']) ? 'selected' : ''; ?>>
                                                <?php echo $customer['company']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="agent_id"><?php echo _l('re_agent'); ?></label>
                                    <select class="form-control selectpicker" id="agent_id" name="agent_id" data-live-search="true">
                                        <option value="">Select Agent</option>
                                        <?php foreach ($agents as $agent): ?>
                                            <option value="<?php echo $agent['id']; ?>" 
                                                    <?php echo (isset($booking) && $booking['agent_id'] == $agent['id']) ? 'selected' : ''; ?>>
                                                <?php echo $agent['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="booking_date"><?php echo _l('re_booking_date'); ?> <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control datepicker" id="booking_date" name="booking_date" 
                                           value="<?php echo isset($booking) ? $booking['booking_date'] : date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_amount"><?php echo _l('re_total_amount'); ?> <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" id="total_amount" name="total_amount" 
                                           value="<?php echo isset($booking) ? $booking['total_amount'] : ''; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="paid_amount"><?php echo _l('re_paid_amount'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="paid_amount" name="paid_amount" 
                                           value="<?php echo isset($booking) ? $booking['paid_amount'] : '0'; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="balance_amount"><?php echo _l('re_balance_amount'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="balance_amount" name="balance_amount" 
                                           value="<?php echo isset($booking) ? $booking['balance_amount'] : ''; ?>" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="payment_type"><?php echo _l('re_payment_type'); ?></label>
                                    <select class="form-control" id="payment_type" name="payment_type">
                                        <option value="emi" <?php echo (isset($booking) && $booking['payment_type'] == 'emi') ? 'selected' : ''; ?>>EMI</option>
                                        <option value="full" <?php echo (isset($booking) && $booking['payment_type'] == 'full') ? 'selected' : ''; ?>>Full Payment</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="status"><?php echo _l('re_booking_status'); ?></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="pending" <?php echo (isset($booking) && $booking['status'] == 'pending') ? 'selected' : ''; ?>><?php echo _l('re_booking_pending'); ?></option>
                                        <option value="confirmed" <?php echo (isset($booking) && $booking['status'] == 'confirmed') ? 'selected' : ''; ?>><?php echo _l('re_booking_confirmed'); ?></option>
                                        <option value="cancelled" <?php echo (isset($booking) && $booking['status'] == 'cancelled') ? 'selected' : ''; ?>><?php echo _l('re_booking_cancelled'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="notes"><?php echo _l('re_notes'); ?></label>
                                    <textarea class="form-control" id="notes" name="notes" rows="4"><?php echo isset($booking) ? $booking['notes'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> <?php echo _l('save'); ?>
                                </button>
                                <a href="<?php echo admin_url('real_estate_crm/bookings'); ?>" class="btn btn-default">
                                    <i class="fa fa-times"></i> <?php echo _l('cancel'); ?>
                                </a>
                            </div>
                        </div>
                        
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
$(document).ready(function() {
    // Auto-calculate balance amount
    $('#total_amount, #paid_amount').on('input', function() {
        var total = parseFloat($('#total_amount').val()) || 0;
        var paid = parseFloat($('#paid_amount').val()) || 0;
        $('#balance_amount').val((total - paid).toFixed(2));
    });
});
</script>
