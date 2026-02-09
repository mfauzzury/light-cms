<?php

namespace App\Services;

class TemplateRegistry
{
    /**
     * Available templates
     */
    public static function getTemplates(): array
    {
        return [
            'landing-page' => [
                'name' => 'Landing Page',
                'description' => 'Marketing landing page with hero, features, pricing, testimonials',
                'sections' => ['hero', 'features', 'pricing', 'testimonials', 'cta'],
            ],
            'about' => [
                'name' => 'About Page',
                'description' => 'Company about page with team, stats, and mission',
                'sections' => ['hero', 'stats', 'team', 'cta'],
            ],
            'contact' => [
                'name' => 'Contact Page',
                'description' => 'Contact page with form and information',
                'sections' => ['hero', 'contact-form'],
            ],
            'services' => [
                'name' => 'Services Page',
                'description' => 'Services overview with features and CTA',
                'sections' => ['hero', 'features', 'cta'],
            ],
        ];
    }

    /**
     * Get template options for select dropdown
     */
    public static function getTemplateOptions(): array
    {
        $options = ['none' => 'No Template (Use Editor.js)'];

        foreach (self::getTemplates() as $key => $template) {
            $options[$key] = $template['name'];
        }

        return $options;
    }

    /**
     * Get available section types
     */
    public static function getSectionTypes(): array
    {
        return [
            // Existing sections
            'hero' => 'Hero Section',
            'features' => 'Features Grid',
            'pricing' => 'Pricing Table',
            'testimonials' => 'Testimonials',
            'cta' => 'Call to Action',
            'team' => 'Team Members',
            'stats' => 'Statistics',
            'contact-form' => 'Contact Form',

            // NEW: Modern sections
            'faq' => 'FAQ Accordion',
            'logos' => 'Logo Cloud / Client Showcase',
            'comparison' => 'Feature Comparison Table',
            'content' => 'Rich Content Block (Text + Image)',
            'gallery' => 'Image Gallery Grid',
            'newsletter' => 'Newsletter Signup',
            'timeline' => 'Timeline / Process Steps',
            'video' => 'Video Embed Section',
        ];
    }

    /**
     * Validate section structure
     */
    public static function validateSection(array $section): bool
    {
        // Must have type
        if (empty($section['type'])) {
            return false;
        }

        // Type must be valid
        if (!array_key_exists($section['type'], self::getSectionTypes())) {
            return false;
        }

        // Must have data
        if (empty($section['data'])) {
            return false;
        }

        return true;
    }
}
