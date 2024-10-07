<?php

namespace App\Filament\Resources\UserAddressResource\Pages;

use App\Filament\Resources\UserAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserAddress extends CreateRecord
{
    protected static string $resource = UserAddressResource::class;
}
