<?php

namespace App\Filament\Resources\ProvedoresResource\Pages;

use App\Filament\Resources\ProvedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProvedores extends CreateRecord
{
    protected static string $resource = ProvedoresResource::class;
    protected function getRedirectUrl(): string
    {
        return $this ->getResource()::getUrl('index');
    }
}
