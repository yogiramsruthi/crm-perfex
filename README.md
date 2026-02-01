# crm-perfex
Real Estate Plots Management

# Real Estate / Plot Sales Management Module for Perfex CRM

A comprehensive real estate management module for Perfex CRM that provides complete functionality for managing real estate projects, plots, customer bookings, transactions, agent tracking, and customer portal.

## Key Features

### Phase 1: Core Plot + Project + Booking System
#### 1. Customer Management
- Integrated with Perfex CRM's existing customer/client system
- Track customer bookings and transactions
- View customer history and payment records
- Customer portal access for self-service

#### 2. Real Estate Project Management
- Create and manage multiple real estate projects
- Track project details: name, location, type, dates
- Monitor total and available plots per project
- Set project status (draft, active, archived)
- Advanced project tracking with ownership and patta details

#### 3. Plots Management
- Add plots to projects with detailed information
- Track plot specifications: number, size, type, dimensions, facing
- Set plot prices and price per sqft
- Manage plot status (available, booked, sold, reserved)
- Auto-update project statistics when plots are added/removed
- Bulk plot creation and management
- Plot price history tracking
- Plot waiting list management

#### 4. Plot Booking System
- Book plots for customers
- Track booking dates and amounts
- Manage payment plans and installments
- Calculate and track paid amounts and balances
- Assign bookings to staff members and agents
- Set booking status (pending, confirmed, cancelled, completed)
- Auto-update plot status when booked

#### 4. Emi Management
- Create new emi
- Track emi for customers
- Remaining emi

#### 5. Accounts Management System
- Record transactions for bookings
- Support multiple payment modes (cash, cheque, bank transfer, online)
- Track payment dates and reference numbers
- Automatic balance calculations
- Transaction types: payments and refunds

#### 6. Team Management System
- Assign staff members to projects
- Define roles (manager, sales executive, supervisor)
- Track assignment dates and status
- View team assignments per project
- Manage active/inactive assignments

### Phase 2: Agent Creation & Tracking ⭐ NEW
#### 7. Agent Management System
- Create and manage independent sales agents
- Track agent details: contact info, license, commission rates
- Agent types: Independent, Company, Partner
- Bank account and payment details management
- Agent performance tracking and statistics

#### 8. Agent Performance & KPIs
- Real-time agent performance dashboard
- Track total bookings, sales, and commissions per agent
- Agent conversion rate tracking
- Top performing agents leaderboard
- Agent assignment to bookings and projects
- Commission calculation (percentage or fixed rate)

### Phase 3: Customer Portal Booking ⭐ NEW
#### 9. Customer Self-Service Portal
- Browse available plots with advanced filtering
- View plot details with project information
- Submit booking requests online
- Booking approval workflow
- Customer booking history and status tracking
- Payment history and balance viewing
- Cancel pending booking requests

#### 10. Portal Features
- Filter plots by project, type, and price range
- Responsive design for mobile access
- Real-time plot availability
- Email notifications for booking updates
- Secure customer authentication

### Phase 4: Reports, Dashboard & KPIs ⭐ ENHANCED
#### 11. Enhanced Dashboard
- Primary KPI cards: Projects, Plots, Bookings, Revenue
- Agent performance KPI cards
- Top performing agents showcase
- Portal booking statistics
- Real-time metrics and trends
- Visual charts and graphs

#### 12. Agent Portal System ⭐ NEW
**Separate Login & Authentication:**
- Dedicated agent login page with credentials (email + password)
- Secure password storage using app_hasher
- Session management for agent access
- Remember me functionality
- Activity logging for agent logins

**Agent Dashboard:**
- Personal performance metrics (bookings, sales, commissions)
- KPI cards with key statistics
- Recent bookings assigned to agent
- Emi summary (customer paid or not for this month for followups)
- Monthly performance trends (6-month chart)
- Commission summary (earned, paid, pending)
- Target vs achievement tracking

**Agent Features:**
- My Bookings: View all assigned bookings with filters
- My Commissions: Track commission earnings with date filters
- Available Plots: Browse available plots by project
- My Profile: Update personal details and change password
- Performance reports and analytics
- Download commission statements
- View customer information

**Agent Profile Management:**
- Update personal information (phone, address, etc.)
- Change password securely
- View commission settings (read-only)
- View bank account details
- Last login tracking

## Installation

1. Copy the `realestate` folder to your Perfex CRM `modules` directory
2. Navigate to Setup > Modules in your Perfex CRM admin panel
3. Find "Real Estate Management" and click "Install"
4. Click "Activate" to enable the module

## Database Tables

The module creates the following tables:

**Core Tables:**
- `tblrealestate_projects` - Real estate projects
- `tblrealestate_plots` - Plots within projects
- `tblrealestate_plot_price_history` - Price change history
- `tblrealestate_plot_waiting_list` - Customer waiting lists
- `tblrealestate_emi` - Customers emi
- - `tblrealestate_emi_payments` - Customer emi payments
- `tblrealestate_bookings` - Customer bookings
- `tblrealestate_transactions` - Payment transactions
- `tblrealestate_team_assignments` - Team member assignments

**Extended Tables:**
- `tblrealestate_owners` - Land owners information
- `tblrealestate_patta_details` - Property deed details
- `tblrealestate_documents` - Project documents
- `tblrealestate_settings` - Module settings

**Agent Tables (Phase 2):**
- `tblrealestate_agents` - Sales agents (with password field for portal access)
- `tblrealestate_agent_assignments` - Agent-booking assignments

## Permissions

The module includes the following permission levels:
- View - View real estate data
- Create - Add new projects, plots, bookings, agents, etc.
- Edit - Modify existing records
- Delete - Remove records

Configure permissions in Setup > Staff > Roles.

## Portal Access

**Customer Portal:**
Customers can access the portal at:
```
https://your-perfex-url.com/clients/realestate/portal
```

**Agent Portal:**
Agents can access their dedicated portal at:
```
https://your-perfex-url.com/realestate/agent_portal
```

Agents login with:
- Email address (set in admin panel)
- Password (set when creating agent)

## Menu Structure

After activation, a new "Real Estate" menu will appear in the admin sidebar with:
- Dashboard - Overview with statistics and KPIs
- Projects - Manage real estate projects
- Plots - Manage plots
- Bookings - Manage customer bookings
- Accounts - View and manage transactions
- Agents - Manage sales agents (NEW)
- Team - Manage team assignments
- Settings - Module configuration

## Customer Portal Access

Customers can access the portal at:
```
https://your-perfex-url.com/clients/realestate/portal
```

## Usage

### Creating a Project
1. Go to Real Estate > Projects
2. Click "Add Project"
3. Fill in project details (project name, project location (choose in gmap - save cordinates lat, lang), project type (plots, farmland), Total Acrea, Total Sqft, Price Per Sqft, approval details (DTCP, RERA, Panjayath Approval-78GO, BDO Proceedings), Upload Support Documents, dates)
4. Save the project

### Adding Plots
1. Go to Real Estate > Plots
2. Click "Add Plot"
3. Select a project and fill in plot details
4. Total Sqft (1200 Sqft)
5. Facing (East, West, South, North)
6. Set the plot price and status - (Active, Hold, Booked, Not Available)
7. Save the plot

### Booking a Plot
1. Go to Real Estate > Bookings
2. Click "Add Booking"
3. Select a Project (only available project shown)
4. Select a plot (only available plots shown)
5. Select a customer
6. Enter booking amount, total amount-auto calculate from Plots Details total sqft X Plot Price, and paid amount, balance amount, and select emi option
7. Emi (Total Amount For EMI, Tenur Month, Intrest)
8. Assign to a staff member if needed
9. Save the booking (plot status auto-updates to "booked")

### Recording Transactions
1. Go to Real Estate > Accounts
2. Click "Add Transaction"
3. Select a booking
4. Enter transaction details (amount, date, payment mode)
5. Add reference number if applicable
6. Save the transaction (booking balance auto-updates)

### Managing Team
1. Go to Real Estate > Team
2. Click "Assign Team Member"
3. Select a staff member
4. Optionally select a project
5. Set role and assignment date
6. Save the assignment

## Technical Details

### Module Structure
```
modules/realestate/
├── controllers/
│   ├── Realestate.php (Dashboard)
│   ├── Projects.php
│   ├── Plots.php
│   ├── Bookings.php
│   ├── Emi.php
│   ├── Accounts.php
│   └── Team.php
├── models/
│   ├── Projects_model.php
│   ├── Plots_model.php
│   ├── emi_model.php
│   ├── Bookings_model.php
│   ├── Transactions_model.php
│   └── Team_model.php
├── views/
│   ├── dashboard.php
│   ├── projects/
│   ├── plots/
│   ├── emi/
│   ├── bookings/
│   ├── accounts/
│   └── team/
├── language/english/
│   └── realestate_lang.php
├── assets/
│   └── css/realestate.css
├── install.php
└── realestate.php (main module file)
```

### Key Features
- Automatic balance calculation
- Plot count updates
- Status management
- Emi management
- Activity logging
- Permission checks
- Data validation

## Version

Version 1.0.0

## Author

Real Estate Module

## License

This module is provided as-is for Perfex CRM installations.

## Support

For issues or questions, please contact the module administrator.
