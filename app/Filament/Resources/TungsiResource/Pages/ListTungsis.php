<?php

namespace App\Filament\Resources\TungsiResource\Pages;

use App\Filament\Resources\TungsiResource;
use App\Models\Tungsi;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTungsis extends ListRecords
{
    protected static string $resource = TungsiResource::class;

    public function mount(): void
    {
        if (Tungsi::exists()) {
            $this->redirect(static::getResource()::getUrl('edit', [
                'record' => Tungsi::first()->id
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
