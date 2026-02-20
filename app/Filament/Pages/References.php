<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class References extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'References';

    protected static ?string $title = 'Page Creation Guide';

    protected static ?string $navigationGroup = 'Site Miscellaneous';

    protected static ?int $navigationSort = 100;

    protected static string $view = 'filament.pages.references';
}
