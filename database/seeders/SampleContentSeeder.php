<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();

        // Delete existing sample content
        Content::whereIn('slug', ['about-us', 'getting-started-with-light-cms', 'understanding-editorjs-blocks'])->forceDelete();

        // Create a sample page
        Content::create([
            'type' => 'page',
            'title' => 'About Us',
            'slug' => 'about-us',
            'content_json' => [
                'blocks' => [
                    [
                        'type' => 'header',
                        'data' => [
                            'text' => 'Welcome to Our Company',
                            'level' => 2,
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => 'We are a team of passionate developers building amazing web applications with Laravel and modern technologies.',
                        ],
                    ],
                    [
                        'type' => 'list',
                        'data' => [
                            'style' => 'unordered',
                            'items' => [
                                'Quality-focused development',
                                'Modern technology stack',
                                'Agile methodology',
                                'Customer satisfaction',
                            ],
                        ],
                    ],
                ],
            ],
            'status' => 'published',
            'published_at' => now(),
            'meta_title' => 'About Us - Light CMS',
            'meta_description' => 'Learn more about our company and what we do.',
            'author_id' => $admin->id,
        ]);

        // Create sample posts
        Content::create([
            'type' => 'post',
            'title' => 'Getting Started with Light CMS',
            'slug' => 'getting-started-with-light-cms',
            'content_json' => [
                'blocks' => [
                    [
                        'type' => 'header',
                        'data' => [
                            'text' => 'Introduction',
                            'level' => 2,
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => 'Light CMS is a minimal, secure Laravel-based content management system designed as a pragmatic alternative to WordPress.',
                        ],
                    ],
                    [
                        'type' => 'header',
                        'data' => [
                            'text' => 'Key Features',
                            'level' => 3,
                        ],
                    ],
                    [
                        'type' => 'list',
                        'data' => [
                            'style' => 'ordered',
                            'items' => [
                                'Block-based content editing with Editor.js',
                                'Filament admin panel',
                                'Role-based permissions',
                                'Media management',
                                'Built-in SEO features',
                            ],
                        ],
                    ],
                    [
                        'type' => 'quote',
                        'data' => [
                            'text' => 'Simplicity is the ultimate sophistication.',
                            'caption' => 'Leonardo da Vinci',
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => 'This CMS prioritizes stability over flexibility, security over features, and long-term maintainability over short-term convenience.',
                        ],
                    ],
                ],
            ],
            'status' => 'published',
            'published_at' => now()->subDay(),
            'meta_title' => 'Getting Started with Light CMS',
            'meta_description' => 'Learn how to get started with Light CMS and explore its powerful features.',
            'author_id' => $admin->id,
        ]);

        Content::create([
            'type' => 'post',
            'title' => 'Understanding Editor.js Blocks',
            'slug' => 'understanding-editorjs-blocks',
            'content_json' => [
                'blocks' => [
                    [
                        'type' => 'paragraph',
                        'data' => [
                            'text' => 'Editor.js provides a clean block-styled editor with a variety of content blocks.',
                        ],
                    ],
                    [
                        'type' => 'header',
                        'data' => [
                            'text' => 'Available Blocks',
                            'level' => 2,
                        ],
                    ],
                    [
                        'type' => 'table',
                        'data' => [
                            'withHeadings' => true,
                            'content' => [
                                ['Block Type', 'Description'],
                                ['Header', 'Headings from H1 to H6'],
                                ['Paragraph', 'Standard text blocks'],
                                ['List', 'Ordered and unordered lists'],
                                ['Quote', 'Block quotes with citations'],
                                ['Code', 'Code snippets with syntax highlighting'],
                            ],
                        ],
                    ],
                    [
                        'type' => 'code',
                        'data' => [
                            'code' => '// Example code block' . "\n" . 'function greet(name) {' . "\n" . '    return `Hello, ' . '${name}' . '!`;' . "\n" . '}',
                        ],
                    ],
                ],
            ],
            'status' => 'published',
            'published_at' => now()->subDays(2),
            'meta_title' => 'Understanding Editor.js Blocks',
            'meta_description' => 'Explore the different types of content blocks available in Editor.js.',
            'author_id' => $admin->id,
        ]);
    }
}
