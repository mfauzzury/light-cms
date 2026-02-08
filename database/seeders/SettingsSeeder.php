<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Araken Light-CMS',
            'site_tagline' => 'A minimal, secure Laravel CMS',
            'site_email' => 'admin@lightcms.local',
            'site_description' => 'Araken Light-CMS is a minimal and secure content management system built with Laravel and Filament.',
            'site_logo' => '',
            'site_favicon' => '',
            'posts_per_page' => '10',
            'homepage_type' => 'posts',
            'homepage_page_id' => '',
            'footer_text' => '© ' . date('Y') . ' Araken Light-CMS. All rights reserved.',
            'facebook_url' => '',
            'twitter_url' => '',
            'instagram_url' => '',
            'linkedin_url' => '',
            'google_analytics' => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
