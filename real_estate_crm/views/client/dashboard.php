<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin"><?php echo _l('re_client_dashboard'); ?></h4>
        <hr class="hr-panel-heading" />
        
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-body text-center">
                        <h2 class="bold"><?php echo $total_bookings; ?></h2>
                        <p><?php echo _l('re_total_bookings'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-success">
                    <div class="panel-body text-center">
                        <h2 class="bold"><?php echo app_format_money($total_amount, get_base_currency()); ?></h2>
                        <p><?php echo _l('re_total_amount'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-body text-center">
                        <h2 class="bold"><?php echo app_format_money($paid_amount, get_base_currency()); ?></h2>
                        <p><?php echo _l('re_paid_amount'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-warning">
                    <div class="panel-body text-center">
                        <h2 class="bold"><?php echo app_format_money($balance_amount, get_base_currency()); ?></h2>
                        <p><?php echo _l('re_balance_amount'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Links -->
        <div class="row mtop20">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4><?php echo _l('re_quick_links'); ?></h4>
                        <hr class="hr-panel-heading" />
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mtop10">
                                <a href="<?php echo site_url('real_estate_crm/my_real_estate/bookings'); ?>" class="btn btn-primary btn-block">
                                    <i class="fa fa-calendar-check-o"></i> <?php echo _l('re_my_bookings'); ?>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mtop10">
                                <a href="<?php echo site_url('real_estate_crm/my_real_estate/plots'); ?>" class="btn btn-success btn-block">
                                    <i class="fa fa-map-marker"></i> <?php echo _l('re_my_plots'); ?>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mtop10">
                                <a href="<?php echo site_url('real_estate_crm/my_real_estate/emi_schedule'); ?>" class="btn btn-info btn-block">
                                    <i class="fa fa-credit-card"></i> <?php echo _l('re_emi_schedule'); ?>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mtop10">
                                <a href="<?php echo site_url('real_estate_crm/my_real_estate/payment_history'); ?>" class="btn btn-warning btn-block">
                                    <i class="fa fa-money"></i> <?php echo _l('re_payment_history'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- My Bookings -->
        <div class="row mtop20">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4><?php echo _l('re_my_bookings'); ?></h4>
                        <hr class="hr-panel-heading" />
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo _l('re_project_name'); ?></th>
                                        <th><?php echo _l('re_plot_number'); ?></th>
                                        <th><?php echo _l('re_booking_date'); ?></th>
                                        <th><?php echo _l('re_total_amount'); ?></th>
                                        <th><?php echo _l('re_paid_amount'); ?></th>
                                        <th><?php echo _l('re_balance_amount'); ?></th>
                                        <th><?php echo _l('re_booking_status'); ?></th>
                                        <th><?php echo _l('re_actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($bookings)): ?>
                                        <?php foreach ($bookings as $booking): ?>
                                            <tr>
                                                <td><?php echo $booking['project_name']; ?></td>
                                                <td><?php echo $booking['plot_number']; ?></td>
                                                <td><?php echo _d($booking['booking_date']); ?></td>
                                                <td><?php echo app_format_money($booking['total_amount'], get_base_currency()); ?></td>
                                                <td><?php echo app_format_money($booking['paid_amount'], get_base_currency()); ?></td>
                                                <td><?php echo app_format_money($booking['balance_amount'], get_base_currency()); ?></td>
                                                <td>
                                                    <span class="label label-<?php echo $booking['status'] == 'confirmed' ? 'success' : ($booking['status'] == 'pending' ? 'warning' : 'danger'); ?>">
                                                        <?php echo ucfirst($booking['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('real_estate_crm/my_real_estate/booking/' . $booking['id']); ?>" class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i> <?php echo _l('re_view'); ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center"><?php echo _l('re_no_records_found'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Upcoming EMI Payments -->
        <div class="row mtop20">
            <div class="col-md-6">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4><?php echo _l('re_upcoming_emi'); ?></h4>
                        <hr class="hr-panel-heading" />
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo _l('re_emi_number'); ?></th>
                                        <th><?php echo _l('re_due_date'); ?></th>
                                        <th><?php echo _l('re_emi_amount'); ?></th>
                                        <th><?php echo _l('re_emi_status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($upcoming_emi)): ?>
                                        <?php foreach ($upcoming_emi as $emi): ?>
                                            <tr>
                                                <td><?php echo $emi['emi_number']; ?></td>
                                                <td><?php echo _d($emi['due_date']); ?></td>
                                                <td><?php echo app_format_money($emi['amount'], get_base_currency()); ?></td>
                                                <td>
                                                    <span class="label label-<?php echo $emi['status'] == 'paid' ? 'success' : 'warning'; ?>">
                                                        <?php echo ucfirst($emi['status']); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center"><?php echo _l('re_no_records_found'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Transactions -->
            <div class="col-md-6">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4><?php echo _l('re_recent_transactions'); ?></h4>
                        <hr class="hr-panel-heading" />
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo _l('re_transaction_date'); ?></th>
                                        <th><?php echo _l('re_transaction_type'); ?></th>
                                        <th><?php echo _l('re_transaction_amount'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($recent_transactions)): ?>
                                        <?php foreach ($recent_transactions as $transaction): ?>
                                            <tr>
                                                <td><?php echo _d($transaction['transaction_date']); ?></td>
                                                <td><?php echo ucfirst(str_replace('_', ' ', $transaction['transaction_type'])); ?></td>
                                                <td><?php echo app_format_money($transaction['amount'], get_base_currency()); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center"><?php echo _l('re_no_records_found'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
