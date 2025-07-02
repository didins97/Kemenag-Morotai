<?php

namespace App\Filament\Resources\VisiMisiResource\Pages;

use App\Filament\Resources\VisiMisiResource;
use App\Models\VisiMisi;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVisiMisis extends ListRecords
{
    protected static string $resource = VisiMisiResource::class;

    public function mount(): void
    {
        if (VisiMisi::exists()) {
            $this->redirect(static::getResource()::getUrl('edit', [
                'record' => VisiMisi::first()->id
            ]));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
