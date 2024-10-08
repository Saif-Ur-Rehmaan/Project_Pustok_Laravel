<?php

namespace App\Filament\Resources\OrderNoteResource\Pages;

use App\Filament\Resources\OrderNoteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderNote extends CreateRecord
{
    protected static string $resource = OrderNoteResource::class;
}
