<?php

namespace App\Filament\Resources\PostingResource\Pages;

use App\Filament\Resources\PostingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPosting extends EditRecord
{
    protected static string $resource = PostingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
