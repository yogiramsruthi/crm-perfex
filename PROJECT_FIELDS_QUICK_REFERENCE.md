# Project Form Fields - Quick Reference

## Visual Field Overview

```
┌─────────────────────────────────────────────────────────────┐
│                    PROJECT FORM FIELDS                       │
│                   (22 Total Fields)                          │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│  SECTION 1: BASIC INFORMATION (12 fields)                   │
├─────────────────────────────────────────────────────────────┤
│                                                               │
│  Left Column:                   Right Column:                │
│  ─────────────                  ─────────────                │
│  1. Project Name *              6. Developer Name            │
│  2. Project Type                7. Approval Number           │
│  3. Location                    8. Legal Status              │
│  4. Total Area                  9. Start Date                │
│  5. Total Plots                10. End Date                  │
│                                11. Possession Date           │
│                                12. Project Status            │
│                                                               │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│  SECTION 2: ADDITIONAL DETAILS (4 fields)                   │
├─────────────────────────────────────────────────────────────┤
│                                                               │
│  Full Width:                                                 │
│  ───────────                                                 │
│  13. Project Description (textarea - 4 rows)                 │
│  14. Amenities (textarea - 3 rows)                           │
│  15. Payment Terms (textarea - 3 rows)                       │
│  16. Bank Loan Available (checkbox)                          │
│                                                               │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│  SECTION 3: CONTACT INFORMATION (3 fields)                  │
├─────────────────────────────────────────────────────────────┤
│                                                               │
│  17. Contact Person  |  18. Contact Phone  |  19. Email     │
│                                                               │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│  AUTO-GENERATED FIELDS (3 fields - Not visible in form)     │
├─────────────────────────────────────────────────────────────┤
│                                                               │
│  20. Available Plots (auto-calculated from total_plots)      │
│  21. Created By (current staff user ID)                      │
│  22. Created At (current timestamp)                          │
│  23. Updated At (timestamp on updates)                       │
│                                                               │
└─────────────────────────────────────────────────────────────┘
```

---

## Field Types At a Glance

| Icon | Field Type | Count |
|------|-----------|-------|
| 📝 | Text Input | 9 |
| 📋 | Dropdown Select | 3 |
| 📅 | Date Picker | 3 |
| 📄 | Textarea | 3 |
| ☑️ | Checkbox | 1 |
| 🔢 | Number Input | 1 |
| ✉️ | Email Input | 1 |
| ⚙️ | Auto-Generated | 3 |

---

## Required vs Optional

```
Required Fields: 1
├─ Project Name *

Optional Fields: 18
├─ All others are optional but recommended

Auto-Generated: 3
├─ Available Plots, Created By, Created At, Updated At
```

---

## Field Categories

### 📊 Core Identification
- Project Name *
- Project Type
- Location

### 📏 Specifications
- Total Area
- Total Plots
- Project Description

### 🏢 Developer Information
- Developer Name
- Approval Number
- Legal Status

### 📅 Timeline
- Start Date
- End Date
- Possession Date
- Project Status

### 💰 Financial
- Payment Terms
- Bank Loan Available

### 🏊 Amenities
- Amenities

### 📞 Contact
- Contact Person
- Contact Phone
- Contact Email

---

## Dropdown Options Reference

### Project Type
```
□ (empty)
□ Residential
□ Commercial
□ Mixed Use
□ Industrial
```

### Legal Status
```
□ (empty)
□ Approved
□ Pending Approval
□ Registered
```

### Project Status
```
☑ Active (default)
□ Inactive
```

---

## Field Length Limits

| Field | Max Length |
|-------|-----------|
| Project Name | 255 |
| Project Type | 50 |
| Location | 255 |
| Total Area | 100 |
| Developer Name | 255 |
| Approval Number | 100 |
| Legal Status | 100 |
| Status | 50 |
| Description | TEXT (65,535) |
| Amenities | TEXT (65,535) |
| Payment Terms | TEXT (65,535) |
| Contact Person | 255 |
| Contact Phone | 50 |
| Contact Email | 255 |

---

## Common Values & Examples

### Project Type Examples
- **Residential**: Apartments, Villas, Housing Societies
- **Commercial**: Offices, Shopping Malls, Retail Spaces
- **Mixed Use**: Residential + Commercial Combined
- **Industrial**: Warehouses, Factories, Business Parks

### Total Area Examples
```
10 acres
100000 sq ft
5 hectares
2.5 acres
50000 sq meters
```

### Amenities Examples
```
Swimming Pool, Gymnasium, Clubhouse, Children's Play Area,
24/7 Security, Power Backup, Covered Parking, Landscaped Gardens,
Sports Facilities, Community Hall, CCTV Surveillance
```

### Payment Terms Examples
```
Simple:
20% on booking
30% during construction
50% on possession

Detailed:
10% - Booking Amount
15% - On completion of foundation
15% - On completion of plinth level
20% - On completion of 5th floor
20% - On completion of structure
20% - On possession
```

---

## Database Field Mapping

| Form Field | Database Column | Type |
|------------|----------------|------|
| Project Name | `name` | VARCHAR(255) |
| Project Type | `project_type` | VARCHAR(50) |
| Location | `location` | VARCHAR(255) |
| Total Area | `total_area` | VARCHAR(100) |
| Total Plots | `total_plots` | INT |
| Available Plots | `available_plots` | INT |
| Start Date | `start_date` | DATE |
| End Date | `end_date` | DATE |
| Possession Date | `possession_date` | DATE |
| Status | `status` | VARCHAR(50) |
| Developer Name | `developer_name` | VARCHAR(255) |
| Approval Number | `approval_number` | VARCHAR(100) |
| Legal Status | `legal_status` | VARCHAR(100) |
| Description | `description` | TEXT |
| Amenities | `amenities` | TEXT |
| Payment Terms | `payment_terms` | TEXT |
| Bank Loan | `bank_loan_available` | TINYINT(1) |
| Contact Person | `contact_person` | VARCHAR(255) |
| Contact Phone | `contact_phone` | VARCHAR(50) |
| Contact Email | `contact_email` | VARCHAR(255) |
| Created By | `created_by` | INT |
| Created At | `created_at` | DATETIME |
| Updated At | `updated_at` | DATETIME |

---

## Sample Complete Project Data

```php
[
    // Basic Information
    'name' => 'Green Valley Apartments',
    'project_type' => 'residential',
    'location' => 'Sector 15, Bangalore, Karnataka',
    'total_area' => '8 acres',
    'total_plots' => 200,
    'developer_name' => 'ABC Developers Private Limited',
    'approval_number' => 'RERA/KA/2024/001234',
    'legal_status' => 'registered',
    'start_date' => '2024-01-01',
    'end_date' => '2026-12-31',
    'possession_date' => '2027-03-31',
    'status' => 'active',
    
    // Additional Details
    'description' => 'Green Valley Apartments is a premium residential project offering modern living spaces in the heart of the city. With 200 spacious units ranging from 2BHK to 4BHK, the project features contemporary architecture, eco-friendly design, and world-class amenities.',
    'amenities' => 'Swimming Pool, Gymnasium, Clubhouse, Children\'s Play Area, 24/7 Security, Power Backup, Covered Parking, Landscaped Gardens, Jogging Track, Basketball Court',
    'payment_terms' => '20% on booking\n40% during construction (linked to milestones)\n40% on possession\n\nEMI options available with approved banks',
    'bank_loan_available' => 1,
    
    // Contact Information
    'contact_person' => 'John Smith',
    'contact_phone' => '+91 9876543210',
    'contact_email' => 'info@greenvalley.com',
    
    // Auto-generated (not in form)
    'available_plots' => 200, // Same as total_plots initially
    'created_by' => 1,
    'created_at' => '2024-12-15 14:30:45',
    'updated_at' => NULL
]
```

---

## Validation Rules

### Client-Side (Browser)
```javascript
✓ Project Name: required
✓ Contact Email: valid email format
✓ Total Plots: number only
```

### Server-Side (PHP)
```php
✓ Project Name: cannot be empty
✓ Created By: auto-filled (cannot be modified)
✓ Created At: auto-filled (cannot be modified)
✓ Updated At: auto-filled on updates
```

---

## Form Actions

```
┌─────────────────────────────────────┐
│  💾 Save     |    ❌ Cancel         │
│  (Submit)    |    (Return to List)  │
└─────────────────────────────────────┘
```

**Save Button:**
- Validates required fields
- Creates new project (if ID is empty)
- Updates existing project (if ID exists)
- Shows success alert
- Redirects to projects list

**Cancel Button:**
- Discards all changes
- Returns to projects list
- No data is saved

---

## Related Views

### After Saving → Project List View
```
Projects
├─ Filter by type, status
├─ Search projects
├─ View project details
├─ Edit project
├─ Delete project
└─ Manage plots for project
```

---

## Quick Tips

💡 **Tip 1:** Only Project Name is required, but filling all fields improves data quality

💡 **Tip 2:** Use consistent formatting for area (always "X acres" or "X sq ft")

💡 **Tip 3:** Update Legal Status as approvals are obtained

💡 **Tip 4:** Set realistic End Date and Possession Date

💡 **Tip 5:** List amenities in a consistent format (comma-separated)

💡 **Tip 6:** Include country code in phone numbers (+91, +1, etc.)

💡 **Tip 7:** Payment Terms should be clear and specific

💡 **Tip 8:** Check "Bank Loan Available" to attract more buyers

---

## Common Workflows

### Creating a New Project
```
1. Click "Add Project" button
2. Fill in Project Name (required)
3. Select Project Type
4. Enter Location and Area
5. Set Total Plots
6. Add Developer information
7. Enter Legal details
8. Set timeline dates
9. Add description and amenities
10. Define payment terms
11. Enter contact information
12. Click Save
```

### Editing an Existing Project
```
1. Go to Projects list
2. Click Edit icon for project
3. Modify required fields
4. Click Save
5. Changes are saved with timestamp
```

---

## See Also

- [Complete Field Guide](PROJECT_FORM_FIELDS.md) - Detailed documentation
- [Installation Guide](INSTALLATION_GUIDE.md) - Setup instructions
- [Features List](FEATURES.md) - All module features
- [Perfex Integration](PERFEX_INTEGRATION_GUIDE.md) - Integration details

---

**Need Help?**

Refer to the [PROJECT_FORM_FIELDS.md](PROJECT_FORM_FIELDS.md) for comprehensive details on each field, including examples, best practices, and use cases.
