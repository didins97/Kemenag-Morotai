<?php

namespace App\Filament\Resources\KontakResource\Pages;

use App\Filament\Resources\KontakResource;
use App\Models\Kontak;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKontaks extends ListRecords
{
    protected static string $resource = KontakResource::class;

    public function mount(): void
    {
        if (Kontak::exists()) {
            $this->redirect(static::getResource()::getUrl('edit', [
                'record' => Kontak::first()->id
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
