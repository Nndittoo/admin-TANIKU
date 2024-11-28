<?php

namespace App\Filament\Resources\PostingResource\Pages;

use App\Filament\Resources\PostingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostings extends ListRecords
{
    protected static string $resource = PostingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
