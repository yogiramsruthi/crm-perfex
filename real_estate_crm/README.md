# Real Estate CRM Module for Perfex CRM

A comprehensive Real Estate Management System plugin for Perfex CRM that provides complete functionality for managing real estate projects, plots, bookings, EMI payments, agents, team members, and a customer portal.

## Features

### 1. Dashboard
- **Overview Statistics**: Total projects, plots, bookings, and revenue
- **Visual KPIs**: Quick insights into available vs. booked plots
- **Recent Bookings**: Latest customer bookings at a glance
- **Upcoming EMI Payments**: Track pending installments
- **Project Statistics**: Plot availability by project

### 2. Customer Portal (NEW)
- **Customer Dashboard**: Overview of bookings, payments, and EMI
- **My Bookings**: View all bookings with complete details
- **Booking Details**: Full booking information with EMI schedule
- **My Plots**: View assigned plots with project information
- **EMI Schedule**: Track all installment payments
- **Payment History**: Complete transaction history
- **Secure Access**: Customers can only view their own data
- **Mobile Responsive**: Works on all devices

### 3. Projects Management
- Create and manage real estate projects
- Track project details: name, location, description
- Monitor total and available plots per project
- Set project start and end dates
- Manage project status (Active/Inactive)

### 4. Plots Management
- Add and manage individual plots
- Link plots to specific projects
- Define plot specifications: number, size, type
- Set plot pricing
- Track plot status: Available, Booked, Sold
- Automatic status updates based on bookings

### 5. Bookings Management
- Create customer bookings for plots
- Link bookings to customers and agents
- Track total amount, paid amount, and balance
- Support for different payment types (EMI, Full Payment)
- Booking status tracking: Pending, Confirmed, Cancelled
- Automatic plot status updates

### 6. EMI (Installment) Management
- Generate EMI schedules automatically
- Track individual EMI payments
- Record payment details: date, mode, transaction ID
- EMI status tracking: Pending, Paid, Overdue
- Automatic balance calculations
- Payment history and records

### 7. Accounts & Transactions
- Complete transaction history
- Track all payments and receipts
- Financial reporting
- Total revenue and pending payments tracking
- Monthly revenue analysis
- Transaction filtering and search

### 8. Agents Management (NEW)
- Add and manage sales agents
- Link agents to staff members (optional)
- Track agent details: contact info, commission rate
- Monitor agent performance: total sales, commissions
- Agent status management
- Commission calculations

### 9. Team Management
- Assign team members to projects
- Define team roles and responsibilities
- Track team member assignments
- Monitor team performance
- Team status management

### 10. Settings
- Configure module preferences
- Set default EMI interest rates
- Define booking validity periods
- Enable/disable email notifications
- Enable/disable SMS notifications
- Customize module behavior

## Installation

1. **Upload the Module**
   - Copy the `real_estate_crm` folder to your Perfex CRM `modules` directory
   - Path: `/path/to/perfex/modules/real_estate_crm/`

2. **Activate the Module**
   - Login to Perfex CRM as Administrator
   - Navigate to: Setup → Modules
   - Find "Real Estate CRM" in the list
   - Click "Activate"

3. **Configure Permissions**
   - Navigate to: Setup → Roles
   - Assign "Real Estate CRM" permissions to appropriate roles
   - Available permissions: View, Create, Edit, Delete

4. **Access the Module**
   - After activation, the "Real Estate CRM" menu will appear in the sidebar
   - Click to access all features

## Database Schema

The module creates the following tables:

- `tblreal_estate_projects` - Real estate projects
- `tblreal_estate_plots` - Plot/property listings
- `tblreal_estate_bookings` - Customer bookings
- `tblreal_estate_emi` - EMI/installment schedules
- `tblreal_estate_transactions` - Payment transactions
- `tblreal_estate_agents` - Sales agents
- `tblreal_estate_team` - Team assignments
- `tblreal_estate_settings` - Module settings

## Usage Guide

### Creating a Project
1. Navigate to Real Estate CRM → Projects
2. Click "Add Project"
3. Fill in project details (name, location, description, dates)
4. Save the project

### Adding Plots
1. Navigate to Real Estate CRM → Plots
2. Click "Add Plot"
3. Select the project
4. Enter plot details (number, size, type, price)
5. Save the plot

### Creating a Booking
1. Navigate to Real Estate CRM → Bookings
2. Click "Add Booking"
3. Select customer, plot, and agent
4. Enter booking details and payment information
5. Save the booking
6. The plot status automatically updates to "Booked"

### Generating EMI Schedule
1. Navigate to Real Estate CRM → EMI
2. Click "Generate EMI Schedule" for a booking
3. Enter number of EMIs and start date
4. System automatically calculates and creates EMI schedule

### Recording Payments
1. Navigate to Real Estate CRM → EMI
2. Find the EMI payment to record
3. Click "Record Payment"
4. Enter payment details
5. System updates booking balance and creates transaction record

### Managing Agents
1. Navigate to Real Estate CRM → Agents
2. Click "Add Agent"
3. Enter agent details and commission rate
4. Link to staff member if applicable
5. Track agent sales and commissions

### Team Assignment
1. Navigate to Real Estate CRM → Team
2. Click "Add Team Member"
3. Select staff member and project
4. Define role and responsibilities
5. Set assignment date

## Technical Details

### Requirements
- Perfex CRM v2.9.0 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher
- CodeIgniter 3.x (included with Perfex)

### File Structure
```
real_estate_crm/
├── config.php              # Module configuration & hooks
├── install.php             # Database installation
├── uninstall.php           # Cleanup script
├── controllers/
│   └── Real_estate_crm.php # Main controller
├── models/
│   └── Real_estate_crm_model.php # Database model
├── views/
│   ├── admin/             # Admin panel views
│   └── client/            # Client portal views
├── assets/
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── images/            # Image assets
└── language/
    └── english/           # Language files
```

### Customization

**Adding Custom Fields**
Modify the database schema in `install.php` and update corresponding views and models.

**Custom Styling**
Edit `assets/css/real_estate_crm.css` to customize the appearance.

**Additional Features**
Extend the controller and model classes to add new functionality.

## Support & Documentation

For issues, suggestions, or contributions:
- Create an issue on GitHub
- Contact: support@realestate-crm.com
- Documentation: https://docs.realestate-crm.com

## Changelog

### Version 1.0.0 (Initial Release)
- Dashboard with statistics and KPIs
- Projects management module
- Plots management module
- Bookings management module
- EMI/installment management
- Accounts and transactions
- Agents management (NEW)
- Team management module
- Settings configuration
- Complete CRUD operations for all modules
- Responsive design
- Multi-language support

## License

This module is licensed under the MIT License. See LICENSE file for details.

## Credits

Developed by Real Estate CRM Team
Based on Perfex CRM Module Architecture

---

**Version**: 1.0.0  
**Author**: Real Estate CRM Team  
**Website**: https://realestate-crm.com
