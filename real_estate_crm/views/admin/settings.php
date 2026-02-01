<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4 class="no-margin"><?php echo _l('re_settings'); ?></h4>
                        <hr class="hr-panel-heading" />
                        
                        <?php echo form_open(admin_url('real_estate_crm/settings')); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="default_emi_interest_rate"><?php echo _l('re_default_emi_interest_rate'); ?></label>
                                    <input type="number" step="0.01" class="form-control" id="default_emi_interest_rate" 
                                           name="default_emi_interest_rate" 
                                           value="<?php echo isset($settings['default_emi_interest_rate']) ? $settings['default_emi_interest_rate'] : '10'; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="default_booking_validity"><?php echo _l('re_default_booking_validity'); ?></label>
                                    <input type="number" class="form-control" id="default_booking_validity" 
                                           name="default_booking_validity" 
                                           value="<?php echo isset($settings['default_booking_validity']) ? $settings['default_booking_validity'] : '30'; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="enable_email_notifications" 
                                               name="enable_email_notifications" value="1"
                                               <?php echo (isset($settings['enable_email_notifications']) && $settings['enable_email_notifications'] == '1') ? 'checked' : ''; ?>>
                                        <label for="enable_email_notifications"><?php echo _l('re_enable_email_notifications'); ?></label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="enable_sms_notifications" 
                                               name="enable_sms_notifications" value="1"
                                               <?php echo (isset($settings['enable_sms_notifications']) && $settings['enable_sms_notifications'] == '1') ? 'checked' : ''; ?>>
                                        <label for="enable_sms_notifications"><?php echo _l('re_enable_sms_notifications'); ?></label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="auto_generate_invoice" 
                                               name="auto_generate_invoice" value="1"
                                               <?php echo (isset($settings['auto_generate_invoice']) && $settings['auto_generate_invoice'] == '1') ? 'checked' : ''; ?>>
                                        <label for="auto_generate_invoice">
                                            <?php echo _l('re_auto_generate_invoice'); ?>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" 
                                               title="<?php echo _l('re_auto_generate_invoice_help'); ?>"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> <?php echo _l('save'); ?>
                                </button>
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
