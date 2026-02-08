<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotificationResource\Pages;
use App\Filament\Resources\NotificationResource\RelationManagers;
use App\Models\Notification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    protected static ?string $navigationLabel = 'Popups';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Notification Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->label('Title'),
                        Forms\Components\Textarea::make('message')
                            ->required()
                            ->rows(3)
                            ->label('Message'),
                        Forms\Components\Select::make('type')
                            ->options([
                                'info' => 'Info',
                                'success' => 'Success',
                                'warning' => 'Warning',
                                'error' => 'Error',
                            ])
                            ->default('info')
                            ->required()
                            ->label('Type'),
                    ])->columns(1),

                Forms\Components\Section::make('Display Settings')
                    ->schema([
                        Forms\Components\Select::make('position')
                            ->options([
                                'top' => 'Top of Page',
                                'center' => 'Center (Modal)',
                                'bottom' => 'Bottom of Page',
                            ])
                            ->default('top')
                            ->required()
                            ->label('Position'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Is Active')
                            ->default(true)
                            ->helperText('Toggle to activate/deactivate this notification'),
                        Forms\Components\Toggle::make('show_close_button')
                            ->label('Show Close Button')
                            ->default(true)
                            ->helperText('Allow users to close the notification'),
                        Forms\Components\TextInput::make('auto_close_seconds')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(60)
                            ->label('Auto Close After (seconds)')
                            ->helperText('Leave empty to disable auto-close'),
                    ])->columns(2),

                Forms\Components\Section::make('Call to Action (Optional)')
                    ->schema([
                        Forms\Components\TextInput::make('button_text')
                            ->maxLength(255)
                            ->label('Button Text')
                            ->placeholder('Learn More'),
                        Forms\Components\TextInput::make('button_url')
                            ->url()
                            ->maxLength(255)
                            ->label('Button URL')
                            ->placeholder('https://example.com'),
                    ])->columns(2),

                Forms\Components\Section::make('Schedule (Optional)')
                    ->schema([
                        Forms\Components\DateTimePicker::make('start_date')
                            ->label('Start Date')
                            ->helperText('When to start showing this notification'),
                        Forms\Components\DateTimePicker::make('end_date')
                            ->label('End Date')
                            ->helperText('When to stop showing this notification'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary' => 'info',
                        'success' => 'success',
                        'warning' => 'warning',
                        'danger' => 'error',
                    ]),
                Tables\Columns\BadgeColumn::make('position')
                    ->colors([
                        'secondary' => 'top',
                        'primary' => 'center',
                        'info' => 'bottom',
                    ]),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'info' => 'Info',
                        'success' => 'Success',
                        'warning' => 'Warning',
                        'error' => 'Error',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotifications::route('/'),
            'create' => Pages\CreateNotification::route('/create'),
            'edit' => Pages\EditNotification::route('/{record}/edit'),
        ];
    }
}
