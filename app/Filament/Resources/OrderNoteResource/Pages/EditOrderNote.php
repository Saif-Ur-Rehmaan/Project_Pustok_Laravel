<?php

namespace App\Filament\Resources\OrderNoteResource\Pages;

use App\Filament\Resources\OrderNoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderNote extends EditRecord
{
    protected static string $resource = OrderNoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
