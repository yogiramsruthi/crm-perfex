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
                        
                        <?php echo form_open(admin_url('real_estate_crm/agent/' . (isset($agent) ? $agent['id'] : ''))); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"><?php echo _l('re_agent_name'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="<?php echo isset($agent) ? $agent['name'] : ''; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email"><?php echo _l('re_agent_email'); ?></label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="<?php echo isset($agent) ? $agent['email'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone"><?php echo _l('re_agent_phone'); ?></label>
                                    <input type="text" class="form-control" id="phone" name="phone" 
                                           value="<?php echo isset($agent) ? $agent['phone'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="staff_id"><?php echo _l('re_staff_member'); ?> (Optional)</label>
                                    <select class="form-control selectpicker" id="staff_id" name="staff_id" data-live-search="true">
                                        <option value="">Select Staff Member</option>
                                        <?php foreach ($staff_members as $staff): ?>
                                            <option value="<?php echo $staff['staffid']; ?>" 
                                                    <?php echo (isset($agent) && $agent['staff_id'] == $staff['staffid']) ? 'selected' : ''; ?>>
                                                <?php echo $staff['firstname'] . ' ' . $staff['lastname']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="commission_rate"><?php echo _l('re_commission_rate'); ?> (%)</label>
                                    <input type="number" step="0.01" class="form-control" id="commission_rate" name="commission_rate" 
                                           value="<?php echo isset($agent) ? $agent['commission_rate'] : '0'; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="joined_date"><?php echo _l('re_joined_date'); ?></label>
                                    <input type="date" class="form-control datepicker" id="joined_date" name="joined_date" 
                                           value="<?php echo isset($agent) ? $agent['joined_date'] : date('Y-m-d'); ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="status"><?php echo _l('re_agent_status'); ?></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" <?php echo (isset($agent) && $agent['status'] == 'active') ? 'selected' : ''; ?>><?php echo _l('re_active'); ?></option>
                                        <option value="inactive" <?php echo (isset($agent) && $agent['status'] == 'inactive') ? 'selected' : ''; ?>><?php echo _l('re_inactive'); ?></option>
                                    </select>
                                </div>
                                
                                <?php if (isset($agent)): ?>
                                <div class="form-group">
                                    <label><?php echo _l('re_total_sales'); ?></label>
                                    <input type="text" class="form-control" value="<?php echo $agent['total_sales']; ?>" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label><?php echo _l('re_total_commission'); ?></label>
                                    <input type="text" class="form-control" value="<?php echo app_format_money($agent['total_commission'], get_base_currency()); ?>" readonly>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address"><?php echo _l('re_agent_address'); ?></label>
                                    <textarea class="form-control" id="address" name="address" rows="3"><?php echo isset($agent) ? $agent['address'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> <?php echo _l('save'); ?>
                                </button>
                                <a href="<?php echo admin_url('real_estate_crm/agents'); ?>" class="btn btn-default">
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
