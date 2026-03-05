<?php

namespace App\Filament\Resources\BookingTransactions\Schemas;

use App\Models\BookingTransaction;
use App\Models\WeddingPackage;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class BookingTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Product and Price')
                        ->schema([
                            Select::make('wedding_package_id')
                                ->label('Paket')
                                ->relationship('weddingPackage', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->live()
                                ->afterStateUpdated(function ($state, Set $set) {
                                    $weddingPackage = WeddingPackage::find($state);
                                    $tax = 0.11;
                                    if ($weddingPackage) {
                                        $set('price', $weddingPackage->price);
                                        $set('total_amount', $weddingPackage->price);
                                        $set('total_tax_amount', $weddingPackage->price * $tax);
                                    }
                                }),

                            TextInput::make('price')
                                ->label('Harga')
                                ->numeric()
                                ->readOnly()
                                ->prefix('IDR'),

                            TextInput::make('total_amount')
                                ->label('Total Bayar')
                                ->required()
                                ->numeric()
                                ->prefix('IDR'),

                            TextInput::make('total_tax_amount')
                                ->label('Pajak')
                                ->numeric()
                                ->readOnly()
                                ->prefix('IDR')
                                ->default(0),
                        ]),

                    Step::make('Customer')
                        ->schema([
                            TextInput::make('name')
                                ->label('Pelanggan')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->required()
                                ->maxLength(255),

                            TextInput::make('phone')
                                ->label('Telepon')
                                ->tel()
                                ->required()
                                ->maxLength(255),

                            DatePicker::make('started_at')
                                ->label('Tanggal Acara')
                                ->required(),
                        ]),

                    Step::make('Payment')
                        ->schema([
                            TextInput::make('booking_trx_id')
                                ->label('Transaction ID')
                                ->required()
                                ->readOnly()
                                ->default(fn() => BookingTransaction::generateUniqueBookingTrxId()),

                            Toggle::make('is_paid')
                                ->label('Sudah Bayar')
                                ->required(),

                            FileUpload::make('proof')
                                ->label('Bukti Bayar')
                                ->image(),
                        ]),
                ])
                    ->columnSpan('full')
            ]);
    }
}
