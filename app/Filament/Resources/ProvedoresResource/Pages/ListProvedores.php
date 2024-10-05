<?php

namespace App\Filament\Resources\ProvedoresResource\Pages;

use App\Filament\Resources\ProvedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProvedores extends ListRecords
{
    protected static string $resource = ProvedoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
