<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumumanResource\Pages;
use App\Filament\Resources\PengumumanResource\RelationManagers;
use App\Models\Pengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationGroup = 'Konten Berita & Opini';
    protected static ?string $navigationLabel = 'Pengumuman';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pengumuman')
                    ->description('Lengkapi data pengumuman dengan jelas.')
                    ->schema([
                        Forms\Components\TextInput::make('judul')
                            ->label('Judul Pengumuman')
                            ->placeholder('Contoh: Jadwal Sholat Ramadhan 1445 H')
                            ->required()
                            ->columnSpanFull()
                            ->autofocus(),

                        Forms\Components\RichEditor::make('isi')
                            ->label('Isi Pengumuman')
                            ->placeholder('Tulis detail isi pengumuman di sini...')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'bulletList',
                                'orderedList',
                                'link'
                            ])
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\DatePicker::make('tanggal')
                            ->label('Tanggal Pengumuman')
                            ->default(now())
                            ->displayFormat('d M Y')
                            ->required(),

                        Forms\Components\TextInput::make('penulis')
                            ->label('Penulis')
                            ->placeholder('Misalnya: Admin Kemenag')
                            ->default('Admin Kemenag')
                            ->maxLength(100),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->tooltip(fn($record) => $record->judul), // tooltip judul full

                Tables\Columns\BadgeColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->colors([
                        'danger' => fn($state) => \Carbon\Carbon::parse($state)->isPast(),
                        'success' => fn($state) => \Carbon\Carbon::parse($state)->isToday(),
                        'info' => fn($state) => \Carbon\Carbon::parse($state)->isFuture(),
                    ]),

                Tables\Columns\TextColumn::make('penulis')
                    ->label('Penulis')
                    ->icon('heroicon-o-user') // lebih ramah lihatnya
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true), // default tersembunyi, bisa ditampilkan manual
            ])
            ->filters([
                Tables\Filters\Filter::make('Rentang Tanggal')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Dari'),
                        Forms\Components\DatePicker::make('until')->label('Sampai'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['from'], fn($q, $date) => $q->whereDate('tanggal', '>=', $date))
                            ->when($data['until'], fn($q, $date) => $q->whereDate('tanggal', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->tooltip('Lihat detail'),
                Tables\Actions\EditAction::make()->tooltip('Edit pengumuman'),
                Tables\Actions\DeleteAction::make()->tooltip('Hapus pengumuman'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('Hapus Terpilih')
                    ->requiresConfirmation()
                    ->color('danger'),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengumumen::route('/'),
            'create' => Pages\CreatePengumuman::route('/create'),
            'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }
}
