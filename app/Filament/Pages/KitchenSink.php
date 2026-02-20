<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class KitchenSink extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $navigationLabel = 'Kitchen Sink';

    protected static ?string $title = 'UI Kitchen Sink';

    protected static ?string $navigationGroup = 'Site Miscellaneous';

    protected static ?int $navigationSort = 101;

    protected static string $view = 'filament.pages.kitchen-sink';
}
