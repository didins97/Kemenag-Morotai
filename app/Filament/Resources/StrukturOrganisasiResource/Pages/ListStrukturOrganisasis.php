<?php

namespace App\Filament\Resources\StrukturOrganisasiResource\Pages;

use App\Filament\Resources\StrukturOrganisasiResource;
use App\Models\Struktur;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrukturOrganisasis extends ListRecords
{
    protected static string $resource = StrukturOrganisasiResource::class;

    public function mount(): void
    {
        if (Struktur::exists()) {
            $this->redirect(static::getResource()::getUrl('edit', [
                'record' => Struktur::first()->id
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
