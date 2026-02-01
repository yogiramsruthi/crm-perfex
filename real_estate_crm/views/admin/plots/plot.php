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
                        
                        <?php echo form_open(admin_url('real_estate_crm/plot/' . (isset($plot) ? $plot['id'] : ''))); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_id"><?php echo _l('re_project_name'); ?> <span class="text-danger">*</span></label>
                                    <select class="form-control selectpicker" id="project_id" name="project_id" required data-live-search="true">
                                        <option value="">Select Project</option>
                                        <?php foreach ($projects as $project): ?>
                                            <option value="<?php echo $project['id']; ?>" 
                                                    <?php echo (isset($plot) && $plot['project_id'] == $project['id']) ? 'selected' : ''; ?>>
                                                <?php echo $project['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="plot_number"><?php echo _l('re_plot_number'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="plot_number" name="plot_number" 
                                           value="<?php echo isset($plot) ? $plot['plot_number'] : ''; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="plot_size"><?php echo _l('re_plot_size'); ?></label>
                                    <input type="text" class="form-control" id="plot_size" name="plot_size" 
                                           value="<?php echo isset($plot) ? $plot['plot_size'] : ''; ?>" 
                                           placeholder="e.g., 1000 sq ft">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plot_type"><?php echo _l('re_plot_type'); ?></label>
                                    <input type="text" class="form-control" id="plot_type" name="plot_type" 
                                           value="<?php echo isset($plot) ? $plot['plot_type'] : ''; ?>" 
                                           placeholder="e.g., Residential, Commercial">
                                </div>
                                
                                <div class="form-group">
                                    <label for="price"><?php echo _l('re_plot_price'); ?> <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" 
                                           value="<?php echo isset($plot) ? $plot['price'] : ''; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="status"><?php echo _l('re_plot_status'); ?></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="available" <?php echo (isset($plot) && $plot['status'] == 'available') ? 'selected' : ''; ?>><?php echo _l('re_plot_available'); ?></option>
                                        <option value="booked" <?php echo (isset($plot) && $plot['status'] == 'booked') ? 'selected' : ''; ?>><?php echo _l('re_plot_booked'); ?></option>
                                        <option value="sold" <?php echo (isset($plot) && $plot['status'] == 'sold') ? 'selected' : ''; ?>><?php echo _l('re_plot_sold'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description"><?php echo _l('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" rows="4"><?php echo isset($plot) ? $plot['description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> <?php echo _l('save'); ?>
                                </button>
                                <a href="<?php echo admin_url('real_estate_crm/plots'); ?>" class="btn btn-default">
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
