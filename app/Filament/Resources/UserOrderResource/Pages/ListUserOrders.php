<?php

namespace App\Filament\Resources\UserOrderResource\Pages;

use App\Filament\Resources\UserOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserOrders extends ListRecords
{
    protected static string $resource = UserOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
