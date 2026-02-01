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
                        
                        <!-- Basic Information -->
                        <h4 class="bold mtop20"><?php echo _l('re_basic_information'); ?></h4>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"><?php echo _l('re_project_name'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="<?php echo isset($project) ? $project['name'] : ''; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="project_type"><?php echo _l('re_project_type'); ?></label>
                                    <select class="form-control" id="project_type" name="project_type">
                                        <option value="">Select Type</option>
                                        <option value="residential" <?php echo (isset($project) && $project['project_type'] == 'residential') ? 'selected' : ''; ?>>Residential</option>
                                        <option value="commercial" <?php echo (isset($project) && $project['project_type'] == 'commercial') ? 'selected' : ''; ?>>Commercial</option>
                                        <option value="mixed" <?php echo (isset($project) && $project['project_type'] == 'mixed') ? 'selected' : ''; ?>>Mixed Use</option>
                                        <option value="industrial" <?php echo (isset($project) && $project['project_type'] == 'industrial') ? 'selected' : ''; ?>>Industrial</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="location"><?php echo _l('re_project_location'); ?></label>
                                    <input type="text" class="form-control" id="location" name="location" 
                                           value="<?php echo isset($project) ? $project['location'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="total_area"><?php echo _l('re_total_area'); ?></label>
                                    <input type="text" class="form-control" id="total_area" name="total_area" 
                                           value="<?php echo isset($project) ? $project['total_area'] : ''; ?>" 
                                           placeholder="e.g., 10 acres or 100000 sq ft">
                                </div>
                                
                                <div class="form-group">
                                    <label for="total_plots"><?php echo _l('re_total_plots'); ?></label>
                                    <input type="number" class="form-control" id="total_plots" name="total_plots" 
                                           value="<?php echo isset($project) ? $project['total_plots'] : '0'; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="developer_name"><?php echo _l('re_developer_name'); ?></label>
                                    <input type="text" class="form-control" id="developer_name" name="developer_name" 
                                           value="<?php echo isset($project) ? $project['developer_name'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="approval_number"><?php echo _l('re_approval_number'); ?></label>
                                    <input type="text" class="form-control" id="approval_number" name="approval_number" 
                                           value="<?php echo isset($project) ? $project['approval_number'] : ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="legal_status"><?php echo _l('re_legal_status'); ?></label>
                                    <select class="form-control" id="legal_status" name="legal_status">
                                        <option value="">Select Status</option>
                                        <option value="approved" <?php echo (isset($project) && $project['legal_status'] == 'approved') ? 'selected' : ''; ?>>Approved</option>
                                        <option value="pending" <?php echo (isset($project) && $project['legal_status'] == 'pending') ? 'selected' : ''; ?>>Pending Approval</option>
                                        <option value="registered" <?php echo (isset($project) && $project['legal_status'] == 'registered') ? 'selected' : ''; ?>>Registered</option>
                                    </select>
                                </div>
                                
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
                                    <label for="possession_date"><?php echo _l('re_possession_date'); ?></label>
                                    <input type="date" class="form-control datepicker" id="possession_date" name="possession_date" 
                                           value="<?php echo isset($project) ? $project['possession_date'] : ''; ?>">
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
                        
                        <!-- Additional Details -->
                        <h4 class="bold mtop20"><?php echo _l('re_additional_details'); ?></h4>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description"><?php echo _l('re_project_description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" rows="4"><?php echo isset($project) ? $project['description'] : ''; ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="amenities"><?php echo _l('re_amenities'); ?></label>
                                    <textarea class="form-control" id="amenities" name="amenities" rows="3" placeholder="e.g., Swimming Pool, Gym, Parking, Security, etc."><?php echo isset($project) ? $project['amenities'] : ''; ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="payment_terms"><?php echo _l('re_payment_terms'); ?></label>
                                    <textarea class="form-control" id="payment_terms" name="payment_terms" rows="3" placeholder="e.g., 20% booking, 30% on construction, 50% on possession"><?php echo isset($project) ? $project['payment_terms'] : ''; ?></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="bank_loan_available" name="bank_loan_available" value="1" 
                                               <?php echo (isset($project) && $project['bank_loan_available'] == 1) ? 'checked' : ''; ?>>
                                        <label for="bank_loan_available"><?php echo _l('re_bank_loan_available'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Information -->
                        <h4 class="bold mtop20"><?php echo _l('re_contact_information'); ?></h4>
                        <hr />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_person"><?php echo _l('re_contact_person'); ?></label>
                                    <input type="text" class="form-control" id="contact_person" name="contact_person" 
                                           value="<?php echo isset($project) ? $project['contact_person'] : ''; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_phone"><?php echo _l('re_contact_phone'); ?></label>
                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" 
                                           value="<?php echo isset($project) ? $project['contact_phone'] : ''; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_email"><?php echo _l('re_contact_email'); ?></label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" 
                                           value="<?php echo isset($project) ? $project['contact_email'] : ''; ?>">
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
