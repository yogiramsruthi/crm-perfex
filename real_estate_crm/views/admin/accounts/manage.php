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
                        
                        <!-- Financial Summary -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel_s">
                                    <div class="panel-body text-center bg-success">
                                        <h2 class="text-white bold"><?php echo app_format_money($total_revenue, get_base_currency()); ?></h2>
                                        <p class="text-white"><?php echo _l('re_total_revenue'); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="panel_s">
                                    <div class="panel-body text-center bg-warning">
                                        <h2 class="text-white bold"><?php echo app_format_money($pending_payments, get_base_currency()); ?></h2>
                                        <p class="text-white"><?php echo _l('re_pending_payments'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Transactions Table -->
                        <h4><?php echo _l('re_transactions'); ?></h4>
                        <hr class="hr-panel-heading" />
                        
                        <div class="table-responsive">
                            <table class="table table-striped real-estate-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo _l('re_customer'); ?></th>
                                        <th><?php echo _l('re_transaction_type'); ?></th>
                                        <th><?php echo _l('re_transaction_amount'); ?></th>
                                        <th><?php echo _l('re_payment_mode'); ?></th>
                                        <th><?php echo _l('re_transaction_date'); ?></th>
                                        <th><?php echo _l('re_reference_number'); ?></th>
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
