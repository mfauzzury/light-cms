<?php

namespace App\Filament\Widgets;

use App\Models\Content;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class DraftsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 4;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Drafts Needing Attention')
            ->query(
                Content::query()
                    ->where('status', 'draft')
                    ->where('updated_at', '<', now()->subDays(7))
                    ->orderBy('updated_at')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->url(fn (Content $record): string =>
                        $record->type === 'post'
                            ? route('filament.admin.resources.posts.edit', $record)
                            : route('filament.admin.resources.pages.edit', $record)
                    ),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->description(fn (Content $record): string =>
                        $record->updated_at->diffForHumans()
                    )
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->sortable(),
            ])
            ->emptyStateHeading('No stale drafts')
            ->emptyStateDescription('Drafts older than 7 days will appear here')
            ->paginated(false);
    }
}
