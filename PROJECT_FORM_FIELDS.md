# Real Estate CRM - Project Form Fields Guide

## Complete Field Reference

This document provides a comprehensive overview of all fields available in the Project creation/edit form.

---

## Form Structure

The project form is organized into **3 main sections**:

1. **Basic Information** - Core project details
2. **Additional Details** - Extended information
3. **Contact Information** - Communication details

**Total Fields:** 22 (including auto-generated fields)

---

## Section 1: Basic Information

### 1. Project Name * (Required)
```
Field Type: Text Input
Field Name: name
Max Length: 255 characters
Required: YES
Validation: Cannot be empty
```
**Purpose:** The official name of the real estate project

**Examples:**
- "Green Valley Apartments"
- "Sunrise Business Park"
- "Royal Heights Villas"
- "Tech City Commercial Complex"

---

### 2. Project Type
```
Field Type: Dropdown Select
Field Name: project_type
Default: Empty (Select Type)
```
**Options:**
- `residential` - Residential
- `commercial` - Commercial
- `mixed` - Mixed Use
- `industrial` - Industrial

**Purpose:** Categorize the project by its primary use

**Use Cases:**
- Residential: Apartments, villas, housing societies
- Commercial: Shopping malls, office spaces, retail
- Mixed Use: Combination of residential and commercial
- Industrial: Warehouses, factories, business parks

---

### 3. Location
```
Field Type: Text Input
Field Name: location
Max Length: 255 characters
```
**Purpose:** Physical address or area where the project is located

**Examples:**
- "Sector 15, Bangalore, Karnataka"
- "Downtown Mumbai, Near Station Road"
- "Highway 45, Industrial Area, Pune"

---

### 4. Total Area
```
Field Type: Text Input
Field Name: total_area
Max Length: 100 characters
Placeholder: "e.g., 10 acres or 100000 sq ft"
```
**Purpose:** Total land area covered by the project

**Examples:**
- "10 acres"
- "100000 sq ft"
- "5 hectares"
- "2.5 acres"

---

### 5. Total Plots
```
Field Type: Number Input
Field Name: total_plots
Default: 0
Min: 0
```
**Purpose:** Total number of individual plots/units in the project

**Examples:**
- 200 (for an apartment complex with 200 units)
- 50 (for a villa project with 50 plots)
- 100 (for commercial spaces)

**Note:** This number is used to track availability. As plots are assigned to bookings, `available_plots` is automatically updated.

---

### 6. Developer Name
```
Field Type: Text Input
Field Name: developer_name
Max Length: 255 characters
```
**Purpose:** Name of the development company or builder

**Examples:**
- "ABC Developers Private Limited"
- "Green Build Construction"
- "Sunrise Properties"

---

### 7. Approval/Registration Number
```
Field Type: Text Input
Field Name: approval_number
Max Length: 100 characters
```
**Purpose:** Government approval, registration, or RERA number

**Examples:**
- "RERA/2024/AB/1234"
- "MC-2024-001234"
- "BDA/APP/2024/567"

**Importance:** Critical for legal compliance and customer trust

---

### 8. Legal Status
```
Field Type: Dropdown Select
Field Name: legal_status
Default: Empty (Select Status)
```
**Options:**
- `approved` - Approved
- `pending` - Pending Approval
- `registered` - Registered

**Purpose:** Current legal and regulatory status

**Definitions:**
- **Approved:** All necessary approvals obtained
- **Pending Approval:** Awaiting government/authority approval
- **Registered:** Officially registered with RERA or relevant authority

---

### 9. Start Date
```
Field Type: Date Picker
Field Name: start_date
Format: YYYY-MM-DD
```
**Purpose:** Date when project construction/development began

**Usage:** Helps track project timeline and age

---

### 10. End Date
```
Field Type: Date Picker
Field Name: end_date
Format: YYYY-MM-DD
```
**Purpose:** Expected or actual completion date of the project

**Usage:** 
- Project timeline management
- Customer expectations
- Progress tracking

---

### 11. Possession Date
```
Field Type: Date Picker
Field Name: possession_date
Format: YYYY-MM-DD
```
**Purpose:** Date when customers can take possession of their units

**Note:** This may be different from the end date (construction completion)

**Example:**
- End Date: 2026-06-30 (construction complete)
- Possession Date: 2026-09-30 (3 months for final touches and handover)

---

### 12. Project Status
```
Field Type: Dropdown Select
Field Name: status
Default: active
```
**Options:**
- `active` - Active
- `inactive` - Inactive

**Purpose:** Control whether project is visible and bookable

**Usage:**
- Active: Project is visible, plots can be booked
- Inactive: Project hidden from booking system

---

## Section 2: Additional Details

### 13. Project Description
```
Field Type: Textarea
Field Name: description
Rows: 4
Max Length: TEXT (65,535 characters)
```
**Purpose:** Comprehensive description of the project

**Should Include:**
- Project overview
- Key highlights
- Unique selling points
- Target audience
- Special features

**Example:**
```
Green Valley Apartments is a premium residential project offering 
modern living spaces in the heart of the city. With 200 spacious 
units ranging from 2BHK to 4BHK, the project features contemporary 
architecture, eco-friendly design, and world-class amenities. 
Perfect for families looking for a serene yet well-connected 
lifestyle.
```

---

### 14. Amenities
```
Field Type: Textarea
Field Name: amenities
Rows: 3
Max Length: TEXT (65,535 characters)
Placeholder: "e.g., Swimming Pool, Gym, Parking, Security, etc."
```
**Purpose:** List all facilities and amenities available

**Common Amenities:**
- Swimming Pool
- Gymnasium / Fitness Center
- Clubhouse
- Children's Play Area
- Parks and Gardens
- 24/7 Security
- Power Backup
- Parking (Covered/Open)
- Sports Facilities
- Community Hall
- CCTV Surveillance
- Water Treatment Plant
- Sewage Treatment Plant

**Format Examples:**
```
Swimming Pool, Gymnasium, Clubhouse, Children's Play Area, 
24/7 Security, Power Backup, Covered Parking, Landscaped Gardens
```

---

### 15. Payment Terms
```
Field Type: Textarea
Field Name: payment_terms
Rows: 3
Max Length: TEXT (65,535 characters)
Placeholder: "e.g., 20% booking, 30% on construction, 50% on possession"
```
**Purpose:** Define the payment structure and schedule

**Example Formats:**

**Simple Payment Plan:**
```
20% on booking
30% during construction
50% on possession
```

**Detailed Payment Plan:**
```
10% - Booking Amount
15% - On completion of foundation
15% - On completion of plinth level
20% - On completion of 5th floor
20% - On completion of structure
20% - On possession
```

**EMI-Based Plan:**
```
20% down payment
Balance 80% in 24 monthly installments
Interest-free EMI available
```

---

### 16. Bank Loan Available
```
Field Type: Checkbox
Field Name: bank_loan_available
Value: 1 (checked) or 0 (unchecked)
Default: Unchecked (0)
```
**Purpose:** Indicate if bank financing/home loans are available

**Benefits:**
- Increases affordability for customers
- Attracts more buyers
- Partnerships with banks add credibility

**When Checked:**
- Indicates bank loan facility is available
- Customers can expect loan assistance
- May include tie-ups with specific banks

---

## Section 3: Contact Information

### 17. Contact Person
```
Field Type: Text Input
Field Name: contact_person
Max Length: 255 characters
```
**Purpose:** Name of the primary point of contact for the project

**Examples:**
- "John Smith (Project Manager)"
- "Sarah Williams"
- "Rajesh Kumar - Sales Head"

---

### 18. Contact Phone
```
Field Type: Text Input
Field Name: contact_phone
Max Length: 50 characters
```
**Purpose:** Phone number for project inquiries

**Format Examples:**
- "+91 9876543210"
- "080-12345678"
- "+1-555-123-4567"

**Best Practice:** Include country code for international accessibility

---

### 19. Contact Email
```
Field Type: Email Input
Field Name: contact_email
Max Length: 255 characters
Validation: Valid email format
```
**Purpose:** Email address for project inquiries and communications

**Examples:**
- "info@greenvalley.com"
- "sales@sunriseparks.in"
- "contact@royalheights.com"

---

## Auto-Generated Fields (Not in Form)

### 20. Available Plots
```
Field Type: Integer (Auto-calculated)
Field Name: available_plots
Default: Same as total_plots
```
**Purpose:** Track remaining available plots

**Calculation:** Automatically updated when:
- Bookings are created (decreases)
- Bookings are cancelled (increases)
- Plot status changes

**Formula:** `available_plots = total_plots - booked_plots`

---

### 21. Created By
```
Field Type: Integer
Field Name: created_by
Auto-filled: YES
```
**Purpose:** Record which staff member created the project

**Value:** Staff user ID from `get_staff_user_id()`

**Usage:** Audit trail and accountability

---

### 22. Created At
```
Field Type: DateTime
Field Name: created_at
Format: Y-m-d H:i:s
Auto-filled: YES
```
**Purpose:** Timestamp when project was created

**Example:** "2024-12-15 14:30:45"

---

### 23. Updated At
```
Field Type: DateTime
Field Name: updated_at
Format: Y-m-d H:i:s
Auto-filled: YES (on updates only)
```
**Purpose:** Timestamp of last modification

**Example:** "2024-12-20 09:15:30"

**Usage:** Track when project details were last changed

---

## Field Validation Rules

### Required Fields
- ✅ Project Name (must not be empty)

### Optional Fields
- All other fields are optional but recommended for completeness

### Data Types
- Text fields: VARCHAR/TEXT
- Number fields: INT/DECIMAL
- Date fields: DATE
- DateTime fields: DATETIME
- Boolean fields: TINYINT(1)

---

## Database Schema

```sql
CREATE TABLE `tblreal_estate_projects` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `location` VARCHAR(255) NULL,
    `total_plots` INT DEFAULT 0,
    `available_plots` INT DEFAULT 0,
    `start_date` DATE NULL,
    `end_date` DATE NULL,
    `status` VARCHAR(50) DEFAULT "active",
    `project_type` VARCHAR(50) NULL,
    `developer_name` VARCHAR(255) NULL,
    `approval_number` VARCHAR(100) NULL,
    `total_area` VARCHAR(100) NULL,
    `amenities` TEXT NULL,
    `payment_terms` TEXT NULL,
    `bank_loan_available` TINYINT(1) DEFAULT 0,
    `possession_date` DATE NULL,
    `legal_status` VARCHAR(100) NULL,
    `contact_person` VARCHAR(255) NULL,
    `contact_phone` VARCHAR(50) NULL,
    `contact_email` VARCHAR(255) NULL,
    `created_by` INT NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

---

## Best Practices

### 1. Complete All Fields
While only the project name is required, filling all fields provides:
- Better customer information
- Improved search and filtering
- Professional presentation
- Legal compliance

### 2. Accurate Legal Information
- Always verify approval numbers
- Keep legal status updated
- Document all required certificates

### 3. Clear Payment Terms
- Be specific about percentages and timing
- Include any conditions or clauses
- Mention additional charges if any

### 4. Updated Contact Information
- Ensure contact details are current
- Test email addresses before adding
- Provide multiple contact options

### 5. Realistic Dates
- Set achievable completion dates
- Update dates if delays occur
- Communicate changes to customers

---

## Form Submission

### POST URL
```
admin_url('real_estate_crm/project/' . $id)
```

### Method
```
POST
```

### On Success
- New project: Creates project and returns ID
- Edit project: Updates existing project
- Redirects to: `admin_url('real_estate_crm/projects')`
- Shows success alert

### On Error
- Validation errors displayed
- Form data retained
- User can correct and resubmit

---

## Usage Examples

### Example 1: Residential Apartment Project
```
Name: Green Valley Apartments
Type: Residential
Location: Sector 15, Bangalore
Total Area: 8 acres
Total Plots: 200
Developer: ABC Developers Pvt Ltd
Approval Number: RERA/KA/2024/001234
Legal Status: Registered
Start Date: 2024-01-01
End Date: 2026-12-31
Possession Date: 2027-03-31
Status: Active
Description: Modern residential complex with 200 units
Amenities: Pool, Gym, Club, Parking, 24x7 Security
Payment Terms: 20% booking, 40% construction, 40% possession
Bank Loan: Yes
Contact: John Smith
Phone: +91 9876543210
Email: info@greenvalley.com
```

### Example 2: Commercial Complex
```
Name: Sunrise Business Park
Type: Commercial
Location: IT Corridor, Mumbai
Total Area: 15 acres
Total Plots: 50
Developer: Sunrise Builders
Approval Number: MC/2024/567
Legal Status: Approved
Start Date: 2024-06-01
End Date: 2027-05-31
Possession Date: 2027-08-31
Status: Active
Description: Premium commercial spaces for IT and corporate offices
Amenities: Cafeteria, Conference Rooms, Parking, Power Backup
Payment Terms: 30% booking, 40% during construction, 30% on possession
Bank Loan: Yes
Contact: Sarah Williams
Phone: +91 22-12345678
Email: sales@sunrisebp.com
```

---

## Related Documents

- [Installation Guide](INSTALLATION_GUIDE.md)
- [Features List](FEATURES.md)
- [Perfex Integration Guide](PERFEX_INTEGRATION_GUIDE.md)
- [Customer Portal Guide](CUSTOMER_PORTAL_GUIDE.md)

---

## Support

For questions about project form fields or data entry, refer to the main documentation or contact the system administrator.
