<?php

namespace App\Filament\Resources\KiloResource\Pages;

use App\Filament\Resources\KiloResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKilos extends ListRecords
{
    protected static string $resource = KiloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
