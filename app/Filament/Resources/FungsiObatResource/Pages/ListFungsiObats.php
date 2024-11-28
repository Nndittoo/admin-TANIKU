<?php

namespace App\Filament\Resources\FungsiObatResource\Pages;

use App\Filament\Resources\FungsiObatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFungsiObats extends ListRecords
{
    protected static string $resource = FungsiObatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
