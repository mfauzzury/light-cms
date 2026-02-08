<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;

class ManageSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $title = 'Site Settings';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 99;

    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'site_name' => Setting::get('site_name', config('app.name')),
            'site_tagline' => Setting::get('site_tagline', ''),
            'site_email' => Setting::get('site_email', ''),
            'site_description' => Setting::get('site_description', ''),
            'site_logo' => Setting::get('site_logo', ''),
            'site_favicon' => Setting::get('site_favicon', ''),
            'posts_per_page' => Setting::get('posts_per_page', '10'),
            'homepage_type' => Setting::get('homepage_type', 'posts'),
            'homepage_page_id' => Setting::get('homepage_page_id', ''),
            'footer_text' => Setting::get('footer_text', ''),
            'facebook_url' => Setting::get('facebook_url', ''),
            'twitter_url' => Setting::get('twitter_url', ''),
            'instagram_url' => Setting::get('instagram_url', ''),
            'linkedin_url' => Setting::get('linkedin_url', ''),
            'google_analytics' => Setting::get('google_analytics', ''),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->icon('heroicon-o-cog-6-tooth')
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->label('Site Name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('site_tagline')
                                    ->label('Site Tagline')
                                    ->maxLength(255)
                                    ->helperText('A short description of your site'),
                                Forms\Components\TextInput::make('site_email')
                                    ->label('Site Email')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('site_description')
                                    ->label('Site Description')
                                    ->rows(3)
                                    ->maxLength(500),
                                Forms\Components\TextInput::make('posts_per_page')
                                    ->label('Posts Per Page')
                                    ->numeric()
                                    ->default(10)
                                    ->minValue(1)
                                    ->maxValue(100),
                            ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Reading')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\Radio::make('homepage_type')
                                    ->label('Homepage Display')
                                    ->options([
                                        'posts' => 'Your latest posts',
                                        'page' => 'A static page',
                                    ])
                                    ->default('posts')
                                    ->live()
                                    ->helperText('Choose what to display on your homepage'),
                                Forms\Components\Select::make('homepage_page_id')
                                    ->label('Select Homepage')
                                    ->options(function () {
                                        return \App\Models\Content::where('type', 'page')
                                            ->where('status', 'published')
                                            ->pluck('title', 'id');
                                    })
                                    ->searchable()
                                    ->visible(fn (Forms\Get $get): bool => $get('homepage_type') === 'page')
                                    ->helperText('Select which page to show as your homepage'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Branding')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\FileUpload::make('site_logo')
                                    ->label('Site Logo')
                                    ->image()
                                    ->maxSize(2048)
                                    ->directory('branding')
                                    ->helperText('Upload your site logo (max 2MB)'),
                                Forms\Components\FileUpload::make('site_favicon')
                                    ->label('Favicon')
                                    ->image()
                                    ->maxSize(512)
                                    ->directory('branding')
                                    ->helperText('Upload a favicon (16x16 or 32x32 px, max 512KB)'),
                                Forms\Components\Textarea::make('footer_text')
                                    ->label('Footer Text')
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->helperText('Text to display in the footer'),
                            ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([
                                Forms\Components\TextInput::make('facebook_url')
                                    ->label('Facebook URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->placeholder('https://facebook.com/yourpage'),
                                Forms\Components\TextInput::make('twitter_url')
                                    ->label('Twitter/X URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->placeholder('https://twitter.com/yourhandle'),
                                Forms\Components\TextInput::make('instagram_url')
                                    ->label('Instagram URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->placeholder('https://instagram.com/yourhandle'),
                                Forms\Components\TextInput::make('linkedin_url')
                                    ->label('LinkedIn URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->placeholder('https://linkedin.com/company/yourcompany'),
                            ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Advanced')
                            ->icon('heroicon-o-code-bracket')
                            ->schema([
                                Forms\Components\Textarea::make('google_analytics')
                                    ->label('Google Analytics Code')
                                    ->rows(5)
                                    ->helperText('Paste your Google Analytics tracking code here')
                                    ->placeholder('<!-- Google Analytics Code -->'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Save Settings')
                ->submit('save'),
        ];
    }
}
