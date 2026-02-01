# Perfex CRM - Real Estate Management Plugin

A comprehensive Real Estate CRM plugin for Perfex CRM that provides complete functionality for managing real estate projects, plots, bookings, EMI payments, agents, and team members.

## Overview

This plugin extends Perfex CRM with a complete Real Estate Management System, designed specifically for real estate businesses to manage their projects, properties, customer bookings, payment schedules, sales agents, and team assignments.

## Key Features

### 💼 Perfex CRM Integration
- **Invoice Module Integration**: Auto-generate Perfex invoices for bookings and EMI
- **Customer Management**: Uses Perfex's native client/contact system
- **Payment Synchronization**: Automatic payment status updates from invoices
- **Single Customer Database**: No duplicate customer management
- **Payment Gateways**: All Perfex payment methods available
- **Professional Invoices**: Email, PDF, reminders, tracking

### 🏢 Dashboard
- Real-time statistics and KPIs
- Total projects, plots, bookings, and revenue tracking
- Visual representation of available vs. booked plots
- Recent bookings overview
- Upcoming EMI payments tracking
- Project-wise statistics

### 👤 Customer Portal (NEW)
- **Customer Dashboard**: Overview of bookings, payments, and EMI
- **My Bookings**: View all bookings with details
- **Booking Details**: Complete booking information with EMI schedule
- **My Plots**: View assigned plots with project information
- **EMI Schedule**: Track all installment payments across bookings
- **Payment History**: Complete transaction history
- **Secure Access**: Customers can only view their own data

### 🏗️ Projects Management
- Create and manage multiple real estate projects
- Track project location, timeline, and status
- Monitor plot availability per project
- **Enhanced Project Details (NEW):**
  - Project Type (Residential/Commercial/Mixed/Industrial)
  - Developer Name and Contact Information
  - Approval/Registration Number
  - Total Area (acres or sq ft)
  - Amenities (detailed list)
  - Payment Terms
  - Bank Loan Availability
  - Possession Date
  - Legal Status (Approved/Pending/Registered)
  - Project Contact Person, Phone, Email
- Assign team members to projects

### 📍 Plots Management
- Add and manage individual plots/properties
- Link plots to specific projects
- Define plot specifications (size, type, price)
- Track plot status (Available, Booked, Sold)
- Automatic status updates based on bookings

### 📅 Bookings Management
- Create customer bookings for plots
- Link bookings to **Perfex customers** (integrated)
- Track payment details (total, paid, balance)
- **Generate Perfex invoices** for bookings (NEW)
- **View/track invoice status** directly (NEW)
- Auto-update booking status from invoice payments
- Track booking status (Pending, Confirmed, Cancelled)
- Support EMI and full payment options
- Booking status tracking (Pending, Confirmed, Cancelled)

### 💳 EMI Management
- Automatic EMI schedule generation
- Track individual installment payments
- **Generate Perfex invoices for each EMI** (NEW)
- **Auto-sync payment status from invoices** (NEW)
- Payment recording with transaction details
- EMI status tracking (Pending, Paid, Overdue)
- Automatic balance calculations
- Due date tracking and reminders

### 💰 Accounts & Transactions
- Complete transaction history
- Financial reporting and analytics
- Revenue and pending payments tracking
- Monthly revenue analysis
- Transaction filtering and search

### 👥 Agents Management (NEW)
- Add and manage sales agents
- Link agents to staff members
- Track agent performance metrics
- Monitor sales and commission earnings
- Agent status management

### 👨‍💼 Team Management
- Assign team members to projects
- Define roles and responsibilities
- Track team assignments and status
- Monitor team performance

### ⚙️ Settings
- Configure module preferences
- Set default EMI interest rates
- Define booking validity periods
- Enable/disable notifications
- Customize module behavior

## Installation

1. **Download/Clone the Repository**
   ```bash
   git clone https://github.com/yogiramsruthi/crm-perfex.git
   ```

2. **Copy to Perfex Modules Directory**
   ```bash
   cp -r real_estate_crm /path/to/perfex/modules/
   ```

3. **Activate the Module**
   - Login to Perfex CRM as Administrator
   - Navigate to: Setup → Modules
   - Find "Real Estate CRM" in the list
   - Click "Activate"

4. **Configure Permissions**
   - Navigate to: Setup → Roles
   - Assign "Real Estate CRM" permissions to appropriate roles
   - Available permissions: View, Create, Edit, Delete

5. **Start Using**
   - Access the module from the sidebar menu
   - Start creating projects and managing your real estate business!

## Documentation

For detailed documentation, please refer to the [README.md](real_estate_crm/README.md) file inside the `real_estate_crm` directory.

## Requirements

- Perfex CRM v2.9.0 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher
- CodeIgniter 3.x (included with Perfex)

## Database Schema

The module creates 8 database tables:
- Projects
- Plots
- Bookings
- EMI Schedules
- Transactions
- Agents
- Team Assignments
- Settings

## Support

For issues, suggestions, or contributions, please open an issue on GitHub.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Version

**Current Version**: 1.0.2

**Customer Portal**: ✅ Included  
**Perfex Integration**: ✅ Complete

## Key Integrations

### Perfex CRM Native Features ✅
- **Invoice Module**: Automatic invoice generation for bookings and EMI
- **Customer Management**: Uses Perfex's native client system
- **Customer Login**: Integrated with Perfex authentication
- **Payment Tracking**: Auto-sync from Perfex invoice payments

## Changelog

### Version 1.0.2 (2026-02-01)
- ✅ **Perfex Invoice Integration**: Generate invoices for bookings and EMI
- ✅ **Customer Integration**: Use Perfex customers throughout the system
- ✅ **Payment Sync**: Auto-update booking status from invoice payments
- ✅ **Enhanced Projects**: Added 12 new project fields (type, developer, amenities, etc.)
- ✅ **Invoice Generation Buttons**: Easy invoice creation from bookings list
- ✅ **Comprehensive Integration Guide**: 9,000+ word documentation

### Version 1.0.1 (2026-02-01)
- ✅ **NEW**: Customer Portal with 6 views
- ✅ Dashboard for customers with statistics
- ✅ My Bookings page with full booking details
- ✅ My Plots page showing assigned properties
- ✅ EMI Schedule view across all bookings
- ✅ Payment History with transaction details
- ✅ Secure access - customers can only see their own data

### Version 1.0.0 (2026-02-01)
- Initial release with admin panel
- Dashboard, Projects, Plots, Bookings, EMI, Accounts, Agents, Team, Settings

## Integration Details

### Perfex CRM Integration

The Real Estate CRM module is **fully integrated** with Perfex CRM's native features:

#### Invoice Module ✅
- Generate Perfex invoices for bookings
- Generate Perfex invoices for EMI payments
- Automatic invoice numbering
- Professional invoice format with plot/project details
- Email invoices to customers
- PDF generation
- Payment gateway integration (via Perfex)
- Payment reminders and overdue tracking

#### Customer System ✅
- Uses Perfex's `tblclients` and `tblcontacts` tables
- Searchable customer dropdown in forms
- Single source of truth for customer data
- No duplicate customer management
- Access to full customer profiles and history

#### Payment Synchronization ✅
- Automatic updates when invoices are paid
- Booking `paid_amount` auto-calculated
- EMI status changed to "paid" automatically
- Booking status updated to "confirmed" when fully paid
- Transaction history automatically recorded

#### Customer Portal ✅
- Uses Perfex's client authentication system
- No separate login required
- Secure session management
- Access control through Perfex

### How It Works

**Booking with Invoice:**
1. Create booking → Select Perfex customer
2. Click "Generate Invoice" → Creates Perfex invoice
3. Customer pays invoice → Booking status auto-updated
4. View invoice anytime from bookings list

**EMI with Invoice:**
1. Generate EMI schedule → Creates installment plan
2. Generate invoice for each EMI → Links to Perfex invoices
3. Customer pays EMI invoice → Status auto-updated to "paid"
4. Track all payments in one place

### Documentation

- **[PERFEX_INTEGRATION_GUIDE.md](PERFEX_INTEGRATION_GUIDE.md)** - Complete integration guide (9,000+ words)
- **[INSTALLATION_GUIDE.md](INSTALLATION_GUIDE.md)** - Installation and setup
- **[CUSTOMER_PORTAL_GUIDE.md](CUSTOMER_PORTAL_GUIDE.md)** - Customer portal usage
- **[FEATURES.md](FEATURES.md)** - Complete features list
- **[CHANGELOG.md](CHANGELOG.md)** - Version history

## Author

Real Estate CRM Team
