<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="clearfix"></div>
                        <hr class="hr-panel-heading" />
                        
                        <div class="table-responsive">
                            <table class="table table-striped real-estate-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo _l('re_customer'); ?></th>
                                        <th><?php echo _l('re_plot_number'); ?></th>
                                        <th><?php echo _l('re_emi_number'); ?></th>
                                        <th><?php echo _l('re_due_date'); ?></th>
                                        <th><?php echo _l('re_emi_amount'); ?></th>
                                        <th><?php echo _l('re_paid_amount'); ?></th>
                                        <th><?php echo _l('re_payment_date'); ?></th>
                                        <th><?php echo _l('re_emi_status'); ?></th>
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
