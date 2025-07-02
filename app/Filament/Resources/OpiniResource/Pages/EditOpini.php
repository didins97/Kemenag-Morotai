<?php

namespace App\Filament\Resources\OpiniResource\Pages;

use App\Filament\Resources\OpiniResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpini extends EditRecord
{
    protected static string $resource = OpiniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
