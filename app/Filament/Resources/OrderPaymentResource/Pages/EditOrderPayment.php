<?php

namespace App\Filament\Resources\OrderPaymentResource\Pages;

use App\Filament\Resources\OrderPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderPayment extends EditRecord
{
    protected static string $resource = OrderPaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
