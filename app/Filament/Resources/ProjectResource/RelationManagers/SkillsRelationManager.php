<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SkillsRelationManager extends RelationManager
{
    protected static string $relationship = 'skills';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id')
                    ->label('Skill')
                    ->relationship('skills', 'name_en')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name_en')
            ->columns([
                Tables\Columns\TextColumn::make('name_en')
                    ->label('Skill Name (English)')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('name_ar')
                    ->label('Skill Name (Arabic)')
                    ->searchable()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('projects_count')
                    ->label('Used in Projects')
                    ->counts('projects')
                    ->badge()
                    ->color('info'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->label('Add Skill')
                    ->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
