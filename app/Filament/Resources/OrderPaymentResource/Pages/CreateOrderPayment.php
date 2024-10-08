<?php

namespace App\Filament\Resources\OrderPaymentResource\Pages;

use App\Filament\Resources\OrderPaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderPayment extends CreateRecord
{
    protected static string $resource = OrderPaymentResource::class;
}
