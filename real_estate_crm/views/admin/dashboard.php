<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <h4 class="no-margin"><?php echo _l('re_dashboard'); ?></h4>
                        <hr class="hr-panel-heading" />
                        
                        <!-- Statistics Cards -->
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="panel_s">
                                    <div class="panel-body text-center bg-primary">
                                        <h1 class="text-white bold"><?php echo $stats['total_projects']; ?></h1>
                                        <p class="text-white"><?php echo _l('re_total_projects'); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="panel_s">
                                    <div class="panel-body text-center bg-success">
                                        <h1 class="text-white bold"><?php echo $stats['available_plots']; ?> / <?php echo $stats['total_plots']; ?></h1>
                                        <p class="text-white"><?php echo _l('re_available_plots'); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="panel_s">
                                    <div class="panel-body text-center bg-info">
                                        <h1 class="text-white bold"><?php echo $stats['total_bookings']; ?></h1>
                                        <p class="text-white"><?php echo _l('re_total_bookings'); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6">
                                <div class="panel_s">
                                    <div class="panel-body text-center bg-warning">
                                        <h1 class="text-white bold"><?php echo app_format_money($stats['total_revenue'], get_base_currency()); ?></h1>
                                        <p class="text-white"><?php echo _l('re_total_revenue'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Bookings -->
                        <div class="row mtop20">
                            <div class="col-md-6">
                                <div class="panel_s">
                                    <div class="panel-body">
                                        <h4><?php echo _l('re_recent_bookings'); ?></h4>
                                        <hr class="hr-panel-heading" />
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo _l('re_customer'); ?></th>
                                                        <th><?php echo _l('re_plot_number'); ?></th>
                                                        <th><?php echo _l('re_total_amount'); ?></th>
                                                        <th><?php echo _l('re_booking_status'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($recent_bookings)): ?>
                                                        <?php foreach ($recent_bookings as $booking): ?>
                                                            <tr>
                                                                <td><?php echo $booking['customer_name']; ?></td>
                                                                <td><?php echo $booking['plot_number']; ?></td>
                                                                <td><?php echo app_format_money($booking['total_amount'], get_base_currency()); ?></td>
                                                                <td><span class="label label-<?php echo $booking['status'] == 'confirmed' ? 'success' : 'warning'; ?>"><?php echo ucfirst($booking['status']); ?></span></td>
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
                            
                            <div class="col-md-6">
                                <div class="panel_s">
                                    <div class="panel-body">
                                        <h4><?php echo _l('re_upcoming_emi'); ?></h4>
                                        <hr class="hr-panel-heading" />
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo _l('re_customer'); ?></th>
                                                        <th><?php echo _l('re_due_date'); ?></th>
                                                        <th><?php echo _l('re_emi_amount'); ?></th>
                                                        <th><?php echo _l('re_emi_status'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($upcoming_emi)): ?>
                                                        <?php foreach ($upcoming_emi as $emi): ?>
                                                            <tr>
                                                                <td><?php echo $emi['customer_name']; ?></td>
                                                                <td><?php echo _d($emi['due_date']); ?></td>
                                                                <td><?php echo app_format_money($emi['amount'], get_base_currency()); ?></td>
                                                                <td><span class="label label-<?php echo $emi['status'] == 'paid' ? 'success' : 'danger'; ?>"><?php echo ucfirst($emi['status']); ?></span></td>
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
                        </div>
                        
                        <!-- Project Statistics -->
                        <div class="row mtop20">
                            <div class="col-md-12">
                                <div class="panel_s">
                                    <div class="panel-body">
                                        <h4><?php echo _l('re_projects'); ?> - <?php echo _l('re_plot_status'); ?></h4>
                                        <hr class="hr-panel-heading" />
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo _l('re_project_name'); ?></th>
                                                        <th><?php echo _l('re_total_plots'); ?></th>
                                                        <th><?php echo _l('re_available_plots'); ?></th>
                                                        <th><?php echo _l('re_booked_plots'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($project_stats)): ?>
                                                        <?php foreach ($project_stats as $project): ?>
                                                            <tr>
                                                                <td><?php echo $project['name']; ?></td>
                                                                <td><?php echo $project['total_plots']; ?></td>
                                                                <td><span class="text-success"><?php echo $project['available_plots']; ?></span></td>
                                                                <td><span class="text-info"><?php echo $project['booked_plots']; ?></span></td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
