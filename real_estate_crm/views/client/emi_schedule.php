<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin"><?php echo _l('re_emi_schedule'); ?></h4>
        <hr class="hr-panel-heading" />
        
        <?php if (!empty($emi_list)): ?>
            <!-- Statistics -->
            <div class="row mbot20">
                <?php 
                $total_emi = count($emi_list);
                $paid_emi = 0;
                $pending_emi = 0;
                $overdue_emi = 0;
                $total_amount = 0;
                $paid_amount = 0;
                
                foreach ($emi_list as $emi) {
                    $total_amount += $emi['amount'];
                    if ($emi['status'] == 'paid') {
                        $paid_emi++;
                        $paid_amount += $emi['paid_amount'];
                    } elseif ($emi['status'] == 'overdue') {
                        $overdue_emi++;
                    } else {
                        $pending_emi++;
                    }
                }
                ?>
                
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-info">
                        <div class="panel-body text-center">
                            <h2 class="bold"><?php echo $total_emi; ?></h2>
                            <p><?php echo _l('re_total_emi'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-success">
                        <div class="panel-body text-center">
                            <h2 class="bold"><?php echo $paid_emi; ?></h2>
                            <p><?php echo _l('re_paid_emi'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-warning">
                        <div class="panel-body text-center">
                            <h2 class="bold"><?php echo $pending_emi; ?></h2>
                            <p><?php echo _l('re_pending_emi'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-danger">
                        <div class="panel-body text-center">
                            <h2 class="bold"><?php echo $overdue_emi; ?></h2>
                            <p><?php echo _l('re_overdue_emi'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- EMI List -->
            <div class="table-responsive">
                <table class="table table-striped dt-table">
                    <thead>
                        <tr>
                            <th><?php echo _l('re_plot_number'); ?></th>
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
                        <?php foreach ($emi_list as $emi): ?>
                            <tr>
                                <td><strong><?php echo $emi['plot_number']; ?></strong></td>
                                <td><?php echo $emi['emi_number']; ?></td>
                                <td><?php echo _d($emi['due_date']); ?></td>
                                <td><?php echo app_format_money($emi['amount'], get_base_currency()); ?></td>
                                <td class="text-success"><?php echo app_format_money($emi['paid_amount'], get_base_currency()); ?></td>
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
        <?php else: ?>
            <div class="text-center mtop50 mbot50">
                <i class="fa fa-credit-card fa-5x text-muted"></i>
                <h3 class="text-muted"><?php echo _l('re_no_emi_found'); ?></h3>
                <p class="text-muted"><?php echo _l('re_no_emi_schedule'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
