<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DealOfTheDayResource\Pages;
use App\Filament\Resources\DealOfTheDayResource\RelationManagers;
use App\Models\Book;
use App\Models\DealOfTheDay;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DealOfTheDayResource extends Resource
{
    protected static ?string $model = DealOfTheDay::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('book_id')
                    ->required()->options(Book::all()->pluck('title','id'))
                    ->searchable(),
                Forms\Components\DateTimePicker::make('expireDate')->afterOrEqual(Carbon::now()->day())->default(Carbon::now()->addDay()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('book.title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('expireDate')
                    ->badge()->label('Expire Date And Time')
                    ->dateTime()->color(fn($record)=>  Carbon::parse($record->expireDate)->isPast()?'danger':'success')
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
            ])->defaultSort('expireDate');
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
            'index' => Pages\ListDealOfTheDays::route('/'),
            'create' => Pages\CreateDealOfTheDay::route('/create'),
            'edit' => Pages\EditDealOfTheDay::route('/{record}/edit'),
        ];
    }
}
