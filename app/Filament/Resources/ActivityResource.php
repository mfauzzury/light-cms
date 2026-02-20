<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Activitylog\Models\Activity;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\DatePicker;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Activity Log';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 98;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label('Event')
                    ->badge()
                    ->size('sm')
                    ->color(fn (string $state): string => match (true) {
                        str_contains($state, 'created') => 'success',
                        str_contains($state, 'updated') => 'info',
                        str_contains($state, 'deleted') => 'danger',
                        default => 'gray',
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject_type')
                    ->label('Type')
                    ->formatStateUsing(fn (string $state): string =>
                        class_basename($state)
                    )
                    ->badge()
                    ->size('sm')
                    ->color('primary')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.title')
                    ->label('Subject')
                    ->placeholder('—')
                    ->limit(25)
                    ->size('sm')
                    ->tooltip(function (Activity $record): ?string {
                        return $record->subject?->title;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('causer.name')
                    ->label('User')
                    ->placeholder('System')
                    ->icon('heroicon-m-user')
                    ->size('sm')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('When')
                    ->dateTime('M j, H:i')
                    ->size('sm')
                    ->sortable()
                    ->tooltip(fn (Activity $record): string =>
                        $record->created_at->format('F j, Y g:i:s A')
                    )
                    ->description(fn (Activity $record): string =>
                        $record->created_at->diffForHumans()
                    ),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('subject_type')
                    ->label('Type')
                    ->options([
                        'App\\Models\\Content' => 'Content',
                        'App\\Models\\User' => 'User',
                        'App\\Models\\Menu' => 'Menu',
                    ]),
                Tables\Filters\SelectFilter::make('event')
                    ->options([
                        'created' => 'Created',
                        'updated' => 'Updated',
                        'deleted' => 'Deleted',
                    ])
                    ->query(function ($query, $state) {
                        if ($state['value']) {
                            return $query->where('description', 'like', '%' . $state['value'] . '%');
                        }
                    }),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')
                            ->label('From Date'),
                        DatePicker::make('until')
                            ->label('Until Date'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($query, $date) =>
                                $query->whereDate('created_at', '>=', $date)
                            )
                            ->when($data['until'], fn ($query, $date) =>
                                $query->whereDate('created_at', '<=', $date)
                            );
                    }),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->iconButton()
                    ->size('sm')
                    ->tooltip('View Details'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->poll('30s')
            ->deferLoading()
            ->striped()
            ->defaultPaginationPageOption(50)
            ->extremePaginationLinks();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'view' => Pages\ViewActivity::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
