<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BeritaViewsChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Analitik Kunjungan Berita';

    protected int | string | array $columnSpan = 'full';

    protected static string $color = 'success';

    protected static ?string $pollingInterval = '30s';

    protected static ?string $maxHeight = '400px';

    // 1. Menambahkan Filter Tahun di pojok kanan atas
    protected function getFilters(): ?array
    {
        $tahunSekarang = date('Y');

        // Membuat daftar 5 tahun terakhir secara otomatis
        $filters = [];
        for ($i = 0; $i < 5; $i++) {
            $tahun = $tahunSekarang - $i;
            $filters[$tahun] = (string) $tahun;
        }

        return $filters;
    }

    protected function getData(): array
    {
        // 2. Ambil tahun dari filter yang dipilih user (default ke tahun sekarang)
        $activeFilter = $this->filter ?? date('Y');

        $data = Berita::select(
            DB::raw('SUM(views) as total_views'),
            DB::raw('MONTH(created_at) as month')
        )
        ->whereYear('created_at', $activeFilter) // Query mengikuti filter tahun
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('total_views', 'month')
        ->all();

        $monthlyData = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthlyData[] = $data[$m] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Pembaca',
                    'data' => $monthlyData,
                    'fill' => 'start',
                    'tension' => 0.45,
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'borderWidth' => 3,
                    'pointRadius' => 4,
                    'pointBackgroundColor' => '#10b981',
                    'pointBorderColor' => '#fff',
                    'pointBorderWidth' => 2,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public function getDescription(): ?string
    {
        // Deskripsi otomatis berubah sesuai tahun yang dipilih
        $tahun = $this->filter ?? date('Y');
        return "Laporan tren interaksi pembaca sepanjang tahun " . $tahun;
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'grid' => [
                        'display' => true,
                        'drawBorder' => false,
                        'color' => 'rgba(0, 0, 0, 0.05)',
                    ],
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}
