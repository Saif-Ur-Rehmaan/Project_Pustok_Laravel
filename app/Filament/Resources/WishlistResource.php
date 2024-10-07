<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WishlistResource\Pages;
use App\Filament\Resources\WishlistResource\RelationManagers;
use App\Models\Book;
use App\Models\User;
use App\Models\Wishlist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WishlistResource extends Resource
{
    protected static ?string $model = Wishlist::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('book_id')
                    ->required()->searchable()
                    ->options(Book::all()->pluck('title','id')),

                Forms\Components\Select::make('user_id')
                    ->required()->searchable()
                    ->options(User::all()->pluck('displayName','id')),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.displayName')
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('book.title')
                    ->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()->sortable()->searchable(),
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
            'index' => Pages\ListWishlists::route('/'),
            'create' => Pages\CreateWishlist::route('/create'),
            'edit' => Pages\EditWishlist::route('/{record}/edit'),
        ];
    }
}
