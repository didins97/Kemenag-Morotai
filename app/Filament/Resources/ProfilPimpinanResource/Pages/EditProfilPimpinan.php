<?php

namespace App\Filament\Resources\ProfilPimpinanResource\Pages;

use App\Filament\Resources\ProfilPimpinanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilPimpinan extends EditRecord
{
    protected static string $resource = ProfilPimpinanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
