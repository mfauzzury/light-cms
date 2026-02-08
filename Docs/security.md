# Security Documentation

## Security Measures Implemented

### 1. Input Validation ✅

**Form Request Classes:**
- `StoreContentRequest` - Validates content creation
- `UpdateContentRequest` - Validates content updates

**Validation Rules:**
- Type validation (only 'page' or 'post')
- Slug format validation (lowercase, alphanumeric, hyphens only)
- Unique slug enforcement
- Block type whitelisting
- String length limits (titles, meta tags)
- URL format validation
- Date format validation
- Foreign key validation (author_id, user existence)

### 2. Content Sanitization ✅

**ContentSanitizer Service** (`app/Services/ContentSanitizer.php`)

**Features:**
- Whitelist-based block type filtering
- Per-block-type sanitization
- HTML tag stripping from text content
- URL protocol validation (only http/https)
- Embed service whitelisting (YouTube, Vimeo, Twitter, Instagram)
- Code block content preservation (not executed)
- Integer bounds checking (header levels, table dimensions)

**Sanitization Flow:**
```php
$sanitizer = new ContentSanitizer();
$cleanContent = $sanitizer->sanitize($contentJson);
```

### 3. File Upload Security ✅

**Measures:**
- File type validation (images only: jpeg, png, jpg, webp)
- File size limits (5MB max)
- Spatie Media Library automatic file handling
- Storage outside public root (with symbolic links)
- Media conversions with size constraints
- Rate limiting on upload endpoints (60 requests/minute)

**Configuration:**
- `config/media-library.php` - Allowed MIME types
- Filament file upload components with `->image()` validation

### 4. XSS Prevention ✅

**Default Protections:**
- Blade templates escape output by default (`{{ }}`)
- Raw output (`{!! !!}`) only used for trusted content
- Content Sanitizer strips all HTML from Editor.js blocks
- No inline JavaScript execution from content

**Editor.js Content:**
- Stored as JSON (not HTML)
- Rendered server-side with escaped output
- Block types strictly controlled

### 5. CSRF Protection ✅

**Laravel Defaults:**
- CSRF tokens on all forms
- VerifyCsrfToken middleware active
- POST/PUT/DELETE/PATCH requests require valid token

**Verification:**
```php
// layouts/frontend.blade.php
<meta name="csrf-token" content="{{ csrf_token() }}">
```

### 6. Rate Limiting ✅

**Applied To:**
- Image upload endpoint: `throttle:60,1` (60 requests per minute)
- Auth routes: Laravel default throttling
- Admin panel: Protected by authentication

**Configuration:**
- Can be customized in `app/Http/Kernel.php`
- Filament has built-in rate limiting for login attempts

### 7. Authentication & Authorization ✅

**Measures:**
- All admin routes protected by `auth` middleware
- Filament panel requires authentication
- Permission checks via Spatie Permission
- Form Request authorization methods

**Permission System:**
- Granular permissions (view_contents, create_contents, etc.)
- Role-based access control
- Permission checks before actions

### 8. SQL Injection Prevention ✅

**Eloquent ORM:**
- Parameterized queries by default
- No raw SQL queries without bindings
- Validation on all database inputs

### 9. Security Headers

**Recommended (Production):**
Add these to `.htaccess` or nginx config:
```
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Strict-Transport-Security: max-age=31536000; includeSubDomains
Content-Security-Policy: default-src 'self'
```

### 10. Environment Security

**Critical:**
- `.env` file not in version control (`.gitignore`)
- `APP_KEY` set and strong
- `APP_DEBUG=false` in production
- `APP_ENV=production` in production
- Database credentials secured

## Security Checklist (Production Deployment)

- [ ] Set `APP_DEBUG=false`
- [ ] Set `APP_ENV=production`
- [ ] Generate new `APP_KEY`
- [ ] Enable HTTPS (force via middleware)
- [ ] Configure security headers
- [ ] Set up regular backups
- [ ] Monitor logs for suspicious activity
- [ ] Keep dependencies updated (`composer update`)
- [ ] Configure firewall rules
- [ ] Disable directory listing
- [ ] Set proper file permissions (755 for directories, 644 for files)
- [ ] Update `robots.txt` with production domain
- [ ] Configure rate limiting for API endpoints
- [ ] Enable database query logging (monitoring)
- [ ] Set up CORS if needed

## Reporting Security Issues

If you discover a security vulnerability, please email: security@yourdomain.com

**Do not** create public GitHub issues for security vulnerabilities.

## Security Best Practices for Content Editors

1. Use strong passwords
2. Never share login credentials
3. Log out when finished
4. Don't upload suspicious files
5. Verify embed URLs before adding
6. Don't paste untrusted content

## Regular Security Maintenance

**Monthly:**
- Review user permissions
- Check for unused media files
- Review access logs
- Update dependencies

**Quarterly:**
- Security audit
- Penetration testing
- Review and update security policies

## Additional Security Packages (Optional)

Consider adding:
- `spatie/laravel-honeypot` - Honeypot spam prevention
- `spatie/laravel-csp` - Content Security Policy
- `pragmarx/google2fa-laravel` - Two-factor authentication
- `spatie/laravel-backup` - Automated backups
