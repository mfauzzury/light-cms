<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use App\Models\Content;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class MenuItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Menu Items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Menu Item')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Text to display in the menu'),
                        Forms\Components\Select::make('parent_id')
                            ->label('Parent Item')
                            ->options(function (RelationManager $livewire) {
                                return MenuItem::where('menu_id', $livewire->ownerRecord->id)
                                    ->whereNull('parent_id')
                                    ->pluck('title', 'id');
                            })
                            ->searchable()
                            ->nullable()
                            ->helperText('Leave empty for top-level items'),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('content_id')
                                    ->label('Link to Content')
                                    ->options(Content::published()->orderBy('title')->pluck('title', 'id'))
                                    ->searchable()
                                    ->nullable()
                                    ->helperText('Link to an existing page/post')
                                    ->reactive()
                                    ->afterStateUpdated(fn ($set, $state) => $state ? $set('url', null) : null),
                                Forms\Components\TextInput::make('url')
                                    ->label('Custom URL')
                                    ->url()
                                    ->maxLength(255)
                                    ->nullable()
                                    ->helperText('Or enter a custom URL')
                                    ->disabled(fn (Forms\Get $get) => filled($get('content_id'))),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('target')
                                    ->options([
                                        '_self' => 'Same window',
                                        '_blank' => 'New window',
                                    ])
                                    ->default('_self')
                                    ->required(),
                                Forms\Components\TextInput::make('order')
                                    ->numeric()
                                    ->default(0)
                                    ->required()
                                    ->helperText('Lower numbers appear first'),
                            ]),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->width(80),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->description(fn (MenuItem $record): string =>
                        $record->content_id
                            ? 'Links to: ' . ($record->content->title ?? '')
                            : ($record->url ?? 'No link')
                    ),
                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Parent')
                    ->placeholder('—')
                    ->sortable(),
                Tables\Columns\TextColumn::make('target')
                    ->badge()
                    ->colors([
                        'primary' => '_self',
                        'warning' => '_blank',
                    ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Level')
                    ->options([
                        'null' => 'Top Level',
                        'not_null' => 'Sub Items',
                    ])
                    ->query(function ($query, $state) {
                        if ($state['value'] === 'null') {
                            return $query->whereNull('parent_id');
                        }
                        if ($state['value'] === 'not_null') {
                            return $query->whereNotNull('parent_id');
                        }
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Menu Item'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc')
            ->reorderable('order');
    }
}
