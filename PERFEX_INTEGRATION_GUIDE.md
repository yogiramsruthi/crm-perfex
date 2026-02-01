# Perfex CRM Integration Guide - Real Estate CRM

## Overview

The Real Estate CRM module is fully integrated with Perfex CRM's native features including the invoice module, customer management, and login system. This guide explains how to use these integrations.

## Features Integration

### 1. Customer Integration ✅

**Perfex Customers Used Throughout:**
- All bookings use Perfex's native customer/client system
- Customer data comes from `tblclients` and `tblcontacts` tables
- No duplicate customer data - single source of truth
- Customer portal uses Perfex's authentication system

**Benefits:**
- Access to full customer profiles
- Email and communication history
- Contact management
- Existing customer relationships maintained

**Usage:**
1. Create customers in Perfex CRM (Clients module)
2. When creating bookings, select from existing Perfex customers
3. Customer dropdown includes search functionality
4. All customer data automatically synced

### 2. Invoice Module Integration ✅

**Automatic Invoice Generation:**
The module can generate Perfex invoices for:
- Plot bookings (one-time payment or down payment)
- EMI installment payments
- Automatic linking between bookings/EMI and invoices

**How It Works:**

#### Booking Invoices
1. Create a booking in Real Estate CRM
2. Click "Generate Invoice" button in bookings list
3. System creates Perfex invoice with:
   - Customer details from booking
   - Plot and project information
   - Total booking amount
   - Due date (30 days default)
   - Detailed description

4. Invoice is linked to booking record
5. Button changes to "View Invoice"

#### EMI Invoices
1. Generate EMI schedule for a booking
2. Click "Generate Invoice" for each EMI
3. System creates Perfex invoice with:
   - EMI installment details
   - Due date from EMI schedule
   - EMI number and booking reference
   - Customer information

#### Payment Synchronization
When an invoice is paid in Perfex:
- Booking `paid_amount` automatically updated
- EMI status changed to "paid"
- Booking balance calculated
- Booking status updated to "confirmed" when fully paid
- Transaction recorded in accounts

**Invoice Features:**
- Standard Perfex invoice format
- Email to customers
- PDF generation
- Payment gateway integration (via Perfex)
- Payment reminders
- Overdue tracking

### 3. Enhanced Project Details ✅

**New Project Fields:**
- Project Type (Residential/Commercial/Mixed/Industrial)
- Developer Name
- Approval/Registration Number
- Total Area (acres or sq ft)
- Amenities (textarea for detailed list)
- Payment Terms (custom terms for project)
- Bank Loan Available (checkbox)
- Possession Date
- Legal Status (Approved/Pending/Registered)
- Contact Person
- Contact Phone
- Contact Email

**Form Sections:**
1. **Basic Information** - Core project details
2. **Additional Details** - Amenities, terms, specifications
3. **Contact Information** - Project contact details

### 4. Customer Portal ✅

**Integrated with Perfex Login:**
- Uses Perfex's client authentication
- No separate login required
- Session management via Perfex
- Secure access control

**Portal Features:**
- View all bookings
- Track payment progress
- See EMI schedules
- Access payment history
- View assigned plots
- Access from any device

## Usage Guide

### Creating a Booking with Invoice

1. **Create Customer in Perfex**
   ```
   Navigate to: Clients → New Client
   Fill in customer details
   Save client
   ```

2. **Create Booking**
   ```
   Real Estate CRM → Bookings → Add Booking
   Select Customer (from Perfex dropdown)
   Select Plot
   Enter amounts
   Save Booking
   ```

3. **Generate Invoice**
   ```
   In bookings list, find the booking
   Click "Generate Invoice" button
   System redirects to Perfex invoice
   Invoice is automatically linked
   ```

4. **Customer Payment**
   ```
   Customer receives invoice email
   Pays via Perfex payment gateway
   System auto-updates booking status
   ```

### Creating EMI Schedule with Invoices

1. **Generate EMI Schedule**
   ```
   Real Estate CRM → EMI → Generate Schedule
   Select booking
   Enter number of EMIs
   Set start date
   Generate
   ```

2. **Create EMI Invoices**
   ```
   In EMI list, for each EMI:
   Click "Generate Invoice"
   Invoice created with due date
   EMI linked to invoice
   ```

3. **Payment Tracking**
   ```
   When customer pays EMI invoice:
   EMI status → "paid"
   Booking paid_amount → updated
   Transaction → recorded
   ```

### Using Enhanced Project Fields

1. **Create Comprehensive Project**
   ```
   Real Estate CRM → Projects → Add Project
   
   Basic Information:
   - Name, Type, Location, Area, Total Plots
   
   Additional Details:
   - Amenities: Swimming Pool, Gym, 24/7 Security
   - Payment Terms: 20% booking, 30% construction, 50% possession
   - Bank Loan: Check if available
   - Possession Date: Select date
   - Legal Status: Approved/Pending/Registered
   
   Contact Information:
   - Contact Person: Project Manager name
   - Phone & Email
   ```

2. **Benefits:**
   - Complete project information for customers
   - Better decision making
   - Professional documentation
   - Detailed records for legal compliance

## Technical Details

### Database Schema Changes

**Bookings Table:**
```sql
ALTER TABLE tblreal_estate_bookings 
ADD COLUMN invoice_id INT UNSIGNED NULL;
```

**EMI Table:**
```sql
ALTER TABLE tblreal_estate_emi 
ADD COLUMN invoice_id INT UNSIGNED NULL;
```

**Projects Table:**
```sql
ALTER TABLE tblreal_estate_projects
ADD COLUMN project_type VARCHAR(50),
ADD COLUMN developer_name VARCHAR(255),
ADD COLUMN approval_number VARCHAR(100),
... (12 new fields total)
```

### Hooks Registered

```php
hooks_add_action('after_invoice_updated', 'real_estate_crm_invoice_updated');
hooks_add_action('after_invoice_added', 'real_estate_crm_invoice_added');
```

These hooks ensure automatic synchronization when invoices are paid.

### API Methods

**Model Methods:**
- `generate_booking_invoice($booking_id)` - Create invoice for booking
- `generate_emi_invoice($emi_id)` - Create invoice for EMI
- `sync_invoice_payment($invoice_id)` - Sync payment from invoice
- `get_perfex_customers()` - Get Perfex customer list

**Controller Methods:**
- `generate_booking_invoice($booking_id)` - Generate booking invoice endpoint
- `generate_emi_invoice($emi_id)` - Generate EMI invoice endpoint

## Migration for Existing Installations

If you already have Real Estate CRM installed:

1. **Run Migration:**
   ```php
   // File: real_estate_crm/migrations/migration_v1_0_2.php
   // Auto-runs on module update
   ```

2. **Verify Changes:**
   ```
   Check database tables for new columns
   Test invoice generation
   Verify customer dropdown works
   ```

3. **Generate Invoices for Existing Bookings:**
   ```
   Go through existing bookings
   Click "Generate Invoice" for each
   Link bookings to invoices
   ```

## Benefits Summary

### For Administrators:
✅ Single customer database  
✅ Automated invoice generation  
✅ Payment tracking automation  
✅ Professional invoices  
✅ Email integration  
✅ Payment gateway support  
✅ Comprehensive project data  

### For Customers:
✅ Familiar Perfex portal  
✅ Professional invoices  
✅ Multiple payment options  
✅ Email notifications  
✅ Payment history tracking  
✅ Detailed project information  

### For Business:
✅ Reduced data entry  
✅ Automatic synchronization  
✅ Better cash flow tracking  
✅ Professional presentation  
✅ Audit trail  
✅ Compliance ready  

## Troubleshooting

### Invoice Not Generating
**Problem:** Click generate but no invoice created  
**Solution:**
- Check Perfex invoices module is active
- Verify customer has valid userid
- Check plot details are complete
- View error logs in Perfex

### Payment Not Syncing
**Problem:** Paid invoice but booking not updated  
**Solution:**
- Check hooks are registered in config.php
- Verify invoice_id is linked to booking
- Check invoice status is "paid" (status 2)
- Manually trigger sync if needed

### Customer Not in Dropdown
**Problem:** Customer created but not appearing  
**Solution:**
- Customer must have userid (client ID)
- Refresh page after creating customer
- Check customer is active in Perfex
- Verify clients_model is loading

## Best Practices

1. **Always Use Perfex Customers**
   - Don't create duplicate customer records
   - Use Perfex client management
   - Maintain single source of truth

2. **Generate Invoices Early**
   - Create invoices when booking confirmed
   - Generate EMI invoices in advance
   - Send reminders before due dates

3. **Monitor Payment Status**
   - Check dashboard regularly
   - Review unpaid invoices
   - Follow up on overdue payments

4. **Keep Projects Updated**
   - Add all project details
   - Update amenities and features
   - Keep contact information current
   - Update legal status as it changes

5. **Use Customer Portal**
   - Share portal link with customers
   - Encourage self-service
   - Reduce support inquiries
   - Improve customer satisfaction

## Support

For technical issues:
- Check Perfex CRM compatibility (v2.9.0+)
- Review module logs
- Contact support team
- Check documentation updates

---

**Version**: 1.0.2  
**Last Updated**: 2026-02-01  
**Integration Status**: ✅ Complete
