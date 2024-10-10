<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderPaymentResource\Pages;
use App\Filament\Resources\OrderPaymentResource\RelationManagers;
use App\Models\OrderPayment;
use App\Models\PaymentMethod;
use App\Models\UserOrder;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderPaymentResource extends Resource
{
    protected static ?string $model = OrderPayment::class;
    protected static ?string $navigationGroup = 'Orders';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Details")->schema([
                    Forms\Components\Select::make('payment_method_id')
                        ->required()
                        ->options(PaymentMethod::all()->where('status', 'Allowed')->pluck('name', 'id')),
                    Forms\Components\Select::make('order_Code')
                        ->required()->options(UserOrder::all()->where('orderStatus', '!=', 'Delivered')->unique('Code')->pluck('Code', "Code"))->searchable(),
                    Forms\Components\TextInput::make('amount')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('currency')
                        ->required()
                        ->maxLength(3)
                        ->default('USD'),
                    Forms\Components\TextInput::make('payment_status')
                        ->required()
                        ->maxLength(255)
                        ->default('pending'),
                ])->collapsible(),
                Section::make('For Online Payment')->schema([
                    Forms\Components\TextInput::make('transaction_id')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('payment_details'),
                    Forms\Components\DateTimePicker::make('paid_at'),

                ])->collapsible()->collapsed()
            ]) ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('paymentMethod.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_Code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transaction_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paid_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListOrderPayments::route('/'),
            'create' => Pages\CreateOrderPayment::route('/create'),
            'edit' => Pages\EditOrderPayment::route('/{record}/edit'),
        ];
    }
}
