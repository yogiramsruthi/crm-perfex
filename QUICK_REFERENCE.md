# Real Estate CRM - Quick Reference Guide

## Quick Links

### Main Modules
- **Dashboard**: View statistics and KPIs
- **Projects**: Manage real estate projects
- **Plots**: Manage property plots
- **Bookings**: Handle customer bookings
- **EMI**: Manage installment payments
- **Accounts**: View transactions and finances
- **Agents**: Manage sales agents
- **Team**: Assign team members
- **Settings**: Configure module

## Common Tasks

### 1. Create a New Project
1. Go to Real Estate CRM → Projects
2. Click "Add Project"
3. Fill in: Name, Location, Total Plots, Dates
4. Save

### 2. Add Plots to Project
1. Go to Real Estate CRM → Plots
2. Click "Add Plot"
3. Select Project
4. Fill in: Plot Number, Size, Type, Price
5. Save

### 3. Create a Booking
1. Go to Real Estate CRM → Bookings
2. Click "Add Booking"
3. Select: Plot, Customer, Agent (optional)
4. Enter: Total Amount, Paid Amount
5. Balance is auto-calculated
6. Save

### 4. Generate EMI Schedule
1. Go to Real Estate CRM → EMI
2. Find booking
3. Click "Generate EMI Schedule"
4. Enter: Number of EMIs, Start Date
5. Generate

### 5. Record Payment
1. Go to Real Estate CRM → EMI
2. Find EMI to mark as paid
3. Click "Record Payment"
4. Enter payment details
5. Save

### 6. Add Sales Agent
1. Go to Real Estate CRM → Agents
2. Click "Add Agent"
3. Fill in agent details
4. Set commission rate
5. Save

### 7. Assign Team Member
1. Go to Real Estate CRM → Team
2. Click "Add Team Member"
3. Select staff and project
4. Define role
5. Save

## Key Features

### Dashboard Statistics
- **Total Projects**: All real estate projects
- **Available Plots**: Plots ready for booking
- **Total Bookings**: Customer bookings
- **Total Revenue**: Sum of all payments

### Automatic Calculations
- Balance amount = Total - Paid
- EMI amount = Balance / Number of EMIs
- Booking balance updates on payment
- Plot status auto-updates on booking

### Status Values

**Project Status:**
- Active
- Inactive

**Plot Status:**
- Available (green)
- Booked (yellow)
- Sold (red)

**Booking Status:**
- Pending (yellow)
- Confirmed (green)
- Cancelled (red)

**EMI Status:**
- Pending (yellow)
- Paid (green)
- Overdue (red)

**Agent/Team Status:**
- Active
- Inactive

## Database Tables

| Table | Purpose |
|-------|---------|
| `tblreal_estate_projects` | Real estate projects |
| `tblreal_estate_plots` | Property plots |
| `tblreal_estate_bookings` | Customer bookings |
| `tblreal_estate_emi` | EMI schedules |
| `tblreal_estate_transactions` | Payment transactions |
| `tblreal_estate_agents` | Sales agents |
| `tblreal_estate_team` | Team assignments |
| `tblreal_estate_settings` | Module settings |

## Permissions

Grant these permissions to staff roles:

- **View**: View all data
- **Create**: Add new records
- **Edit**: Modify existing records
- **Delete**: Remove records

## Tips & Best Practices

1. **Always create projects first** before adding plots
2. **Use consistent plot numbering** (e.g., A-101, A-102)
3. **Record payments immediately** when received
4. **Generate EMI schedules** right after booking confirmation
5. **Link agents to staff members** for better integration
6. **Review dashboard regularly** for business insights
7. **Keep settings updated** for accurate calculations
8. **Use notes fields** to add important details

## Keyboard Shortcuts

- **Tab**: Navigate between form fields
- **Enter**: Submit forms (in input fields)
- **Esc**: Close modals/dialogs

## Default Settings

- **EMI Interest Rate**: 10%
- **Booking Validity**: 30 days
- **Email Notifications**: Enabled
- **SMS Notifications**: Disabled

## Support

- **Documentation**: [README.md](real_estate_crm/README.md)
- **Installation Guide**: [INSTALLATION_GUIDE.md](INSTALLATION_GUIDE.md)
- **GitHub**: https://github.com/yogiramsruthi/crm-perfex
- **Email**: support@realestate-crm.com

---

**Version**: 1.0.0  
**Last Updated**: 2026-02-01
