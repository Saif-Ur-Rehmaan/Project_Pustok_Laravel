<?php

namespace App\Filament\Resources\BookSubCategoryResource\Pages;

use App\Filament\Resources\BookSubCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookSubCategories extends ListRecords
{
    protected static string $resource = BookSubCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
