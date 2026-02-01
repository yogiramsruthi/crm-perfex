# Changelog

All notable changes to the Real Estate CRM plugin will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.1] - 2026-02-01

### Added - Customer Portal

#### Customer Portal Module
- **Customer Dashboard** with comprehensive statistics
  - Total bookings, amounts, and balance display
  - Quick links to all portal sections
  - Recent bookings overview table
  - Upcoming EMI payments (next 5)
  - Recent transactions (last 5)

- **My Bookings Module**
  - View all customer bookings in table format
  - Booking details: project, plot, dates, amounts
  - Payment status and type display
  - Color-coded booking status
  - Link to detailed booking view

- **Booking Details Page**
  - Complete booking information panel
  - Payment information with progress bar
  - Full EMI schedule for the booking
  - Payment tracking with dates and modes
  - Booking notes display
  - Back navigation to bookings list

- **My Plots Module**
  - View all assigned plots in card layout
  - Plot details: size, type, price
  - Project information display
  - Plot status badges
  - Plot descriptions
  - Empty state messaging

- **EMI Schedule Module**
  - Statistics: total, paid, pending, overdue EMI
  - View all EMIs across all bookings
  - Sortable table with full details
  - Payment status tracking
  - Payment dates and modes
  - Due date display

- **Payment History Module**
  - Total payments made summary
  - Total transactions counter
  - Complete transaction history
  - Transaction dates and types
  - Payment modes and references
  - Transaction descriptions

#### Technical Implementation
- New client controller (My_real_estate.php)
- 6 client-facing views
- Client portal menu integration
- Security: data isolation per customer
- Authentication checks on all pages
- Helper methods for data aggregation
- Proper routing and URLs

#### Language Support
- Added 25+ client portal language strings
- All client-facing labels and messages
- Empty state messages

#### Security Features
- Customer authentication required
- Customer ID validation
- Data access restricted to own bookings
- 404 handling for unauthorized access

### Files Added
- `controllers/My_real_estate.php` - Client portal controller
- `views/client/dashboard.php` - Customer dashboard
- `views/client/bookings.php` - Bookings list
- `views/client/booking_details.php` - Detailed booking view
- `views/client/plots.php` - My plots view
- `views/client/emi_schedule.php` - EMI schedule
- `views/client/payment_history.php` - Payment history

### Modified
- `config.php` - Added client menu registration
- `language/english/real_estate_crm_lang.php` - Added portal strings

---

## [1.0.0] - 2026-02-01

### Added - Initial Release

#### Core Modules
- **Dashboard Module** with real-time statistics and KPIs
  - Total projects, plots, bookings, and revenue tracking
  - Recent bookings overview
  - Upcoming EMI payments display
  - Project-wise statistics table
  - Visual stat cards with color coding

- **Projects Management Module**
  - Create, read, update, delete (CRUD) operations
  - Project details: name, location, description
  - Track total and available plots per project
  - Project timeline with start and end dates
  - Project status management (Active/Inactive)

- **Plots Management Module**
  - Full CRUD operations for plots
  - Link plots to projects
  - Plot specifications: number, size, type, price
  - Plot status tracking: Available, Booked, Sold
  - Automatic status updates based on bookings
  - Plot description and notes

- **Bookings Management Module**
  - Customer booking creation and management
  - Link bookings to plots and customers
  - Agent assignment to bookings
  - Payment tracking: total, paid, balance amounts
  - Automatic balance calculation
  - Payment type support: EMI or Full Payment
  - Booking status: Pending, Confirmed, Cancelled
  - Booking notes and details

- **EMI (Installment) Management Module**
  - Automatic EMI schedule generation
  - Configure number of installments
  - Monthly installment tracking
  - Individual EMI payment recording
  - Payment details: date, mode, transaction ID
  - EMI status: Pending, Paid, Overdue
  - Automatic booking balance updates on payment

- **Accounts & Transactions Module**
  - Complete transaction history
  - Transaction type tracking
  - Payment mode recording
  - Reference number tracking
  - Financial summary dashboard
  - Total revenue calculation
  - Pending payments tracking
  - Monthly revenue analysis

- **Agents Management Module (NEW)**
  - Sales agent creation and management
  - Agent details: name, email, phone, address
  - Link agents to Perfex staff members
  - Commission rate configuration
  - Track total sales per agent
  - Calculate total commission earned
  - Agent status management
  - Joined date tracking

- **Team Management Module**
  - Assign team members to projects
  - Link to Perfex staff members
  - Define team roles and responsibilities
  - Assignment date tracking
  - Team status management
  - Project-specific or global assignments
  - Team notes and details

- **Settings Module**
  - Module configuration interface
  - Default EMI interest rate setting
  - Default booking validity period
  - Email notification toggle
  - SMS notification toggle
  - Settings persistence

#### Database Schema
- Created 8 database tables with proper relationships
- Foreign key relationships between modules
- Indexes for optimized queries
- Default settings on installation
- Proper data types and constraints

#### User Interface
- Responsive admin panel views
- Data tables with sorting and filtering
- Form validation
- Auto-calculation features
- Status badges with color coding
- Action buttons for CRUD operations
- Breadcrumb navigation
- Clean and modern design

#### Backend Features
- Model with comprehensive database operations
- Controller with all CRUD endpoints
- Permission system integration
- Staff member integration
- Customer integration with Perfex clients
- Transaction recording
- Automatic calculations
- Data validation

#### Language Support
- Complete English language file
- All UI labels and messages
- Error messages
- Success messages
- Validation messages

#### Assets
- Custom CSS stylesheet
- JavaScript for client-side operations
- Auto-calculation scripts
- Form validation scripts
- Data table initialization

#### Documentation
- Comprehensive README.md
- Detailed Installation & Usage Guide
- Quick Reference Guide
- Code comments
- Function documentation
- Database schema documentation

#### Configuration
- Module config.php with hooks
- Menu registration
- Permission registration
- Module information
- Activation/deactivation hooks

#### Installation
- Automatic database table creation
- Default settings insertion
- Permission registration
- Clean uninstallation option

### Technical Details

#### Requirements
- Perfex CRM v2.9.0 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher
- CodeIgniter 3.x

#### Architecture
- MVC pattern (Model-View-Controller)
- CodeIgniter framework integration
- Perfex CRM hooks system
- Responsive design
- AJAX-ready structure

#### Security
- SQL injection prevention
- XSS protection
- CSRF protection (via CodeIgniter)
- Permission-based access control
- Input validation
- Output escaping

### Known Limitations
- SMS notifications require external gateway (not included)
- Data tables use static data (AJAX implementation can be added)
- No PDF export functionality (can be added as enhancement)
- No email templates (uses Perfex default notification system)

### Future Enhancements
- PDF report generation
- Email templates customization
- SMS gateway integration
- Data export to Excel
- Advanced reporting and analytics
- Customer portal integration
- Payment gateway integration
- Document management
- Commission calculation automation
- Advanced search and filters

---

## Version History

- **v1.0.0** (2026-02-01) - Initial Release

---

For more information, see [README.md](README.md) and [INSTALLATION_GUIDE.md](INSTALLATION_GUIDE.md)
