<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Communication';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationBadgeTooltip = 'Unread Messages';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', false)->count() ?: null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        $unreadCount = static::getModel()::where('is_read', false)->count();

        if ($unreadCount > 10) {
            return Color::Red;
        } elseif ($unreadCount > 5) {
            return Color::Orange;
        } elseif ($unreadCount > 0) {
            return Color::Blue;
        }

        return null;
    }

    public static function getModelLabel(): string
    {
        return 'Contact Message';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Contact Messages';
    }

    public static function getNavigationLabel(): string
    {
        return 'Contact Messages';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Message Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('subject')
                            ->label('Subject')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('message')
                            ->label('Message')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Message Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_read')
                            ->label('Read')
                            ->default(false),

                        Forms\Components\DateTimePicker::make('read_at')
                            ->label('Read At')
                            ->readonly()
                            ->displayFormat('Y-m-d H:i:s'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
                    ->trueColor('success')
                    ->falseColor('warning')
                    ->tooltip(fn(ContactMessage $record): string => $record->is_read ? 'Read' : 'Unread'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->weight(fn(ContactMessage $record) => $record->is_read ? 'normal' : 'bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copied to clipboard')
                    ->weight(fn(ContactMessage $record) => $record->is_read ? 'normal' : 'bold'),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Subject')
                    ->limit(50)
                    ->searchable()
                    ->sortable()
                    ->weight(fn(ContactMessage $record) => $record->is_read ? 'normal' : 'bold'),

                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(100)
                    ->wrap()
                    ->searchable()
                    ->weight(fn(ContactMessage $record) => $record->is_read ? 'normal' : 'bold'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Sent At')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->since()
                    ->weight(fn(ContactMessage $record) => $record->is_read ? 'normal' : 'bold'),

                Tables\Columns\TextColumn::make('read_at')
                    ->label('Read At')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->placeholder('Unread')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('is_read')
                    ->label('Read Status')
                    ->options([
                        '0' => 'Unread',
                        '1' => 'Read',
                    ])
                    ->placeholder('All Messages'),

                Filter::make('created_at')
                    ->label('Sent Date')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('From Date'),
                        Forms\Components\DatePicker::make('until')
                            ->label('To Date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('mark_as_read')
                    ->label('Mark as Read')
                    ->icon('heroicon-o-envelope-open')
                    ->color('success')
                    ->visible(fn(ContactMessage $record) => !$record->is_read)
                    ->action(function (ContactMessage $record) {
                        $record->markAsRead();
                        Notification::make()
                            ->title('Marked as read')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\Action::make('mark_as_unread')
                    ->label('Mark as Unread')
                    ->icon('heroicon-o-envelope')
                    ->color('warning')
                    ->visible(fn(ContactMessage $record) => $record->is_read)
                    ->action(function (ContactMessage $record) {
                        $record->markAsUnread();
                        Notification::make()
                            ->title('Marked as unread')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\Action::make('reply')
                    ->label('Reply')
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->color('info')
                    ->url(fn(ContactMessage $record) => "mailto:{$record->email}?subject=Re: {$record->subject}")
                    ->openUrlInNewTab(),

                Tables\Actions\ViewAction::make()
                    ->label('View'),

                Tables\Actions\DeleteAction::make()
                    ->label('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('mark_as_read')
                    ->label('Mark as Read')
                    ->icon('heroicon-o-envelope-open')
                    ->color('success')
                    ->action(function ($records) {
                        $records->each->markAsRead();
                        Notification::make()
                            ->title('All selected messages marked as read')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\BulkAction::make('mark_as_unread')
                    ->label('Mark as Unread')
                    ->icon('heroicon-o-envelope')
                    ->color('warning')
                    ->action(function ($records) {
                        $records->each->markAsUnread();
                        Notification::make()
                            ->title('All selected messages marked as unread')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\DeleteBulkAction::make()
                    ->label('Delete Selected'),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50])
            ->poll('30s'); // Auto refresh every 30 seconds
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
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Prevent creating new messages from admin panel
    }
}
