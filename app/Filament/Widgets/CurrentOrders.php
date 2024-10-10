<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\UserOrder;
use Carbon\Carbon;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class CurrentOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 2;
    protected static ?int  $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                UserOrder::where('orderStatus', 'Pending') 
            )
            ->columns([           
                TextColumn::make('user.displayName')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                // Book column
                TextColumn::make('book.title')
                    ->label('Book')
                    ->sortable()
                    ->searchable(),

                // Order status column
                TextColumn::make('orderStatus')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',       // Yellow for pending
                        'Processing' => 'info',       // Light blue for processing
                        'Shipped' => 'primary',       // Blue for shipped
                        'Delivered' => 'success',     // Green for delivered
                        'Cancelled' => 'danger',
                        default => ''
                    }),


                // Order code column
                TextColumn::make('Code')
                    ->label('Order Code')
                    ->sortable()
                    ->searchable(),

                // Quantity column
                ColumnGroup::make('Accounts')->columns([
                    TextColumn::make('quantity')
                        ->label('Quantity')
                        ->sortable()->toggleable(),
                    // Price per product column
                    TextColumn::make('pricePerProduct')
                        ->label('Price Per Product')
                        ->sortable()->toggleable(),
                    // Shipping fee column
                    TextColumn::make('shippingFee')
                        ->label('Shipping Fee')
                        ->sortable()->toggleable(),
                ])->wrapHeader()->alignCenter(),
                ColumnGroup::make('Shipping Info')->columns([
                    // First name column
                    TextColumn::make('firstName')
                        ->label('First Name')->toggleable()
                        ->sortable()
                        ->searchable(),

                    // Last name column
                    TextColumn::make('lastName')
                        ->label('Last Name')->toggleable()
                        ->sortable()
                        ->searchable(),

                    // Address column
                    TextColumn::make('address')
                        ->label('Address')->toggleable()
                        ->sortable()
                        ->searchable(),

                    // Country name column
                    TextColumn::make('countryName')
                        ->label('Country')->toggleable()
                        ->sortable()
                        ->searchable(),

                    // City name column
                    TextColumn::make('cityName')
                        ->label('City')->toggleable()
                        ->sortable()
                        ->searchable(),
                    // State name column
                    TextColumn::make('stateName')->toggleable()
                        ->label('State')
                        ->sortable()
                        ->searchable(),

                    // Zip code column
                    TextColumn::make('zipCode')->toggleable()
                        ->label('ZIP Code')
                        ->sortable()
                        ->searchable(),

                    // Contact number column
                    TextColumn::make('contactNumber')->toggleable()
                        ->label('Contact Number')
                        ->sortable()
                        ->searchable(),
                ])->alignCenter(),
            ]);
    }
}
