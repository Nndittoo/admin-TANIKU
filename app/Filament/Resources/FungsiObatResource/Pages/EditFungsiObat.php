<?php

namespace App\Filament\Resources\FungsiObatResource\Pages;

use App\Filament\Resources\FungsiObatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFungsiObat extends EditRecord
{
    protected static string $resource = FungsiObatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
