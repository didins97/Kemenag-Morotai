<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenResource\Pages;
use App\Models\Dokumen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DokumenResource extends Resource
{
    protected static ?string $model = Dokumen::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Data & Informasi';
    protected static ?string $navigationLabel = 'Pusat Dokumen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Dokumen')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Surat' => 'Surat',
                        'Peraturan' => 'Peraturan',
                        'Laporan' => 'Laporan',
                        'Panduan' => 'Panduan',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->default('Lainnya')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->default(now())
                    ->required(),

                Forms\Components\FileUpload::make('file')
                    ->label('Upload File')
                    ->directory('dokumens') // => simpan di storage/app/public/dokumens
                    ->required()
                    ->downloadable()
                    ->openable()
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->maxSize(5120), // 5 MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->colors([
                        'primary' => 'Surat',
                        'success' => 'Peraturan',
                        'warning' => 'Laporan',
                        'info' => 'Panduan',
                        'gray' => 'Lainnya',
                    ]),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('file')
                    ->label('File')
                    ->url(fn($record) => asset('storage/' . $record->file), true)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn($state) => basename($state)),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Surat' => 'Surat',
                        'Peraturan' => 'Peraturan',
                        'Laporan' => 'Laporan',
                        'Panduan' => 'Panduan',
                        'Lainnya' => 'Lainnya',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDokumens::route('/'),
            'create' => Pages\CreateDokumen::route('/create'),
            'edit' => Pages\EditDokumen::route('/{record}/edit'),
        ];
    }
}
