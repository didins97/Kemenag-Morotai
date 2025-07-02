<?php

namespace App\Filament\Resources\SejarahResource\Pages;

use App\Filament\Resources\SejarahResource;
use App\Models\Sejarah;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSejarahs extends ListRecords
{
    protected static string $resource = SejarahResource::class;

    public function mount(): void
    {
        if (Sejarah::exists()) {
            $this->redirect(static::getResource()::getUrl('edit', [
                'record' => Sejarah::first()->id
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
