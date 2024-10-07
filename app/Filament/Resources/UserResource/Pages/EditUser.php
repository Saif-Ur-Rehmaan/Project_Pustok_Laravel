<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Exception;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->action(function ($record,$action){
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
        ];
    }
}
