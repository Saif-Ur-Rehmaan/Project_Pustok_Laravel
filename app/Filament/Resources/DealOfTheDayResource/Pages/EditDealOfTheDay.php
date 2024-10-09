<?php

namespace App\Filament\Resources\DealOfTheDayResource\Pages;

use App\Filament\Resources\DealOfTheDayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDealOfTheDay extends EditRecord
{
    protected static string $resource = DealOfTheDayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
