<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers; 
use App\Models\BookSubCategory;
use App\Models\User;
use App\Models\UserOrder;
use App\Models\UserRole;
use Doctrine\DBAL\Query\QueryException;
use Exception;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Events\QueryExecuted;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'User';
    protected static ?int $navigationSort = 1;


    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->label('User Image')
                    ->required()
                    ->image()
                    ->columnSpanFull()
                    ->directory('UserProfilePics'),

                Section::make('Basic Information About User')->schema([
                    Select::make('role_id')
                        ->options(UserRole::all()->pluck('name', 'id'))
                        ->required(),
                    TextInput::make('displayName')->required()
                        ->maxLength(255),
                    TextInput::make('email')->required()
                        ->email()
                        ->required()
                        ->maxLength(255),
                    TextInput::make('password')->required()->disabledOn('edit')
                        ->password()
                        ->maxLength(255),
                ])->collapsible()->columns(2)->description('Every Field Is Required To Create A New User '),
                Section::make('Extra Information About User')->schema([
                    TextInput::make('firstName')
                        ->maxLength(255),
                    TextInput::make('lastName')
                        ->maxLength(255),
                    TextInput::make('provider')
                        ->maxLength(255),
                    TextInput::make('providerId')
                        ->maxLength(255),
                    DateTimePicker::make('email_verified_at'),
                ])->collapsible()->collapsed()->description('Providing These Information is Good But Not Required')
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('role.name')
                    ->numeric()
                    ->sortable()
                    ->label("Role")
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'user' => 'success',
                        'admin' => 'warning',
                        'writer' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('displayName')
                    ->searchable()
                    ->label("Full Name"),
                Tables\Columns\TextColumn::make('firstName')
                    ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('lastName')
                    ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('provider')
                    ->searchable()
                    ->placeholder('No Provider'),
                Tables\Columns\TextColumn::make('providerId')
                    ->searchable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->copyable()
                    ->tooltip('Click To Copy Email'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
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
                Tables\Actions\DeleteAction::make()->action(function ($record, $action) {
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
                                ->body('Unable to delete the record due to a foreign key constraint violation. To Delete User You Have To Delete User Orders First')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
