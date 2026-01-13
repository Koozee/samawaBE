<?php

namespace App\Filament\Resources\WeddingTestimonials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class WeddingTestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->default('—')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('weddingPackage.name')
                    ->label('Paket')
                    ->default('—')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('message')
                    ->label('Pesan')
                    ->default('—')
                    ->limit(50)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('occupation')
                    ->label('Pekerjaan')
                    ->default('—')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->default('—')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
