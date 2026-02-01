# Real Estate CRM - Installation & Usage Guide

## Table of Contents
1. [Installation](#installation)
2. [Initial Setup](#initial-setup)
3. [Module Configuration](#module-configuration)
4. [User Guide](#user-guide)
5. [Customer Portal](#customer-portal)
6. [Troubleshooting](#troubleshooting)

---

## Installation

### Prerequisites
- Perfex CRM v2.9.0 or higher installed and running
- Administrator access to Perfex CRM
- FTP/SSH access to your server
- MySQL database (already configured with Perfex)

### Installation Steps

#### Step 1: Download the Module
```bash
git clone https://github.com/yogiramsruthi/crm-perfex.git
cd crm-perfex
```

#### Step 2: Copy Module to Perfex
```bash
# Copy the real_estate_crm folder to your Perfex modules directory
cp -r real_estate_crm /path/to/your/perfex/modules/

# Make sure permissions are correct
chmod -R 755 /path/to/your/perfex/modules/real_estate_crm
```

#### Step 3: Activate the Module
1. Login to Perfex CRM as Administrator
2. Navigate to: **Setup → Modules**
3. Find **"Real Estate CRM"** in the modules list
4. Click the **"Activate"** button
5. The module will automatically create necessary database tables

#### Step 4: Verify Installation
- Check if the "Real Estate CRM" menu appears in the sidebar
- Navigate to Real Estate CRM → Dashboard to verify the module is working

---

## Initial Setup

### Configure Permissions

1. Navigate to **Setup → Roles**
2. Select a role (e.g., "Administrator" or "Staff")
3. Find **"Real Estate CRM"** in the capabilities list
4. Assign permissions:
   - ✅ **View** - View all Real Estate CRM data
   - ✅ **Create** - Create new records (projects, plots, bookings, etc.)
   - ✅ **Edit** - Edit existing records
   - ✅ **Delete** - Delete records

### Configure Module Settings

1. Navigate to **Real Estate CRM → Settings**
2. Configure the following:
   - **Default EMI Interest Rate**: Set the default interest rate (e.g., 10%)
   - **Default Booking Validity**: Set booking validity period in days (e.g., 30)
   - **Email Notifications**: Enable/disable email notifications
   - **SMS Notifications**: Enable/disable SMS notifications
3. Click **Save**

---

## Module Configuration

### Default Settings Explained

| Setting | Description | Default Value |
|---------|-------------|---------------|
| Default EMI Interest Rate | Interest rate used for EMI calculations | 10% |
| Default Booking Validity | Number of days a booking remains valid | 30 days |
| Email Notifications | Send email notifications for bookings/payments | Enabled |
| SMS Notifications | Send SMS notifications (requires SMS gateway) | Disabled |

---

## User Guide

### Creating Your First Project

1. Navigate to **Real Estate CRM → Projects**
2. Click **"Add Project"** button
3. Fill in the project details:
   - **Project Name**: Enter a unique name (e.g., "Green Valley Phase 1")
   - **Location**: Enter the project location
   - **Description**: Add project description
   - **Total Plots**: Enter the number of plots
   - **Start Date**: Select project start date
   - **End Date**: Select expected completion date
   - **Status**: Select Active or Inactive
4. Click **Save**

### Adding Plots to a Project

1. Navigate to **Real Estate CRM → Plots**
2. Click **"Add Plot"** button
3. Fill in the plot details:
   - **Project**: Select the project from dropdown
   - **Plot Number**: Enter unique plot number (e.g., "A-101")
   - **Plot Size**: Enter size (e.g., "1000 sq ft")
   - **Plot Type**: Enter type (e.g., "Residential")
   - **Price**: Enter plot price
   - **Status**: Select Available, Booked, or Sold
   - **Description**: Add any additional details
4. Click **Save**

### Creating a Booking

1. Navigate to **Real Estate CRM → Bookings**
2. Click **"Add Booking"** button
3. Fill in the booking details:
   - **Plot**: Select available plot from dropdown
   - **Customer**: Select customer from Perfex CRM clients
   - **Agent**: Select the sales agent (optional)
   - **Booking Date**: Select booking date
   - **Total Amount**: Enter total booking amount
   - **Paid Amount**: Enter amount paid (initial payment)
   - **Balance Amount**: Automatically calculated
   - **Payment Type**: Select EMI or Full Payment
   - **Status**: Select Pending, Confirmed, or Cancelled
   - **Notes**: Add any additional notes
4. Click **Save**

**Note**: The plot status will automatically change to "Booked"

### Generating EMI Schedule

1. Navigate to **Real Estate CRM → EMI**
2. Find the booking for which you want to generate EMI schedule
3. Click **"Generate EMI Schedule"** button
4. Enter details:
   - **Number of EMIs**: Enter total number of installments
   - **Start Date**: Select the date for first EMI
5. Click **Generate**

The system will automatically:
- Calculate EMI amount (Balance / Number of EMIs)
- Create monthly installments
- Set due dates for each EMI

### Recording EMI Payment

1. Navigate to **Real Estate CRM → EMI**
2. Find the EMI that has been paid
3. Click **"Record Payment"** button
4. Enter payment details:
   - **Paid Amount**: Enter the amount paid
   - **Payment Date**: Select payment date
   - **Payment Mode**: Enter payment method (Cash, Check, Online, etc.)
   - **Transaction ID**: Enter reference number
5. Click **Save**

The system will automatically:
- Update EMI status to "Paid"
- Update booking balance
- Create transaction record

### Managing Agents

1. Navigate to **Real Estate CRM → Agents**
2. Click **"Add Agent"** button
3. Fill in agent details:
   - **Agent Name**: Enter agent's full name
   - **Email**: Enter email address
   - **Phone**: Enter contact number
   - **Staff Member**: Link to existing staff (optional)
   - **Commission Rate**: Enter commission percentage
   - **Joined Date**: Select joining date
   - **Status**: Select Active or Inactive
   - **Address**: Enter complete address
4. Click **Save**

### Assigning Team Members

1. Navigate to **Real Estate CRM → Team**
2. Click **"Add Team Member"** button
3. Fill in details:
   - **Staff Member**: Select from Perfex CRM staff
   - **Project**: Select project (or leave blank for all projects)
   - **Role**: Enter role (e.g., "Project Manager", "Sales Executive")
   - **Assigned Date**: Select assignment date
   - **Status**: Select Active or Inactive
   - **Notes**: Add any notes
4. Click **Save**

### Viewing Accounts & Transactions

1. Navigate to **Real Estate CRM → Accounts**
2. View financial summary:
   - Total Revenue
   - Pending Payments
3. Scroll down to view all transactions
4. Use filters to search specific transactions

### Dashboard Overview

The dashboard provides a quick overview:
- **Total Projects**: Number of active projects
- **Available Plots**: Available vs total plots
- **Total Bookings**: Number of bookings
- **Total Revenue**: Sum of all payments received
- **Recent Bookings**: Last 5 bookings
- **Upcoming EMI**: Next 10 pending EMI payments
- **Project Statistics**: Plot status by project

---

## Customer Portal

### Overview

The Customer Portal allows your clients to access their booking information, track payments, and view EMI schedules from a secure, personalized portal.

### Accessing the Customer Portal

#### For Customers

1. **Login to Client Area**
   - Navigate to your Perfex CRM client login page
   - Enter your email and password
   - Click "Login"

2. **Access Real Estate Portal**
   - Look for "Real Estate CRM" in the sidebar menu
   - Click to expand and see available sections:
     - Dashboard
     - My Bookings
     - My Plots
     - EMI Schedule
     - Payment History

### Customer Portal Features

#### 1. Customer Dashboard
- View total bookings and amounts
- See payment status (total, paid, balance)
- Check upcoming EMI payments
- View recent transactions
- Quick links to all sections

#### 2. My Bookings
- List of all bookings
- View booking details
- See plot and project information
- Check payment status
- Access detailed booking view

#### 3. Booking Details
- Complete booking information
- Payment progress bar
- Full EMI schedule
- Payment history for the booking
- Booking notes

#### 4. My Plots
- View all assigned plots
- Plot details (size, type, price)
- Project information
- Plot status

#### 5. EMI Schedule
- All EMI payments across bookings
- Statistics (total, paid, pending, overdue)
- Due dates and amounts
- Payment tracking

#### 6. Payment History
- Complete transaction history
- Payment dates and modes
- Transaction references
- Total payments made

### For Administrators

#### Setting Up Customer Access

1. **Create/Link Customer**
   - Ensure customer has a client account in Perfex
   - Set up login credentials for the customer

2. **Create Bookings**
   - When creating bookings, select the correct customer
   - Customer will immediately see their bookings in the portal

3. **Customer Notification**
   - Inform customers about the portal
   - Provide login URL and credentials
   - Share the Customer Portal Guide

### Security Features

- **Data Isolation**: Customers can only see their own data
- **Authentication Required**: All pages require login
- **Secure Access**: Customer ID validation on all queries
- **Session Management**: Automatic timeout protection

### What Customers Can Do

✅ View their bookings  
✅ Check plot details  
✅ Monitor EMI schedule  
✅ View payment history  
✅ Track payment progress

### What Customers Cannot Do

❌ Create new bookings  
❌ Edit booking details  
❌ View other customers' data  
❌ Make online payments (view only)  
❌ Access admin functions

For detailed customer portal documentation, see [CUSTOMER_PORTAL_GUIDE.md](CUSTOMER_PORTAL_GUIDE.md)

---

## Troubleshooting

### Module Not Appearing After Installation

**Solution:**
1. Clear browser cache
2. Clear Perfex CRM cache: Navigate to Setup → Modules → Clear Cache
3. Check file permissions: `chmod -R 755 modules/real_estate_crm`
4. Verify the module is activated in Setup → Modules

### Database Tables Not Created

**Solution:**
1. Deactivate and reactivate the module
2. Check MySQL user has CREATE TABLE permissions
3. Check Perfex error logs at `application/logs/`
4. Manually run the SQL from `real_estate_crm/install.php`

### Permissions Issues

**Solution:**
1. Navigate to Setup → Roles
2. Ensure the user's role has Real Estate CRM permissions
3. Logout and login again to refresh permissions

### Menu Not Showing

**Solution:**
1. Ensure you have "View" permission for Real Estate CRM
2. Clear browser cache
3. Check if module is activated
4. Try logging out and logging back in

### Data Not Saving

**Solution:**
1. Check browser console for JavaScript errors
2. Verify all required fields are filled
3. Check PHP error logs
4. Ensure MySQL user has INSERT/UPDATE permissions

---

## Advanced Configuration

### Customizing Language Strings

Edit the file: `real_estate_crm/language/english/real_estate_crm_lang.php`

Add or modify language strings:
```php
$lang['your_custom_key'] = 'Your Custom Text';
```

### Adding Custom Fields

1. Modify database schema in `install.php`
2. Update corresponding views in `views/admin/`
3. Update model methods in `models/Real_estate_crm_model.php`
4. Update controller to handle new fields

### Customizing Styles

Edit the file: `real_estate_crm/assets/css/real_estate_crm.css`

Add your custom CSS:
```css
.your-custom-class {
    /* Your styles */
}
```

---

## Best Practices

### Project Setup
- Create projects before adding plots
- Use consistent naming conventions for plots (e.g., "A-101", "A-102")
- Keep project information up-to-date

### Booking Management
- Always verify plot availability before creating bookings
- Record initial payments when creating bookings
- Generate EMI schedules immediately after booking confirmation

### Payment Tracking
- Record payments on the same day they're received
- Always enter transaction reference numbers
- Regularly review pending payments

### Agent Management
- Set commission rates when adding agents
- Link agents to staff members for better integration
- Review agent performance regularly

---

## Support

For issues or questions:
- Check this documentation first
- Review the main README.md
- Open an issue on GitHub
- Contact: support@realestate-crm.com

---

## Updates and Maintenance

### Checking for Updates
- Visit the GitHub repository regularly
- Subscribe to release notifications
- Review changelog for new features

### Backup Before Updates
Always backup:
1. Database (`tblreal_estate_*` tables)
2. Module files (`modules/real_estate_crm/`)

### Updating the Module
1. Backup current installation
2. Download new version
3. Replace files in `modules/real_estate_crm/`
4. Deactivate and reactivate the module
5. Test all functionality

---

**Document Version**: 1.0.0  
**Last Updated**: 2026-02-01  
**Module Version**: 1.0.0
