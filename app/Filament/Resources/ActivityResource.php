<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Activitylog\Models\Activity;

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
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject_type')
                    ->label('Type')
                    ->formatStateUsing(fn (string $state): string =>
                        class_basename($state)
                    )
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject.title')
                    ->label('Subject')
                    ->placeholder('—')
                    ->limit(50),
                Tables\Columns\TextColumn::make('causer.name')
                    ->label('User')
                    ->placeholder('System')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
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
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->iconButton()
                    ->tooltip('View Details'),
            ]);
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
