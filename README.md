# Perfex CRM - Real Estate Management Plugin

A comprehensive Real Estate CRM plugin for Perfex CRM that provides complete functionality for managing real estate projects, plots, bookings, EMI payments, agents, and team members.

## Overview

This plugin extends Perfex CRM with a complete Real Estate Management System, designed specifically for real estate businesses to manage their projects, properties, customer bookings, payment schedules, sales agents, and team assignments.

## Features

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
- Assign team members to projects

### 📍 Plots Management
- Add and manage individual plots/properties
- Link plots to specific projects
- Define plot specifications (size, type, price)
- Track plot status (Available, Booked, Sold)
- Automatic status updates based on bookings

### 📅 Bookings Management
- Create customer bookings for plots
- Link bookings to customers and agents
- Track payment details (total, paid, balance)
- Support EMI and full payment options
- Booking status tracking (Pending, Confirmed, Cancelled)

### 💳 EMI Management
- Automatic EMI schedule generation
- Track individual installment payments
- Payment recording with transaction details
- EMI status tracking (Pending, Paid, Overdue)
- Automatic balance calculations

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

**Current Version**: 1.0.1

**Customer Portal**: ✅ Included

## Changelog

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

## Author

Real Estate CRM Team
