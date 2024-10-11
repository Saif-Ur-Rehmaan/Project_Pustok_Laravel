<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserOrderResource\Pages;
use App\Filament\Resources\UserOrderResource\RelationManagers;
use App\Models\UserOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserOrderResource extends Resource
{
    protected static ?string $model = UserOrder::class;
    protected static ?string $navigationGroup = 'Orders';
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel =  "Orders";
     
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // User Information Fieldset
            Forms\Components\Fieldset::make('User Information')
                ->schema([
                    Forms\Components\Select::make('user_id')
                        ->label('User')
                        ->relationship('user', 'displayName')
                        ->required()
                        ->disabledOn('edit')
                        ->placeholder('Select a user'),
    
                    Forms\Components\TextInput::make('firstName')
                        ->label('First Name')
                        ->required()
                        ->placeholder('Enter first name'),
    
                    Forms\Components\TextInput::make('lastName')
                        ->label('Last Name')
                        ->required()
                        ->placeholder('Enter last name'),
    
                    Forms\Components\TextInput::make('contactNumber')
                        ->label('Contact Number')
                        ->tel()
                        ->required()
                        ->placeholder('Enter contact number'),
    
                    Forms\Components\TextInput::make('address')
                        ->label('Address')
                        ->required()
                        ->placeholder('Enter address'),
    
                    Forms\Components\TextInput::make('countryName')
                        ->label('Country Name')
                        ->required()
                        ->placeholder('Enter country name'),
    
                    Forms\Components\TextInput::make('cityName')
                        ->label('City Name')
                        ->required()
                        ->placeholder('Enter city name'),
    
                    Forms\Components\TextInput::make('stateName')
                        ->label('State Name')
                        ->required()
                        ->placeholder('Enter state name'),
    
                    Forms\Components\TextInput::make('zipCode')
                        ->label('ZIP Code')
                        ->required()
                        ->placeholder('Enter ZIP code'),
                ]),
    
            // Order Details Fieldset
            Forms\Components\Fieldset::make('Order Details')
                ->schema([
                    Forms\Components\Select::make('book_id')
                        ->label('Book')
                        ->relationship('book', 'title')
                        ->required()
                        ->disabledOn('edit')
                        ->placeholder('Select a book'),
    
                    Forms\Components\Select::make('orderStatus')
                        ->label('Order Status')
                        ->options([
                            'pending' => 'Pending',
                            'completed' => 'Completed',
                            'canceled' => 'Canceled',
                        ])
                        ->required()
                        ->placeholder('Select order status'),
    
                    Forms\Components\TextInput::make('Code')
                        ->label('Order Code')
                        ->required()
                        ->placeholder('Enter order code'),
    
                    Forms\Components\TextInput::make('quantity')
                        ->label('Quantity')
                        ->numeric()
                        ->required()
                        ->placeholder('Enter quantity'),
    
                    Forms\Components\TextInput::make('pricePerProduct')
                        ->label('Price Per Product')
                        ->numeric()
                        ->required()
                        ->placeholder('Enter price per product'),
    
                    Forms\Components\TextInput::make('shippingFee')
                        ->label('Shipping Fee')
                        ->numeric()
                        ->required()
                        ->placeholder('Enter shipping fee'),
            ]),
        
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // User column
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
                    ->searchable()->copyable()->tooltip('Copy Order Code'),

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
            ]) 
            ->filters([
                // Add any filters you need here
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListUserOrders::route('/'),
            'create' => Pages\CreateUserOrder::route('/create'),
            'edit' => Pages\EditUserOrder::route('/{record}/edit'),
        ];
    }
}
