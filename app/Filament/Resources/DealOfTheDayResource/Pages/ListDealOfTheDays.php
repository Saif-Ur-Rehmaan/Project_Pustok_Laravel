<?php

namespace App\Filament\Resources\DealOfTheDayResource\Pages;

use App\Filament\Resources\DealOfTheDayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDealOfTheDays extends ListRecords
{
    protected static string $resource = DealOfTheDayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
