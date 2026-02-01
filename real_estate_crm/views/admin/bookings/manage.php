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
                                        <th><?php echo _l('re_project'); ?></th>
                                        <th><?php echo _l('re_plot_number'); ?></th>
                                        <th><?php echo _l('re_agent'); ?></th>
                                        <th><?php echo _l('re_booking_date'); ?></th>
                                        <th><?php echo _l('re_total_amount'); ?></th>
                                        <th><?php echo _l('re_paid_amount'); ?></th>
                                        <th><?php echo _l('re_balance_amount'); ?></th>
                                        <th><?php echo _l('re_booking_status'); ?></th>
                                        <th><?php echo _l('re_invoice'); ?></th>
                                        <th><?php echo _l('re_actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($bookings)): ?>
                                        <?php foreach ($bookings as $booking): ?>
                                            <tr>
                                                <td><?php echo $booking['id']; ?></td>
                                                <td><?php echo $booking['customer_name']; ?></td>
                                                <td><?php echo $booking['project_name']; ?></td>
                                                <td><?php echo $booking['plot_number']; ?></td>
                                                <td><?php echo $booking['agent_name'] ?: '-'; ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($booking['booking_date'])); ?></td>
                                                <td><?php echo app_format_money($booking['total_amount'], get_base_currency()); ?></td>
                                                <td><?php echo app_format_money($booking['paid_amount'], get_base_currency()); ?></td>
                                                <td><?php echo app_format_money($booking['balance_amount'], get_base_currency()); ?></td>
                                                <td>
                                                    <?php
                                                    $status_class = 'default';
                                                    if ($booking['status'] == 'confirmed') $status_class = 'success';
                                                    elseif ($booking['status'] == 'pending') $status_class = 'warning';
                                                    elseif ($booking['status'] == 'cancelled') $status_class = 'danger';
                                                    ?>
                                                    <span class="label label-<?php echo $status_class; ?>">
                                                        <?php echo ucfirst($booking['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php if ($booking['invoice_id']): ?>
                                                        <a href="<?php echo admin_url('invoices/invoice/' . $booking['invoice_id']); ?>" 
                                                           class="btn btn-sm btn-info" target="_blank">
                                                            <i class="fa fa-file-invoice"></i> <?php echo _l('re_view_invoice'); ?>
                                                        </a>
                                                    <?php elseif (has_permission('real_estate_crm', '', 'create')): ?>
                                                        <a href="<?php echo admin_url('real_estate_crm/generate_booking_invoice/' . $booking['id']); ?>" 
                                                           class="btn btn-sm btn-success" 
                                                           onclick="return confirm('<?php echo _l('re_confirm_generate_invoice'); ?>');">
                                                            <i class="fa fa-plus"></i> <?php echo _l('re_generate_invoice'); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if (has_permission('real_estate_crm', '', 'edit')): ?>
                                                        <a href="<?php echo admin_url('real_estate_crm/booking/' . $booking['id']); ?>" 
                                                           class="btn btn-sm btn-default">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if (has_permission('real_estate_crm', '', 'delete')): ?>
                                                        <a href="<?php echo admin_url('real_estate_crm/delete_booking/' . $booking['id']); ?>" 
                                                           class="btn btn-sm btn-danger _delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="12" class="text-center"><?php echo _l('re_no_bookings_found'); ?></td>
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
<?php init_tail(); ?>
