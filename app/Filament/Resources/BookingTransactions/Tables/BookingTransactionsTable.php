<?php

namespace App\Filament\Resources\BookingTransactions\Tables;

use App\Models\BookingTransaction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BookingTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking_trx_id')
                    ->label('TRX ID')
                    ->searchable(),
                ImageColumn::make('proof')
                    ->label('Bukti Bayar'),
                TextColumn::make('name')
                    ->label('Pelanggan')
                    ->description(fn(BookingTransaction $record): string => $record->email ?? '-')
                    ->searchable(),
                TextColumn::make('weddingPackage.name')
                    ->label('Paket'),

                TextColumn::make('total_amount')
                    ->label('Total Bayar')
                    ->money('IDR'),

                IconColumn::make('is_paid')
                    ->label('Sudah Bayar')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('started_at')
                    ->label('Tanggal Acara')
                    ->date(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
