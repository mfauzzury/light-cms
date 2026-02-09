<?php

namespace App\Providers\Filament;

use App\Filament\Pages\ManageSettings;
use App\Filament\Widgets\ContentStatsWidget;
use App\Filament\Widgets\DraftsWidget;
use App\Filament\Widgets\RecentContentWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Support\Facades\Blade;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function boot(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_START,
            fn (): string => Blade::render('@if(setting("site_favicon"))
                <link rel="icon" type="image/png" href="{{ asset("storage/" . setting("site_favicon")) }}">
            @endif'),
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            fn (): string => Blade::render('<style>
                /* Use system fonts instead of Bunny Fonts */
                * {
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
                }

                /* White backgrounds */
                .fi-body, .fi-main, .fi-sidebar, .fi-sidebar-nav { background-color: white !important; }
                .fi-page { background: white !important; }
                .fi-ta-content, .fi-wi-stats-overview { background: white !important; }
                .fi-fo-section-content { background: white !important; }
                .fi-section, .fi-card { background: white !important; }
                .bg-gray-50 { background-color: white !important; }
                .bg-gray-100 { background-color: #f9fafb !important; }

                /* Brand name with subtitle */
                .fi-sidebar-header .fi-logo {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start !important;
                    gap: 0 !important;
                }

                .fi-sidebar-header .fi-logo::after {
                    content: "by Araken";
                    font-size: 0.625rem;
                    font-weight: 400;
                    color: #6b7280;
                    margin-top: -0.25rem;
                }

                /* Sidebar border and no scroll */
                .fi-sidebar {
                    border-right: 1px solid #e5e7eb !important;
                    overflow: visible !important;
                }

                /* Remove scrolling from sidebar content */
                .fi-sidebar-nav,
                .fi-sidebar > div {
                    overflow: visible !important;
                    overflow-y: visible !important;
                }

                /* Ultra-compact sidebar navigation */
                .fi-sidebar-nav {
                    padding: 0.25rem !important;
                    gap: 0 !important;
                }

                /* Ultra-compact menu items - minimal gaps */
                .fi-sidebar-item,
                .fi-sidebar-item-button,
                nav[role="navigation"] > ul > li,
                .fi-sidebar ul li,
                .fi-sidebar li {
                    padding: 0.15rem 0.3rem !important;
                    margin: 0 !important;
                    gap: 0.33rem !important;
                }

                /* Extra compact link/button elements */
                .fi-sidebar-item-button,
                .fi-sidebar-item a,
                .fi-sidebar-item button {
                    padding-top: 0.15rem !important;
                    padding-bottom: 0.15rem !important;
                    font-size: 0.875rem !important;
                    line-height: 1.2rem !important;
                    min-height: 1.75rem !important;
                }

                /* Compact group labels - very close to their items */
                .fi-sidebar-group-label {
                    padding: 0.15rem 0.3rem 0 0.3rem !important;
                    font-size: 0.75rem !important;
                    margin-top: 0.75rem !important;
                    margin-bottom: 0 !important;
                }

                /* First item after group label - no gap */
                .fi-sidebar-group-label + * {
                    margin-top: 0 !important;
                    padding-top: 0 !important;
                }

                /* Remove ALL extra spacing */
                .fi-sidebar-group,
                .fi-sidebar-group-items,
                .fi-sidebar ul,
                nav[role="navigation"] ul {
                    margin: 0 !important;
                    padding: 0 !important;
                    gap: 0 !important;
                }

                /* Zero gap between items */
                .fi-sidebar li + li,
                .fi-sidebar-item + .fi-sidebar-item,
                nav[role="navigation"] li + li {
                    margin-top: 0 !important;
                    margin-bottom: 0 !important;
                }

                /* More gap at top for first item (Dashboard only) */
                .fi-sidebar-nav > ul > li:first-child:not(.fi-sidebar-group) {
                    margin-top: 0.75rem !important;
                }

                /* JSON Editor - Code Editor Style */
                textarea[data-field-wrapper-label*="Template Data"],
                textarea[id*="template_data"] {
                    background-color: #1e1e1e !important;
                    color: #d4d4d4 !important;
                    font-family: "Monaco", "Menlo", "Ubuntu Mono", "Consolas", "source-code-pro", monospace !important;
                    font-size: 13px !important;
                    line-height: 1.6 !important;
                    padding: 16px !important;
                    border: 1px solid #3e3e3e !important;
                    border-radius: 6px !important;
                    tab-size: 2 !important;
                }

                /* JSON Editor - Focus state */
                textarea[data-field-wrapper-label*="Template Data"]:focus,
                textarea[id*="template_data"]:focus {
                    background-color: #252526 !important;
                    border-color: #007acc !important;
                    outline: none !important;
                    box-shadow: 0 0 0 3px rgba(0, 122, 204, 0.1) !important;
                }

                /* JSON Editor - Placeholder */
                textarea[data-field-wrapper-label*="Template Data"]::placeholder,
                textarea[id*="template_data"]::placeholder {
                    color: #6a737d !important;
                    opacity: 0.7 !important;
                }

                /* JSON Editor - Selection */
                textarea[data-field-wrapper-label*="Template Data"]::selection,
                textarea[id*="template_data"]::selection {
                    background-color: #264f78 !important;
                    color: #ffffff !important;
                }

                /* JSON Editor - Scrollbar */
                textarea[data-field-wrapper-label*="Template Data"]::-webkit-scrollbar,
                textarea[id*="template_data"]::-webkit-scrollbar {
                    width: 12px !important;
                    height: 12px !important;
                }

                textarea[data-field-wrapper-label*="Template Data"]::-webkit-scrollbar-track,
                textarea[id*="template_data"]::-webkit-scrollbar-track {
                    background: #1e1e1e !important;
                }

                textarea[data-field-wrapper-label*="Template Data"]::-webkit-scrollbar-thumb,
                textarea[id*="template_data"]::-webkit-scrollbar-thumb {
                    background: #424242 !important;
                    border-radius: 6px !important;
                }

                textarea[data-field-wrapper-label*="Template Data"]::-webkit-scrollbar-thumb:hover,
                textarea[id*="template_data"]::-webkit-scrollbar-thumb:hover {
                    background: #4e4e4e !important;
                }
            </style>'),
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::FOOTER,
            fn (): string => Blade::render('<div class="text-center py-4 text-sm text-gray-500">
                Light-CMS version 1.1
            </div>'),
        );
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Light-CMS')
            ->login()
            ->colors([
                'primary' => Color::Blue,
            ])
            ->font(false)
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('13rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
                ManageSettings::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                ContentStatsWidget::class,
                RecentContentWidget::class,
                DraftsWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
