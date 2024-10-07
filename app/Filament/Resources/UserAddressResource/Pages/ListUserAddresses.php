<?php

namespace App\Filament\Resources\UserAddressResource\Pages;

use App\Filament\Resources\UserAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserAddresses extends ListRecords
{
    protected static string $resource = UserAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
