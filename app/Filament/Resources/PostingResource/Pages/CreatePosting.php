<?php

namespace App\Filament\Resources\PostingResource\Pages;

use App\Filament\Resources\PostingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePosting extends CreateRecord
{
    protected static string $resource = PostingResource::class;
}
