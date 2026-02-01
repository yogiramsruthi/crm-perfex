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
                                <a href="<?php echo admin_url('real_estate_crm/booking'); ?>" class="btn btn-primary pull-right">
                                    <i class="fa fa-plus"></i> <?php echo _l('re_add_booking'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        
                        <div class="table-responsive">
                            <table class="table table-striped real-estate-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo _l('re_customer'); ?></th>
                                        <th><?php echo _l('re_plot_number'); ?></th>
                                        <th><?php echo _l('re_agent'); ?></th>
                                        <th><?php echo _l('re_booking_date'); ?></th>
                                        <th><?php echo _l('re_total_amount'); ?></th>
                                        <th><?php echo _l('re_paid_amount'); ?></th>
                                        <th><?php echo _l('re_balance_amount'); ?></th>
                                        <th><?php echo _l('re_booking_status'); ?></th>
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
