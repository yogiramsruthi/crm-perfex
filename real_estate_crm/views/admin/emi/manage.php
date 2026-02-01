<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <div class="clearfix"></div>
                        <h4 class="no-margin"><?php echo _l('re_emi_schedule'); ?></h4>
                        <hr class="hr-panel-heading" />
                        
                        <div class="table-responsive">
                            <table class="table table-striped real-estate-table" id="emi-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo _l('re_customer'); ?></th>
                                        <th><?php echo _l('re_project'); ?></th>
                                        <th><?php echo _l('re_plot_number'); ?></th>
                                        <th><?php echo _l('re_emi_number'); ?></th>
                                        <th><?php echo _l('re_due_date'); ?></th>
                                        <th><?php echo _l('re_emi_amount'); ?></th>
                                        <th><?php echo _l('re_paid_amount'); ?></th>
                                        <th><?php echo _l('re_payment_date'); ?></th>
                                        <th><?php echo _l('re_emi_status'); ?></th>
                                        <th><?php echo _l('re_invoice'); ?></th>
                                        <th><?php echo _l('re_actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($emi_list) && !empty($emi_list)): ?>
                                        <?php foreach ($emi_list as $emi): ?>
                                            <tr>
                                                <td><?php echo $emi['id']; ?></td>
                                                <td><?php echo $emi['customer_name']; ?></td>
                                                <td><?php echo $emi['project_name']; ?></td>
                                                <td><?php echo $emi['plot_number']; ?></td>
                                                <td><?php echo $emi['emi_number']; ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($emi['due_date'])); ?></td>
                                                <td><?php echo app_format_money($emi['amount'], get_base_currency()); ?></td>
                                                <td><?php echo app_format_money($emi['paid_amount'] ?? 0, get_base_currency()); ?></td>
                                                <td><?php echo $emi['payment_date'] ? date('Y-m-d', strtotime($emi['payment_date'])) : '-'; ?></td>
                                                <td>
                                                    <?php
                                                    $status_class = 'default';
                                                    if ($emi['status'] == 'paid') $status_class = 'success';
                                                    elseif ($emi['status'] == 'pending') {
                                                        if (strtotime($emi['due_date']) < time()) {
                                                            $status_class = 'danger';
                                                            $emi['status'] = 'overdue';
                                                        } else {
                                                            $status_class = 'warning';
                                                        }
                                                    }
                                                    ?>
                                                    <span class="label label-<?php echo $status_class; ?>">
                                                        <?php echo ucfirst($emi['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php if ($emi['invoice_id']): ?>
                                                        <a href="<?php echo admin_url('invoices/invoice/' . $emi['invoice_id']); ?>" 
                                                           class="btn btn-sm btn-info" target="_blank" 
                                                           data-toggle="tooltip" title="<?php echo _l('re_view_invoice'); ?>">
                                                            <i class="fa fa-file-invoice"></i>
                                                        </a>
                                                    <?php elseif (has_permission('real_estate_crm', '', 'create') && $emi['status'] != 'paid'): ?>
                                                        <a href="<?php echo admin_url('real_estate_crm/generate_emi_invoice/' . $emi['id']); ?>" 
                                                           class="btn btn-sm btn-success" 
                                                           data-toggle="tooltip" title="<?php echo _l('re_generate_invoice'); ?>"
                                                           onclick="return confirm('<?php echo _l('re_confirm_generate_invoice'); ?>');">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if (has_permission('real_estate_crm', '', 'edit') && $emi['status'] != 'paid'): ?>
                                                        <a href="<?php echo admin_url('real_estate_crm/mark_emi_paid/' . $emi['id']); ?>" 
                                                           class="btn btn-sm btn-success" 
                                                           data-toggle="tooltip" title="<?php echo _l('re_mark_as_paid'); ?>"
                                                           onclick="return confirm('<?php echo _l('re_confirm_mark_paid'); ?>');">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="12" class="text-center"><?php echo _l('re_no_emi_found'); ?></td>
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
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
