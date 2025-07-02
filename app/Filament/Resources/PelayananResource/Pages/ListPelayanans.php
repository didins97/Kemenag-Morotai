<?php

namespace App\Filament\Resources\PelayananResource\Pages;

use App\Filament\Resources\PelayananResource;
use App\Models\Pelayanan;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPelayanans extends ListRecords
{
    protected static string $resource = PelayananResource::class;

    public function mount(): void
    {
        if (Pelayanan::exists()) {
            $this->redirect(static::getResource()::getUrl('edit', [
                'record' => Pelayanan::first()->id
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
