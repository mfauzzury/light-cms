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
                    ->schema([
                        Infolists\Components\TextEntry::make('description')
                            ->label('Event'),
                        Infolists\Components\TextEntry::make('subject_type')
                            ->label('Subject Type')
                            ->formatStateUsing(fn (string $state): string => class_basename($state)),
                        Infolists\Components\TextEntry::make('subject.title')
                            ->label('Subject')
                            ->placeholder('—'),
                        Infolists\Components\TextEntry::make('causer.name')
                            ->label('User')
                            ->placeholder('System'),
                        Infolists\Components\TextEntry::make('created_at')
                            ->dateTime(),
                    ]),
                Infolists\Components\Section::make('Changes')
                    ->schema([
                        Infolists\Components\KeyValueEntry::make('properties.attributes')
                            ->label('New Values')
                            ->placeholder('No data'),
                        Infolists\Components\KeyValueEntry::make('properties.old')
                            ->label('Old Values')
                            ->placeholder('No data'),
                    ]),
            ]);
    }
}
