# Minimal Good CMS (Laravel)

A **compact, lightweight, and secure Laravel-based CMS** designed as a pragmatic alternative to WordPress.

This project prioritizes:
- Stability over flexibility
- Structured content over free-form layouts
- Security and maintainability over plugins and themes

It is **not** a page builder and intentionally avoids WordPress-era complexity.

---

## Core Principles

- Compact and light UI
- Minimal JavaScript
- Low cognitive load for editors
- Explicit architecture (no magic)
- Editors must never break layout

---

## Tech Stack

- **Backend**: Laravel 11
- **ORM**: Eloquent ORM (mandatory)
- **Admin Panel**: Filament
- **Frontend**: Blade
- **Styling**: Tailwind CSS (minimal utilities only)
- **Content Editor**: Editor.js (JSON-based)
- **Auth**: Laravel Auth
- **Permissions**: Spatie Permission
- **Media**: Spatie Media Library
- **Database**: MySQL

---

## Features

### Content Management
- Pages and Posts
- Optional custom content types
- Slug-based routing
- Draft / Published / Archived states
- Optional scheduled publishing

### Content Editing
- Block-based editing using Editor.js
- Content stored as structured JSON
- Predefined blocks only (Header, Paragraph, Image, List, Quote, Embed, Code, Table, Hero, CTA, Gallery)

No free layout editing. No raw HTML.

### Media Management
- Central media library
- Image resizing (thumbnail / medium / large)
- Alt text and captions
- Strict file type validation

### Roles & Permissions
- Super Admin
- Admin
- Editor
- Author (optional)

Permissions are explicit and readable.

### SEO (Built-in)
- Meta title & description
- Canonical URLs
- OpenGraph fields
- XML sitemap
- Robots.txt configuration

---

## What This CMS Does NOT Do

- No page builders (Gutenberg, Elementor, GrapesJS)
- No plugin marketplace
- No themes or theme switching
- No comments system
- No XML-RPC
- No multisite
- No dynamic code execution from content

---

## Security & Performance

- CSRF protection enabled
- XSS escaped by default
- Auth middleware on all admin routes
- File upload validation
- Rate limiting on auth and admin routes
- Minimal JavaScript payloads

---

## Data Model (Overview)

Core tables:
- users
- roles
- permissions
- contents
- media
- seo_meta

`contents` includes:
- type
- title
- slug
- content_json
- status
- published_at

---

## One-Line Summary

> A **minimal, secure Laravel CMS** using **Filament + Editor.js**, focused on structured content and long-term maintainability.

