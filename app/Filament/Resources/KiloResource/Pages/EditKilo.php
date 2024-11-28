<?php

namespace App\Filament\Resources\KiloResource\Pages;

use App\Filament\Resources\KiloResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKilo extends EditRecord
{
    protected static string $resource = KiloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
