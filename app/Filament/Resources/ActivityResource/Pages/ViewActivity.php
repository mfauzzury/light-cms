<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewActivity extends ViewRecord
{
    protected static string $resource = ActivityResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Activity Details')
                    ->columns(2)
                    ->compact()
                    ->schema([
                        Infolists\Components\TextEntry::make('description')
                            ->label('Event')
                            ->badge()
                            ->color(fn (string $state): string => match (true) {
                                str_contains($state, 'created') => 'success',
                                str_contains($state, 'updated') => 'info',
                                str_contains($state, 'deleted') => 'danger',
                                default => 'gray',
                            }),
                        Infolists\Components\TextEntry::make('subject_type')
                            ->label('Subject Type')
                            ->formatStateUsing(fn (string $state): string => class_basename($state))
                            ->badge()
                            ->color('primary'),
                        Infolists\Components\TextEntry::make('subject.title')
                            ->label('Subject')
                            ->placeholder('—')
                            ->icon('heroicon-m-document-text'),
                        Infolists\Components\TextEntry::make('causer.name')
                            ->label('Performed By')
                            ->placeholder('System')
                            ->icon('heroicon-m-user'),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Timestamp')
                            ->dateTime('F j, Y g:i:s A')
                            ->icon('heroicon-m-clock'),
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Time Ago')
                            ->formatStateUsing(fn ($state) => $state->diffForHumans())
                            ->icon('heroicon-m-calendar'),
                    ]),
                Infolists\Components\Section::make('Changes Details')
                    ->compact()
                    ->collapsible()
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\KeyValueEntry::make('properties.attributes')
                                    ->label('New Values')
                                    ->placeholder('No data')
                                    ->columnSpan(1),
                                Infolists\Components\KeyValueEntry::make('properties.old')
                                    ->label('Previous Values')
                                    ->placeholder('No data')
                                    ->columnSpan(1),
                            ]),
                    ]),
            ]);
    }
}
