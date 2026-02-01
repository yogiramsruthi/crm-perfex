<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin"><?php echo _l('re_payment_history'); ?></h4>
        <hr class="hr-panel-heading" />
        
        <?php if (!empty($transactions)): ?>
            <!-- Statistics -->
            <div class="row mbot20">
                <?php 
                $total_paid = 0;
                foreach ($transactions as $transaction) {
                    $total_paid += $transaction['amount'];
                }
                ?>
                
                <div class="col-md-6 col-sm-12">
                    <div class="panel panel-success">
                        <div class="panel-body text-center">
                            <h2 class="bold"><?php echo app_format_money($total_paid, get_base_currency()); ?></h2>
                            <p><?php echo _l('re_total_payments_made'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-body text-center">
                            <h2 class="bold"><?php echo count($transactions); ?></h2>
                            <p><?php echo _l('re_total_transactions'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Transaction List -->
            <div class="table-responsive">
                <table class="table table-striped dt-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><?php echo _l('re_transaction_date'); ?></th>
                            <th><?php echo _l('re_transaction_type'); ?></th>
                            <th><?php echo _l('re_transaction_amount'); ?></th>
                            <th><?php echo _l('re_payment_mode'); ?></th>
                            <th><?php echo _l('re_reference_number'); ?></th>
                            <th><?php echo _l('description'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction): ?>
                            <tr>
                                <td><?php echo $transaction['id']; ?></td>
                                <td><?php echo _d($transaction['transaction_date']); ?></td>
                                <td>
                                    <span class="label label-info">
                                        <?php echo ucfirst(str_replace('_', ' ', $transaction['transaction_type'])); ?>
                                    </span>
                                </td>
                                <td class="text-success">
                                    <strong><?php echo app_format_money($transaction['amount'], get_base_currency()); ?></strong>
                                </td>
                                <td><?php echo $transaction['payment_mode'] ? ucfirst($transaction['payment_mode']) : '-'; ?></td>
                                <td><?php echo $transaction['reference_number'] ? $transaction['reference_number'] : '-'; ?></td>
                                <td><?php echo $transaction['description'] ? $transaction['description'] : '-'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center mtop50 mbot50">
                <i class="fa fa-money fa-5x text-muted"></i>
                <h3 class="text-muted"><?php echo _l('re_no_transactions_found'); ?></h3>
                <p class="text-muted"><?php echo _l('re_no_payment_history'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
