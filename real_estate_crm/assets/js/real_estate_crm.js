/**
 * Real Estate CRM JavaScript
 */

(function($) {
    'use strict';

    // Initialize DataTables
    function init_real_estate_tables() {
        if ($('.real-estate-table').length > 0) {
            $('.real-estate-table').DataTable({
                responsive: true,
                order: [[0, 'desc']],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search..."
                }
            });
        }
    }

    // Delete confirmation
    function delete_confirmation(url, message) {
        if (confirm(message)) {
            window.location.href = url;
        }
    }

    // Calculate balance amount
    function calculate_balance() {
        var total = parseFloat($('#total_amount').val()) || 0;
        var paid = parseFloat($('#paid_amount').val()) || 0;
        var balance = total - paid;
        $('#balance_amount').val(balance.toFixed(2));
    }

    // Initialize on page load
    $(document).ready(function() {
        init_real_estate_tables();

        // Auto-calculate balance on amount change
        $('#total_amount, #paid_amount').on('input', function() {
            calculate_balance();
        });

        // Delete buttons
        $('.delete-item').on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var message = $(this).data('message') || 'Are you sure you want to delete this?';
            delete_confirmation(url, message);
        });

        // Initialize date pickers
        if ($('.datepicker').length > 0) {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        }
    });

    // Export functions
    window.RealEstateCRM = {
        calculate_balance: calculate_balance,
        delete_confirmation: delete_confirmation,
        init_tables: init_real_estate_tables
    };

})(jQuery);
