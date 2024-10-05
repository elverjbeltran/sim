<?php

namespace App\Filament\Resources\ProvedoresResource\Pages;

use App\Filament\Resources\ProvedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvedores extends EditRecord
{
    protected static string $resource = ProvedoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this ->getResource()::getUrl('index');
    }
}
