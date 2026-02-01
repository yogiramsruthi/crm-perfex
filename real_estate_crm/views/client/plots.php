<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin"><?php echo _l('re_my_plots'); ?></h4>
        <hr class="hr-panel-heading" />
        
        <?php if (!empty($plots)): ?>
            <div class="row">
                <?php foreach ($plots as $plot): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-map-marker"></i> <?php echo $plot['plot_number']; ?>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <table class="table table-condensed table-bordered">
                                    <tr>
                                        <th width="40%"><?php echo _l('re_project_name'); ?></th>
                                        <td><?php echo $plot['project_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _l('re_plot_size'); ?></th>
                                        <td><?php echo $plot['plot_size'] ? $plot['plot_size'] : '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _l('re_plot_type'); ?></th>
                                        <td><?php echo $plot['plot_type'] ? $plot['plot_type'] : '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _l('re_plot_price'); ?></th>
                                        <td><strong><?php echo app_format_money($plot['price'], get_base_currency()); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo _l('re_plot_status'); ?></th>
                                        <td>
                                            <span class="label label-<?php echo $plot['status'] == 'sold' ? 'success' : 'info'; ?>">
                                                <?php echo ucfirst($plot['status']); ?>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                                
                                <?php if (!empty($plot['description'])): ?>
                                    <hr />
                                    <p class="text-muted">
                                        <strong><?php echo _l('description'); ?>:</strong><br />
                                        <?php echo nl2br($plot['description']); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center mtop50 mbot50">
                <i class="fa fa-map-marker fa-5x text-muted"></i>
                <h3 class="text-muted"><?php echo _l('re_no_plots_found'); ?></h3>
                <p class="text-muted"><?php echo _l('re_no_plots_assigned'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
