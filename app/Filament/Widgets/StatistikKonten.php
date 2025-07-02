<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Berita;
use App\Models\Opini;
use App\Models\Pengaduan;

class StatistikKonten extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Total Berita', Berita::count())
                ->description('Jumlah berita terbit')
                ->icon('heroicon-o-newspaper')
                ->color('primary'),

            Card::make('Total Opini', Opini::count())
                ->description('Jumlah opini aktif')
                ->icon('heroicon-o-document-text')
                ->color('success'),

            Card::make('Total Pengaduan', Pengaduan::count())
                ->description('Pengaduan masyarakat masuk')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('danger'),
        ];
    }
}
