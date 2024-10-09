<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Filament\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;
    protected static ?string $navigationGroup = 'Deal';

    protected static ?string $navigationIcon = 'heroicon-o-command-line';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('code')
                ->label('Coupon Code')
                ->required()->unique(),
                
            TextInput::make('discount')
                ->label('Discount')
                ->numeric()
                ->required(),
                
            Select::make('type')
                ->label('Discount Type')
                ->options([
                    'fixed' => 'Fixed Amount',
                    'discount' => 'Discount Percentage',
                ])
                ->required(),
                
            DatePicker::make('expiry_date')
                ->label('Expiry Date')
                ->default(null),
        ]);
    }

    public static function table(Table $table): Table
    { 
        return $table
        ->columns([
            TextColumn::make('code')
                ->label('Coupon Code')
                ->searchable()
                ->sortable(),
                
            TextColumn::make('discount')
                ->label('Discount')
                ->sortable(),
                
            TextColumn::make('type')
                ->label('Type')
              
                ->sortable(),
                
            TextColumn::make('expiry_date')
                ->label('Expiry Date')
                ->dateTime()->badge()
                ->color(fn($record) => Carbon::parse($record->expiry_date)->isPast() ? 'danger' : 'success')
                ->sortable()->placeholder('No Expire Date'),
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
