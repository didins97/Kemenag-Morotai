<?php

namespace App\Filament\Widgets;

use App\Models\Opini;
use App\Models\Galeri;
use App\Models\Pengaduan;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatistikLainnya extends BaseWidget
{
    protected static ?int $sort = 2;

    protected static ?string $pollingInterval = '15s';

    protected function getHeading(): ?string
    {
        return 'Ringkasan Layanan & Galeri';
    }

    protected function getStats(): array
    {
        $totalOpini = Opini::count();
        $totalPengaduan = Pengaduan::count();
        $totalGaleri = Galeri::count();

        // Indikator dinamis untuk pengaduan
        $hasAduan = $totalPengaduan > 0;

        return [
            // KARTU 1: PENGADUAN (Warna Merah/Danger jika ada laporan)
            Stat::make('Laporan Pengaduan', $totalPengaduan)
                ->description($hasAduan ? 'Perlu respon segera' : 'Belum ada laporan baru')
                ->descriptionIcon($hasAduan ? 'heroicon-m-exclamation-triangle' : 'heroicon-m-check-circle')
                ->chart([7, 3, 5, 2, 10, 3, $totalPengaduan])
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color($hasAduan ? 'danger' : 'gray')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-sm border-t-4 ' . ($hasAduan ? 'border-danger-500' : 'border-gray-400'),
                    'style' => $hasAduan
                        ? 'background: linear-gradient(to bottom, rgba(239, 68, 68, 0.05), transparent);'
                        : 'background: linear-gradient(to bottom, rgba(156, 163, 175, 0.05), transparent);',
                ]),

            // KARTU 2: OPINI PUBLIK (Warna Biru/Info)
            Stat::make('Opini Publik', $totalOpini)
                ->description('Kontribusi artikel warga')
                ->descriptionIcon('heroicon-m-document-text')
                ->chart([2, 4, 6, 8, 5, 10, $totalOpini])
                ->icon('heroicon-o-user-group')
                ->color('info')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-sm border-t-4 border-info-500',
                    'style' => 'background: linear-gradient(to bottom, rgba(14, 165, 233, 0.05), transparent);',
                ]),

            // KARTU 3: GALERI (Warna Hijau/Success)
            Stat::make('Koleksi Galeri', $totalGaleri)
                ->description('Total aset dokumentasi')
                ->descriptionIcon('heroicon-m-photo')
                ->chart([10, 20, 15, 25, 18, 30, $totalGaleri])
                ->icon('heroicon-o-camera')
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-sm border-t-4 border-success-500',
                    'style' => 'background: linear-gradient(to bottom, rgba(34, 197, 94, 0.05), transparent);',
                ]),
        ];
    }
}
