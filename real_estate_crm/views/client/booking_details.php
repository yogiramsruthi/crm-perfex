<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="panel_s">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8">
                <h4 class="no-margin"><?php echo _l('re_booking_details'); ?></h4>
            </div>
            <div class="col-md-4 text-right">
                <a href="<?php echo site_url('real_estate_crm/my_real_estate/bookings'); ?>" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> <?php echo _l('re_back_to_bookings'); ?>
                </a>
            </div>
        </div>
        <hr class="hr-panel-heading" />
        
        <!-- Booking Information -->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?php echo _l('re_booking_information'); ?></h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%"><?php echo _l('re_project_name'); ?></th>
                                <td><?php echo $booking['project_name']; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo _l('re_plot_number'); ?></th>
                                <td><strong><?php echo $booking['plot_number']; ?></strong></td>
                            </tr>
                            <tr>
                                <th><?php echo _l('re_booking_date'); ?></th>
                                <td><?php echo _d($booking['booking_date']); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo _l('re_payment_type'); ?></th>
                                <td><?php echo ucfirst($booking['payment_type']); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo _l('re_booking_status'); ?></th>
                                <td>
                                    <span class="label label-<?php echo $booking['status'] == 'confirmed' ? 'success' : ($booking['status'] == 'pending' ? 'warning' : 'danger'); ?>">
                                        <?php echo ucfirst($booking['status']); ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?php echo _l('re_payment_information'); ?></h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%"><?php echo _l('re_total_amount'); ?></th>
                                <td><strong><?php echo app_format_money($booking['total_amount'], get_base_currency()); ?></strong></td>
                            </tr>
                            <tr>
                                <th><?php echo _l('re_paid_amount'); ?></th>
                                <td class="text-success"><strong><?php echo app_format_money($booking['paid_amount'], get_base_currency()); ?></strong></td>
                            </tr>
                            <tr>
                                <th><?php echo _l('re_balance_amount'); ?></th>
                                <td class="text-danger"><strong><?php echo app_format_money($booking['balance_amount'], get_base_currency()); ?></strong></td>
                            </tr>
                            <tr>
                                <th><?php echo _l('re_payment_progress'); ?></th>
                                <td>
                                    <?php 
                                    $progress = ($booking['total_amount'] > 0) ? ($booking['paid_amount'] / $booking['total_amount'] * 100) : 0;
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" 
                                             aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" 
                                             style="width: <?php echo $progress; ?>%">
                                            <?php echo number_format($progress, 1); ?>%
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Notes -->
        <?php if (!empty($booking['notes'])): ?>
        <div class="row mtop20">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?php echo _l('re_notes'); ?></h4>
                    </div>
                    <div class="panel-body">
                        <?php echo nl2br($booking['notes']); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- EMI Schedule -->
        <?php if (!empty($emi_schedule)): ?>
        <div class="row mtop20">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title"><?php echo _l('re_emi_schedule'); ?></h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo _l('re_emi_number'); ?></th>
                                        <th><?php echo _l('re_due_date'); ?></th>
                                        <th><?php echo _l('re_emi_amount'); ?></th>
                                        <th><?php echo _l('re_paid_amount'); ?></th>
                                        <th><?php echo _l('re_payment_date'); ?></th>
                                        <th><?php echo _l('re_payment_mode'); ?></th>
                                        <th><?php echo _l('re_emi_status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($emi_schedule as $emi): ?>
                                        <tr>
                                            <td><?php echo $emi['emi_number']; ?></td>
                                            <td><?php echo _d($emi['due_date']); ?></td>
                                            <td><?php echo app_format_money($emi['amount'], get_base_currency()); ?></td>
                                            <td><?php echo app_format_money($emi['paid_amount'], get_base_currency()); ?></td>
                                            <td><?php echo $emi['payment_date'] ? _d($emi['payment_date']) : '-'; ?></td>
                                            <td><?php echo $emi['payment_mode'] ? ucfirst($emi['payment_mode']) : '-'; ?></td>
                                            <td>
                                                <span class="label label-<?php echo $emi['status'] == 'paid' ? 'success' : ($emi['status'] == 'overdue' ? 'danger' : 'warning'); ?>">
                                                    <?php echo ucfirst($emi['status']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
