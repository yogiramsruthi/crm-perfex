# Perfex Invoice Integration - Complete Guide

## Overview

The Real Estate CRM module is **fully integrated** with Perfex CRM's native invoice system. This integration provides a unified approach where **one booking = one invoice** covering all EMI installments.

---

## Key Features

### ✅ Unified Invoice System
- **One booking generates ONE invoice**
- Invoice covers the complete booking amount
- All EMI payments tracked against this single invoice
- No separate invoices per EMI

### ✅ Automatic Invoice Generation
- Auto-generate invoices when bookings are created
- Auto-generate invoices when EMI schedules are created
- Configurable via settings
- Manual generation also available

### ✅ Real-Time Payment Synchronization
- Invoice payments automatically update EMI status
- Booking balances updated in real-time
- Transaction records created automatically
- Complete audit trail maintained

---

## How It Works

### 1. Booking Invoice Creation

**When a booking is created:**
```
Booking Amount: ₹50,00,000
↓
System creates Perfex invoice
Invoice Amount: ₹50,00,000
Status: Unpaid
```

**Invoice Details Include:**
- Customer information (from Perfex clients)
- Plot number and project name
- Complete booking amount
- Note: "This invoice covers the complete booking amount including all EMI installments"

### 2. EMI Schedule Generation

**When EMI schedule is created:**
```
10 EMIs × ₹5,00,000 each
↓
If booking has no invoice:
  - Generate booking invoice
  - Link all EMIs to this invoice
If booking already has invoice:
  - Link all EMIs to existing invoice
```

**Result:**
- All 10 EMIs linked to same booking invoice
- Single invoice for entire booking
- Clear payment tracking

### 3. Payment Processing

**When customer pays an EMI:**
```
Payment received: ₹5,00,000
↓
Perfex invoice updated
Invoice paid: ₹5,00,000
Balance: ₹45,00,000
↓
EMI #1 status: PAID
Booking paid amount: +₹5,00,000
Transaction recorded
```

**Automatic Updates:**
- ✅ Invoice payment recorded in Perfex
- ✅ EMI status changed to "paid"
- ✅ Booking balance reduced
- ✅ Payment date recorded
- ✅ Transaction log created

### 4. Complete Payment Cycle

```
Initial:
- Booking: ₹50,00,000 (unpaid)
- Invoice: ₹50,00,000 (unpaid)
- 10 EMIs: pending

After EMI #1 paid:
- Booking: ₹5,00,000 paid, ₹45,00,000 balance
- Invoice: ₹5,00,000 paid, ₹45,00,000 balance
- EMI #1: paid, EMI #2-10: pending

After all EMIs paid:
- Booking: ₹50,00,000 paid, ₹0 balance
- Invoice: FULLY PAID
- All 10 EMIs: PAID
- Booking status: CONFIRMED
```

---

## Configuration

### Enable Auto-Generation

**Steps:**
1. Navigate to: `Real Estate CRM → Settings`
2. Check: `☑ Auto-generate Invoices`
3. Click: `Save`

**What This Does:**
- Automatically creates invoice when booking is added
- Automatically creates invoice when EMI schedule is generated
- Links all EMIs to the booking invoice

### Manual Invoice Generation

**For Bookings:**
1. Go to: `Real Estate CRM → Bookings`
2. Find booking without invoice
3. Click: `Generate Invoice` button
4. Invoice created and linked

**For EMIs:**
1. Go to: `Real Estate CRM → EMI`
2. Find EMI without invoice
3. Click: `Generate Invoice` button
4. Booking invoice created (if doesn't exist)
5. EMI linked to booking invoice

---

## Features in Detail

### Invoice Management

**View Invoice from Booking:**
```
Bookings List → Invoice Column → "View Invoice" button
↓
Opens Perfex invoice in new tab
```

**View Invoice from EMI:**
```
EMI List → Invoice Column → "View Invoice" button
↓
Badge shows: "Booking Invoice (Shared)"
↓
Opens same booking invoice
```

### Payment Synchronization

**Webhook Integration:**
- Hooks into Perfex invoice update events
- Automatically syncs payment status
- Updates EMI and booking records
- No manual intervention needed

**Payment Tracking:**
```php
Invoice Payment → 
  Check if booking invoice →
    Update booking paid_amount →
    Update booking status →
  Check if EMI linked →
    Update EMI paid_amount →
    Update EMI status → "paid" →
    Update EMI payment_date →
    Record transaction →
    Update booking balance
```

### Transaction Recording

**Automatic Transactions:**
- Created when invoice is paid
- Created when EMI is marked as paid
- Includes payment mode, date, amount
- Links to booking and invoice

**Transaction Details:**
- Type: "invoice_payment" or "emi_payment"
- Amount: Payment amount
- Date: Payment date
- Reference: Invoice number
- Description: Auto-generated

---

## User Interface

### Bookings View

**Invoice Column:**
- Shows invoice status
- "View Invoice" button (if invoice exists)
- "Generate Invoice" button (if no invoice)
- Direct link to Perfex invoice

**Features:**
- Color-coded status badges
- Tooltips for clarity
- One-click access
- Permission-based visibility

### EMI View

**Invoice Column:**
- "View Invoice" button (booking invoice)
- Badge: "Booking Invoice (Shared)"
- "Generate Invoice" button (creates booking invoice)
- Help text explaining shared invoice

**Additional:**
- "Mark as Paid" button
- EMI status badges
- Overdue indicators
- Payment tracking

### Settings View

**Invoice Settings:**
- Auto-generate checkbox
- Help tooltip explaining feature
- Easy on/off toggle
- Saves with other settings

---

## API Methods

### Model Methods

**`generate_booking_invoice($booking_id)`**
- Creates single Perfex invoice for booking
- Amount = total booking amount
- Links all existing EMIs to invoice
- Returns: invoice_id

**`generate_emi_schedule($booking_id, $data)`**
- Creates EMI schedule
- Auto-generates invoice (if enabled)
- Links all EMIs to invoice
- Returns: success/failure

**`generate_emi_invoice($emi_id)`**
- DEPRECATED: Now creates booking invoice
- Ensures booking has invoice
- Links EMI to invoice
- Backward compatible

**`sync_invoice_payment($invoice_id)`**
- Called by Perfex hooks
- Updates EMI status
- Updates booking balance
- Records transactions

**`mark_emi_paid($emi_id)`**
- Manually mark EMI as paid
- Updates invoice
- Records transaction
- Updates booking

### Controller Methods

**`generate_booking_invoice($booking_id)`**
- Permission check
- Calls model method
- Redirects to invoice
- Shows success message

**`generate_emi_invoice($emi_id)`**
- Permission check
- Calls model method
- Message: "One invoice covers all EMIs"
- Redirects to invoice

**`mark_emi_paid($emi_id)`**
- Permission check
- Marks EMI as paid
- Updates related records
- Shows success message

---

## Database Schema

### Bookings Table
```sql
invoice_id INT(11) NULL
- Links to Perfex tblins
- One invoice per booking
- Nullable (for old bookings)
```

### EMI Table
```sql
invoice_id INT(11) NULL
- Links to Perfex tblinvoices
- Same as booking's invoice_id
- All EMIs share booking invoice
```

### Relationships
```
tblreal_estate_bookings.invoice_id → tblinvoices.id
tblreal_estate_emi.invoice_id → tblinvoices.id
All EMIs in a booking → Same invoice_id
```

---

## Workflow Examples

### Example 1: New Booking with Auto-Generate

**Step 1: Create Booking**
```
Admin creates booking:
- Customer: John Doe
- Plot: A-101
- Amount: ₹50,00,000
- Auto-generate: ON
```

**Step 2: System Actions**
```
✅ Booking created (ID: 1)
✅ Invoice generated automatically
✅ Invoice amount: ₹50,00,000
✅ Customer: John Doe (from Perfex)
✅ Status: Unpaid
```

**Step 3: Generate EMI Schedule**
```
Admin generates 12 EMIs
Each EMI: ₹4,16,667
Start date: 2024-02-01
```

**Step 4: System Actions**
```
✅ 12 EMI records created
✅ All linked to invoice #123
✅ Due dates: Monthly
✅ Status: Pending
```

**Result:**
- 1 Booking
- 1 Invoice (₹50,00,000)
- 12 EMIs (all linked to same invoice)

### Example 2: EMI Payment

**Step 1: Customer Makes Payment**
```
Customer pays ₹4,16,667 via Perfex
Payment method: Bank Transfer
Date: 2024-02-01
```

**Step 2: Perfex Records Payment**
```
✅ Invoice payment recorded
✅ Paid: ₹4,16,667
✅ Balance: ₹45,83,333
✅ Webhook triggered
```

**Step 3: Sync to Real Estate CRM**
```
✅ EMI #1 status → "paid"
✅ EMI #1 payment_date → "2024-02-01"
✅ Booking paid_amount → ₹4,16,667
✅ Booking balance → ₹45,83,333
✅ Transaction recorded
```

**Result:**
- Invoice: Partially paid
- EMI #1: PAID
- EMI #2-12: PENDING
- Booking: ₹4,16,667 paid

### Example 3: Complete Payment

**After 12 months:**
```
All 12 EMIs paid
Total paid: ₹50,00,000
```

**System State:**
```
✅ Invoice: FULLY PAID
✅ All 12 EMIs: PAID
✅ Booking paid_amount: ₹50,00,000
✅ Booking balance: ₹0
✅ Booking status: CONFIRMED
✅ Plot status: SOLD
```

---

## Integration Benefits

### For Administrators

✅ **Single Invoice Management**
- One invoice per booking
- Easy to track
- Professional presentation

✅ **Automated Workflow**
- No manual invoice creation
- Automatic status updates
- Time-saving automation

✅ **Complete Tracking**
- Real-time payment status
- Audit trail maintained
- Reports ready

### For Customers

✅ **Simplified Billing**
- One invoice to manage
- Clear payment schedule
- Professional invoicing

✅ **Multiple Payment Options**
- Pay via Perfex
- Online payment gateways
- Bank transfer options

✅ **Easy Access**
- View invoice anytime
- Download PDF
- Email delivery

### For Business

✅ **Professional Image**
- Standard invoicing
- Branded invoices
- Legal compliance

✅ **Better Cash Flow**
- Clear payment tracking
- Automated reminders
- Faster collections

✅ **Data Integration**
- Single source of truth
- No duplicate data
- Consistent records

---

## Troubleshooting

### Invoice Not Generated

**Problem:** Booking created but no invoice

**Solution:**
1. Check if auto-generate is enabled in settings
2. Manually click "Generate Invoice" button
3. Verify customer exists in Perfex
4. Check permissions

### EMI Not Linked to Invoice

**Problem:** EMI shows no invoice

**Solution:**
1. Check if booking has invoice
2. If not, generate booking invoice
3. EMI will automatically link
4. Or click "Generate Invoice" on EMI

### Payment Not Syncing

**Problem:** Invoice paid but EMI still pending

**Solution:**
1. Verify webhook is configured
2. Check Perfex invoice status
3. Manually mark EMI as paid
4. Contact support if issue persists

### Multiple Invoices Created

**Problem:** Booking has multiple invoices

**Solution:**
- This shouldn't happen with new system
- Old bookings may have multiple invoices
- Keep using existing invoices
- New bookings will have single invoice

---

## Migration Guide

### For Existing Installations

**Bookings without Invoices:**
```
1. Go to each booking
2. Click "Generate Invoice"
3. Invoice created
4. All EMIs linked automatically
```

**EMIs with Individual Invoices:**
```
- Continue using existing invoices
- New EMIs will use booking invoice
- System is backward compatible
```

**Best Practice:**
```
1. Enable auto-generate in settings
2. Generate invoices for all active bookings
3. New bookings will auto-generate
4. Old invoices continue to work
```

---

## Advanced Features

### Bulk Invoice Generation

**Coming Soon:**
- Generate invoices for multiple bookings
- Select multiple records
- One-click generation
- Progress tracking

### Payment Gateway Integration

**Compatible With:**
- Cashfree
- Razorpay
- Stripe
- PayPal

**How It Works:**
- Customer selects gateway
- Payment processed
- Invoice updated automatically
- EMI marked as paid

### Email Notifications

**Automatic Emails:**
- Invoice generation notification
- Payment received confirmation
- EMI due reminders
- Payment receipts

---

## Security & Compliance

### Permission Control

**Invoice Operations:**
- Create: `real_estate_crm.create`
- View: `real_estate_crm.view`
- Edit: `real_estate_crm.edit`
- Delete: Admin only

### Data Security

✅ SQL injection prevention
✅ XSS protection
✅ CSRF tokens
✅ Permission checks
✅ Input validation

### Audit Trail

**Tracked Actions:**
- Invoice generation
- Payment recording
- Status changes
- Amount updates

---

## Support & Documentation

### Additional Resources

- [Perfex CRM Documentation](https://docs.perfexcrm.com/)
- [Real Estate CRM Guide](./README.md)
- [Installation Guide](./INSTALLATION_GUIDE.md)
- [API Documentation](./API_DOCUMENTATION.md)

### Common Questions

**Q: Can I disable auto-generation?**
A: Yes, uncheck "Auto-generate Invoices" in settings.

**Q: Can I generate invoices for old bookings?**
A: Yes, use the "Generate Invoice" button on each booking.

**Q: What if booking has multiple invoices?**
A: Old system allowed this. New system uses one invoice per booking.

**Q: How do I track partial payments?**
A: Check the invoice in Perfex. It shows all partial payments.

**Q: Can customers pay EMIs separately?**
A: Yes, they can make partial payments against the invoice.

---

## Conclusion

The Perfex invoice integration provides a **professional, automated, and unified** approach to managing bookings and EMI payments. With **one booking = one invoice**, tracking is simplified and customer experience is enhanced.

**Key Takeaways:**
- ✅ Fully automated invoice generation
- ✅ One invoice per booking
- ✅ Real-time payment synchronization
- ✅ Complete audit trail
- ✅ Professional presentation
- ✅ Easy to use and manage

**Status:** Production Ready ✅
**Version:** 1.0.4
**Last Updated:** February 1, 2026
