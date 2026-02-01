<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="clearfix"></div>
                        <div class="_buttons">
                            <?php if (has_permission('real_estate_crm', '', 'create')): ?>
                                <a href="<?php echo admin_url('real_estate_crm/project'); ?>" class="btn btn-primary pull-right">
                                    <i class="fa fa-plus"></i> <?php echo _l('re_add_project'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        
                        <div class="table-responsive">
                            <table class="table table-striped real-estate-table">
                                <thead>
                                    <tr>
                                        <th><?php echo _l('re_project_name'); ?></th>
                                        <th><?php echo _l('re_project_location'); ?></th>
                                        <th><?php echo _l('re_total_plots'); ?></th>
                                        <th><?php echo _l('re_available_plots'); ?></th>
                                        <th><?php echo _l('re_project_status'); ?></th>
                                        <th><?php echo _l('re_start_date'); ?></th>
                                        <th><?php echo _l('re_actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be loaded via AJAX or server-side rendering -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
