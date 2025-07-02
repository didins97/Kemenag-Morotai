<?php

namespace App\Filament\Resources\TungsiResource\Pages;

use App\Filament\Resources\TungsiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTungsi extends EditRecord
{
    protected static string $resource = TungsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
