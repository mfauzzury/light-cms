# Contributing Guide

Thank you for contributing to **Minimal Good CMS**.

This project intentionally limits scope. Please read this document carefully before writing code.

---

## Philosophy (Read First)

This CMS values:
- Clarity over cleverness
- Explicit code over abstraction
- Fewer features over flexibility
- Long-term maintainability over short-term speed

If a feature adds complexity without strong justification, it will be rejected.

---

## Non‑Negotiable Rules

- **Eloquent ORM only** for database access
- No raw SQL unless explicitly justified
- No queries in views
- No magic hooks, filters, or dynamic execution
- No page-builder behavior
- No plugin system

---

## Code Style & Practices

- Follow Laravel best practices
- Prefer readable, boring code
- Avoid premature abstractions
- Keep classes small and focused
- Comment only where logic is non-obvious

---

## UI / UX Guidelines

- Keep UI compact and minimal
- Avoid visual noise
- No unnecessary animations
- Minimal color usage
- Tailwind utilities only (no custom CSS unless justified)

Admin UI should feel calm, not flashy.

---

## Content & Editor Rules

- Editor.js is the only content editor
- Content must be stored as structured JSON
- Only approved blocks are allowed
- No raw HTML or inline JavaScript

Rendering must be:
- Server-side
- SEO-safe
- Predictable

---

## Security Expectations

- Validate all inputs
- Escape output by default
- Protect all admin routes with middleware
- Validate file uploads strictly
- Follow least-privilege permission design

Security regressions are considered critical bugs.

---

## Adding New Features

Before adding a feature, ask:
1. Does this help editors without increasing risk?
2. Can this be done with existing structure?
3. Does this reduce or increase system complexity?

If the answer increases complexity, reconsider.

---

## Commit Guidelines

- Small, focused commits
- Clear commit messages
- One logical change per commit

---

## Final Reminder

This is **not WordPress**.

Do not attempt to recreate:
- Gutenberg
- Elementor
- Plugin marketplaces
- Theme ecosystems

If unsure, default to **not adding the feature**.

