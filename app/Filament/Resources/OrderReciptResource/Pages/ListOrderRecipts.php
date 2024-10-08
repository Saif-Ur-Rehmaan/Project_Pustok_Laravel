<?php

namespace App\Filament\Resources\OrderReciptResource\Pages;

use App\Filament\Resources\OrderReciptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderRecipts extends ListRecords
{
    protected static string $resource = OrderReciptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
