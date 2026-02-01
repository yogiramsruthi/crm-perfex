# Customer Portal Guide - Real Estate CRM

## Overview

The Real Estate CRM Customer Portal allows your clients to access their booking information, track payments, view EMI schedules, and monitor their plot assignments - all from a secure, personalized portal.

## Features

### 1. Customer Dashboard

The dashboard provides an at-a-glance view of:
- **Total Bookings**: Number of properties booked
- **Total Amount**: Total value of all bookings
- **Paid Amount**: Total payments made
- **Balance Amount**: Remaining balance across all bookings
- **My Bookings**: Overview table of all bookings
- **Upcoming EMI**: Next 5 EMI payments due
- **Recent Transactions**: Last 5 payment transactions
- **Quick Links**: Direct access to all portal sections

### 2. My Bookings

View all your property bookings with:
- Project name and location
- Plot number
- Booking date
- Total, paid, and balance amounts
- Payment type (EMI or Full)
- Booking status (Pending, Confirmed, Cancelled)
- Action button to view full details

### 3. Booking Details

Detailed view of a specific booking showing:

**Booking Information:**
- Project name
- Plot number
- Booking date
- Payment type
- Booking status

**Payment Information:**
- Total amount
- Paid amount
- Balance amount
- Payment progress bar

**EMI Schedule:**
- All EMI installments for this booking
- EMI number and due dates
- Payment amounts and dates
- Payment modes and status
- Color-coded status (Paid, Pending, Overdue)

**Notes:**
- Any booking notes or special instructions

### 4. My Plots

View all plots assigned to you with:
- Plot number (prominent display)
- Project name
- Plot size and type
- Plot price
- Plot status badge
- Plot description

Displayed in an attractive card layout for easy scanning.

### 5. EMI Schedule

Comprehensive view of all EMI payments across all bookings:

**Statistics:**
- Total EMI count
- Paid EMI count
- Pending EMI count
- Overdue EMI count

**EMI List:**
- Plot number
- EMI number
- Due date
- EMI amount
- Paid amount
- Payment date
- Payment mode
- Status (Paid, Pending, Overdue)

### 6. Payment History

Complete transaction history showing:

**Summary:**
- Total payments made
- Total transaction count

**Transaction List:**
- Transaction ID
- Transaction date
- Transaction type
- Amount paid
- Payment mode
- Reference number
- Description

## Accessing the Portal

### For Customers

1. **Login to Client Portal**
   - Go to your Perfex CRM client portal URL
   - Enter your login credentials
   - Click "Login"

2. **Access Real Estate Portal**
   - Look for "Real Estate CRM" menu item in the sidebar
   - Click to expand and see all available sections
   - Click on any section to view your information

### Portal URLs

Once logged in, you can access:
- Dashboard: `/real_estate_crm/my_real_estate/dashboard`
- My Bookings: `/real_estate_crm/my_real_estate/bookings`
- My Plots: `/real_estate_crm/my_real_estate/plots`
- EMI Schedule: `/real_estate_crm/my_real_estate/emi_schedule`
- Payment History: `/real_estate_crm/my_real_estate/payment_history`

## Security Features

### Data Isolation
- Each customer can **only** view their own data
- Booking information is filtered by customer ID
- Attempting to access other customers' data returns 404

### Authentication
- All portal pages require customer login
- Unauthenticated users are redirected to login page
- Session timeout protection

### Authorization
- Security checks on every page load
- Customer ID validation on all data queries
- Prevents URL manipulation attacks

## For Administrators

### Enabling Customer Access

1. **Create Customer Account**
   - Navigate to Clients in admin panel
   - Create or select a client account
   - Ensure they have login credentials

2. **Create Bookings**
   - Create bookings and link them to customers
   - Set customer ID in booking form
   - Save the booking

3. **Customer Access**
   - Customer can immediately see their bookings in portal
   - No additional configuration needed

### What Customers Can See

Customers can view:
- ✅ Their own bookings
- ✅ Plots assigned to them
- ✅ EMI schedules for their bookings
- ✅ Transaction history for their payments
- ✅ Booking details and status

Customers **cannot**:
- ❌ View other customers' data
- ❌ Create new bookings
- ❌ Edit booking details
- ❌ Delete bookings
- ❌ Make online payments (view only)
- ❌ Access admin functions

## Navigation

### Main Menu
The portal adds a "Real Estate CRM" menu item with icon to the client area sidebar.

### Submenu Items
1. **Dashboard** - Overview and quick links
2. **My Bookings** - List of all bookings
3. **My Plots** - Assigned plots
4. **EMI Schedule** - Payment schedule
5. **Payment History** - Transaction history

## Responsive Design

The portal is fully responsive and works on:
- ✅ Desktop computers
- ✅ Tablets
- ✅ Mobile phones
- ✅ All modern browsers

## Empty States

When customers have no data, friendly messages are displayed:
- "No bookings found"
- "You don't have any plots assigned yet"
- "No EMI schedule available"
- "No payment history available"

## Status Color Coding

Visual indicators help customers quickly understand status:

**Booking Status:**
- 🟢 Green: Confirmed
- 🟡 Yellow: Pending
- 🔴 Red: Cancelled

**EMI Status:**
- 🟢 Green: Paid
- 🟡 Yellow: Pending
- 🔴 Red: Overdue

**Plot Status:**
- 🟢 Green: Sold (to you)
- 🔵 Blue: Booked (by you)

## Tips for Customers

1. **Check Dashboard Regularly**
   - Stay updated on upcoming payments
   - Monitor payment progress
   - View recent transactions

2. **Review EMI Schedule**
   - Know your payment due dates
   - Plan finances accordingly
   - Track payment history

3. **Verify Booking Details**
   - Check all booking information is correct
   - Review plot details
   - Note any special terms

4. **Keep Payment Records**
   - View payment history anytime
   - Check transaction references
   - Verify payment amounts

5. **Contact Support**
   - If you see discrepancies
   - For payment assistance
   - To update contact information

## Frequently Asked Questions

### Q: How do I access the customer portal?
**A:** Login to your client portal with your credentials, then look for "Real Estate CRM" in the sidebar menu.

### Q: Can I make online payments through the portal?
**A:** Currently, the portal is view-only. Contact your sales agent or admin to process payments.

### Q: Why can't I see my bookings?
**A:** Ensure your booking was created with your customer account linked. Contact support if the issue persists.

### Q: Can I view other family members' bookings?
**A:** No, for security reasons, each customer can only view their own bookings. Each family member needs their own login.

### Q: Is my data secure?
**A:** Yes, the portal uses industry-standard security measures including authentication, data isolation, and secure connections.

### Q: Can I download my payment history?
**A:** Currently, you can view all transactions online. Download/export features may be added in future versions.

### Q: What if I forgot my password?
**A:** Use the "Forgot Password" link on the login page to reset your password.

### Q: Is the portal mobile-friendly?
**A:** Yes! The portal works perfectly on all devices including smartphones and tablets.

## Support

For technical support or questions:
- Contact your real estate company's support team
- Email: support@yourdomain.com
- Phone: Your support number

---

**Version**: 1.0.1  
**Last Updated**: 2026-02-01  
**Portal Status**: ✅ Active and Ready
