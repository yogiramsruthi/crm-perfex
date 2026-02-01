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
                        
                        <?php echo form_open(admin_url('real_estate_crm/project/' . (isset($project) ? $project['id'] : ''))); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"><?php echo _l('re_project_name'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="<?php echo isset($project) ? $project['name'] : ''; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="location"><?php echo _l('re_project_location'); ?></label>
                                    <input type="text" class="form-control" id="location" name="location" 
                                           value="<?php echo isset($project) ? $project['location'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="total_plots"><?php echo _l('re_total_plots'); ?></label>
                                    <input type="number" class="form-control" id="total_plots" name="total_plots" 
                                           value="<?php echo isset($project) ? $project['total_plots'] : '0'; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date"><?php echo _l('re_start_date'); ?></label>
                                    <input type="date" class="form-control datepicker" id="start_date" name="start_date" 
                                           value="<?php echo isset($project) ? $project['start_date'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="end_date"><?php echo _l('re_end_date'); ?></label>
                                    <input type="date" class="form-control datepicker" id="end_date" name="end_date" 
                                           value="<?php echo isset($project) ? $project['end_date'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="status"><?php echo _l('re_project_status'); ?></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" <?php echo (isset($project) && $project['status'] == 'active') ? 'selected' : ''; ?>><?php echo _l('re_active'); ?></option>
                                        <option value="inactive" <?php echo (isset($project) && $project['status'] == 'inactive') ? 'selected' : ''; ?>><?php echo _l('re_inactive'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description"><?php echo _l('re_project_description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" rows="4"><?php echo isset($project) ? $project['description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> <?php echo _l('save'); ?>
                                </button>
                                <a href="<?php echo admin_url('real_estate_crm/projects'); ?>" class="btn btn-default">
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
