<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderNoteResource\Pages;
use App\Filament\Resources\OrderNoteResource\RelationManagers;
use App\Models\OrderNote;
use App\Models\UserOrder; 
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action ;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderNoteResource extends Resource
{
    protected static ?string $model = OrderNote::class;
    protected static ?string $navigationGroup = 'Orders';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('Note')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([ 
                TextColumn::make('id') ,
                TextColumn::make('Code')->getStateUsing(function($record){

                    $code=UserOrder::where('orderNote_id',$record->id)->first();
                    $code=$code?$code->Code:'';
                    return $code;

                })->placeholder('No Code Found') ,   
                TextColumn::make('Note'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListOrderNotes::route('/'),
          
        ];
    }
}
