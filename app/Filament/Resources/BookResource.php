<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use App\Models\BookSubCategory;
use App\Models\User;
use App\Models\UserRole;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables; 
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->label('Book Image')->required()->image()->columnSpanFull()->directory('BookImages')->columnSpanFull(),
                Section::make('About Author And Book Category')->schema([
                    Forms\Components\Select::make('author_id')->label('Author')->required()->options(User::all()->where('role_id', '3')->pluck('displayName', 'id')), //3 = writer
                    Forms\Components\Select::make('subcategory_id')->label('Sub Category')->required()->options(BookSubCategory::all()->pluck('name', 'id')),
                    Forms\Components\TextInput::make('title')->required()->maxLength(255),
                    Forms\Components\TextInput::make('brand')->maxLength(255)->required(),
                    Forms\Components\TextInput::make('manufacturer')->maxLength(255)->required(),
                    Forms\Components\TextInput::make('productCode')->maxLength(255)->required(),
                    Forms\Components\TextInput::make('RewardPoints')->required()->numeric()->default(0)->columnSpan(1),
                    Forms\Components\Select::make('availability')->required()->options(['In Stock', 'Out of Stock', 'Pre-order'])->required(),
                ])->columnSpan(2)->columns(2),
                Section::make('Meta Data')->schema([
                    Forms\Components\Toggle::make('isFeatured')->required()->columnSpan(2),
                    Forms\Components\ColorPicker::make('color')->columnSpan(1)->required(),
                    Forms\Components\TextInput::make('extax')->numeric()->required(),
                    Forms\Components\TextInput::make('priceInUSD')->numeric()->required(),
                    Forms\Components\TextInput::make('discountPercent')->required(),
                    Forms\Components\TagsInput::make('tags')->columnSpanFull()->placeholder('Enter tag Name and hit enter '),
                ])->columnSpan(1)->columns(2),
                Section::make('Book Description And Summary')->schema([
                    Forms\Components\Textarea::make('productDescription')->maxLength(65535)->columnSpan(1),
                    Forms\Components\Textarea::make('productSummary')->maxLength(65535)->columnSpan(1),
                ])->columns(2),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                // Inside your Table Column definition
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->url(fn ($record) => url('storage/userimages/' . $record->image))
                    ->extraAttributes(['style' => 'height: 2.5rem; width: 2.5rem;'])
                    ->label('User Image'),
                
                Tables\Columns\TextColumn::make('author.displayName')->toggleable()->toggledHiddenByDefault()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subCategory.name')->toggleable()->toggledHiddenByDefault()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')->toggleable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('isFeatured')->toggleable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('extax')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('priceInUSD')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discountPercent'),
                Tables\Columns\TextColumn::make('manufacturer')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('RewardPoints')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('productCode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('availability')
                    ->searchable(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
