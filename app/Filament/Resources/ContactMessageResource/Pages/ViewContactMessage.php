<?php

namespace App\Filament\Resources\ContactMessageResource\Pages;

use App\Filament\Resources\ContactMessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\IconEntry;
use Filament\Support\Colors\Color;

class ViewContactMessage extends ViewRecord
{
    protected static string $resource = ContactMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mark_as_read')
                ->label('Mark as Read')
                ->icon('heroicon-o-envelope-open')
                ->color('success')
                ->visible(fn() => !$this->record->is_read)
                ->action(function () {
                    $this->record->markAsRead();
                    $this->refreshFormData(['is_read', 'read_at']);
                }),

            Actions\Action::make('mark_as_unread')
                ->label('Mark as Unread')
                ->icon('heroicon-o-envelope')
                ->color('warning')
                ->visible(fn() => $this->record->is_read)
                ->action(function () {
                    $this->record->markAsUnread();
                    $this->refreshFormData(['is_read', 'read_at']);
                }),

            Actions\Action::make('reply')
                ->label('Reply')
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('info')
                ->url(fn() => "mailto:{$this->record->email}?subject=Reply to: {$this->record->subject}")
                ->openUrlInNewTab(),

            Actions\DeleteAction::make()
                ->label('Delete'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Sender Information')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Name')
                            ->icon('heroicon-o-user')
                            ->copyable(),

                        TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-o-envelope')
                            ->copyable()
                            ->url(fn($record) => "mailto:{$record->email}"),

                        TextEntry::make('subject')
                            ->label('Subject')
                            ->icon('heroicon-o-document-text')
                            ->copyable(),
                    ])
                    ->columns(2),

                Section::make('Message Content')
                    ->schema([
                        TextEntry::make('message')
                            ->label('Message')
                            ->prose()
                            ->columnSpanFull(),
                    ]),

                Section::make('Message Information')
                    ->schema([
                        IconEntry::make('is_read')
                            ->label('Read Status')
                            ->boolean()
                            ->trueIcon('heroicon-o-envelope-open')
                            ->falseIcon('heroicon-o-envelope')
                            ->trueColor('success')
                            ->falseColor('warning'),

                        TextEntry::make('created_at')
                            ->label('Sent At')
                            ->dateTime('Y-m-d H:i:s')
                            ->since(),

                        TextEntry::make('read_at')
                            ->label('Read At')
                            ->dateTime('Y-m-d H:i:s')
                            ->placeholder('Unread'),
                    ])
                    ->columns(3),
            ]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Mark message as read when opened
        if (!$this->record->is_read) {
            $this->record->markAsRead();
        }

        return $data;
    }
}
