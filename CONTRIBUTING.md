# Contributing to Real Estate CRM

Thank you for your interest in contributing to the Real Estate CRM plugin for Perfex CRM! We welcome contributions from the community.

## How to Contribute

### Reporting Bugs

If you find a bug, please create an issue on GitHub with:
- Clear description of the bug
- Steps to reproduce
- Expected behavior
- Actual behavior
- Screenshots (if applicable)
- Your environment (Perfex version, PHP version, browser)

### Suggesting Enhancements

We welcome feature suggestions! Please create an issue with:
- Clear description of the feature
- Use case and benefits
- Mockups or examples (if applicable)

### Code Contributions

1. **Fork the Repository**
   ```bash
   git clone https://github.com/yogiramsruthi/crm-perfex.git
   cd crm-perfex
   ```

2. **Create a Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

3. **Make Your Changes**
   - Follow the existing code style
   - Add comments for complex logic
   - Update documentation if needed

4. **Test Your Changes**
   - Test all affected functionality
   - Ensure no existing features are broken
   - Test in different browsers if UI changes

5. **Commit Your Changes**
   ```bash
   git add .
   git commit -m "Add: brief description of changes"
   ```

6. **Push to Your Fork**
   ```bash
   git push origin feature/your-feature-name
   ```

7. **Create a Pull Request**
   - Provide clear description of changes
   - Reference any related issues
   - Include screenshots for UI changes

## Coding Standards

### PHP Code Style
- Follow PSR-12 coding standards
- Use meaningful variable and function names
- Add PHPDoc comments for functions
- Keep functions focused and concise

Example:
```php
/**
 * Get all active projects
 *
 * @param array $where Additional where conditions
 * @return array Array of projects
 */
public function get_active_projects($where = [])
{
    $where['status'] = 'active';
    return $this->get_projects($where);
}
```

### JavaScript Code Style
- Use ES5+ syntax
- Use meaningful variable names
- Add comments for complex logic
- Use jQuery for DOM manipulation (Perfex standard)

Example:
```javascript
/**
 * Calculate and update balance amount
 */
function calculateBalance() {
    var total = parseFloat($('#total_amount').val()) || 0;
    var paid = parseFloat($('#paid_amount').val()) || 0;
    $('#balance_amount').val((total - paid).toFixed(2));
}
```

### CSS Code Style
- Use meaningful class names
- Follow BEM methodology where applicable
- Keep selectors specific but not overly nested
- Add comments for sections

Example:
```css
/* Statistic Card Styles */
.stat-card {
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
```

### Database Conventions
- Use db_prefix() for table names
- Use singular form for table names when possible
- Add proper indexes for foreign keys
- Use appropriate data types

Example:
```php
$this->db->query('CREATE TABLE `' . db_prefix() . 'real_estate_projects` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
)');
```

## Development Workflow

### Setting Up Development Environment

1. Install Perfex CRM locally
2. Clone this repository
3. Copy module to Perfex modules directory
4. Activate the module
5. Configure database and settings

### Making Changes

1. **Models** (`models/Real_estate_crm_model.php`)
   - Add/modify database operations
   - Keep methods focused on single responsibility
   - Add proper error handling

2. **Controllers** (`controllers/Real_estate_crm.php`)
   - Add/modify endpoints
   - Handle form submissions
   - Validate user permissions
   - Sanitize input data

3. **Views** (`views/admin/`)
   - Follow existing view structure
   - Use Perfex helper functions
   - Ensure responsive design
   - Add proper form validation

4. **Assets** (`assets/`)
   - Add custom CSS in `css/real_estate_crm.css`
   - Add custom JS in `js/real_estate_crm.js`
   - Optimize images before adding

5. **Language** (`language/english/`)
   - Add new language strings
   - Use descriptive keys
   - Keep strings concise

### Testing

Before submitting:
- [ ] Test all CRUD operations
- [ ] Test with different user permissions
- [ ] Test on different screen sizes
- [ ] Check browser console for errors
- [ ] Verify database queries are optimized
- [ ] Test data validation
- [ ] Check for SQL injection vulnerabilities
- [ ] Verify XSS protection

## Documentation

When adding features, update:
- [ ] README.md (if adding major feature)
- [ ] INSTALLATION_GUIDE.md (if changing setup)
- [ ] QUICK_REFERENCE.md (if adding common task)
- [ ] CHANGELOG.md (document all changes)
- [ ] Code comments (inline documentation)

## Pull Request Guidelines

### PR Title Format
```
[Type] Brief description

Types: Feature, Fix, Enhancement, Docs, Refactor, Test
```

Examples:
- `[Feature] Add PDF export for bookings`
- `[Fix] Correct EMI calculation for leap years`
- `[Enhancement] Improve dashboard loading speed`

### PR Description Template
```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Enhancement
- [ ] Documentation update

## Testing
Describe how you tested the changes

## Screenshots (if applicable)
Add screenshots here

## Checklist
- [ ] Code follows project style
- [ ] Documentation updated
- [ ] All tests pass
- [ ] No console errors
```

## Community Guidelines

### Code of Conduct
- Be respectful and inclusive
- Provide constructive feedback
- Help others learn and grow
- Focus on what's best for the project

### Communication
- Use clear and concise language
- Provide context in discussions
- Be patient with responses
- Ask questions when unclear

## Getting Help

If you need help:
- Check existing documentation
- Search existing issues
- Ask in issue comments
- Contact maintainers

## Recognition

Contributors will be:
- Listed in CONTRIBUTORS.md
- Mentioned in release notes
- Thanked in project documentation

## License

By contributing, you agree that your contributions will be licensed under the MIT License.

---

Thank you for contributing to Real Estate CRM! 🎉
