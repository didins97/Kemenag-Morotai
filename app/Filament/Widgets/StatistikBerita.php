<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatistikBerita extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static ?string $pollingInterval = '15s';

    protected function getHeading(): ?string
    {
        return 'Ringkasan Manajemen Konten';
    }

    protected function getStats(): array
    {
        $totalBerita = Berita::count();
        $beritaTerbit = Berita::published()->count();
        $beritaDraft = Berita::draft()->count();
        $beritaHariIni = Berita::whereDate('created_at', Carbon::today())->count();

        return [
            // KARTU 1: TOTAL BERITA
            Stat::make('Arsip Berita', $totalBerita)
                ->description($beritaHariIni > 0 ? "{$beritaHariIni} entri baru hari ini" : 'Database terbaru')
                ->descriptionIcon('heroicon-m-plus-circle')
                ->icon('heroicon-o-folder-open')
                ->color('info')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-sm border-t-4 border-info-500',
                    'style' => 'background: linear-gradient(to bottom, rgba(14, 165, 233, 0.05), transparent);',
                ]),

            // KARTU 2: BERITA TERBIT
            Stat::make('Publikasi Aktif', $beritaTerbit)
                ->description('Terlihat di publik')
                ->descriptionIcon('heroicon-m-globe-alt')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-sm border-t-4 border-success-500',
                    'style' => 'background: linear-gradient(to bottom, rgba(34, 197, 94, 0.05), transparent);',
                ]),

            // KARTU 3: DRAFT (Dinamis: Berubah Merah jika ada antrian)
            Stat::make('Tinjauan / Draft', $beritaDraft)
                ->description($beritaDraft > 0 ? "Butuh tindakan segera" : 'Semua draft selesai')
                ->descriptionIcon($beritaDraft > 0 ? 'heroicon-m-exclamation-triangle' : 'heroicon-m-check-badge')
                ->icon('heroicon-o-document-magnifying-glass')
                ->color($beritaDraft > 0 ? 'danger' : 'gray')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-sm border-t-4 ' . ($beritaDraft > 0 ? 'border-danger-500' : 'border-gray-400'),
                    'style' => $beritaDraft > 0
                        ? 'background: linear-gradient(to bottom, rgba(239, 68, 68, 0.05), transparent);'
                        : 'background: linear-gradient(to bottom, rgba(156, 163, 175, 0.05), transparent);',
                ]),
        ];
    }
}
