<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class CategoryTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing categories and tags
        Category::query()->forceDelete();
        Tag::query()->forceDelete();

        // Create Categories
        $categories = [
            ['name' => 'Technology', 'slug' => 'technology', 'description' => 'Posts about technology and software'],
            ['name' => 'Design', 'slug' => 'design', 'description' => 'Posts about design and UI/UX'],
            ['name' => 'Business', 'slug' => 'business', 'description' => 'Posts about business and entrepreneurship'],
            ['name' => 'Tutorials', 'slug' => 'tutorials', 'description' => 'Step-by-step tutorials and guides'],
            ['name' => 'News', 'slug' => 'news', 'description' => 'Latest news and updates'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create subcategory
        $webDev = Category::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'Posts about web development',
            'parent_id' => Category::where('slug', 'technology')->first()->id,
        ]);

        // Create Tags
        $tags = [
            ['name' => 'Laravel', 'slug' => 'laravel', 'description' => 'Laravel framework'],
            ['name' => 'PHP', 'slug' => 'php', 'description' => 'PHP programming language'],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'description' => 'JavaScript programming'],
            ['name' => 'Vue.js', 'slug' => 'vuejs', 'description' => 'Vue.js framework'],
            ['name' => 'React', 'slug' => 'react', 'description' => 'React framework'],
            ['name' => 'Tailwind CSS', 'slug' => 'tailwind-css', 'description' => 'Tailwind CSS framework'],
            ['name' => 'Database', 'slug' => 'database', 'description' => 'Database related topics'],
            ['name' => 'API', 'slug' => 'api', 'description' => 'API development'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }

        $this->command->info('Created ' . count($categories) + 1 . ' categories and ' . count($tags) . ' tags.');
    }
}
