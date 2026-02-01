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
                        
                        <?php echo form_open(admin_url('real_estate_crm/team_member/' . (isset($team_member) ? $team_member['id'] : ''))); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="staff_id"><?php echo _l('re_staff_member'); ?> <span class="text-danger">*</span></label>
                                    <select class="form-control selectpicker" id="staff_id" name="staff_id" required data-live-search="true">
                                        <option value="">Select Staff Member</option>
                                        <?php foreach ($staff_members as $staff): ?>
                                            <option value="<?php echo $staff['staffid']; ?>" 
                                                    <?php echo (isset($team_member) && $team_member['staff_id'] == $staff['staffid']) ? 'selected' : ''; ?>>
                                                <?php echo $staff['firstname'] . ' ' . $staff['lastname']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="project_id"><?php echo _l('re_project_name'); ?></label>
                                    <select class="form-control selectpicker" id="project_id" name="project_id" data-live-search="true">
                                        <option value="">All Projects</option>
                                        <?php foreach ($projects as $project): ?>
                                            <option value="<?php echo $project['id']; ?>" 
                                                    <?php echo (isset($team_member) && $team_member['project_id'] == $project['id']) ? 'selected' : ''; ?>>
                                                <?php echo $project['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="role"><?php echo _l('re_team_role'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="role" name="role" 
                                           value="<?php echo isset($team_member) ? $team_member['role'] : ''; ?>" 
                                           placeholder="e.g., Project Manager, Sales Executive" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="assigned_date"><?php echo _l('re_assigned_date'); ?> <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control datepicker" id="assigned_date" name="assigned_date" 
                                           value="<?php echo isset($team_member) ? $team_member['assigned_date'] : date('Y-m-d'); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="status"><?php echo _l('re_team_status'); ?></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" <?php echo (isset($team_member) && $team_member['status'] == 'active') ? 'selected' : ''; ?>><?php echo _l('re_active'); ?></option>
                                        <option value="inactive" <?php echo (isset($team_member) && $team_member['status'] == 'inactive') ? 'selected' : ''; ?>><?php echo _l('re_inactive'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="notes"><?php echo _l('re_notes'); ?></label>
                                    <textarea class="form-control" id="notes" name="notes" rows="4"><?php echo isset($team_member) ? $team_member['notes'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> <?php echo _l('save'); ?>
                                </button>
                                <a href="<?php echo admin_url('real_estate_crm/team'); ?>" class="btn btn-default">
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
