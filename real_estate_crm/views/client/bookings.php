<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin"><?php echo _l('re_my_bookings'); ?></h4>
        <hr class="hr-panel-heading" />
        
        <div class="table-responsive">
            <table class="table table-striped dt-table">
                <thead>
                    <tr>
                        <th><?php echo _l('re_project_name'); ?></th>
                        <th><?php echo _l('re_plot_number'); ?></th>
                        <th><?php echo _l('re_booking_date'); ?></th>
                        <th><?php echo _l('re_total_amount'); ?></th>
                        <th><?php echo _l('re_paid_amount'); ?></th>
                        <th><?php echo _l('re_balance_amount'); ?></th>
                        <th><?php echo _l('re_payment_type'); ?></th>
                        <th><?php echo _l('re_booking_status'); ?></th>
                        <th><?php echo _l('re_actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($bookings)): ?>
                        <?php foreach ($bookings as $booking): ?>
                            <tr>
                                <td><?php echo $booking['project_name']; ?></td>
                                <td><strong><?php echo $booking['plot_number']; ?></strong></td>
                                <td><?php echo _d($booking['booking_date']); ?></td>
                                <td><?php echo app_format_money($booking['total_amount'], get_base_currency()); ?></td>
                                <td class="text-success"><?php echo app_format_money($booking['paid_amount'], get_base_currency()); ?></td>
                                <td class="text-danger"><?php echo app_format_money($booking['balance_amount'], get_base_currency()); ?></td>
                                <td><?php echo ucfirst($booking['payment_type']); ?></td>
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
                            <td colspan="9" class="text-center">
                                <p class="text-muted mtop20 mbot20">
                                    <i class="fa fa-info-circle fa-2x"></i><br />
                                    <?php echo _l('re_no_bookings_found'); ?>
                                </p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
