<?php

namespace App\Filament\Resources\BookSubCategoryResource\Pages;

use App\Filament\Resources\BookSubCategoryResource;
use Exception;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditBookSubCategory extends EditRecord
{
    protected static string $resource = BookSubCategoryResource::class;

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
        ];
    }
}
