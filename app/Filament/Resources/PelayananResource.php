<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelayananResource\Pages;
use App\Filament\Resources\PelayananResource\RelationManagers;
use App\Models\Pelayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelayananResource extends Resource
{
    protected static ?string $model = Pelayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Pelayanan';
    protected static ?string $navigationGroup = 'Layanan Publik';
    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool
    {
        return !Pelayanan::exists(); // Hanya izin create jika belum ada data
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->limit(1); // Batasi query hanya 1 data
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Layanan')
                    ->description('Upload gambar dan tentukan proses layanan')
                    ->icon('heroicon-o-document-text')
                    ->collapsible()
                    ->schema([
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar Utama Layanan')
                            ->image()
                            ->directory('pelayanan-images')
                            ->imageEditor()
                            ->imagePreviewHeight('200px')
                            ->panelAspectRatio('2:1')
                            ->panelLayout('integrated')
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Upload gambar representasi layanan (max 2MB)'),
                    ]),

                Forms\Components\Section::make('Tahapan Proses Layanan')
                    ->description('Tentukan urutan proses layanan kepada publik')
                    ->icon('heroicon-o-list-bullet')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\Repeater::make('proses')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('judul')
                                            ->label('Judul Tahapan')
                                            ->placeholder('Contoh: Pendaftaran Online')
                                            ->maxLength(100)
                                            ->required()
                                            ->columnSpan(1),

                                        Forms\Components\Textarea::make('description')
                                            ->label('Penjelasan Proses')
                                            ->placeholder('Deskripsi lengkap tahapan ini...')
                                            ->rows(3)
                                            ->required()
                                            ->columnSpan(1)
                                            ->extraInputAttributes(['style' => 'min-height: 100px']),
                                    ])
                            ])
                            ->grid(2)
                            ->defaultItems(1)
                            ->label('Daftar Tahapan')
                            ->addActionLabel('+ Tambah Tahapan Baru')
                            ->deleteAction(
                                fn(Forms\Components\Actions\Action $action) => $action->label('Hapus Tahapan'),
                            )
                            ->reorderable(true)
                            ->cloneable()
                            ->itemLabel(fn(array $state): ?string => $state['judul'] ?? null)
                            ->collapsible()
                            ->columns(2)
                            ->columnSpanFull()
                    ])
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar'),

                Tables\Columns\TextColumn::make('proses')
                    ->label('Tahapan')
                    ->formatStateUsing(function ($state) {
                        return count($state) . ' Tahapan';
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPelayanans::route('/'),
            // 'create' => Pages\CreatePelayanan::route('/create'),
            'edit' => Pages\EditPelayanan::route('/{record}/edit'),
        ];
    }
}
