<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookSubCategoryResource\Pages;
use App\Filament\Resources\BookSubCategoryResource\RelationManagers;
use App\Models\BookCategory;
use App\Models\BookSubCategory;
use Exception;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookSubCategoryResource extends Resource
{
    protected static ?string $model = BookSubCategory::class;
    protected static ?string $navigationGroup = 'Book';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
  
  
    protected static ?string $navigationLabel = "Sub Categories";
 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->options(BookCategory::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')->label('Parent Category Name')
                    ->searchable(isIndividual: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')->label("Sub Category Name")
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->action(function ($record,$action){
                    try {
                        $record->delete();
                        Notification::make()
                            ->title('Deletion Successful')
                            ->body('The record has been deleted successfully.')
                            ->success()
                            ->send();
                    } catch (Exception $e) {
                        if ($e->getCode() == 23000) { // SQLSTATE code for integrity constraint violation
                            Notification::make()
                                ->title('Deletion Request Denied')
                                ->body('Unable to delete the record due to a foreign key constraint violation. To Delete this Sub Category  You Have To Delete Books Of this Category First')
                                ->danger()
                                ->send();
                        } else {
                            Notification::make()
                                ->title('Deletion Request Denied')
                                ->body('Unable to delete the record due to a database error: ' . $e->getCode())
                                ->danger()
                                ->send();
                        }
                    }
                }),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->action(function ($record,$action){
                        try {
                            $record->delete();
    
                            Notification::make()
                                ->title('Deletion Successful')
                                ->body('The record has been deleted successfully.')
                                ->success()
                                ->send();
                        } catch (Exception $e) {
                            if ($e->getCode() == 23000) { // SQLSTATE code for integrity constraint violation
                                Notification::make()
                                    ->title('Deletion Request Denied')
                                    ->body('Unable to delete the record due to a foreign key constraint violation. To Delete this Sub Category  You Have To Delete Books Of this Category First')
                                    ->danger()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title('Deletion Request Denied')
                                    ->body('Unable to delete the record due to a database error: ' . $e->getCode())
                                    ->danger()
                                    ->send();
                            }
                        }
                    }),
                ]),
            ])->searchDebounce('750ms');
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
            'index' => Pages\ListBookSubCategories::route('/'),
            'create' => Pages\CreateBookSubCategory::route('/create'),
            'edit' => Pages\EditBookSubCategory::route('/{record}/edit'),
        ];
    }
}
